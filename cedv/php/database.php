<?php

	//引入需要的头文件
	require (dirname(__FILE__)."/base.php");
	require (dirname(__FILE__)."/config.php");
	
	
	header("Content-type: text/html; charset=utf8");	  
	
	
	//获取发病数据
	function get_data_morbidity(){
		// 连接到数据库
		global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
		
   		$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$conn->set_charset("utf8");
		
		$sql="select * from morbidity ";
		
		$json_res = array();
		
		$result= $conn->query($sql);
		$ord = 0;
		if ($result) {
			if($result->num_rows>0){//判断结果集中行的数目是否大于0
				while($row =$result->fetch_array() ){//循环输出结果集中的记录
					$tmp = new morbidity();
					$tmp->icd_o_3 = substr($row[1],0,3);
					$tmp->icd_10 = substr($row[2],0,3);
					$tmp->age = $row[5];
					$tmp->sex = $row[6];
					$tmp->incidence = $row[8];				
					
					$json_res[$ord] = $tmp;
					$ord ++;
					//echo json_encode($tmp);
				}
			}
		}else {
			echo "查询失败".$conn->error;
		}
		
		mysqli_close($conn);
	
		return json_encode($json_res);
	}
	
	//获取icd-o-3说明
	function get_data_tumor(){
		// 连接到数据库
		global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
		
   		$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$conn->set_charset("utf8");
		
		$sql="select * from icd_o_3_info ";
		
		$json_res = array();
		
		$ord = 0;
		$result= $conn->query($sql);
		if ($result) {
			if($result->num_rows>0){//判断结果集中行的数目是否大于0
				while($row =$result->fetch_array() ){//循环输出结果集中的记录
					$tmp = new tumor();
					$tmp->icd_o_3 = $row[0];
					$tmp->icd_10 = $row[1];
					$tmp->cname = $row[2];
					$tmp->ename = $row[3];		
					$tmp->mesh = $row[4];
					$tmp->cmesh = $row[5];
					$res->introduce = $row[8];
					
					$json_res[$ord] = $tmp;
					$ord ++;
				}
			}
		}else {
			echo "查询失败".$conn->error;
		}
		
		//$result->free();
		mysqli_close($conn);
	
		return json_encode($json_res);
	}
	
	//获取具体疾病信息
	function get_detail_info($icdo3){
		global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
		
   		$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$conn->set_charset("utf8");
		
		$sql="SELECT * FROM `icd_o_3_info` WHERE `icd-o-3` = '".$icdo3."'";
		//echo $sql."<br>";
		//$sql = "select * from icd_o_3_info";
		
		$ord = 0;
		$result= $conn->query($sql);
		
		if ($result) {
			if($result->num_rows>0){//判断结果集中行的数目是否大于0
				while($row =$result->fetch_array()){
					$tmp = new tumor();
					$res->icd_o_3 = $row[0];
					$res->icd_10 = $row[1];
					$res->cname = $row[2];
					$res->ename = $row[3];		
					$res->mesh = $row[4];
					$res->cmesh = $row[5];		
					$res->entry = $row[6];
					$res->anno = $row[7];
					$res->introduce = $row[8];
					
					break;
				}
			}
		}else {
			echo "查询失败".$conn->error;
		}
		
		//$result->free();
		mysqli_close($conn);
	
		return $res;
	}
	
	//获取google trends
	function get_detail_google($icdo3){
		global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
		
   		$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$conn->set_charset("utf8");
		
		$sql="SELECT * FROM `trends_google` WHERE `icd-o-3` = '".$icdo3."'";

		$result= $conn->query($sql);
		
		$res = array();
		if ($result) {
			if($result->num_rows>0){//判断结果集中行的数目是否大于0
				while($row = $result->fetch_array()){
					$res[0] = $row['2006'];
					$res[1] = $row['2007'];
					$res[2] = $row['2008'];		
					$res[3] = $row['2009'];
					$res[4] = $row['2010'];		
					$res[5] = $row['2011'];
					break;
				}
			}
		}else {
			echo "查询失败".$conn->error;
		}
		mysqli_close($conn);
		
		return json_encode($res);
	}
	
	//获取pubmed trends
	function get_detail_pubmed($icdo3){
		global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
		
   		$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$conn->set_charset("utf8");
		
		$sql="SELECT * FROM `trends_pubmed` WHERE `icd-o-3` = '".$icdo3."'";

		$result= $conn->query($sql);
		
		$res = array();
		if ($result) {
			if($result->num_rows>0){//判断结果集中行的数目是否大于0
				while($row =$result->fetch_array()){
					$res[0] = $row['2006'];
					$res[1] = $row['2007'];
					$res[2] = $row['2008'];		
					$res[3] = $row['2009'];
					$res[4] = $row['2010'];		
					$res[5] = $row['2011'];
					break;
				}
			}
		}else {
			echo "查询失败".$conn->error;
		}
		mysqli_close($conn);
	
		return json_encode($res);
	}
	
	//获取sinomed trends
	function get_detail_sinomed($icdo3){
		global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
		
   		$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$conn->set_charset("utf8");
		
		$sql="SELECT * FROM `trends_sinomed` WHERE `icd-o-3` = '".$icdo3."'";

		$result= $conn->query($sql);
		
		$res = array();
		if ($result) {
			if($result->num_rows>0){//判断结果集中行的数目是否大于0
				while($row =$result->fetch_array()){
					$res[0] = $row['2006'];
					$res[1] = $row['2007'];
					$res[2] = $row['2008'];		
					$res[3] = $row['2009'];
					$res[4] = $row['2010'];		
					$res[5] = $row['2011'];
					break;
				}
			}
		}else {
			echo "查询失败".$conn->error;
		}
		mysqli_close($conn);
	
		return json_encode($res);
	}
	
	
	//获取具体基本发病数据
	function get_detail_morbidity($icdo3){
		// 连接到数据库
		global $mysql_server_name,$mysql_username,$mysql_password,$mysql_database;
		
   		$conn=new mysqli($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
		$conn->set_charset("utf8");
		
		$sql="select * from morbidity where icd_o_3 like '".$icdo3."%'";
		//echo $sql."<br>";
		
		$json_res = array();
		
		$male = array();
		$female = array();
		$j = 0;
		for($i = 0;$i < 20;$i ++){
			$male[$i] = array("name" => ("男 ".$j."-".($j+4)),"size" => 0);
			$female[$i] = array("name" => ("女 ".$j."-".($j+4)),"size" => 0);
			$j += 5;
		}
		
		$result= $conn->query($sql);
		$ord = 0;
		if ($result) {
			if($result->num_rows>0){//判断结果集中行的数目是否大于0
				while($row =$result->fetch_array() ){//循环输出结果集中的记录
					$tmp = new morbidity();
					$tmp->icd_o_3 = substr($row[1],0,3);
					$tmp->icd_10 = substr($row[2],0,3);
					$tmp->age = $row[5];
					$tmp->sex = $row[6];
					$tmp->birth = $row[7];
					$tmp->incidence = $row[8];				
					
					if($tmp->sex == "1"){
						for($i = 0;$i < 100;$i ++)
							if((int)$tmp->age >= $i*5 && (int)$tmp->age < ($i+1)*5){
								$male[$i]["size"] ++;
							}
					}else{
						for($i = 0;$i < 100;$i ++)
							if((int)$tmp->age >= $i*5 && (int)$tmp->age < ($i+1)*5){
								$female[$i]["size"] ++;
							}
					}

					$json_res[$ord] = $tmp;
					$ord ++;
					//echo json_encode($tmp);
				}
			}
		}else {
			echo "查询失败".$conn->error;
		}
		
		mysqli_close($conn);
	
		$treemap = array();
		$treemap["name"] = "treemap";
		$treemap["children"] = array(array("name"=>"男","children"=>$male),
									 array("name"=>"女","children"=>$female));
		$file=fopen("js/treemap.json","w");
		fwrite($file,json_encode($treemap));
		fclose($file);

		return json_encode($json_res);
	}
?>

