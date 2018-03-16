<?php
	$data  = dirname(__FILE__) . '/hitokoto.json';
	$json  = file_get_contents($data);
	$array = json_decode($json, true);
	$count = count($array);
	if ($count != 0)
    {
		$rand = array_rand($array);
		if ($_GET["id"]){
			$getId = $_GET["id"];
			foreach ($array as $num => $key) {
				foreach ($key as $id) {
					if (in_array($getId,$key)){
						$rand = $num;
					} 
				}
			}
		}
        $hitokoto = $array[$rand]['hitokoto'];
		$id = $array[$rand]['id'];
		$cat = $array[$rand]['cat'];
		$author = $array[$rand]['author'];
		$source = $array[$rand]['source'];
		$date = $array[$rand]['date'];
		$catname = $array[$rand]['catname'];
        //echo 'hitokoto({"hitokoto":"'.$hitokoto.'","cat":"'.$cat.'","author":"'.$author.'","source":"'.$source.'","like":0,"date":"'.$date.'","catname":"'.$catname.'","id":'.$id.'});';
    }
    else
    {
		//echo 'hitokoto({"hitokoto":"一言加载中......","cat":"null","author":"null","source":"null","like":0,"date":"2000.1.1 00:00:00","catname":"null","id":0});';
    };
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>一言自用版</title>
    <link href="./public/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div class="main">
		<div class="topbox">
			<div class="topbox_menu">
				<a href="//www.iqi7.com/hitokoto-now/index.php" id="logo"><img src="./public/img/logo.png" alt="" height="50" /></a>
				<a href="//www.iqi7.com/hitokoto-now/index.php" id="menu1" class="menu cur">首页</a>
				<a href="https://www.iqi7.com" id="menu2" class="menu">博客</a>
			</div>
			<div class="topbox_bar"></div>
			<div id="hitokoto">『Loading...』</div>
		</div>
		<img src="./public/img/bg.jpg" id="bkImg" onmousedown="return false" />
		<?php 
			if ($_GET["id"]){
				echo '
					<div class="wrapper">
						<div class="center-hitokoto">
							'.$hitokoto.'
						</div>
						<div class="bottom-hitokoto">
							ID : '.$id.'
						<br />
							类别 : '.$catname.'
						<br />
							作者 : '.$author.'
						<br />
							出处 : '.$source.'
						</div>
					</div>
				';
			}
			else{
				echo '
					<div class="wrapper">
						<h1>关于</h1>
						<div class="box">
							<p>欢迎访问一言自用版</p>
							<ul class="pul"></ul>
						</div>
						<h1>自用API</h1>
						<div class="box">
							<p>一言(Hitokoto)</p>
							<ul class="pul">
								<li>随机: https://www.iqi7.com/hitokoto-now/api.php?encode=返回数据类型(jsc或json)&fun=自定义函数名&cat=类别(a,b,c,d,e,f,g)&charset=编码(utf8或gbk)</li>
								<li>指定ID显示页面: https://www.iqi7.com/hitokoto-now/index.php?id=一言ID</li>
							</ul>
						</div>
						<br /><br />
						<h1>鸣谢</h1>
						<div class="box">
							<a href="https://kotori.love" target="_blank">空樱酱</a>
						</div>
						<br />
						<br />
					</div>
				';
			};
		?>
		<div id="fbox">
			<a href="#"><img src="./public/img/gotop.png" alt="goTop" /></a>
		</div>
		<div class="bottombox">
			Email: i # iqi7.com<br />
			Copyright &copy; 七夏浅笑 &amp; kotori.love &amp; hitokoto.us.
		</div>
	</div>
	<div id="cover"></div>
     <script type="text/javascript" src="./public/js/jquery.min.js"></script>
	<script type="text/javascript" src="./public/js/index.js"></script>
    </body>
</html>