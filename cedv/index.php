<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>首页 - 肿瘤流行病数据可视化</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/style_index.css" type="text/css">
	<script type="text/javascript" src="js/d3.js"></script>
    <script type="text/javascript" src="js/trigonometry.js"></script>
    <script type="text/javascript" src="js/arc.js"></script>
    <script type="text/javascript" src="js/functor.js"></script>
    <script type="text/javascript" src="js/source.js"></script>
    <script type="text/javascript" src="js/target.js"></script>
    <script type="text/javascript" src="js/arc-chord.js"></script>
    <script type="text/javascript" src="js/arc-chord(1).js"></script>
    <script type="text/javascript" src="js/gradients.js"></script>
    <script src="js/urchin.js" type="text/javascript"></script>
</head>
<body>
<p id="tips"> 本网站使用HTML5，若出现图像不能正常显示请使用IE9及以上版本IE内核浏览器或非IE内核浏览器 （CHROME、FIREFOX、SAFARI、OPERA等），以获得最佳可视化体验。<img src="images/o_c.gif" alt="关闭" id="close" /> </p>
	<?php require_once("header.php"); ?>
    
    <script type="text/javascript">
		var mark = document.getElementById("nav_index");
		mark.setAttribute("class","selected");
		var st = document.getElementById("search_text");
		st.setAttribute("value","请输入搜索词");
		function Close() {
			document.getElementById("tips").style.display = "none";
		}
		window.onload = function() {
			document.getElementById("tips").onclick = Close;
		}
	</script>
    
	<div class="index_body">
			<div class="index_introduce" >
            	<br>
				<p style="font-size:18px; line-height:24px">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*图为2007-2011年肿瘤发病人数的动态可视化展示，时间单位为月。其中红色代表女性，绿色代表男性，当时间定位在某年某月时，该图会自动展示出发病人数前九位的肿瘤名称，并自动计算出当月发病总人数。此外，该图可自动及手动操作，如点击某年份时，该图将会自动显示该年1月份的数据并按时间轴自动变化，若点击暂停键，将停在当前显示的肿瘤名称及发病人数。</p>
 			</div>
			<div class="index_image" >
				<div id="bpg" style="width: 940px;margin: 0 auto;">
					<div id="mainDiv">
						
						<div id="svgDiv" style="font-size: 10px; width: 774px; height: 974px;margin:auto;"></div>
                        <DIV STYLE="position:absolute;left=0px;top=0px;"> 
						<div id="imgDiv" style="position:relative; top: -960px; left: 70px;">
							<img id="playPause" src="images/pause_bw.png" width="24" height="24">
						</div>
                        </DIV>    
			    </div>
			    <div id="toolTip" class="tooltip" style="opacity: 0; width: 200px; height: 90px; position: absolute; left: 409px; top: 236px;">
			            <div id="header1" class="header3"></div>
			            <div class="header-rule"></div>
			            <div id="head" class="header"></div>
			            <div class="header-rule"></div>
			            <div id="header2" class="header2"></div>
			            <div class="tooltipTail"></div>
			    </div>
				<script type="text/javascript" src="js/globals.js"></script>
			    <script type="text/javascript" src="js/initialize.js"></script>
			    <script type="text/javascript" src="js/events.js"></script>
			    <script type="text/javascript" src="js/data.js"></script>
			    <script type="text/javascript" src="js/_buildChords.js"></script>
			    <script type="text/javascript" src="js/update.js"></script>

			    <script type="text/javascript">

			        initialize();

			        fetchData();

			        function run() {

			            if (month < 11) month++; else {
			                month=0;
			                if (year < countriesGrouped.length) year++;
			            }
			            if (month==maxMonth && year==maxYear)  {
			                month=-1;
			                year=0;
			            }
			            else {
			                update(year,month);
			            }
			        }


			    </script>
		    </div>
			
    		
        </div>
    
    </div>
    
	<?php require_once("footer.php"); ?>
</body>
</html>