<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>肿瘤列表 - 肿瘤流行病数据</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">

	<?php 
		error_reporting(E_ALL^E_NOTICE);
		require_once("php/config.php"); 
	?>
</head>
<body>
	<?php require_once("header.php"); ?>
    <?php
		$strst = "";
		if($_GET["searchText"] != null)
			$strst = "'".$_GET["searchText"]."'";
		else
			$strst = "'请输入搜索词'";
	?>
	<script type="text/javascript">
		var mark = document.getElementById("nav_list");
		mark.setAttribute("class","selected");
		var st = document.getElementById("search_text");
		var strst = <?php echo $strst;?>;
		st.setAttribute("value",strst);
	</script>
    <div id="body">
	<div class="list">
	<?php
	$mycon = mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
	$mycon2 = mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
	$mycon->set_charset("utf8");
	$mycon2->set_charset("utf8");
	if (!$mycon){
	  	die('Could not connect: ' . mysqli_error());
	}
	if (!$mycon2){
	  	die('Could not connect: ' . mysqli_error());
	}

	$pageSize = 10;//每页显示的记录数
	
	//$currentPage = $_GET["currentPage"];//当前页
	if($_GET["currentPage"] != null){
		$currentPage = $_GET["currentPage"];
	}
	else if($_GET["page_jump"] != null){
		$currentPage = $_GET["page_jump"];
	}
	if($currentPage == null){
		$currentPage = 1;
	}
	
	//拼接搜索结果后缀
	$strSqladd = "";
	$strGetadd = "";
	if(	$_GET["searchText"] != null & 
		$_GET["searchText"] != "请输入搜索词"){
		$strGetadd = "&searchOption=".$_GET["searchOption"].
					 "&searchText=".$_GET["searchText"];
		$searchText = $_GET["searchText"];
		if(	$_GET["searchOption"] == 0 || 
			$_GET["searchOption"] == null){
			$strSqladd =" where `icd-o-3` like '%".
						$searchText."%' or `icd-10` like '%".
						$searchText."%' or `chinese` like '%".
						$searchText."%' or `English` like '%".
						$searchText."%' or `Mesh` like '%".
						$searchText."%' or `Cmesh` like '%".
						$searchText."%' or `Entry term` like '%".
						$searchText."%' or `annotation` like '%".
						$searchText."%'";
		}
		else if( $_GET["searchOption"] == 1){
			$strSqladd =" where `icd-o-3` like '%".$searchText."%'";
		}
		else if( $_GET["searchOption"] == 2){
			$strSqladd =" where `chinese` like '%".$searchText."%'";
		}
		else if( $_GET["searchOption"] == 3){
			$strSqladd =" where `English` like '%".$searchText."%'";
		}
		else if( $_GET["searchOption"] == 4){
			$strSqladd =" where `Mesh` like '%".$searchText."%'";
		}
		else if( $_GET["searchOption"] == 5){
			$strSqladd =" where `Cmesh` like '%".$searchText."%'";
		}
		else if( $_GET["searchOption"] == 6){
			$strSqladd =" where `Entry term` like '%".$searchText."%'";
		}
		else if( $_GET["searchOption"] == 7){
			$strSqladd =" where `annotation` like '%".$searchText."%'";
		}
	}
	
	if($_GET["totalRow"] == null){
		$strSql = "select * from icd_o_3_info";
		if(	$_GET["searchText"] != null & 
			$_GET["searchText"] != "请输入搜索词"){
			$strSql = 	$strSql.$strSqladd;
		}
		
		$result=mysqli_query($mycon, $strSql);
		$totalRow = mysqli_num_rows($result);//总记录数
		
		if($totalRow == 1){
			mysqli_data_seek($result,0);//定位游标
			$row = mysqli_fetch_array($result);
			echo "<script>location.href='detail.php?searchText=".$row['icd-o-3']."';</script>"; 
		}
	}
	else{
		$totalRow = $_GET["totalRow"];
		
		if($totalRow == 1){
			mysqli_data_seek($result,0);//定位游标
			$row = mysqli_fetch_array($result);
			echo "<script>location.href='detail.php?searchText=".$row['icd-o-3']."';</script>"; 
		}
		
		$strSql = "select * from icd_o_3_info";
		if(	$_GET["searchText"] != null & 
			$_GET["searchText"] != "请输入搜索词"){
			$strSql = 	$strSql.$strSqladd;
		}
		
		$strSql = $strSql." limit ".($currentPage-1)*$pageSize.", ".$pageSize;
		$result=mysqli_query($mycon, $strSql);
		
	}
	
	$first = ($currentPage-1)*$pageSize;//起始值
	$last = $first + $pageSize;//结束值
	$totalPage = ceil($totalRow / $pageSize);//总页数
	
?>
	<table align="center">
		<tr align="center" >
<?php
	if($currentPage == 1)
	{
		echo " <td width='50'> <img src='images/btn_first2.png'/>  </td> <td width='50'> <img src='images/btn_prev2.png'/> </td>";
	}
	else 
	{
?>

        <td width="50"> <a href="list.php?currentPage=1&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_first.png"/></a>  </td>
          <td width="50">  <a href="list.php?currentPage=<?php echo $currentPage-1 ?>&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_prev.png"/></a> </td>
          
<?php
	}
	if($currentPage == $totalPage)
	{
		echo "<td  valign='middle'> <font color=green> [ 第 ";
		echo $currentPage." 页 ] </font></td>";
		echo " <td width='50'> <img src='images/btn_next2.png'/>  </td>  <td width='50'> <img src='images/btn_last2.png'/>";
	}
	else 
	{
?>
				<td valign='middle'> <font color="green"> [ 第 <?php echo $currentPage ?> 页 ] </font></td>
				<td width='50'> <a href="list.php?currentPage=<?php echo $currentPage+1 ?>&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_next.png"/></a> </td>
				<td width='50'> <a href="list.php?currentPage=<?php echo $totalPage ?>&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_last.png"/></a> </td>
		 
<?php
	}
?>
				 	
            <td width='280' align="center" valign="middle" colspan=5>
                    <form  action="list.php" method="get" valign="middle">
                <input type="text" name="page_jump" size="4" value="<?php echo $currentPage ?>" style="text-align:center; line-height:20px;">&nbsp;&nbsp;
                <input type="submit" name="submit" value="跳转" style="line-height:20px">&nbsp;&nbsp;
                <input type="hidden" name="totalRow" value="<?php echo $totalRow.$strGetadd ?>">
                <?php echo "<font color='green'>[共 ".$totalPage." 页] [总计 ".$totalRow." 条]</font>" ?>
                </form>
           </td>
         </tr>
    </table><br>

    
      <?php
	if($last >= $totalRow)
	{
		$last = $totalRow;
	}
	for($i=$first;$i < $last;$i++)
	{
		echo "<hr color='#69b4b4' size='0.5'>";
		echo "<table border='0' width='940px'>";
		mysqli_data_seek($result,$i);//定位游标
		$row = mysqli_fetch_array($result);
		echo "<tr>";
		echo " <td width='150' rowspan='2' align='center' valign='middle'><a href='detail.php?searchText=".$row['icd-o-3']."'><img src='images/ico/".$row['icd-o-3'].".png' width='100' height='100' alt='".$row['chinese']."'  style='width:80px;height:80px;' border='0' ></a></td>";
    	echo "<td ><a href='detail.php?searchText=".$row['icd-o-3']."'>".$row['icd-o-3']."  ".$row['chinese']."  ".$row['English']."</a></td></tr>";
      	echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['introduce']."</td></tr>";
		
		echo "</table>";
	}
	echo "<hr color='#69b4b4' size='0.5'>";
	mysqli_close($mycon);
?>
    </p>
	<table align="center">
		<tr align="center" >
<?php
	if($currentPage == 1)
	{
		echo " <td width='50'> <img src='images/btn_first2.png'/>  </td> <td width='50'> <img src='images/btn_prev2.png'/> </td>";
	}
	else 
	{
?>

        <td width="50"> <a href="list.php?currentPage=1&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_first.png"/></a>  </td>
          <td width="50">  <a href="list.php?currentPage=<?php echo $currentPage-1 ?>&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_prev.png"/></a> </td>
          
<?php
	}
	if($currentPage == $totalPage)
	{
		echo "<td  valign='middle'> <font color=green> [ 第 ";
		echo $currentPage." 页 ] </font></td>";
		echo " <td width='50'> <img src='images/btn_next2.png'/>  </td>  <td width='50'> <img src='images/btn_last2.png'/>";
	}
	else 
	{
?>
				<td valign='middle'> <font color="green"> [ 第 <?php echo $currentPage ?> 页 ] </font></td>
				<td width='50'> <a href="list.php?currentPage=<?php echo $currentPage+1 ?>&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_next.png"/></a> </td>
				<td width='50'> <a href="list.php?currentPage=<?php echo $totalPage ?>&totalRow=<?php echo $totalRow.$strGetadd ?>"><img src="images/btn_last.png"/></a> </td>
		 
<?php
	}
?>
				 	
            <td width='280' align="center" valign="middle" colspan=5>
                    <form  action="list.php" method="get" valign="middle">
                <input type="text" name="page_jump" size="4" value="<?php echo $currentPage ?>" style="text-align:center; line-height:20px;">&nbsp;&nbsp;
                <input type="submit" name="submit" value="跳转" style="line-height:20px">&nbsp;&nbsp;
                <input type="hidden" name="totalRow" value="<?php echo $totalRow.$strGetadd ?>">
                <?php echo "<font color='green'>[共 ".$totalPage." 页] [总计 ".$totalRow." 条]</font>" ?>
                </form>
           </td>
         </tr>
    </table><br>
    <br>

    </div>
    </div>

	<?php require_once("footer.php"); ?>
</body>
</html>