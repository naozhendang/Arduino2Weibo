<?php
/*
  atme.php - Aruino2Weibo:Remote control your Arduino via weibo.
  Copyright (c) naozhendang.com 2011-2012. 
  
  This library is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
 
  More information can be found at:  http://arduino2weibo.sinaapp.com
  
  ****** Server-side Script ******
  获取@当前用户的微博列表
*/

// ver0.3 - Control arduino via Weibo
// ver0.2 - Support IDE 1.0
     
header('Content-Type:text/html; charset=utf-8');

//鉴于新浪微博API OAuth2.0认证各种恶心之处和限制
//这里我们使用其Andriod平板客户端的API Key和App Secret
//Arduino端直接通过账户名和密码获得授权,从而避开了授权页。缺点是微博来源都显示为Andriod平板
//当然，你可以根据喜好尽情使用其他客户端的API Key和App Secret，具体请Google
define( "WB_AKEY" , '2540340328' );
define( "WB_SKEY" , '886cfb4e61fad4e4e9ba9dee625284dd' );


include_once( 'saetv2.ex.class.php' );

if (isset($_REQUEST['username']) && isset($_REQUEST['password']))
{
    //获得OAuth2.0 Access Token
    $o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
    
            $keys = array();
            $keys['username'] = $_REQUEST['username'];
            $keys['password'] = $_REQUEST['password'];
            try {
                    $token = $o->getAccessToken( 'password', $keys ) ;
            } catch (OAuthException $e) {
            	echo json_encode(array('error'=>$e->getMessage()));
            }
    
    if ($token) {
    
            $c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
            
            //如果Post中带有since_id
            if(is_numeric($_REQUEST['since_id'])&& !empty($_REQUEST['since_id'])){
            	//获得比since_id更晚的mention
            	//API：{@link http://open.weibo.com/wiki/2/statuses/mentions statuses/mentions}
            	$atme  = $c->mentions(1, NULL,$_REQUEST['since_id'], 0); 
            } else {
            	//没有since_id
            	$atme  = $c->mentions(1, NULL,NULL, 0); 
            }
            
            //若指定since_id,倒序排列获得的mentions数组，第一组即是since_id的后一条
            //若未指定since_id，就不用倒序，直接获取最新一条
            if(is_numeric($_REQUEST['since_id'])&& !empty($_REQUEST['since_id'])){
            	rsort($atme[statuses],SORT_STRING);
            }
             
            if(isset($atme[error])){
                    echo json_encode($atme);
            } else if(isset($atme[statuses][0])){
            	  //构造json
               	  $new_atme = array
                  (
                      'id'=> $atme[statuses][0][id],
                      'text' => $atme[statuses][0][text],       
                      'uid' => $atme[statuses][0][user][id],
                      'user' => $atme[statuses][0][user][screen_name],
                  );      
                  echo json_encode($new_atme);
            } 
    }
}
?>