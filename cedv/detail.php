<!DOCTYPE HTML>
<!-- Website template form http://www.cssmoban.com/ -->
<html>
<head>
	<meta charset="UTF-8">
	<title>
    详细信息&nbsp;<?php 
		$tumor_id = 'searchText';
		if(isset($_GET[$tumor_id]))
			echo $_GET[$tumor_id];  
		?>
    </title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
    
    <script type="text/javascript" src="js/browserdetect.js"></script>
	<script src="js/d3.v3.min.js"></script>
	<?php
		error_reporting(E_ERROR);
		//引入需要的头文件
		include "php/database.php";
		
		if(isset($_GET[$tumor_id])){
			$icdo3 = $_GET[$tumor_id];
			$data_info = new tumor();
			$data_info = get_detail_info($icdo3);
			$data_morbidity = get_detail_morbidity($icdo3);
			$data_google = get_detail_google($icdo3);
			$data_pubmed = get_detail_pubmed($icdo3);
			$data_sinomed = get_detail_sinomed($icdo3);
			//echo $data_morbidity;
		}
	?>
	
	<script type="text/javascript">
		var	title_name = <?php echo "'".$data_info->cname."'";?>;
		var data_morbidity = <?php echo $data_morbidity ;?>;
		var data_google = <?php echo $data_google ;?>;
		var data_pubmed = <?php echo $data_pubmed ;?>;
		var data_sinomed = <?php echo $data_sinomed ;?>;
		
		var data_sum = new Object();
		data_sum.yall = 0;
		data_sum.y06 = data_sum.y07 = data_sum.y08 = 0;
		data_sum.y09 = data_sum.y10 = data_sum.y11 = 0;
		var data_cross = new Array();
		var data_birth = new Array();
		var i,j,k;
		for(i = 0;i < 6;i ++){
			data_cross[i] = new Array();
			data_birth[i] = new Array();
			for(j = 0;j < 5;j ++)
				data_cross[i][j] = data_birth[i][j] = 0;
		}
		for(i = 0;i < data_morbidity.length;i ++){
			var tmp_year = data_morbidity[i].incidence.substr(0,4);
			data_sum.yall ++;
			if(tmp_year == '2006'){
				data_sum.y06 ++;
				j = 0;
			}
			else if(tmp_year == '2007'){
				data_sum.y07 ++;
				j = 1;
			}
			else if(tmp_year == '2008'){
				data_sum.y08 ++;
				j = 2;
			}
			else if(tmp_year == '2009'){
				data_sum.y09 ++;
				j = 3;
			}
			else if(tmp_year == '2010'){
				data_sum.y10 ++;
				j = 4;
			}
			else if(tmp_year == '2011'){
				data_sum.y11 ++;
				j = 5;
			}
			
			var tmp_age = parseInt(data_morbidity[i].age);
			var tmp_birth = parseInt(data_morbidity[i].birth.substr(0,4));
			if(tmp_birth < 1920)
				k = 0;
			else if(tmp_birth >= 1920 && tmp_birth < 1940)
				k = 1;
			else if(tmp_birth >= 1940 && tmp_birth < 1960)
				k = 2;
			else if(tmp_birth >= 1960 && tmp_birth < 1980)
				k = 3;
			else if(tmp_birth >= 1980 && tmp_birth < 2000)
				k = 4;
			else if(tmp_birth >= 2000)
				k = 5;
				
			if(tmp_age >=0 && tmp_age < 20){
				data_cross[j][0] ++;
				data_birth[k][0] ++;
			}
			else if(tmp_age >=20 && tmp_age < 40){
				data_cross[j][1] ++;
				data_birth[k][1] ++;
			}
			else if(tmp_age >=40 && tmp_age < 60){
				data_cross[j][2] ++;
				data_birth[k][2] ++;
			}
			else if(tmp_age >=60 && tmp_age < 80){
				data_cross[j][3] ++;
				data_birth[k][3] ++;
			}
			else if(data_morbidity[i].age >=80 && data_morbidity[i] < 100){
				data_cross[j][4] ++;
				data_birth[k][4] ++;
			}
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
		var st = document.getElementById("search_text");
		st.setAttribute("value","请输入搜索词");
	</script>
    <div id="nav_left" style="position:fixed; top:240px; left:-100px; height:300px; width:80px;" >
        <img  src="images/nav_left2.png" usemap="#nav_left_map" style="margin:0 9px 0 9px;"  border="0">
        <map name="nav_left_map">
            <area shape="circle" coords="25,25,25" href="#nav1">
            <area shape="circle" coords="25,87,25" href="#nav2">
            <area shape="circle" coords="25,149,25" href="#nav3">
            <area shape="circle" coords="25,211,25" href="#nav4">
            <area shape="circle" coords="25,272,25" href="#nav5">
        </map>
	</div>
	<div class="detail_body">
    	<!--介绍-->
		<div id="introduce" style="display:block; height:400px;">
            <div style="float:left; width:400px; height:316px;">
            	<div style="display:block; width:400px; height:126px;">
                    <div style="float:left; width:120px; height:126px; alignment-adjust:middle; margin-left:20px; margin-right:20px;">
                    <br>
					<?php
                    echo "<h3 align='center'>".$data_info->icd_o_3."</h3>";
					echo "<h3 align='center'>".$data_info->cname."</h3>";
                    ?>
					</div>
                    <div id="ico" style="float:left; width:100px; height:126px;"> 
                    <?php
                    echo "<img src='images/ico/".$data_info->icd_o_3.".png' width='100' height='100' alt='".$data_info->cname."' style='margin:23px 0px 23px 0px; width:80px;height:80px;' >";
					?>
                    </div>
                    <div style="float:left; width:140px; height:126px;">
                    <br><h3 align='center'>发病率</h3>
						<h3 align='center'>
                        <script type="text/javascript">
                            document.write((data_morbidity.length/86.57).toFixed(2) + "%");
                        </script>
                        </h3>
                    </div>
                </div>
                <div style="margin-left:auto; margin-right:auto; width:370px; height:274px; font-size:16px; line-height:22px;">
                	<p align="left">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <?php
                            echo "$data_info->introduce";
                        ?>
                   	</p>
                </div>
            </div>
            <div style="float:left; width:557px; height:400px;">
            	<div style=" width:527px; height:370; margin:30px 15px 20px 15px">
                <table width="95%" height=340px align="center" border="1" >
                  <tr>
                    <td width="15%" align="center">ICD-O-3</td>
                    <td width="35%">
                    <?php
                        echo $data_info->icd_o_3;
                    ?>
                    </td>
                    <td width="15%" align="center">ICD-10</td>
                    <td width="35%">
                    <?php
                        echo $data_info->icd_10;
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%" align="center">中文名称</td>
                    <td colspan="3">
                    <?php
                        echo $data_info->cname;
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%" align="center">英文名称</td>
                    <td colspan="3">
                    <?php
                        echo $data_info->ename;
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%" align="center">MeSH</td>
                    <td colspan="3">
                    <?php
                        echo $data_info->mesh;
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%" align="center">CMeSH</td>
                    <td colspan="3">
                    <?php
                        echo $data_info->cmesh;
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%" align="center">入口词</td>
                    <td colspan="3">
                    <?php
                        echo $data_info->entry;
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td width="15%" align="center">注释</td>
                    <td colspan="3">
                    <?php
                        echo $data_info->anno;
                    ?>
                    </td>
                  </tr>
                </table></div>
            </div>
		</div>
        <!--折线图-->
        <script type="text/javascript">
          var data_analysis = new Array();
          var data_tn = [data_sum.y06,data_sum.y07,data_sum.y08,data_sum.y09,data_sum.y10,data_sum.y11];
          for(var i=0;i<6;i++){
            data_analysis[i] = new Object();
            data_analysis[i].year = 2006 + i;
            data_analysis[i].tumorNumber = data_tn[i];
            data_analysis[i].google = data_google[i];
            data_analysis[i].pubmed = data_pubmed[i];
            data_analysis[i].sinomed = data_sinomed[i];
          }

          var tmpArray = new Array();
          for(var i=0;i<6;i++){
            tmpArray.push(data_analysis[i].tumorNumber);
          }
          var tumorNumberMax = Math.max.apply(null,tmpArray);
          var tumorNumberMin = Math.min.apply(null,tmpArray);
          var standard_fast = (tumorNumberMax-tumorNumberMin)*0.6;
          var standard_low = (tumorNumberMax-tumorNumberMin)*0.1;
          function out_trend(i){
            var dif = data_analysis[i].tumorNumber - data_analysis[i-1].tumorNumber;

            if(dif > 0){
              if(dif >= standard_fast) return "明显上升";
              if(dif >= standard_low && dif < standard_fast)  return "有所上升";
              if(dif > 0 && dif < standard_low) return "基本持平";
            }

            if(dif == 0)  return "与上年相同";
            

            if(dif < 0){
              if(Math.abs(dif) >= standard_fast) return "明显下降";
              if(Math.abs(dif) >= standard_low && Math.abs(dif) < standard_fast) return "有所下降";
              if(Math.abs(dif) > 0 && Math.abs(dif) < standard_low) return "基本持平";
            }

          }


          var data_trend = new Object();
          data_trend.tumorNumber = new Array();
          data_trend.google = new Array();
          data_trend.pubmed = new Array();
          data_trend.sinomed = new Array();

          for(var i=1;i<data_analysis.length;i++){
            
              if( (data_analysis[i].tumorNumber - data_analysis[i-1].tumorNumber) > 0 ) data_trend.tumorNumber.push(1);
              if( (data_analysis[i].tumorNumber - data_analysis[i-1].tumorNumber) == 0 ) data_trend.tumorNumber.push(0);
              if( (data_analysis[i].tumorNumber - data_analysis[i-1].tumorNumber) < 0 ) data_trend.tumorNumber.push(-1);

              if( (data_analysis[i].google - data_analysis[i-1].google) > 0 ) data_trend.google.push(1);
              if( (data_analysis[i].google - data_analysis[i-1].google) == 0 ) data_trend.google.push(0);
              if( (data_analysis[i].google - data_analysis[i-1].google) < 0 ) data_trend.google.push(-1);

              if( (data_analysis[i].pubmed - data_analysis[i-1].pubmed) > 0 ) data_trend.pubmed.push(1);
              if( (data_analysis[i].pubmed - data_analysis[i-1].pubmed) == 0 ) data_trend.pubmed.push(0);
              if( (data_analysis[i].pubmed - data_analysis[i-1].pubmed) < 0 ) data_trend.pubmed.push(-1);

              if( (data_analysis[i].sinomed - data_analysis[i-1].sinomed) > 0 ) data_trend.sinomed.push(1);
              if( (data_analysis[i].sinomed - data_analysis[i-1].sinomed) == 0 ) data_trend.sinomed.push(0);
              if( (data_analysis[i].sinomed - data_analysis[i-1].sinomed) < 0 ) data_trend.sinomed.push(-1);

          }


          function out_trends_all(i){
            var flag_array = new Array();
            if(i==0){
              var flag = 0;
              for(var j=0;j<5;j++){
                if( data_trend.tumorNumber[j] == data_trend.google[j] ) flag ++;
              }
              flag_array.push(flag);

              if(flag == 5) return "极大相关";
              if(flag <= 4 && flag >=3) return "明显相似";
              if(flag <= 2 && flag >=1) return "有一定相似";
              if(flag == 0) return "没有明显相关关系";
            }

            if(i==1){
              var flag = 0;
              for(var j=0;j<5;j++){
                if( data_trend.tumorNumber[j] == data_trend.pubmed[j] ) flag ++;
              }
              flag_array.push(flag);

              if(flag == 5) return "极大相关";
              if(flag <= 4 && flag >=3) return "明显相似";
              if(flag <= 2 && flag >=1) return "有一定相似";
              if(flag == 0) return "没有明显相关关系";
            }

            if(i==2){
              var flag = 0;
              for(var j=0;j<5;j++){
                if( data_trend.tumorNumber[j] == data_trend.sinomed[j] ) flag ++;
              }
              flag_array.push(flag)

              if(flag == 5) return "极大相关";
              if(flag <= 4 && flag >=3) return "明显相似";
              if(flag <= 2 && flag >=1) return "有一定相似";
              if(flag == 0) return "没有明显相关关系";
            }
          }




        </script>
        <div id="line" style="display:block;">
          <hr color="#69b4b4" size="0.5">
          <div id="nav2"></div>
       	  <div id="detail_line" style="height:250px; width:957px;">
            </div>
            <div id="detail_line2" style="height:300px; width:957px;">
            </div>
            <div style="margin:10px 50px 10px 50px; font-size:16px; line-height:22px;">
                <!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Google Trends是通过分析Google全球数以十亿计的搜索结果，告诉用户某一搜索关键词在Google被搜索的频率和相关统计数据，即关注度。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PubMed是美国国家医学图书馆(NLM)所属的国家生物技术信息中心(NCBI)开发的,基于WEB的生物医学信息检索系统。PubMed趋势即是在某时段内相关文献发表量，也可以作为一个具有代表性的相关性分析因素。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国生物医学文献服务系统（SinoMed），由中国医学科学院医学信息研究所/图书馆开发，整合的生物医学中外文整合文献服务系统。SinoMed趋势即是在某时段内相关文献发表量，同样可以作为一个具有代表性的相关性分析因素。 </p> -->
                <p>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如图所示，<?php echo $data_info->cname ?>（2006年除外），2007年发病人数为<script>document.write(data_analysis[1].tumorNumber);</script>人，2008年<script>document.write(out_trend(2));</script>，到2009年较上年<script>document.write(out_trend(3));</script>,2010年<script>document.write(out_trend(4));</script>,2011年<script>document.write(out_trend(5));</script>。总体看来，通过对比分析发现，该肿瘤发病数趋势与Google搜索趋势<script>document.write(out_trends_all(0));</script>、与PubMed文献趋势<script>document.write(out_trends_all(1));</script>、与SinoMed文献趋势<script>document.write(out_trends_all(2));</script>。

                </p>
            </div>
      	</div>
        <!--性别-->
       <style>
        #detail_sex .axis path,
        #detail_sex .axis line {
          fill: none;
          stroke: #000;
          shape-rendering: crispEdges;
        }
        #detail_sex .y text {
            font: 10px sans-serif;
            fill:none;
          }
         #detail_sex .y .tick line{
            opacity: 0;
          }
        #detail_sex .y path{
            opacity: 0;}
          #detail_sex .bar.positive {
          fill: rgba(42, 167, 119, 0.8);
        }

        #detail_sex .bar.negative {
          fill: rgba(227, 90, 126, 0.8);
        }
		#detail_sex .axis path{
          opacity: 0;
        }
        #detail_sex .axis line{
          stroke: #4488BB;
          stroke-width: 2px;
        }
        </style>
        <div style="display:block; height:410px; background:url(images/sex_bg.jpg);">
        	<hr color="#69b4b4" size="0.5">
       		<div style="height:60px;">
            	<?php
          		echo "<h3 id='nav3' align='center'>".$data_info->cname."每年发病与性别的关系</h3>";
				?>
            </div>
          	<div class="detail_sex" id="detail_sex" style="height:350px;">
            <script type="text/javascript" src="js/data_for_bar.js"></script>
            <script type="text/javascript">
                var margin = {top: 30, right: 30, bottom: 30, left: 30},
                    width = 957- margin.left - margin.right,
                    height = 350 - margin.top - margin.bottom;

                var x = d3.scale.linear()
                    .range([0, width- margin.left - margin.right])

                var y = d3.scale.ordinal()
                    .rangeRoundBands([0, height], .2);

                var xAxis = d3.svg.axis()
                    .scale(x)
                    .orient("top")
                    .ticks(10);

                var yAxis = d3.svg.axis()
                    .scale(y)
                    .orient("left")
                    .ticks(6);

                var svg = d3.select("body").select("div#detail_sex").append("svg")
                    .attr("width", width+30)
                    .attr("height", height+ margin.top + margin.bottom)
                    .append("g")
                    .attr("transform", "translate(" + (margin.left+30) + "," + margin.top + ")");

                x.domain([-1,1]).nice();
                y.domain(data_bar.map(function(d) { return d.name; }));


                function changeTwoDecimal_f(x) {  
                    var f_x = parseFloat(x);  
                    if (isNaN(f_x)) {  
                        alert('function:changeTwoDecimal->parameter error');  
                        return false;  
                    }  
                    var f_x = Math.round(x * 100) / 100;  
                    var s_x = f_x.toString();  
                    var pos_decimal = s_x.indexOf('.');  
                    if (pos_decimal < 0) {  
                        pos_decimal = s_x.length;  
                        s_x += '.';  
                    }  
                    while (s_x.length <= pos_decimal +2) {  
                        s_x += '0';  
                    }  
                    return s_x;  
                } 
                svg.selectAll(".bar")
                  .data(data_bar)
                  .enter().append("rect")

                  .attr("class", function(d) { return d.value < 0 ? "bar negative" : "bar positive"; })

                  .attr("x", function(d) { return x(Math.min(0, d.value)); })
                  .attr("y", function(d) { return y(d.name); })
                  .attr("width", function(d) { return Math.abs(x(d.value) - x(0)); })
                  .attr("height", y.rangeBand())
                  .append("title")
                  .text(function(d){
                    return Math.abs(changeTwoDecimal_f(d.value*100)) + "%";
                  })

                  ;

                svg.append("g")
                  .attr("class", "x axis")
                  .call(xAxis).append("line")
                    .attr("x1", "-20")
                    .attr("x2", width)
                    .attr("y2", "0");

                //设置x轴标签格式
                svg.selectAll("g.tick")
                    .select("text")
                    .text(function(d){
                      return Math.abs(d)*100+"%";
                    });

                svg.append("g")
                  .attr("class", "y axis")
                  .call(yAxis)
                  .append("line")
                  .attr("x1", x(0))
                  .attr("x2", x(0))
                  .attr("y2", height);

            </script>
            
            </div>
        </div>
        <!--年龄-->
        <div style="display:block;">
        	<hr color="#69b4b4" size="0.5">
        	<div style="height:30px;">
            	<?php
          		echo "<h3 id='nav4' align='center'>".$data_info->cname."每年发病与年龄的关系</h3>";
				?>
            </div>
          <div class="detail_box" id="detail_box" style="height:350px;">

            <style>
              #detail_box .axis text {
                font: 10px sans-serif;
              }

              #detail_box .axis path,
              #detail_box .axis line {
                fill: none;
                stroke: #000;
                shape-rendering: crispEdges;
              }

              #detail_box .box {
                font: 10px sans-serif;
              }

              #detail_box .box line,
              #detail_box .box rect,
              #detail_box .box circle {
                fill: rgb(255, 204, 102);
                stroke: #000;
                stroke-width: 1px;
              }

              #detail_box .box .center {
                stroke-dasharray: 3,3;
              }

              #detail_box .box .outlier {
                fill: none;
                stroke: #000;
              }
			  #detail_box .axis path{
                opacity: 0;
              }
              #detail_box .axis line{
                stroke: #4488BB;
                stroke-width: 2px;
              }
            </style>
            <script type="text/javascript" src="js/data_for_boxplot.js"></script>
            <script type="text/javascript" src="js/box.js"></script>
            <script>
              var labels = true; // show the text labels beside individual boxplots?
              var margin = {top: 30, right: 50, bottom: 70, left: 50};
              var width = 957 - margin.left - margin.right;
              var height = 350 - margin.top - margin.bottom;
                
              var min = Infinity,
                  max = -Infinity;
                var max = d3.max(data_morbidity, function(d,i){
                  return Number(d.age);
                });
                //console.log(max);
                var min = d3.min(data_morbidity, function(d,i){
                  //console.log(d.age);
                  return Number(d.age);
                });

                var chart = d3.box()
                  .whiskers(iqr(1.5))
                  .height(height) 
                  .domain([min, max])
                  .showLabels(labels);

                var svg = d3.select("body").select("div#detail_box").append("svg")
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
                  .domain([0, max])
                  .range([height + margin.top, 0 + margin.top]);
                
                var yAxis = d3.svg.axis()
                  .scale(y)
                  .orient("left");

                // draw the boxplots  
                svg.selectAll(".box")    
                    .data(data_box)
                  .enter().append("g").attr("class", "box_plot")
                  .attr("transform", function(d) { return "translate(" +  x(d[0])  + "," + margin.top + ")"; } )
                    .call(chart.width(x.rangeBand())); 
               
                   // draw y axis
                svg.append("g")
                      .attr("class", "y axis")
                      .call(yAxis).append("line")
                    .attr("x1", x(0))
                    .attr("x2", x(0))
                    .attr("y1", "20")
                    .attr("y2", "290"); 
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
                    .attr("y2", "0");

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
            	<!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;本图中的横轴代表时间，纵轴代表发病年龄，揭示出每年肿瘤发病与年龄的关系。<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;首先将每年发病年龄按从小到大排列，那么该图中橙色方框内的横线则代表队列里面的中位数，橙色方框的下边界代表年龄排列后的第一个四分位的数值，橙色区域的上边界代表第三个四分位的数值，最上、下方的横线代表发病年龄的内部上、下限，在该范围之外的值都属于异常值。</p> -->
                <br>
                <script>
                var data_box_analysis = d3.selectAll("g.box_plot").selectAll("text");
                var data_box_array = new Array();
                for(var i=0;i<=5;i++){
                  data_box_array[i] = new Object();
                  data_box_array[i].year = 2006 + i;
                  data_box_array[i].age = new Array();
                  data_box_array[i].fw = 0;
                  data_box_array[i].py = 0;
                }
                for(var i=0;i<data_box_analysis.length;i++){
                  for(var j=0;j<data_box_analysis[i].length;j++){
                    data_box_array[i].age.push(data_box_analysis[i][j].textContent);
                  }
                  data_box_array[i].fw = data_box_array[i].age[2] - data_box_array[i].age[0];
                  data_box_array[i].py = (data_box_array[i].age[1] - data_box_array[i].age[0])-(data_box_array[i].age[2] - data_box_array[i].age[1]);

                  //document.write(data_box_analysis[i][0].textContent);
                }

                function fw_year(){
                  var tmp = new Array();
                  var tmp_year_min = new Array();
                  var tmp_year_max = new Array();

                  for(var i=1;i<data_box_array.length;i++){
                    tmp.push(data_box_array[i].fw)
                  }
                  var fw_min = Math.min.apply(null,tmp);
                  var fw_max = Math.max.apply(null,tmp);
                  for(var i=0;i<data_box_array.length;i++){
                    if(data_box_array[i].fw == fw_min){
                      tmp_year_min.push(data_box_array[i].year);
                    }
                  }
                  for(var i=0;i<data_box_array.length;i++){
                    if(data_box_array[i].fw == fw_max){
                      tmp_year_max.push(data_box_array[i].year);
                    }
                  }
                  var tmp_year = new Array();
                  tmp_year.push(tmp_year_min);
                  tmp_year.push(tmp_year_max);
                  return (tmp_year);
                }
                var fw_year_array = fw_year();
                function fw_age_min(){
                  //var fw_year = fw_year;
                  var age_min=100,
                      age_max=0;
                  for(var i=0;i<fw_year_array[0].length;i++){
                    for(var j=0;j<data_box_array.length;j++){
                      if(data_box_array[j].year == fw_year_array[0][i]){
                        if(data_box_array[j].age[0]<age_min) age_min=data_box_array[j].age[0];
                        if(data_box_array[j].age[2]>age_max) age_max=data_box_array[j].age[2];
                      }
                    }
                  }
                  var fw_age = new Array();
                  fw_age.push(age_min);
                  fw_age.push(age_max);
                  var result = age_min + "到" + age_max;
                  return result;
                  //document.write(fw_age[0]."到".fw_age[1]);
                }

                //格式输出数组
                function print_arr(arr){
                  for(var i=0;i<arr.length-1;i++){
                    document.write(arr[i] + "、");
                  }
                  document.write(arr[arr.length-1]);
                }

                function fw_age_max(){
                  //var fw_year = fw_year;
                  var age_min=100,
                      age_max=0;
                  for(var i=0;i<fw_year_array[1].length;i++){
                    for(var j=0;j<data_box_array.length;j++){
                      if(data_box_array[j].year == fw_year_array[1][i]){
                        if(data_box_array[j].age[0]<age_min) age_min=data_box_array[j].age[0];
                        if(data_box_array[j].age[2]>age_max) age_max=data_box_array[j].age[2];
                      }
                    }
                  }
                  var fw_age = new Array();
                  fw_age.push(age_min);
                  fw_age.push(age_max);
                  var result = age_min + "到" + age_max;
                  return result;
                  //document.write(fw_age[0]."到".fw_age[1]);
                }

                function py_year(){
                  var tmp = new Array();
                  var tmp_abs = new Array();
                  var tmp_year_avg = new Array();
                  var tmp_year_down = new Array();

                  for(var i=1;i<data_box_array.length;i++){
                    tmp.push(data_box_array[i].py);
                    tmp_abs.push(Math.abs(data_box_array[i].py));
                  }
                  var py_avg = Math.min.apply(null,tmp_abs);
                  var py_min = Math.min.apply(null,tmp);


                  //document.write(py_avg);
                  for(var i=0;i<data_box_array.length;i++){
                    if(Math.abs(data_box_array[i].py) == py_avg){
                      tmp_year_avg.push(data_box_array[i].year);
                    }
                  }
                  for(var i=0;i<data_box_array.length;i++){
                    if(data_box_array[i].py == py_min){
                      tmp_year_down.push(data_box_array[i].year);
                    }
                  }
                  var tmp_year = new Array();
                  tmp_year.push(tmp_year_avg);
                  tmp_year.push(tmp_year_down);
                  return (tmp_year);
                }

                var py_year_array =  py_year()[0];
                function py_age(){
                  var tmp_age = new Array;
                  for (var i = 0; i < py_year_array.length; i++) {
                    var flag = py_year_array[i] - 2006;
                    tmp_age.push(data_box_array[flag].age[1]);
                  }
                  return tmp_age;
                }

                var data_box_analysis_yc = d3.selectAll("g.box_plot").selectAll("circle");
                function yc_year(){
                  var tmp_year = new Array();
                  for(var i=0;i<data_box_analysis_yc.length;i++){
                    if(data_box_analysis_yc[i].length>0){
                      tmp_year.push(2006+i);
                    }
                  }
                  return tmp_year;
                }
                </script>
                <script>
                  //console.log(data_box_array);
                  var flag = 0;
                  for(var i=0;i<data_box_array.length;i++){
                    if(isNaN(data_box_array[i].py)){
                        flag++;
                    }
                    if(data_box_array[i].py == data_box_array[i].fw && data_box_array[i].fw == 0){
                        flag++;
                    }
                  }
                  if(flag >= 3) 
                    document.write("<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如图所示，所给数据太少，参见图示！</p>");
                  else{
                    document.getElementById("panduan").style.display="";
                  }

                </script>

                <p id="panduan" style="display:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;如图所示，在<?php echo $data_info->cname ?>每年的患者中（除06年外），<script> print_arr(fw_year()[0]); </script>年的患者年龄相对集中，大都分布在<script>document.write(fw_age_min());</script>岁之间，<script> print_arr(fw_year()[1]); </script>年分布相对分散，达<script>document.write(fw_age_max());</script>岁；<script> print_arr(py_year()[0]); </script>年患者年龄分布相对均匀，发病年龄大致在<script> document.write(py_age()); </script>岁左右，而
                在<script> document.write(py_year()[1]); </script>年，患者年龄相对偏大。此外，<script type="text/javascript">



                  var yc_yeard = yc_year();
                  //document.write(yc_yeard);
                  if(yc_yeard.length == 0) 
                    document.write("没有出现异常年龄分布。");
                  else{
                    document.write("在");
                    print_arr(yc_yeard);
                    document.write("年，患者年龄分布出现异常值。");
                  }
                    
                  
                </script>


                </p>
            </div>
      	</div>
        <!--TreeMap-->
        <style>
            

            #detail_treemap .footer {
                z-index: 1;
                display: block;
                font-size: 12px;
                font-weight: 200;
            }

            #detail_treemap svg {
                overflow: hidden;
            }

            #detail_treemap rect {
                pointer-events: all;
                cursor: pointer;
                stroke: #EEEEEE;
            }

            #detail_treemap .chart {
                display: block;
                margin: auto;
            }

            #detail_treemap .parent .label1 {
                color: #FFFFFF;
            }


            #detail_treemap .labelbody {
                background: transparent;
            }

           #detail_treemap .label1 {
                margin: 2px;
                white-space: pre;
                overflow: hidden;

            }
            #detail_treemap .label1 p{
                color: #fff;

            }

            #detail_treemap .child .label1 {
                white-space: pre-wrap;
                text-align: center;
                text-overflow: ellipsis;
            }

            #detail_treemap .cell {
                font-size: 11px;
                cursor: pointer
            }

            #tooltip {
                  position: absolute;
                  width: 150px;
                  height: auto;
                  
                  background: none repeat scroll 0% 0% #111;
                  -webkit-border-radius: 10px;
                  -moz-border-radius: 10px;
                  border-radius: 10px;
                  -webkit-box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.4);
                  -moz-box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.4);
                  box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.4);
                  pointer-events: none;
                  opacity: 0.8;
                  color: #FFF;
                  padding: 10px 20px;
                  border-radius: 8px;
                  text-align: left;
            }
            #tooltip.hidden {
                    display: none;
            }
            #tooltip p {
                    margin: 0;
                    font-family: sans-serif;
                    font-size: 16px;
                    line-height: 20px;
            }

        </style>
        <div style="display:block; width:957px; background:url(images/treemap_bg.jpg);">
        	<hr color="#69b4b4" size="0.5">
            <div style="height:30px; width:957px;">
            	<?php
          		echo "<h3 id='nav5' align='center'>".$data_info->cname."发病率性别与年龄关系矩阵树图</h3>";
				?>
            </div>
          	<div id="detail_treemap" style="height:480px; width: 805px;margin-left: auto; margin-right:auto;">
              <div id="tooltip" class="hidden">
                <p><strong id="title"></strong></p>
                <p>发病占：<span id="value"> </span>%</p>
              </div>
              <script type="text/javascript">
                    var isIE = BrowserDetect.browser == 'Explorer';
                    var chartWidth = 800;
                    var chartHeight = 480;
                    var xscale = d3.scale.linear().range([0, chartWidth]);
                    var yscale = d3.scale.linear().range([0, chartHeight]);
                    var color = d3.scale.ordinal()
                                  .domain(["male", "female"])
                                  .range(["rgba(42,167, 119, 0.8)", "rgba(227, 90, 126, 0.8)"]);
                    var title_c = d3.scale.ordinal()
                                  .domain(["male", "female"])
                                  .range(["男", "女"]);

                    var headerHeight = 20;
                    var headerColor = "rgba(105,180,180,.8)";
                    var transitionDuration = 500;
                    var root;
                    var node;
                    var treemap = d3.layout.treemap()
                        .round(false)
                        .size([chartWidth, chartHeight])
                        .sticky(true)
                        .value(function(d) {
                            return d.size;
                        });

                    var chart = d3.select("#detail_treemap")
                        .append("svg:svg")
                        //.attr("transform", "translate(20,0)")
                        .attr("width", chartWidth)
                        .attr("height", chartHeight)
                        .append("svg:g");

                    d3.json("js/treemap.json", function(data) {
                        node = root = data;
                        //var all_num = data.value;
                       // console.log(data.depth);
                        //console.log(data.value);
                        var nodes = treemap.nodes(root);
                        var children = nodes.filter(function(d) {
                            return !d.children;
                        });
                        //console.log(children);
                        var parents = nodes.filter(function(d) {
                            return d.children;
                        });

                        //去除最顶层显示
                        parents = parents.slice(1,1);
                        //console.log(parents);

                        // create parent cells
                        var parentCells = chart.selectAll("g.cell.parent")
                            .data(parents, function(d) {
                                return d.name;
                            });

                        var parentEnterTransition = parentCells.enter()
                            .append("g")
                            .attr("class", "cell parent")
                            .on("click", function(d) {
                                zoom(d);
                            });
                        parentEnterTransition.append("rect")
                            .attr("width", function(d) {
                                return Math.max(0.01, d.dx);
                            })
                            .attr("height", headerHeight)
                            .style("fill", function(d) {
                                      //console.log(color(d.name));
                                return color(d.name);
                            });
                        parentEnterTransition.append('foreignObject')
                            .attr("class", "foreignObject")
                            .append("xhtml:body")
                            .attr("class", "labelbody")
                            .append("div")
                            .attr("class", "label1")
                            .append("p");
                        // update transition
                        var parentUpdateTransition = parentCells.transition().duration(transitionDuration);
                        parentUpdateTransition.select(".cell")
                            .attr("transform", function(d) {
                                return "translate(" + d.dx + "," + d.y + ")";
                            });
                        parentUpdateTransition.select("rect")
                            .attr("width", function(d) {
                                return Math.max(0.01, d.dx);
                            })
                            .attr("height", headerHeight)
                            .style("fill", headerColor);
                        parentUpdateTransition.select(".foreignObject")
                            .attr("width", function(d) {
                                return Math.max(0.01, d.dx);
                            })
                            .attr("height", headerHeight)
                            .select(".labelbody .label")
                            .text(function(d) {
                                return d.name;
                            });
                        // remove transition
                        parentCells.exit()
                            .remove();




                        // create children cells
                        var childrenCells = chart.selectAll("g.cell.child")
                            .data(children, function(d) {
                                return "c-" + d.name;
                            });
                        // enter transition

                        function getMousePoint(ev) {
                            var x = y = 0,
                                doc = document.documentElement,
                                body = document.body;
                            if(!ev) ev=window.event;
                            if (window.pageYoffset) {//pageYoffset是Netscape特有
                                x = window.pageXOffset;
                                y = window.pageYOffset;
                            }else{
                                x = (doc && doc.scrollLeft || body && body.scrollLeft || 0) - (doc && doc.clientLeft || body && body.clientLeft || 0);
                                y = (doc && doc.scrollTop  || body && body.scrollTop  || 0) - (doc && doc.clientTop  || body && body.clientTop  || 0);
                            }
                            x += ev.clientX;
                            y += ev.clientY;
                            return {'x' : x, 'y' : y};
                        }
                        document.onmousemove = getMousePoint;
                        var childEnterTransition = childrenCells.enter()
                            .append("g")
                            .attr("class", "cell child")
                            .on("mouseover", function(d){
                              
                              //console.log();
                              

                              var xPosition = parseFloat(getMousePoint().x)+10;
                              var yPosition = parseFloat(getMousePoint().y)+10;
                              // 更新提示条的位置和值
                              d3.select("#tooltip")
                                .style("left", xPosition + "px")
                                .style("top", yPosition + "px")
                                .select("#title").text(d.name);

                              d3.select("#tooltip")
                                .select("#value").text(changeTwoDecimal_f(d.size/data_morbidity.length*100));

                              // 显示提示条
                              d3.select("#tooltip").classed("hidden", false);

                            })
                            .on("mouseout", function(d){
                              d3.select("#tooltip").classed("hidden", true);
                            })
                            .on("click", function(d) {
                                zoom(node === d.parent ? root : d.parent);
                            });
                        childEnterTransition.append("rect")
                            .classed("background", true)
                            .style("fill", function(d) {
                                return color(d.parent.name);
                            });

                        childEnterTransition.append('foreignObject')
                            .attr("class", "foreignObject")
                            .attr("width", function(d) {
                                return Math.max(0.01, d.dx);
                            })
                            .attr("height", function(d) {
                                return Math.max(0.01, d.dy);
                            })
                            .append("xhtml:body")
                            .attr("class", "labelbody")
                            .append("div")
                            .attr("class", "label1")
                            .append("p")
                            .text(function(d) {
                                return d.name;
                            })
                            .style("line-height",function(d){
                              return Math.max(0.01, d.dy)/20
                            });                           ;

                        if (isIE) {
                            childEnterTransition.selectAll(".foreignObject .labelbody .label")
                                .style("display", "none");
                        } else {
                            childEnterTransition.selectAll(".foreignObject")
                                .style("display", "none");
                        }

                        // update transition
                        var childUpdateTransition = childrenCells.transition().duration(transitionDuration);
                        childUpdateTransition.select(".cell")
                            .attr("transform", function(d) {
                                return "translate(" + d.x  + "," + d.y + ")";
                            });
                        childUpdateTransition.select("rect")
                            .attr("width", function(d) {
                                return Math.max(0.01, d.dx);
                            })
                            .attr("height", function(d) {
                                return d.dy;
                            })
                            .style("fill", function(d) {
                                return color(d.parent.name);
                            });
                        childUpdateTransition.select(".foreignObject")
                            .attr("width", function(d) {
                                return Math.max(0.01, d.dx);
                            })
                            .attr("height", function(d) {
                                return Math.max(0.01, d.dy);
                            })
                            .select(".labelbody .label")
                            .attr("width", function(d) {
                                return Math.max(0.01, d.dx);
                            })
                            .attr("font-size", "12px")
                            .text(function(d) {
                              //console.log(d.name);
                                return d.name;
                            });
                        // exit transition
                        childrenCells.exit()
                            .remove();

                        d3.select("select").on("change", function() {
                            console.log("select zoom(node)");
                            treemap.value(this.value == "size" ? size : count)
                                .nodes(root);
                            zoom(node);
                        });

                        zoom(node);
                    });

                    //保留小数前2位
                    function changeTwoDecimal_f(x) {  
                        var f_x = parseFloat(x);  
                        if (isNaN(f_x)) {  
                            alert('function:changeTwoDecimal->parameter error');  
                            return false;  
                        }  
                        var f_x = Math.round(x * 100) / 100;  
                        var s_x = f_x.toString();  
                        var pos_decimal = s_x.indexOf('.');  
                        if (pos_decimal < 0) {  
                            pos_decimal = s_x.length;  
                            s_x += '.';  
                        }  
                        while (s_x.length <= pos_decimal +2) {  
                            s_x += '0';  
                        }  
                        return s_x;  
                    } 

                    function size(d) {
                        return d.size;
                    }
                    function count(d) {
                        return 1;
                    }
                    //and another one
                    function textHeight(d) {
                        var ky = chartHeight / d.dy;
                        yscale.domain([d.y, d.y + d.dy]);
                        return (ky * d.dy) / headerHeight;
                    }
                    function getRGBComponents (color) {
                        var r = color.substring(1, 3);
                        var g = color.substring(3, 5);
                        var b = color.substring(5, 7);
                        return {
                            R: parseInt(r, 16),
                            G: parseInt(g, 16),
                            B: parseInt(b, 16)
                        };
                    }
                    function idealTextColor (bgColor) {
                        var nThreshold = 105;
                        var components = getRGBComponents(bgColor);
                        var bgDelta = (components.R * 0.299) + (components.G * 0.587) + (components.B * 0.114);
                        return ((255 - bgDelta) < nThreshold) ? "#000000" : "#ffffff";
                    }
                    function zoom(d) {
                        this.treemap
                            .padding([headerHeight/(chartHeight/d.dy), 0, 0, 0])
                            .nodes(d);
                        // moving the next two lines above treemap layout messes up padding of zoom result
                        var kx = chartWidth  / d.dx;
                        var ky = chartHeight / d.dy;
                        var level = d;

                        xscale.domain([d.x, d.x + d.dx]);
                        yscale.domain([d.y, d.y + d.dy]);

                        if (node != level) {
                            if (isIE) {
                                chart.selectAll(".cell.child .foreignObject .labelbody .label")
                                    .style("display", "none");
                            } else {
                                chart.selectAll(".cell.child .foreignObject ")
                                    .style("display", "none");
                            }
                        }

                        var zoomTransition = chart.selectAll("g.cell").transition().duration(transitionDuration)
                            .attr("transform", function(d) {
                                return "translate(" + xscale(d.x) + "," + yscale(d.y) + ")";
                            })
                            .each("end", function(d, i) {
                                if (!i && (level !== self.root)) {
                                    chart.selectAll(".cell.child")
                                        .filter(function(d) {
                                            return d.parent === self.node; // only get the children for selected group
                                        })
                                        .select(".foreignObject .labelbody .label")
                                        .style("color", function(d) {
                                            return idealTextColor(color(d.parent.name));
                                        });

                                    if (isIE) {
                                        chart.selectAll(".cell.child")
                                            .filter(function(d) {
                                                return d.parent === self.node; // only get the children for selected group
                                            })
                                            .select(".foreignObject .labelbody .label")
                                            .style("display", "")
                                    } else {
                                        chart.selectAll(".cell.child")
                                            .filter(function(d) {
                                                return d.parent === self.node; // only get the children for selected group
                                            })
                                            .select(".foreignObject")
                                            .style("display", "")
                                    }
                                }
                            });

                        zoomTransition.select(".foreignObject")
                            .attr("width", function(d) {
                                return Math.max(0.01, kx * d.dx);
                            })
                            .attr("height", function(d) {
                                return d.children ? headerHeight: Math.max(0.01, ky * d.dy);
                            })
                            .select(".labelbody .label")
                            .text(function(d) {
							//return d.name;
                                return d.name + ":" + changeTwoDecimal_f(d.value/data_morbidity.length*100) +"%";
                            });

                        // update the width/height of the rects
                        zoomTransition.select("rect")
                            .attr("width", function(d) {
                                return Math.max(0.01, kx * d.dx);
                            })
                            .attr("height", function(d) {
                                return d.children ? headerHeight : Math.max(0.01, ky * d.dy);
                            })
                            .style("fill", function(d) {
                                return d.children ? headerColor : color(d.parent.name);
                            });

                        node = d;

                        if (d3.event) {
                            d3.event.stopPropagation();
                        }
                    }


              </script>
            </div>
			<div style="margin:10px 50px 10px 50px;  font-size:16px; line-height:22px;">
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;矩阵树图，又称TreeMap，一种用矩形面积大小反映数据所占整体比重，动态反映所在层级关系的图形表示方法。主要用于展示层次性比较强的数据集，在本系统中，用矩阵树图动态展示某种肿瘤发病人数的性别及年龄分布，本图默认显示整体男女发病人数比例，当鼠标移至具体矩形或者点击一块矩形，会放大显示该性别各年龄段发病人数比例。 </p>
            </div>
        </div>
        <!--横截面、出生队列-->
        <div style="display:block; height:520px;">
        	<hr color="#69b4b4" size="0.5">
        	<div id="detail_cross" style="float:left; height:400px; width:478px;">
            	
            </div>
            <div id="detail_birth" style="float:left; height:400px; width:479px;">
            	
            </div>

			<div style="margin:10px 50px 10px 50px;  font-size:16px; line-height:22px;">
                <!-- <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;横断面分析主要用于分析同一时期不同年龄组或不同年代各年龄组的发病率、患病率或死亡率的变化同年代出生的群体对致病因素暴露的时间和强度具有一定的相似性。<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;同一时期出生的一组人群称为出生队列。利用出生队列资料将疾病年龄分布和时间分布结合起来的描述的方法称出生队列分析。该分析方法在评价疾病的年龄分布长期变化趋势及提供病因线索等方面具有很大意义。</p> -->
                <script type="text/javascript">
                  function randomNumber(min,max){
                    return Math.floor(min+Math.random()*(max-min));
                  }
                  var randomNumber = randomNumber(0,6);
                  // console.log(randomNumber);
                  var randomYear = randomNumber + 2006;

                  var data_l_analysis = data_cross[randomNumber];
                  //console.log(data_l_analysis);

                  var i_max = Math.max.apply(null,data_l_analysis);
                  for(var i=0;i<data_l_analysis.length;i++){
                    if(data_l_analysis[i] == i_max){
                      var year_max_order = i;
                    }
                  }
                  //console.log(year_max_order);
                  function out_1(){
                    if(year_max_order!=1){
                      if(data_l_analysis[1]>data_l_analysis[0]) return "有所上升";
                      if(data_l_analysis[1]==data_l_analysis[0]) return "没有变化";
                      if(data_l_analysis[1]<data_l_analysis[0]) return "有所下降";
                    }else{
                      return "达到顶峰";
                    }
                  }
                  function out_2(){
                    if(year_max_order!=2){
                      if(data_l_analysis[2]>data_l_analysis[1]) if(data_l_analysis[1]>data_l_analysis[0]){return "继续上升"}else{return "有所上升"};
                      if(data_l_analysis[2]==data_l_analysis[1]) return "没有变化";
                      if(data_l_analysis[2]<data_l_analysis[1]) if(data_l_analysis[1]<data_l_analysis[0]){return "继续下降"}else{return "有所下降"};
                    }else{
                      return "达到顶峰";
                    }
                  }
                  function out_3(){
                    if(year_max_order!=3){
                      if(data_l_analysis[3]>data_l_analysis[2]) if(data_l_analysis[2]>data_l_analysis[1]){return "继续上升"}else{return "有所上升"};
                      if(data_l_analysis[3]==data_l_analysis[2]) return "没有变化";
                      if(data_l_analysis[3]<data_l_analysis[2]) if(data_l_analysis[2]<data_l_analysis[1]){return "继续下降"}else{return "有所下降"};
                    }else{
                      return "达到顶峰";
                    }
                  }function out_4(){
                    if(year_max_order!=4){
                      if(data_l_analysis[4]>data_l_analysis[3]) if(data_l_analysis[3]>data_l_analysis[2]){return "继续上升"}else{return "有所上升"};
                      if(data_l_analysis[4]==data_l_analysis[3]) return "没有变化";
                      if(data_l_analysis[4]<data_l_analysis[3]) if(data_l_analysis[3]<data_l_analysis[2]){return "继续下降"}else{return "有所下降"};
                    }else{
                      return "达到顶峰";
                    }
                  }

                  var data_r_analysis = new Array();
                  for(var i=0;i<6;i++){
                    data_r_analysis[i] = new Object();
                    data_r_analysis[i].year = 1900 + i*20;
                    data_r_analysis[i].data = data_birth[i];
                    data_r_analysis[i].data_if = 0;
                  }

                  for(var i=0;i<data_r_analysis.length;i++){
                    var flag = 0;
                    for(var j=0;j<5;j++){
                      if(data_r_analysis[i].data[j] == 0){
                        flag ++;
                        //console.log(data_r_analysis[i][j]);
                      }
                    }
                    if(flag == 5){
                      data_r_analysis[i].data_if = 0;
                    }else{
                      data_r_analysis[i].data_if = 1;
                    }
                    //console.log(flag);
                    flag = 0;
                  }

                  function out_r(){
                    var flag = 0;
                    var tmp = 0;
                    for(var i=0;i<data_r_analysis.length;i++){
                      var tmpf = flag;
                      if(data_r_analysis[i].data_if != 0) flag ++;
                      if(flag != tmpf) {
                        if(flag == 1)  var one_year = 1900 + i*20;
                        if(flag == 2)  var two_year = 1900 + i*20;
                        if(flag == 3)  var three_year = 1900 + i*20;
                        if(flag == 4)  var four_year = 1900 + i*20;
                        if(flag == 5)  var five_year = 1900 + i*20;
                      }
                    }
                    //console.log(two_year);
                    if(flag==0) return "所有年份出生队列无发病情况";
                    if(flag==1){
                     var result = "可以清晰看出发病的是"+one_year+"年的出生队列，其他出生队列均无发病情况。"; 
                     return result ;
                    }
                    if(flag==2){
                      var bj = "";
                      if(data_r_analysis[(two_year-1900)/20].data[2] > data_r_analysis[(one_year-1900)/20].data[2]) bj = "较高";
                      if(data_r_analysis[(two_year-1900)/20].data[2] == data_r_analysis[(one_year-1900)/20].data[2]) bj = "基本持平";
                      if(data_r_analysis[(two_year-1900)/20].data[2] < data_r_analysis[(one_year-1900)/20].data[2]) bj = "较低";
                      var result = "以"+one_year+"年与"+two_year+"年出生队列相比，"+two_year+"年出生队列发病率"+bj;
                      return result;
                    }
                    if(flag==3){
                      var bj = "";
                      if(data_r_analysis[(three_year-1900)/20].data[2] > data_r_analysis[(two_year-1900)/20].data[2]) bj = "较高";
                      if(data_r_analysis[(three_year-1900)/20].data[2] == data_r_analysis[(two_year-1900)/20].data[2]) bj = "基本持平";
                      if(data_r_analysis[(three_year-1900)/20].data[2] < data_r_analysis[(two_year-1900)/20].data[2]) bj = "较低";
                      var result = "以"+two_year+"年与"+three_year+"年出生队列相比，"+three_year+"年出生队列发病率"+bj;
                      return result;
                    }
                    if(flag>=4){
                      var bj = "";
                      if(data_r_analysis[(four_year-1900)/20].data[2] > data_r_analysis[(three_year-1900)/20].data[2]) bj = "较高";
                      if(data_r_analysis[(four_year-1900)/20].data[2] == data_r_analysis[(three_year-1900)/20].data[2]) bj = "基本持平";
                      if(data_r_analysis[(four_year-1900)/20].data[2] < data_r_analysis[(three_year-1900)/20].data[2]) bj = "较低";
                      var result = "以"+three_year+"年与"+four_year+"年出生队列相比，"+four_year+"年出生队列发病率"+bj+"。";
                      return result;
                    }
                  }
                </script>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;左侧显示的是2006年到2011年“<?php echo $data_info->cname ?>”年龄别发病率，以<script>document.write(randomYear);</script>年结果为例，0-19岁人群组人数为<script>document.write(data_l_analysis[0]);</script>，20-39岁组发病率<script>document.write(out_1());</script>，40-59岁发病率<script>document.write(out_2());</script>，到60-79岁组发病率<script>document.write(out_3());</script>，以后随着年龄增大，“<?php echo $data_info->cname ?>”的发病率<script>document.write(out_4());</script>。右侧显示的是2006年到2011年出生队列该肿瘤别发病率，<script>document.write(out_r());</script></p>
       
            </div>
        </div>
    </div>
	
    <?php 
  		require (dirname(__FILE__)."/footer.php");
  	?> 
    
    <script src="js/echarts-plain.js"></script>
	<script type="text/javascript" src="js/echarts-detail.js" charset="UTF-8"></script>
</body>
</html>