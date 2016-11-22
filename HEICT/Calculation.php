<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>指标测算-健康期望寿命指标测算工具</title>
<link rel="stylesheet" href="css/reset.css" />
<link rel="stylesheet" href="css/text.css" />
<link rel="stylesheet" href="css/960_12_col.css" />
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/calculation.js"></script>
</head>


<body>
<?php
	require_once("header.php");
?>
<div id="cal_content" class="container_12">
  <div id="nav_left" class="grid_3 alpha">
    <ul>
        <li><a href="#" onClick="nav_left_action(1)"><img id="nav_left_1" class="nav_left_current" src="images/nav_left_1.png"></a></li> 
        <li><img src="images/down.png"></li> 
        <li><a href="#" onClick="nav_left_action(2)"><img id="nav_left_2" src="images/nav_left_2.png"></a></li> 
        <li><img src="images/down.png"></li> 
        <li><a href="#" onClick="nav_left_action(3)"><img id="nav_left_3" src="images/nav_left_3.png"></a></li> 
        <li><img src="images/down.png"></li> 
        <li><a href="#" onClick="nav_left_action(4); HD_clicked();"><img id="nav_left_4" src="images/nav_left_4.png"></a></li>
        <li><img src="images/down.png"></li> 
        <li><a href="#" onClick="nav_left_action(5)"><img id="nav_left_5" src="images/nav_left_5.png"></a></li>
    </ul>
  </div> 
  
  <div id="right_1" class="grid_9 alpha">
    <h2>人群概况[Description]</h2>
  	<form id="form1">
      <table>
        <tr>
          <td>年&nbsp;&nbsp;&nbsp;&nbsp;份：</td>
          <td>
            <input type="text" name="des_year" id="des_year">
          </td>
        </tr>
        
        <tr>
          <td>国&nbsp;&nbsp;&nbsp;&nbsp;家：</td>
          <td>
            <input type="text" name="des_country" id="des_country">
          </td>
        </tr>
        <tr>
          <td>省&nbsp;&nbsp;&nbsp;&nbsp;份：</td>
          <td>
            <input type="text" name="des_region" id="des_region">
          </td>
        </tr>
        <tr>
          <td>地&nbsp;&nbsp;&nbsp;&nbsp;区：</td>
          <td>
            <input type="text" name="des_district" id="des_district">
          </td>
        </tr>
        
   
        
        <tr>
          <td>指&nbsp;&nbsp;&nbsp;&nbsp;标：</td>
          <td>
            <select name="des_sel" id="des_sel" style="font-size:16px;">
              <option value =1>自评健康期望寿命</option>
              <option value =2>无失能期望寿命</option>
              <option value=3>无慢性病患病期望寿命</option>
            </select>
          </td>
        </tr>
        
        <tr>
          <td>人群：</td>
          <td>
            <input type="checkbox" name="des_ck1" id="des_ck1" checked onChange="checked_change(1)">
            全人群&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="des_ck2" id="des_ck2" checked onChange="checked_change(2)">
            男性&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="des_ck3" id="des_ck3" checked onChange="checked_change(3)">
            女性
          </td>
        </tr>
        
      </table>
    </form>
  </div>
  
  <div id="right_2" class="grid_9 alpha" style="display:none;">
    <h2>人口数据[Population Data]</h2>
   
  	<form id="form2">
      <div id="btn2_up" class="btn_cls">
        <input type="button" name="pop_bat" value="批量填写" onClick="bat_go_action(2)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(2)">
      </div>
      <div id="btn_bat2_up" class="btn_cls" style="display:none;">
        <input type="button" name="pop_bat" value="完成填写" onClick="bat_do_action(2)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(2)">
     </div>
    
      <table id="bat2" style="display:none;">
        <tr>
          <th>年龄组</th>
          <th>年均总人口</th>
          <th>男性年均人口</th>
          <th>女性年均人口</th>
        </tr>
      
        <tr>
          <td>0</td>
          <td rowspan="19">
            <textarea name="pt_bat" cols ="10" rows = "19" id="pt_bat"></textarea>
          </td>
          <td rowspan="19">
            <textarea name="pm_bat" cols ="10" rows = "19" id="pm_bat"></textarea>
          </td>
          <td rowspan="19">
            <textarea name="pf_bat" cols ="10" rows = "19" id="pf_bat"></textarea>
          </td>
        </tr>
        
        <tr>
          <td>1 - 4</td>
        </tr>
        
        <?php
			for($i = 5;$i < 85;$i += 5){
				echo "<tr><td>".$i." - ".($i+4)."</td>\n";
			}
		?>
        
        <tr>
          <td>85+</td>
        </tr>
      </table>
      
      <table id="table2">
        <tr>
          <th>年龄组</th>
          <th>年均总人口</th>
          <th>男性年均人口</th>
          <th>女性年均人口</th>
        </tr>
      
        <tr>
          <td>0</td>
          <td>
            <input type="text" name="pt0" id="pt0">
          </td>
          <td>
            <input type="text" name="pm0" id="pm0">
          </td>
          <td>
            <input type="text" name="pf0" id="pf0">
          </td>
        </tr>
        
        <tr>
          <td>1 - 4</td>
          <td>
            <input type="text" name="pt1" id="pt1">
          </td>
          <td>
            <input type="text" name="pm1" id="pm1">
          </td>
          <td>
            <input type="text" name="pf1" id="pf1">
          </td>
        </tr>
        
        <?php
			for($i = 5;$i < 85;$i += 5){
				echo "<tr><td>".$i." - ".($i+4)."</td>\n";
				echo "<td><input type='text' name='pt".$i."' id='pt".$i."'></td>\n";
				echo "<td><input type='text' name='pm".$i."' id='pm".$i."'></td>\n";
				echo "<td><input type='text' name='pf".$i."' id='pf".$i."'></td></tr>\n";
			}
		?>
        
        <tr>
          <td>85+</td>
          <td>
            <input type="text" name="pt85" id="pt85">
          </td>
          <td>
            <input type="text" name="pm85" id="pm85">
          </td>
          <td>
            <input type="text" name="pf85" id="pf85">
          </td>
        </tr>
        
      </table>
      
 	 <div id="btn2" class="btn_cls">
        <input type="button" name="pop_bat" value="批量填写" onClick="bat_go_action(2)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(2)">
     </div>
     <div id="btn_bat2" class="btn_cls" style="display:none;">
        <input type="button" name="pop_bat" value="完成填写" onClick="bat_do_action(2)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(2)">
    </div>
    </form>
    
  </div>
  
  <div id="right_3" class="grid_9 alpha" style="display:none;">
    <h2>死亡数据[Death Data]</h2>
  	<form id="form3">
      <div id="btn3_up" class="btn_cls">
        <input type="button" name="pop_bat" value="批量填写" onClick="bat_go_action(3)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(3)">
      </div>
      <div id="btn_bat3_up" class="btn_cls" style="display:none;">
        <input type="button" name="pop_bat" value="完成填写" onClick="bat_do_action(3)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(3)">
      </div>
      <table id="bat3" style="display:none;">
        <tr>
          <th>年龄组</th>
          <th>总死亡人口</th>
          <th>男性死亡人口</th>
          <th>女性死亡人口</th>
        </tr>
      
        <tr>
          <td>0</td>
          <td rowspan="19">
            <textarea name="dt_bat" cols ="10" rows = "19" id="dt_bat"></textarea>
          </td>
          <td rowspan="19">
            <textarea name="dm_bat" cols ="10" rows = "19" id="dm_bat"></textarea>
          </td>
          <td rowspan="19">
            <textarea name="df_bat" cols ="10" rows = "19" id="df_bat"></textarea>
          </td>
        </tr>
        
        <tr>
          <td>1 - 4</td>
        </tr>
        
        <?php
			for($i = 5;$i < 85;$i += 5){
				echo "<tr><td>".$i." - ".($i+4)."</td>\n";
			}
		?>
        
        <tr>
          <td>85+</td>
        </tr>
      </table>
      
      <table id="table3">
        <tr>
          <th>年龄组</th>
          <th>总死亡人口</th>
          <th>男性死亡人口</th>
          <th>女性死亡人口</th>
        </tr>
      
        <tr>
          <td>0</td>
          <td>
            <input type="text" name="dt0" id="dt0">
          </td>
          <td>
            <input type="text" name="dm0" id="dm0">
          </td>
          <td>
            <input type="text" name="df0" id="df0">
          </td>
        </tr>
        
        <tr>
          <td>1 - 4</td>
          <td>
            <input type="text" name="dt1" id="dt1">
          </td>
          <td>
            <input type="text" name="dm1" id="dm1">
          </td>
          <td>
            <input type="text" name="df1" id="df1">
          </td>
        </tr>
        
        <?php
			for($i = 5;$i < 85;$i += 5){
				echo "<tr><td>".$i." - ".($i+4)."</td>\n";
				echo "<td><input type='text' name='dt".$i."' id='dt".$i."'></td>\n";
				echo "<td><input type='text' name='dm".$i."' id='dm".$i."'></td>\n";
				echo "<td><input type='text' name='df".$i."' id='df".$i."'></td></tr>\n";
			}
		?>
        
        <tr>
          <td>85+</td>
          <td>
            <input type="text" name="dt85" id="dt85">
          </td>
          <td>
            <input type="text" name="dm85" id="dm85">
          </td>
          <td>
            <input type="text" name="df85" id="df85">
          </td>
        </tr>
        
      </table>
      
 	  <div id="btn3" class="btn_cls">
        <input type="button" name="pop_bat" value="批量填写" onClick="bat_go_action(3)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(3)">
      </div>
      <div id="btn_bat3" class="btn_cls" style="display:none;">
        <input type="button" name="pop_bat" value="完成填写" onClick="bat_do_action(3)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(3)">
      </div>
    </form>
    
  </div>
  
  <div id="right_4" class="grid_9 alpha" style="display:none;">
    <h2>人群健康状况数据[Health Data]</h2>
    <h4>特定健康状况流行水平 [<span id="HD_type"></span>]</h4>
  	<form id="form4">
      <div id="btn4_up" class="btn_cls">
        <input type="button" name="pop_bat" value="批量填写" onClick="bat_go_action(4)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(4)">
      </div>
      <div id="btn_bat4_up" class="btn_cls" style="display:none;">
        <input type="button" name="pop_bat" value="完成填写" onClick="bat_do_action(4)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(4)">
      </div>
      <table id="bat4" style="display:none;">
        <tr>
          <th>年龄组</th>
          <th>总体</th>
          <th>男性</th>
          <th>女性</th>
        </tr>
      
        <tr>
          <td>0</td>
          <td rowspan="19">
            <textarea name="pit_bat" cols ="10" rows = "19" id="pit_bat"></textarea>
          </td>
          <td rowspan="19">
            <textarea name="pim_bat" cols ="10" rows = "19" id="pim_bat"></textarea>
          </td>
          <td rowspan="19">
            <textarea name="pif_bat" cols ="10" rows = "19" id="pif_bat"></textarea>
          </td>
        </tr>
        
        <tr>
          <td>1 - 4</td>
        </tr>
        
        <?php
			for($i = 5;$i < 85;$i += 5){
				echo "<tr><td>".$i." - ".($i+4)."</td>\n";
			}
		?>
        
        <tr>
          <td>85+</td>
        </tr>
      </table>
      
      <table id="table4">
        <tr>
          <th>年龄组</th>
          <th>总体</th>
          <th>男性</th>
          <th>女性</th>
        </tr>
      
        <tr>
          <td>0</td>
          <td>
            <input type="text" name="pit0" id="pit0">
          </td>
          <td>
            <input type="text" name="pim0" id="pim0">
          </td>
          <td>
            <input type="text" name="pif0" id="pif0">
          </td>
        </tr>
        
        <tr>
          <td>1 - 4</td>
          <td>
            <input type="text" name="pit1" id="pit1">
          </td>
          <td>
            <input type="text" name="pim1" id="pim1">
          </td>
          <td>
            <input type="text" name="pif1" id="pif1">
          </td>
        </tr>
        
        <?php
			for($i = 5;$i < 85;$i += 5){
				echo "<tr><td>".$i." - ".($i+4)."</td>\n";
				echo "<td><input type='text' name='pit".$i."' id='pit".$i."'></td>\n";
				echo "<td><input type='text' name='pim".$i."' id='pim".$i."'></td>\n";
				echo "<td><input type='text' name='pif".$i."' id='pif".$i."'></td></tr>\n";
			}
		?>
        
        <tr>
          <td>85+</td>
          <td>
            <input type="text" name="pit85" id="pit85">
          </td>
          <td>
            <input type="text" name="pim85" id="pim85">
          </td>
          <td>
            <input type="text" name="pif85" id="pif85">
          </td>
        </tr>
        
      </table>
      
 	  <div id="btn4" class="btn_cls">
        <input type="button" name="pop_bat" value="批量填写" onClick="bat_go_action(4)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(4)">
      </div>
      <div id="btn_bat4" class="btn_cls" style="display:none;">
        <input type="button" name="pop_bat" value="完成填写" onClick="bat_do_action(4)">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" name="pop_clr" value="重置内容" onClick="clr_action(4)">
      </div>
    </form>
    
  </div>
  
  <div id="right_5" class="grid_9 alpha" style="display:none;">
    <h2>指标测算结果[Health Expectancy]</h2>
    <h4 id="res_info"><span id="res_year"></span>年&nbsp;&nbsp;
    <span id="res_country"></span>&nbsp;&nbsp;
    <span id="res_region"></span>&nbsp;&nbsp;
    <span id="res_district"></span></h4>
      <div id="tableExcel">
      <table>
        <tr>
          <th id="res_year" style="color:#060;"></th>
          <th colspan="3">期望寿命(e<sub>x</sub>)</th>
          <th colspan="3">健康期望寿命(<span id="he_unit"></span>)</th>
          <th colspan="3">健康期望寿命/期望寿命(%)</th>
        </tr>
        <tr>
          <th>年龄组</th>
          <th>全人群</th>
          <th>男</th>
          <th>女</th>
          <th>全人群</th>
          <th>男</th>
          <th>女</th>
          <th>全人群</th>
          <th>男</th>
          <th>女</th>
        </tr>
      
        <tr>
          <td class="text_bold">0</td>
          <td id="e00"></td>
          <td id="e10"></td>
          <td id="e20"></td>
          <td id="h00"></td>
          <td id="h10"></td>
          <td id="h20"></td>
          <td id="perc00"></td>
          <td id="perc10"></td>
          <td id="perc20"></td>
        </tr>
        
        <tr>
          <td class="text_bold">1 - 4</td>
          <td id="e01"></td>
          <td id="e11"></td>
          <td id="e21"></td>
          <td id="h01"></td>
          <td id="h11"></td>
          <td id="h21"></td>
          <td id="perc01"></td>
          <td id="perc11"></td>
          <td id="perc21"></td>
        </tr>
        
        <?php
			$j = 2;
			for($i = 5;$i < 85;$i += 5){
				echo "<tr><td class='text_bold'>".$i." - ".($i+4)."</td>\n";
				echo "<td id='e0".$j."'></td>\n";
				echo "<td id='e1".$j."'></td>\n";
				echo "<td id='e2".$j."'></td>\n";
				echo "<td id='h0".$j."'></td>\n";
				echo "<td id='h1".$j."'></td>\n";
				echo "<td id='h2".$j."'></td>\n";
				echo "<td id='perc0".$j."'></td>\n";
				echo "<td id='perc1".$j."'></td>\n";
				echo "<td id='perc2".$j."'></td>\n";
				$j ++;
			}
		?>
        
        <tr>
          <td class="text_bold">85+</td>
          <td id="e018"></td>
          <td id="e118"></td>
          <td id="e218"></td>
          <td id="h018"></td>
          <td id="h118"></td>
          <td id="h218"></td>
          <td id="perc018"></td>
          <td id="perc118"></td>
          <td id="perc218"></td>
        </tr>
        
      </table>
      </div>
      <div class="btn_cls">
        <input type="button" value="导出数据" onclick="saveCode(tableExcel)">
      </div> 
    
  </div>
  
</div>


<?php
	require_once("footer.php");
?>

<script>
	var obj = document.getElementById("nav2");
	obj.classList.add('nav_current');
	obj = document.getElementById("nav3");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav4");
	obj.classList.remove('nav_current');
	obj = document.getElementById("nav1");
	obj.classList.remove('nav_current');
	
	function saveCode(obj) {  
          var winname = window.open('', '_blank');  
          var strHTML = document.all.tableExcel.innerHTML;  
          winname.document.open('text/html', 'replace');  
          winname.document.writeln(strHTML);  
          winname.document.execCommand('saveas','','excel.xls');  
          //winname.close();  
	}  
</script>
</body>
</html>
