<!DOCTYPE HTML>
<!-- Website template form http://www.cssmoban.com/ -->
<html>
<head>
	<meta charset="utf-8">
	<title>概览 - 肿瘤流行病数据</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
    
    
	<script src="js/d3.v3.min.js"></script>
	<?php
		error_reporting(E_ERROR);
		//引入需要的头文件
		include "php/database.php";		
		
		//获取所有发病数据
		$data_morbidity = get_data_morbidity();
		
		//获取icd-o-3说明数据
		$data_tumor = get_data_tumor();	
	?>
	
	<script type="text/javascript">
		var data_morbidity = <?php echo $data_morbidity ;?>;
		var data_tumor = <?php echo $data_tumor ;?>;
	
		//数据处理更新
		var data_per = new Array();
		var data_sum = new Object();
		var data_len = 0,i,j,k;
		data_sum.yall = 0;
		data_sum.y06 = data_sum.y07 = data_sum.y08 = 0;
		data_sum.y09 = data_sum.y10 = data_sum.y11 = 0;
		for(i = 0;i < data_morbidity.length;i ++){
			var tmp_year = data_morbidity[i].incidence.substr(0,4);
			data_sum.yall ++;
			if(tmp_year == '2006')
				data_sum.y06 ++;
			else if(tmp_year == '2007')
				data_sum.y07 ++;
			else if(tmp_year == '2008')
				data_sum.y08 ++;
			else if(tmp_year == '2009')
				data_sum.y09 ++;
			else if(tmp_year == '2010')
				data_sum.y10 ++;
			else if(tmp_year == '2011')
				data_sum.y11 ++;
			
			for(j = 0;j < data_len;j ++){
				if(data_per[j].icd_o_3 == data_morbidity[i].icd_o_3)
					break;	
			}
			if(j >= data_len){
				data_per[j] = new Object();
				data_per[j].icd_o_3 = data_morbidity[i].icd_o_3;
				data_per[j].sum = 0;
				data_per[j].y06 = data_per[j].y07 = data_per[j].y08 = 0;
				data_per[j].y09 = data_per[j].y10 = data_per[j].y11 = 0;
				data_len ++;
			}
			
			data_per[j].sum ++;
			if(tmp_year == '2006')
				data_per[j].y06 ++;
			else if(tmp_year == '2007')
				data_per[j].y07 ++;
			else if(tmp_year == '2008')
				data_per[j].y08 ++;
			else if(tmp_year == '2009')
				data_per[j].y09 ++;
			else if(tmp_year == '2010')
				data_per[j].y10 ++;
			else if(tmp_year == '2011')
				data_per[j].y11 ++;
   		}
		
		var top10_icd = new Array();
		var top10_ord = new Array();
		var top10_name = new Array();
		var top10_num = new Array();
		top10_icd = ['C15','C16','C34','C22','C50','C20','C42','C18','C71','C53'];
		for(j = 0;j < 10;j ++){
			for(i = 0;i < data_len;i ++){
				if(data_per[i].icd_o_3 == top10_icd[j]){
					top10_ord[j] = i;
					top10_num[j] = data_per[i].sum / data_sum.yall;
					break;
				}
			}
			for(i = 0;i < data_tumor.length;i ++){
				if(data_tumor[i].icd_o_3 == top10_icd[j]){
					top10_name[j] = data_tumor[i].cname;
					break;
				}
			}
		}
		
		var radar_polar = new Array();
		var radar_value = new Array();
		for(i = 0;i < 10;i ++){
			radar_polar[i] = new Array();
			radar_polar[i]['text'] = top10_name[i];
			radar_polar[i]['max'] = parseInt(parseInt(top10_num[i]*100+5) / 5) * 5;
			radar_value[i] = (top10_num[i]*100).toFixed(2);
		}
		
		var data_pie = new Array();
		for(i = 0;i < 6;i ++)
			data_pie[i] = new Array();
		for(i = 0;i < data_len; i ++){
			data_pie[0][i] = new Object();
			data_pie[1][i] = new Object();
			data_pie[2][i] = new Object();
			data_pie[3][i] = new Object();
			data_pie[4][i] = new Object();
			data_pie[5][i] = new Object();
			
			data_pie[0][i].num = ((data_per[i].y06 * 100) / data_sum.y06).toFixed(2);
			data_pie[1][i].num = ((data_per[i].y07 * 100) / data_sum.y07).toFixed(2);
			data_pie[2][i].num = ((data_per[i].y08 * 100) / data_sum.y08).toFixed(2);
			data_pie[3][i].num = ((data_per[i].y09 * 100) / data_sum.y09).toFixed(2);
			data_pie[4][i].num = ((data_per[i].y10 * 100) / data_sum.y10).toFixed(2);
			data_pie[5][i].num = ((data_per[i].y11 * 100) / data_sum.y11).toFixed(2);
			
			data_pie[0][i].icd = data_per[i].icd_o_3;
			data_pie[1][i].icd  = data_per[i].icd_o_3;
			data_pie[2][i].icd  = data_per[i].icd_o_3;
			data_pie[3][i].icd  = data_per[i].icd_o_3;
			data_pie[4][i].icd  = data_per[i].icd_o_3;
			data_pie[5][i].icd  = data_per[i].icd_o_3;
		}
		
		for(i = 0;i < data_len; i ++)
			for(j = i+1;j < data_len; j ++)
				for(k = 0;k < 6;k ++)
					if(Number(data_pie[k][i].num) < Number(data_pie[k][j].num)){
						var tmp_swap = new Object();
						tmp_swap = data_pie[k][i];
						data_pie[k][i] = data_pie[k][j];
						data_pie[k][j] = tmp_swap;
					}
					
		var data_else = new Array();
		for(i = 0;i < 6;i ++){
			data_else[i] = 0.0;
			for(j = 0;j < 9;j ++)
				for(k = 0;k < data_tumor.length;k ++)
					if(data_tumor[k].icd_o_3 == data_pie[i][j].icd){
						data_pie[i][j].cname = data_tumor[k].cname;
						break;
					}
			for(j = 9;j < data_len;j ++)
				data_else[i] = Number(data_else[i])+Number(data_pie[i][j].num);
			data_else[i] = Number(data_else[i]).toFixed(2);
		}
		
		window.onload=function(){
			changeNavLeft();
		}
		
		window.onresize=function(){
			changeNavLeft();
		}
		function changeNavLeft(){				
			var ww = document.documentElement.clientWidth;
			document.getElementById("nav_left").style.left=ww/2-560+"px";
		}
	</script>

</head>
<body>
	<?php require_once("header.php"); ?>
    <script type="text/javascript">
		var mark = document.getElementById("nav_overview");
		mark.setAttribute("class","selected");
		var st = document.getElementById("search_text");
		st.setAttribute("value","请输入搜索词");
	</script>
    <div id="nav_left" style="position:fixed; top:240px; left:-100px; height:300px; width:80px;" >
        <img  src="images/nav_left1.png" usemap="#nav_left_map" style="margin:0 9px 0 9px;" border="0">
        <map name="nav_left_map">
            <area shape="circle" coords="25,25,25" href="#nav1">
            <area shape="circle" coords="25,87,25" href="#nav2">
            <area shape="circle" coords="25,149,25" href="#nav3">
            <area shape="circle" coords="25,211,25" href="#nav4">
            <area shape="circle" coords="25,272,25" href="#nav5">
        </map>
	</div>
	<div class="overview_body">
   	  <div style="display:block; height:567px;">
            <div class="overview_Top10">
            <h2 align="center">肿瘤发病Top10</h2>
                <img  src="images/Top10_line.png" usemap="#top10" style="margin:0 9px 0 9px;" border="0">
                <map name="top10">
                    <area shape="circle" coords="375,135,41" href="detail.php?searchText=c15">
                    <area shape="circle" coords="393,243,38" href="detail.php?searchText=c16">
                    <area shape="circle" coords="82,141,36" href="detail.php?searchText=c34">
                    <area shape="circle" coords="90,344,34" href="detail.php?searchText=c22">
                    <area shape="circle" coords="77,246,32" href="detail.php?searchText=c50">
                    <area shape="circle" coords="129,435,30" href="detail.php?searchText=c20">
                    <area shape="circle" coords="150,51,27" href="detail.php?searchText=c42">
                    <area shape="circle" coords="334,432,26" href="detail.php?searchText=c18">
                    <area shape="circle" coords="310,53,25" href="detail.php?searchText=c71">
                    <area shape="circle" coords="368,339,23" href="detail.php?searchText=c53">
                </map>
        </div>
            
            <div style="float:right; width:479px; height:567px; margin-right:0;">
            	
            	<h2 align="center">肿瘤发病率Top10雷达图</h2>
                <div id="overview_Radar" >
                </div>
                <div style="width:440px; margin-left:auto; margin-right:auto; font-size:16px; line-height:22px;">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;雷达图展示的是发病率排在前十位的肿瘤及各自发病率，越靠近外围的点的肿瘤发病率越高。其中发病率最高的前三位肿瘤是“食管恶性肿瘤”、“胃恶性肿瘤”及“支气管和肺恶性肿瘤”，而在前十位高发肿瘤中发病率最低的则是“宫颈恶性肿瘤”。
                </div>
            </div>
        </div>
        
        <div style="display:block; height:460px;" id="overview_Bar">
        <hr color="#69b4b4" size="0.5">
        <h2 id="nav2" style="text-align:center">肿瘤发病与性别的关系</h2>
		    <style>
          #overview_Bar .x text {
            font: 10px sans-serif;
            fill:none;
          }
          #overview_Bar .x .tick line{
            opacity: 0;
          }
          #overview_Bar .x path{
            opacity: 0;
          }

          #overview_Bar .y .tick line{
            opacity: 0;
          }
          
          #overview_Bar .axis line{
            fill:none;
          }

          #overview_Bar .axis path
          {
            fill: none;
            stroke: #000;
            shape-rendering: crispEdges;
          }
          #overview_Bar .axis line {
            fill: none;
            stroke: #000;
            shape-rendering: crispEdges;
          }
          #overview_Bar g.axis path{
            /*fill:rgb(68,136,187);*/
            opacity: 0;
          }
		  
		  #overview_Bar line.line{
            stroke:#4488BB;
            stroke-width:2px;
          }
        </style>
        <script src="js/data_for_sex.js"></script>
        <script>
        var margin_l={
                      top:30,
                      right:0,
                      bottom:10,
                      left:20
                   };
        var margin_r={
                      top:30,
                      right:20,
                      bottom:10,
                      left:0
                   };
        var width = 380 - margin_l.left - margin_l.right;
        //console.log(width);
        var height = 390 - margin_l.top - margin_l.bottom;
        var x_l = d3.scale.linear()
                .range([0, width*0.75]);
        var x_r = d3.scale.linear()
                .range([0, width]);
        var y_l = d3.scale.ordinal()
                .rangeRoundBands([0, height], .2);
                
        var y_r = d3.scale.ordinal()
                .rangeRoundBands([0, height], .2);

        var xAxis_l = d3.svg.axis()
                    .scale(x_l)
                    .orient("top")
                    .ticks(10);
        var xAxis_r = d3.svg.axis()
                    .scale(x_r)
                    .orient("top")
                    .ticks(10);

        var yAxis_l = d3.svg.axis()
                    .scale(y_l)
                    .orient("left")
                    .ticks(10);
        var yAxis_r = d3.svg.axis()
                    .scale(y_r)
                    .orient("right")
                    .ticks(10);
        </script>
        
        <div class="overview_sex_left" id="overview_sex_left">
            <script type="text/javascript" src="js/data_for_sex.js"></script>
            <script type="text/javascript">
              var svg_l = d3.select("body").select("div#overview_sex_left").append("svg")
                          .attr("width", width + margin_l.left + margin_l.right)
                          .attr("height", height + margin_l.top + margin_l.bottom)
                          .append("g")
                          .attr("transform", "translate(" + margin_l.left + "," + margin_l.top + ")");
              var maxVal = d3.max(data_male10,function(d){ return Number(d.count)});
              x_l.domain([0,maxVal*1.8]);
              y_l.domain(data_male10.map(function(d){ return d.cname;}));
              svg_l.selectAll(".bar_l")
                 .data(data_male10)
                 .enter()
                 .append("rect")
                 .attr("fill","rgba(0, 172, 107, 0.8)")
                 .attr("opacity", ".8")
                 .attr("x", function(d){return width -5 - x_l(d.count)})
                 .attr("y", function(d){ return y_l(d.cname);})
                 .attr("width", function(d){ return x_l(d.count);})
                 .attr("height", y_l.rangeBand());
              svg_l.selectAll("text")
                 .data(data_male10)
                 .enter().append("text")
                 .text(function(d){
                    return d.count + "%";
                 })
                 .attr("x", function(d){return -55 + width -5 - x_l(d.count)})
                 .attr("y", function(d){ return y_l(d.cname)+y_l.rangeBand()/2+4;})
                 .style("font-size", "15px");
                 

              svg_l.append("g")
                .attr("class", "x axis")
                .call(xAxis_l)
                .attr("transform","translate(" + (width*0.25 - margin_l.right - 5) + ",0)")
                .append("line")
				.attr("class", "line")
                .attr("x1", width*0.4)
                .attr("x2", width)
                .attr("y2", "0")
                .attr("transform","translate(-90,0)");

              svg_l.append("g")
                .attr("class", "y axis")
                .call(yAxis_l)
                //.style("fill","rgb(68,136,187)")
                .attr("transform","translate(140,0)")
                //.attr("transform","translate(" + (width - margin_l.right - 5) + ",0)");
                .append("line")
				.attr("class", "line")
                .attr("transform","translate(215,0)")
                .attr("x1", x_l(0))
                .attr("x2", x_l(0))
                .attr("y2", height);
              //svg_l.selectAll("g.y").selectAll(".tick").attr("transform","translateX(-200)");
            </script>
          </div>
            <div class="overview_sex_middle">
            	<img src="images/sex.png" style="margin-left:20px;">
            </div>
          <div class="overview_sex_right" id="overview_sex_right">
            <script>
              var svg_r = d3.select("body").select("div#overview_sex_right").append("svg")
                          .attr("width", width + margin_r.left + margin_r.right)
                          .attr("height", height + margin_r.top + margin_r.bottom)
                          .append("g")
                          .attr("transform", "translate(" + margin_r.left + "," + margin_r.top + ")");
              var maxVal = d3.max(data_male10,function(d){ return Number(d.count)});
              x_r.domain([0,maxVal*1.5]);
              y_r.domain(data_female10.map(function(d){ return d.cname;}));
              svg_r.selectAll(".bar_r")
                 .data(data_female10)
                 .enter()
                 .append("rect")
                 .attr("fill","rgba(239, 0, 42, 0.8)")
                 .attr("opacity", ".8")
                 .attr("x", "0")
                 .attr("y", function(d){ return y_r(d.cname);})
                 .attr("width", function(d){ return x_r(d.count);})
                 .attr("height", y_r.rangeBand());
              svg_r.selectAll("text")
                 .data(data_female10)
                 .enter().append("text")
                 .text(function(d){
                    return d.count + "%";
                 })
                 .attr("x", function(d){return x_r(d.count)})
                 .attr("y", function(d){ return y_r(d.cname)+y_r.rangeBand()/2+4;})
                 .style("font-size", "14px");

              svg_r.append("g")
                .attr("class", "x axis")
                .call(xAxis_r)
                //.attr("transform","translate(" + (width*0.25 - margin_r.right - 5) + ",0)")
                .append("line")
				.attr("class", "line")
                .attr("x1", width*0.4)
                .attr("x2", width)
                .attr("y2", "0")
                .attr("transform","translate(-145,0)");

              svg_r.append("g")
                .attr("class", "y axis")
                .call(yAxis_r)
                //.style("fill","rgb(68,136,187)")
                .attr("transform","translate(225,0)")
                //.attr("transform","translate(" + (width - margin_r.right - 5) + ",0)");
                .append("line")
				.attr("class", "line")
                .attr("transform","translate(-224,0)")
                .attr("x1", x_r(0))
                .attr("x2", x_r(0))
                .attr("y2", height);
            </script>          
          </div>
       	</div>
        
        <div style="display:block; height:520px;">
        	<hr color="#69b4b4" size="0.5">
        	<div style="height: 50px;">
            	<h2 id="nav3" align="center">每年肿瘤发病率前九位肿瘤</h2>
            </div>
            <div id="overview_pie" style="height:450px; width:850px; margin-left:100x;">
            	
            </div>
       	</div>
        
        <div style="display:block; height:770px;">
        	<hr color="#69b4b4" size="0.5">
        	<div style="height: 50px;">
            	<h2 id="nav4" align="center">肿瘤发病及相关趋势</h2>
            </div>
        	<div id="overview_line" style="height:250px; width:957px;">
            </div>
            <div id="overview_line2" style="height:300px; width:957px;">
            </div>
        		
            <div style="margin:10px 50px 10px 50px;font-size:16px; line-height:22px;">
                <!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Google Trends是通过分析Google全球数以十亿计的搜索结果，告诉用户某一搜索关键词在Google被搜索的频率和相关统计数据，即关注度。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PubMed是美国国家医学图书馆(NLM)所属的国家生物技术信息中心(NCBI)开发的,基于WEB的生物医学信息检索系统。PubMed趋势即是在某时段内相关文献发表量，也可以作为一个具有代表性的相关性分析因素。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国生物医学文献服务系统（SinoMed），由中国医学科学院医学信息研究所/图书馆开发，整合的生物医学中外文整合文献服务系统。SinoMed趋势即是在某时段内相关文献发表量，同样可以作为一个具有代表性的相关性分析因素。 </p> -->
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如图所示，在2007-2008年肿瘤发病数缓慢上升，2008-2009年上升幅度明显，2009-2010年有所下降，2010-2011年呈上升趋势。总体来看，这五年的肿瘤发病数呈上升趋势。<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;通过趋势对比表明，Google Trends搜索量、PubMed文献趋势、SinoMed文献趋势几乎与肿瘤发病趋势图的走向一致，表明与肿瘤的发病数都具有很强的相关性。
</p>
            </div>
       	</div>
        
        <div style="display:block;">
        	<hr color="#69b4b4" size="0.5">
        	<div style="height:30px">
            	<h2 id="nav5" align="center">肿瘤发病与年龄箱式图</h2>
            </div>
            <div class="overview_box" id="overview_box">
            <style>
              #overview_box .axis text {
                font: 10px sans-serif;
              }

              #overview_box .axis path,
              #overview_box .axis line {
                fill: none;
                stroke: #000;
                shape-rendering: crispEdges;
              }

              #overview_box .box {
                font: 10px sans-serif;
              }

              #overview_box .box line,
              #overview_box .box rect,
              #overview_box .box circle {
                fill: rgb(255, 204, 102);
                stroke: #000;
                stroke-width: 1px;
              }

              #overview_box .box .center {
                stroke-dasharray: 3,3;
              }

              #overview_box .box .outlier {
                fill: none;
                stroke: #000;
              }
			  #overview_box .axis path{
                opacity: 0;
              }
			  #overview_box .axis line{
                stroke: #4488BB;
                stroke-width: 2px;
              }
            </style>
            <script type="text/javascript" src="js/data_for_boxplot.js"></script>
            <script type="text/javascript" src="js/box.js"></script>
            <script>
              var labels = true; // show the text labels beside individual boxplots?
              var margin = {top: 30, right: 50, bottom: 70, left: 50};
              var width = 960 - margin.left - margin.right;
              var height = 400 - margin.top - margin.bottom;
                
              var min = Infinity,
                  max = -Infinity;
                var max = d3.max(data_morbidity, function(d,i){
                  //console.log(d.age);
                  return d.age;
                });
                var min = d3.min(data_morbidity, function(d,i){
                  //console.log(d.age);
                  return d.age;
                });

                var chart = d3.box()
                  .whiskers(iqr(1.5))
                  .height(height) 
                  .domain([min, max])
                  .showLabels(labels);

                var svg = d3.select("body").select("div#overview_box").append("svg")
                  .attr("width", width + margin.left + margin.right)
                  .attr("height", height + margin.top + margin.bottom)
                  .attr("class", "box")    
                  .append("g")
                  .attr("transform", "translate(60,10)");
                
                // the x-axis
                var x = d3.scale.ordinal()     
                  .domain( data_box.map(function(d) {  return d[0] } ) )      
                  .rangeRoundBands([0 , width], 0.7, 0.3);    

                var xAxis = d3.svg.axis()
                  .scale(x)
                  .orient("bottom");

                // the y-axis
                var y = d3.scale.linear()
                  .domain([min, max])
                  .range([height + margin.top, 0 + margin.top]);
                
                var yAxis = d3.svg.axis()
                  .scale(y)
                  .orient("left");

                // draw the boxplots  
                svg.selectAll(".box")    
                    .data(data_box)
                  .enter().append("g")
                  .attr("transform", function(d) { return "translate(" +  x(d[0])  + "," + margin.top + ")"; } )
                    .call(chart.width(x.rangeBand())); 
               
                 // draw y axis
                 svg.append("g")
                      .attr("class", "y axis")
                      .call(yAxis).append("line")
                    .attr("x1", x(0))
                    .attr("x2", x(0))
                    .attr("y1", "20")
                    .attr("y2", "340"); 
                svg.select("g.y").append("text") // and text1
                    //.attr("transform", "rotate(-90)")
                    .attr("y", 6)
                    .attr("dy", ".71em")
                    .style("text-anchor", "end")
                    .style("font-size", "12px") 
                    .text("年龄");   
                
                // draw x axis  
                svg.append("g")
                    .attr("class", "x axis")
                    .attr("transform", "translate(0," + (height  + margin.top + 10) + ")")
                    .call(xAxis)
					.append("line")
                    .attr("x1", "0")
                    .attr("x2", width)
                    .attr("y2", "0");;

              // Returns a function to compute the interquartile range.
              function iqr(k) {
                return function(d, i) {
                  var q1 = d.quartiles[0],
                      q3 = d.quartiles[2],
                      iqr = (q3 - q1) * k,
                      i = -1,
                      j = d.length;
                  while (d[++i] < q1 - iqr);
                  while (d[--j] > q3 + iqr);
                  return [i, j];
                };
              }
            </script>
            </div>
            <div style="margin:10px 50px 10px 50px;font-size:16px; line-height:22px;">
            	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本图是从整体角度来展示每年肿瘤发病年龄与发病数的关系（06年除外），如图所示，肿瘤发病年龄的中位数基本保持在62、63岁，相对较稳定。发病年龄跨度最大的是2010年，分布范围约在10-99岁；跨度最小的是2008年，分布范围约在15-92岁之间。此外该五年中都出现了较多低于正常值的异常值，且异常值基本分布在10-30岁之间。</p>
                <br>
            </div>
       	</div>
	</div>
	
    <?php 
  		require (dirname(__FILE__)."/footer.php");
  	?> 
    <!-- echart绘图脚本 --> 
	<script src="js/echarts-plain.js"></script>
	<script type="text/javascript" src="js/echarts-overview.js" charset="UTF-8"></script>
</body>
</html>