<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>关于-健康期望寿命指标测算工具</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960_12_col.css" />
<link rel="stylesheet" href="css/style.css" />
</head>


<body>
<?php
	require_once("header.php");
?>
<div id="content" class="container_12">
  <div id="about_introduce">
  	<!--
  	<p class="text_bold text_font18">Introduction of HEICT：</p>
    <p>Health Expectancy Indicator Calculation Tool (HEICT) is a web service tool designed to calculate health expectancies online and provide access to related research literature in China. It consists of data visualizations of life expectancy (LE) distribution at birth and change trend of LE based on previous China’s census results, as well as the core web service module with health expectancy calculating function, and integration of domestic research trend analysis based on relevant published literature from <a href="http://www.wanfangdata.com.cn/" target="_blank">WANFANG DATA</a> and <a href="http://www.cnki.net/" target="_blank">CNKI</a>.</p>
    <p>HEICT provides an alternative and more convenient choice for researchers other than traditional calculation approach such as Excel, SAS or SPSS. We also suppose it to be devoted to promote the standardization and consistency of health expectancies research in China, and then attract more attention and application of health expectancy indicators in public policy arena.</p>
    <p>HEICT model development initiated by HU Guangyu during his master study period in CCMU, China. Its first edition public released as freeware in June 2013 and accomplished by HU Guangyu & ZHOU Yiyang.</p>
    <br>
    <p class="text_bold text_font18">Introduction of author：</p>
    <p>Program design：HU Guangyu & ZHOU Yiyang.</p>
    <p>Programming：ZHOU Yiyang.</p>
    <br>
    <p>Welcome any comments or enquiries you may have about the HEICT, for donation or further cooperation please send an e-mail to <a href="mailto:guangyu.hu@epiman.cn" target="_blank">guangyu.hu@epiman.cn</a></p>
    <br><br>
    -->
    <p class="text_bold text_font18">工具简介：</p>
    
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;健康期望寿命测算工具（HEICT）是一个用于提供健康期望寿命指标实时测算及相关研究信息的在线服务工具，以<a href="http://www.ncmi.cn/" target="_blank">国家人口与健康科学数据共享平台（NCMI）</a>提供的生命登记和人口统计数据为基础，
        提供了基于1990年以来历次中国人口普查结果的出生期望寿命分布及时间变化趋势的可视化展示，和以健康期望寿命指标测算为核心功能的在线服务模块，同时整合呈现了来自
        <a href="http://www.wanfangdata.com.cn/" target="_blank">万方数据</a>和<a href="http://www.cnki.net/" target="_blank">中国知网</a>
        的国内相关研究文献学术趋势分析。HEICT致力于以 NCMI 平台的开放资源为依托，促进国内相关研究的规范化和标准化，推动健康期望寿命在中国的研究发展与实践应用。捐赠支持或研究合作请致信：<a href="mailto:guangyu.hu@epiman.cn" target="_blank">guangyu.hu@epiman.cn</a></p>
    
    <br>
    <p class="text_bold text_font18">相关文档：</p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="pdfview1.html" target="pdf">I. HEICT使用指南</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="pdfview2.html" target="pdf">II. 健康期望寿命指标测算指南</a>
    <iframe name='pdf' width='900' height='600' src="pdfview1.html"></iframe>

     

  </div>
</div>
<?php
	require_once("footer.php");
?>

<script>
	var obj = document.getElementById("nav4");
	obj.classList.add('nav_current');
	obj = document.getElementById("nav2");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav3");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav1");
	obj.classList.remove('nav_current');
</script>
</body>
</html>
