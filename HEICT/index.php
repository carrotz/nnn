<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页-健康期望寿命指标测算工具</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960_12_col.css" />
<link rel="stylesheet" href="css/style.css" />

<script src="js/echarts-all.js"></script>
</head>


<body>
<?php
	require_once("header.php");
?>
<div id="content" class="container_12">
  <div id="introduce">
  	<!--
    <p>Increased longevity without quality of life is an empty prize. Health expectancy is more important than life expectancy.</p>
    <p class="text_right">——by Dr Hiroshi Nakajima, Director-General, W.H.O 1997</p>
    -->
    <p>缺乏生命质量的寿命延长只是一场空欢喜，健康期望寿命比期望寿命更重要。</p>
    <p class="text_right">——1997年时任世界卫生组织总干事Hiroshi Nakajima博士</p>
  </div>
  <div id="index_map">
    <div id="map_chart">
    </div>
  </div>
  <div>
    <center><span  align="center"  style="color:#cccccc"><i>数据来源:国家人口与健康科学数据共享平台</i></span></center>
  </div>
  <div id="bar_chart">
  </div>
</div>
<?php
	require_once("footer.php");
?>


<script>
	var obj = document.getElementById("nav1");
	obj.classList.add('nav_current');
	obj = document.getElementById("nav2");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav3");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav4");
	obj.classList.remove('nav_current');
</script>

</body>
<script type="text/javascript" src="js/echarts_index.js" charset="UTF-8"></script>
</html>
