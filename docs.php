<!DOCTYPE HTML> 
<html lang="zh-CN"> 
<head> 
<meta charset="UTF-8"> 
<title>Arduino2Weibo - 可以用围脖远程控制Arduino啦!</title> 
<link rel="stylesheet" type="text/css" href="style.css" media="all" />  
</head>  
<body> 
	<h1>Arduino围脖<sup title="Version 0.3">v0.3</sup></h1> 
	<h2>可以用围脖远程控制Arduino啦!</h2> 
	<div>
        <br/>
	<p><a href="../index.php">< 返回首页</a></p>
		<h3>函数说明</h3> 
        <p>这里是Arduino2Weibo库Weibo类封装的函数的使用说明，希望对您的开发有用。</p>
        <h4>Methods</h4>
	<table class="http">
	  <tbody>
            <tr>
            	<th>bool <strong>post</strong>(const char *<strong>msg</strong>)</th>
            </tr><tr>
                <td>向服务器POST请求发布一条微博信息。请求成功返回True，否则False<br/>[const char *<strong>msg</strong>]:请求发送的围脖，必需。</td>
            </tr>
            <tr>
            	<th>bool <strong>repost</strong>(const char *<strong>id</strong>, const char *<strong>msg</strong> = NULL)</th>
             </tr><tr>
             	<td>向服务器POST请求转发一条微博信息。请求成功返回True，否则False<br/>[const char *<strong>id</strong>]:转发围脖的id，必需。<br/>[const char *<strong>msg</strong>]:转发的附言，默认为空。</td>
            </tr>
            <tr>
            	<th>bool <strong>atme</strong>(const char *<strong>sid</strong> = NULL)</th>
             </tr><tr>
             	<td>向服务器GET请求最新的@消息。请求成功返回True，否则False<br/>[const char *<strong>sid</strong>]:若指定sid，将查询晚于sid的@消息，默认为空。</td>
            </tr>
            </tbody>
         </table>
         <table class="parser">
	  <tbody>
            <tr>
            	<th>char* <strong>return_data</strong>()</th>
            </tr><tr>
                <td>解析服务器返回的json格式，并返回指针。</td>
            </tr>
            <tr>
            	<th>int <strong>json_length</strong>(char* <strong>json</strong>)</th>
             </tr><tr>
             	<td>计算并返回特定json的长度。</td>
            </tr>
            <tr>
            	<th>int <strong>value_length</strong>(char* <strong>json</strong>)</th>
             </tr><tr>
             	<td>计算并返回某个json内键值的长度</td>
            </tr>
            <tr>
            	<th>char* <strong>value_pointer</strong>(char* <strong>key</strong>, char* <strong>json</strong>)</th>
             </tr><tr>
             	<td>返回json中key的键值。<br/>[char* <strong>key</strong>]:查询的key，必需。<br/>[char* <strong>json</strong>]:目标json，必需。</td>
            </tr>
            <tr>
            	<th>short <strong>compare_strings</strong>(char* <strong>string1</strong>, char* <strong>string2</strong>)</th>
             </tr><tr>
             	<td>匹配两个字符串。若相同返回1，否则返回0。用来匹配json格式里带双引号的命令行。<br/>[char* <strong>string1</strong>]:非空终止(null-terminated)并加双引号的字符串，必需。<br/>[char* <strong>string2</strong>]:空终止且不加双引号的字符串，必需。</td>
            </tr>
            <tr>
            	<th>short <strong>compare_ids</strong>(char* <strong>string1</strong>, char* <strong>string2</strong>)</th>
             </tr><tr>
             	<td>匹配两个字符串。若相同返回1，否则返回0。用来匹配json格式里不带双引号的数字id。<br/>[char* <strong>string1</strong>]:非空终止(null-terminated)且不加双引号的字符串，必需。<br/>[char* <strong>string2</strong>]:空终止且不加双引号的字符串，必需。</td>
            </tr>
            <tr>
            	<th>char* <strong>find_substring</strong>(char* <strong>string1</strong>, char* <strong>string2</strong>)</th>
             </tr><tr>
             	<td>判断string1是否包含string2字符串，若是，返回第一次匹配的位置指针，否则返回空。</td>
            </tr>
          </tbody>
         </table>
       
               
 <br/> <p><a href="../index.php">< 返回首页</a></p>              
<br/>
	</div>		
	<div id="footer"> 
		2011 -2012 &copy; Arduino2Weibo Project</a> 
	</div> 
</body> 
</html> 