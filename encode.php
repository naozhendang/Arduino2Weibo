<!DOCTYPE HTML> 
<html lang="zh-CN"> 
<head> 
<meta charset="UTF-8"> 
<title>Arduino2Weibo - 可以用围脖远程控制Arduino啦!</title> 
<link rel="stylesheet" type="text/css" href="style.css" media="all" />  
<script type="text/javascript"><!--
	function uE() {
		if (source.value == '') { alert('坑爹啊!文本框中没有内容...');}
		else{
			result.value = '';
			result.value = unicode(source.value);
		}	
	}


	// private method for UTF-8 encoding 
        function unicode(string){
                string = string.replace(/[^\u0000-\u00FF]/g,function($0){return escape($0).replace(/(%u)(w{4})/gi,"&#x$2;")}).replace(/%u/g,'\\u').replace(/&/g,'%26');
                string = string.toLowerCase();
                return string;
        }
//--></script> 
 
</head> 
<body> 
	<h1>Arduino围脖<sup title="Version 0.3">v0.3</sup></h1> 
	<h2>可以用围脖远程控制Arduino啦!</h2>  
	<div> 
        <br/>
	<p><a href="../index.php">< 返回首页</a></p>
	
		<h3>Unicode编码工具</h3> 
		<p>输入转化内容</p>
 		<textarea id="source" style="width: 580px; height: 80px"></textarea>
		<br><br>
		<a class="last button" href="javascript:void(uE())" style="margin:0 auto;">立即转化</a>
		<br><br>
 		<p>转化结果</p>
		<textarea id="result" style="width: 580px; height: 80px"></textarea>
		<p>*如果内容中含有<strong>&</strong>的话，通过http传值会产生错误，所以用URL编码<strong>%26</strong>替换。</p>
		<br><br>
		
		 
	</div>		
	<div id="footer"> 
		2011 -2012 &copy; Arduino2Weibo Project</a> 
	</div> 
</body> 
</html> 