<?php
/*
  repost.php - Aruino2Weibo:Remote control your Arduino via weibo.
  Copyright (c) naozhendang.com 2011-2012. 
  
  This library is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
 
  More information can be found at:  http://arduino2weibo.sinaapp.com
  
  ****** Server-side Script ******
  转发一条微博信息
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

if (isset($_REQUEST['username']) && isset($_REQUEST['password']) && isset($_REQUEST['id']))
{
	//获得OAuth2.0 Access Token
	$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );

	$keys = array();
	$keys['username'] = $_REQUEST['username'];
        $keys['password'] = $_REQUEST['password'];
	try {
		$token = $o->getAccessToken( 'password', $keys ) ;
	} catch (OAuthException $e) {
	}

	if ($token)
	{
           	$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $token['access_token'] );
                //转发一条微博信息
                //id:要转发的微博ID,必需。
                //API：{@link http://open.weibo.com/wiki/2/statuses/repost}
                if(isset($_REQUEST['status'])){
                	$msg = $c->repost( $_REQUEST['id'], substr($_REQUEST['status'],0,139) );
                } else{
                	$msg = $c->repost( $_REQUEST['id']);
                }
          	
        
                if(isset($msg[error])){
                    echo json_encode($msg);
                } else {
                    //构造json
                    $new_msg=array
                    (
                      'time'=> $msg[created_at],
                      'id'=> $msg[id]
                    );      
                    echo json_encode($new_msg);
                }
        }
}
?>