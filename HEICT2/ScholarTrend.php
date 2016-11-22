<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页-健康期望寿命指标测算工具</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960_12_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script src="js/jquery.js" type="text/javascript"></script>
</head>


<body>
<?php
	require_once("header.php");
?>

<div id="content" class="container_12">
  <form>
  <div id="btn">
  	<a href="#" id="btn_cnki" class="btn_st btn_cur" onClick="btn_clicked(1)">CNKI</a>
    <a href="#" id="btn_wanfang" class="btn_st" onClick="btn_clicked(2)">万方</a>
  </div>
  </form>
  
  <div id="wanfang" class="frame_in" style="display:none;">
    <iframe src="http://trend.wanfangdata.com.cn/Vein?wd=%E5%81%A5%E5%BA%B7%E6%9C%9F%E6%9C%9B%E5%AF%BF%E5%91%BD
    "></iframe>
  </div>
  <div id="cnki" class="frame_in" style="display:block;">
    <iframe src="http://trend.cnki.net/TrendSearch/trendshow.htm?searchword=%u5065%u5EB7%u671F%u671B%u5BFF%u547D
    "></iframe>
  </div>
</div>
<?php
	require_once("footer.php");
?>
</body>
</html>
<script>
	var obj = document.getElementById("nav3");
	obj.classList.add('nav_current');
	obj = document.getElementById("nav2");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav1");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav4");
	obj.classList.remove('nav_current');
	
	function btn_clicked(ord){
		if(ord == 1){
			var obj = document.getElementById('wanfang');
			obj.style.display = 'none';
			obj = document.getElementById("cnki");
			obj.style.display = "block";
			obj = document.getElementById('btn_wanfang');
			obj.classList.remove('btn_cur');
			obj = document.getElementById('btn_cnki');
			obj.classList.add('btn_cur');
		}
		else{
			var obj = document.getElementById("cnki");
			obj.style.display = "none";
			obj = document.getElementById("wanfang");
			obj.style.display = "block";
			obj = document.getElementById('btn_cnki');
			obj.classList.remove('btn_cur');
			obj = document.getElementById('btn_wanfang');
			obj.classList.add('btn_cur');
		}
	}
</script>
