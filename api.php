<?php
if ($_GET["charset"]){
	switch ($_GET["charset"]){
		case 'utf8';
			$charset = 'utf8';
			break;
		case 'gbk':
			$charset = 'gbk';
			break;
		default:
			$charset = 'utf8';
	}
}
else{
	$charset = 'utf8';
}
if ($_GET["encode"]){
	switch ($_GET["encode"]){
		case "jsc":
			header('Content-type:text/html');
			$encode = 'jsc';
			break;
		case "json":
			header('Content-type:text/json');
			$encode = 'json';
			break;
		default: 
			header('Content-type:text/html');
			$encode = 'jsc';
	}
}
else {
	header('Content-type:text/html');
	$encode = 'jsc';
};
if ($_GET["fun"]){
	$fun = $_GET["fun"];
}
else{
	$fun = 'hitokoto';
};
function hitokoto($encode,$fun,$charset)
{
	$data  = dirname(__FILE__) . '/hitokoto.json';
	$json  = file_get_contents($data);
	$array = json_decode($json, true);
	$count = count($array);
	if ($count != 0)
    {
		$rand = array_rand($array);
        $hitokoto = $array[$rand]['hitokoto'];
		$id = $array[$rand]['id'];
		$cat = $array[$rand]['cat'];
		$author = $array[$rand]['author'];
		$source = $array[$rand]['source'];
		$date = $array[$rand]['date'];
		$catname = $array[$rand]['catname'];
		$str = '{"hitokoto":"'.$hitokoto.'","cat":"'.$cat.'","author":"'.$author.'","source":"'.$source.'","like":0,"date":"'.$date.'","catname":"'.$catname.'","id":'.$id.'}';
		if ($charset == 'gbk'){
			header("charset=gbk"); 
			$str = mb_convert_encoding( $str,"GBK","auto");
		}
		else{
			header("charset=utf-8"); 
			$str = mb_convert_encoding( $str,"UTF-8","auto");
		};
		switch ($encode){
			case "jsc":
				echo $fun.'('.$str.');';
				break;
			case "json":
				echo $str;
				break;
			default:
				echo $fun.'('.$str.');';
		};
    }
    else
    {
		switch ($encode){
			case "jsc":
				echo $fun.'({"hitokoto":"Loading......","cat":"null","author":"null","source":"null","like":0,"date":"2000.1.1 00:00:00","catname":"null","id":0});';
				break;
			case "json":
				echo '{"hitokoto":"Loading......","cat":"null","author":"null","source":"null","like":0,"date":"2000.1.1 00:00:00","catname":"null","id":0};';
				break;
			default:
				echo $fun.'({"hitokoto":"Loading......","cat":"null","author":"null","source":"null","like":0,"date":"2000.1.1 00:00:00","catname":"null","id":0});';
		}
    }
};
if ($_GET["cat"])
{
	$matchcat = $_GET["cat"];
	$data  = dirname(__FILE__) . '/hitokoto.json';
	$json  = file_get_contents($data);
	$array = json_decode($json, true);
	$count = count($array);
	if ($count != 0)
    {
		if ($matchcat!=a&&$matchcat!=b&&$matchcat!=c&&$matchcat!=d&&$matchcat!=e&&$matchcat!=f&&$matchcat!=g)
		{
			$rand = array_rand($array);
			$hitokoto = $array[$rand]['hitokoto'];
			$id = $array[$rand]['id'];
			$cat = $array[$rand]['cat'];
			$author = $array[$rand]['author'];
			$source = $array[$rand]['source'];
			$date = $array[$rand]['date'];
			$catname = $array[$rand]['catname'];
			
		}
		else
		{
			do {
			$rand = array_rand($array);
			$hitokoto = $array[$rand]['hitokoto'];
			$id = $array[$rand]['id'];
			$cat = $array[$rand]['cat'];
			$author = $array[$rand]['author'];
			$source = $array[$rand]['source'];
			$date = $array[$rand]['date'];
			$catname = $array[$rand]['catname'];
			} while ($matchcat != $cat);
		};
		$str = '{"hitokoto":"'.$hitokoto.'","cat":"'.$cat.'","author":"'.$author.'","source":"'.$source.'","like":0,"date":"'.$date.'","catname":"'.$catname.'","id":'.$id.'}';
		if ($charset == gbk){
			header("charset=gbk"); 
			$str = mb_convert_encoding( $str,"GBK","auto");
		}
		else{
			header("charset=utf-8"); 
			$str = mb_convert_encoding( $str,"UTF-8","auto");
		};
		switch ($encode){
			case "jsc":
				echo $fun.'('.$str.');';
				break;
			case "json":
				echo $str;
				break;
			default:
				echo $fun.'('.$str.');';
		};
	}
	else
    {
		switch ($encode){
			case "jsc":
				echo $fun.'({"hitokoto":"Loading......","cat":"null","author":"null","source":"null","like":0,"date":"2000.1.1 00:00:00","catname":"null","id":0});';
				break;
			case "json":
				echo '{"hitokoto":"Loading......","cat":"null","author":"null","source":"null","like":0,"date":"2000.1.1 00:00:00","catname":"null","id":0};';
				break;
			default:
				echo $fun.'({"hitokoto":"Loading......","cat":"null","author":"null","source":"null","like":0,"date":"2000.1.1 00:00:00","catname":"null","id":0});';
		}
    }
}
else
{
	hitokoto($encode,$fun,$charset);
}
?>