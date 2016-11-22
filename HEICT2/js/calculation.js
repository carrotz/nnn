var item_mark = new Array(1,1,1);
var str_pre = new Array([],[],['pt','pm','pf'],['dt','dm','df'],['pit','pim','pif']);
var str_he = new Array("","HE-sp","HE-al","HE-cm");
var str_hd_type = new Array("","自评健康比例","失能率","慢性病患病率");
var num_nxt = new Array(0,1,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85);
var check_mark = new Array(0,0,0,0);
var check_str = new Array("人群概况不完整!","人口数据不完整!","死亡数据不完整!","人群健康状况数据不完整!");
var num_input = new Array();
var des_seled;
var i,j,k;
for(i = 0;i < 5;i ++){
	num_input[i] = new Array();
	for(j = 0;j < 3;j ++)
		num_input[i][j] = new Array();
}
//过程变量
var mx = new Array();//死亡率
var qx = new Array();//死亡概率
var lx = new Array();//尚存人数
var nLx = new Array();//生存人年数
var Tx = new Array();//生存总人年
var et = new Array();//期望寿命
var HEnLx = new Array();//健康生存人年
var HETx = new Array();//健康生存总人年
var het = new Array();//健康期望寿命
var perct = new Array();//%
//var num_nxt = new Array('0','1','5','10','15','20','25','30','35','40','45','50','55','60','65','70','75','80','85');


function checked_change(ord){//计算项选择状态改变
	str = "des_ck" + ord;
	
	if(document.getElementById(str).checked){
    	item_mark[ord-1] = 1;
	}else{
		item_mark[ord-1] = 0;
	}
	
	if(item_mark[0] == 0 && item_mark[1] == 0 && item_mark[2] == 0){
		alert("请至少选择一项计算项");
		item_mark[ord-1] = 1;
		document.getElementById(str).checked = true;
	}
	
	for(j = 2;j < 5;j ++){
		for(k = 0;k < 3;k ++){
			for(i = 0;i < 19;i ++){
				str = str_pre[j][k]+num_nxt[i];
				obj = document.getElementById(str);
				if(item_mark[k] == 1){
					obj.disabled = false;
					obj.style.display = "inline";
				}
				else{
					obj.disabled = true;
					obj.style.display = "none";
					obj.value = "";
				}
			}
		}
	}
	
	if(item_mark[0] == 1){
		obj = document.getElementById("pt_bat");
		obj.disabled = false;
		obj.style.display = "inline";
		obj = document.getElementById("dt_bat");
		obj.disabled = false;
		obj.style.display = "inline";
		obj = document.getElementById("pit_bat");
		obj.disabled = false;
		obj.style.display = "inline";
	}else{
		obj = document.getElementById("pt_bat");
		obj.disabled = true;
		obj.style.display = "none";
		obj = document.getElementById("dt_bat");
		obj.disabled = true;
		obj.style.display = "none";
		obj = document.getElementById("pit_bat");
		obj.disabled = true;
		obj.style.display = "none";
	}
	if(item_mark[1] == 1){
		obj = document.getElementById("pm_bat");
		obj.disabled = false;
		obj.style.display = "inline";
		obj = document.getElementById("dm_bat");
		obj.disabled = false;
		obj.style.display = "inline";
		obj = document.getElementById("pim_bat");
		obj.disabled = false;
		obj.style.display = "inline";
	}else{
		obj = document.getElementById("pm_bat");
		obj.disabled = true;
		obj.style.display = "none";
		obj = document.getElementById("dm_bat");
		obj.disabled = true;
		obj.style.display = "none";
		obj = document.getElementById("pim_bat");
		obj.disabled = true;
		obj.style.display = "none";
	}
	if(item_mark[2] == 1){
		obj = document.getElementById("pf_bat");
		obj.disabled = false;
		obj.style.display = "inline";
		obj = document.getElementById("df_bat");
		obj.disabled = false;
		obj.style.display = "inline";
		obj = document.getElementById("pif_bat");
		obj.disabled = false;
		obj.style.display = "inline";
	}else{
		obj = document.getElementById("pf_bat");
		obj.disabled = true;
		obj.style.display = "none";
		obj = document.getElementById("df_bat");
		obj.disabled = true;
		obj.style.display = "none";
		obj = document.getElementById("pif_bat");
		obj.disabled = true;
		obj.style.display = "none";
	}
}

function nav_left_action(ord){//左导航动作
	var str;
	var obj;
	if(ord == 5){
		res_clicked();
	}else{
		for(var i = 1;i < 6;i ++){
			str = "nav_left_"+i;
			obj = document.getElementById(str);
			obj.classList.remove('nav_left_current');
			
			str = "right_"+i;
			obj = document.getElementById(str);
			obj.style.display = "none";
		}
		
		str = "nav_left_"+ord;
		obj = document.getElementById(str);
		obj.classList.add('nav_left_current');
		
		str = "right_"+ord;
		obj = document.getElementById(str);
		obj.style.display = "block";
	}
	
	
	bat_mark = 0;
}

function bat_go_action(ord){//进入批量填写
	var str;
	var obj;
	
	str = "bat"+ord;
	obj = document.getElementById(str);
	obj.style.display = "block";
	
	str = "table"+ord;
	obj = document.getElementById(str);
	obj.style.display = "none";
	
	str = "btn"+ord;
	obj = document.getElementById(str);
	obj.style.display = "none";
	str = "btn"+ord+"_up";
	obj = document.getElementById(str);
	obj.style.display = "none";
	
	str = "btn_bat"+ord;
	obj = document.getElementById(str);
	obj.style.display = "block";	
	str = "btn_bat"+ord+"_up";
	obj = document.getElementById(str);
	obj.style.display = "block";
}

function bat_do_action(ord){//完成批量填写
	var str;
	var obj;
	
	str = "table"+ord;
	obj = document.getElementById(str);
	obj.style.display = "block";
	
	str = "bat"+ord;
	obj = document.getElementById(str);
	obj.style.display = "none";
	
	str = "btn_bat"+ord;
	obj = document.getElementById(str);
	obj.style.display = "none";
	str = "btn_bat"+ord+"_up";
	obj = document.getElementById(str);
	obj.style.display = "none";
	
	str = "btn"+ord;
	obj = document.getElementById(str);
	obj.style.display = "block";
	str = "btn"+ord+"_up";
	obj = document.getElementById(str);
	obj.style.display = "block";
		
	
	//批量数据导入表格
	var str_bat,i,j,k;
	for(k = 0;k < 3;k ++)
		if(item_mark[k] == 1){
			str = str_pre[ord][k]+"_bat";
			obj = document.getElementById(str);
			str_bat = obj.value;
			var tmp = new Array();
			tmp = str_bat.split('\n'); 
			
			str = str_pre[ord][k]+"0";
			obj = document.getElementById(str);
			obj.value = tmp[0];
			
			str = str_pre[ord][k]+"1";
			obj = document.getElementById(str);
			obj.value = tmp[1];
			j = 5;
			for(i = 2;i < 19;i ++){
				str = str_pre[ord][k]+j;
				obj = document.getElementById(str);
				obj.value = tmp[i];
				j += 5;
		}
	}
	
}

function clr_action(ord){//重置按钮动作
	var str;
	var obj;
	
	str = "table"+ord;
	obj = document.getElementById(str);
	obj.style.display = "block";
	
	str = "bat"+ord;
	obj = document.getElementById(str);
	obj.style.display = "none";
	
	str = "btn_bat"+ord;
	obj = document.getElementById(str);
	obj.style.display = "none";
	str = "btn_bat"+ord+"_up";
	obj = document.getElementById(str);
	obj.style.display = "none";
	
	str = "btn"+ord;
	obj = document.getElementById(str);
	obj.style.display = "block";	
	str = "btn"+ord+"_up";
	obj = document.getElementById(str);
	obj.style.display = "block";	
	
	if(ord == 2){
		for(var i = 0;i <= 85;i += 5){
			str = "pt"+i;
			obj = document.getElementById(str);
			obj.value = "";
			str = "pm"+i;
			obj = document.getElementById(str);
			obj.value = "";
			str = "pf"+i;
			obj = document.getElementById(str);
			obj.value = "";
		}
		obj = document.getElementById("pt1");
		obj.value = "";
		obj = document.getElementById("pm1");
		obj.value = "";
		obj = document.getElementById("pf1");
		obj.value = "";
		obj = document.getElementById("pt_bat");
		obj.value = "";
		obj = document.getElementById("pm_bat");
		obj.value = "";
		obj = document.getElementById("pf_bat");
		obj.value = "";
	}else if(ord == 3){
		for(var i = 0;i <= 85;i += 5){
			str = "dt"+i;
			obj = document.getElementById(str);
			obj.value = "";
			str = "dm"+i;
			obj = document.getElementById(str);
			obj.value = "";
			str = "df"+i;
			obj = document.getElementById(str);
			obj.value = "";
		}
		obj = document.getElementById("dt1");
		obj.value = "";
		obj = document.getElementById("dm1");
		obj.value = "";
		obj = document.getElementById("df1");
		obj.value = "";
		obj = document.getElementById("dt_bat");
		obj.value = "";
		obj = document.getElementById("dm_bat");
		obj.value = "";
		obj = document.getElementById("df_bat");
		obj.value = "";
	}else if(ord == 4){
		for(var i = 0;i <= 85;i += 5){
			str = "pit"+i;
			obj = document.getElementById(str);
			obj.value = "";
			str = "pim"+i;
			obj = document.getElementById(str);
			obj.value = "";
			str = "pif"+i;
			obj = document.getElementById(str);
			obj.value = "";
		}
		obj = document.getElementById("pit1");
		obj.value = "";
		obj = document.getElementById("pim1");
		obj.value = "";
		obj = document.getElementById("pif1");
		obj.value = "";
		obj = document.getElementById("pit_bat");
		obj.value = "";
		obj = document.getElementById("pim_bat");
		obj.value = "";
		obj = document.getElementById("pif_bat");
		obj.value = "";
	}
}

function all_check(){//检测填写完整性
	var obj,i,j,k,str;
	check_mark[0] = check_mark[1] = check_mark[2] = check_mark[3] = 0;
	obj = document.getElementById("des_year");
	if(obj.value == ""){
		check_mark[0] = 1;
		//return 0;
	}
	obj = document.getElementById("des_country");
	if(obj.value == ""){
		check_mark[0] = 1;
		//return 0;
	}
	obj = document.getElementById("des_region");
	if(obj.value == ""){
		check_mark[0] = 1;
		//return 0;
	}
	obj = document.getElementById("des_district");
	if(obj.value == ""){
		check_mark[0] = 1;
		//return 0;
	}
	
	for(j = 2;j < 5;j ++){
		for(k = 0;k < 3;k ++)
			if(item_mark[k] == 1){
				for(i = 0;i < 19;i ++){
					str = str_pre[j][k]+num_nxt[i];
					obj = document.getElementById(str);
					if(obj.value == ""){
						check_mark[j-1] = 1;
						break;
					}
					else
						num_input[j][k][i] = obj.value*1.0;
				}
		}
	}
	
	for(i = 0;i < 4;i ++)
		if(check_mark[i])
			return 0;
	
	return 1;
}

function HD_clicked(){//进入人群健康状况数据
	obj = document.getElementById("des_sel");
	des_seled = obj.value;
	
	obj = document.getElementById("HD_type");
	obj.innerHTML = str_hd_type[parseInt(des_seled)];
}

function main_count(){//核心计算函数
	var i,j,k,obj,str;
	
	obj = document.getElementById("des_sel");
	des_seled = obj.value;
	
	for(k = 0;k < 3;k ++)
		if(item_mark[k] == 1){
			qx[0] = mx[0] = num_input[3][k][0] / num_input[2][k][0];
			lx[0] = 100000.0;
			mx[1] = num_input[3][k][1] / num_input[2][k][1];
			qx[1] = 4.0 * mx[1] / (1.0 + (1.0 - 0.5) * 4.0 * mx[1]);
			lx[1] = lx[0] * (1.0 - qx[0]);
			for(i = 2;i < 18;i ++){
				mx[i] = num_input[3][k][i] / num_input[2][k][i];
				qx[i] = 5.0 * mx[i] / ( 1.0 + (1.0 - 0.5) * 5.0 * mx[i]);
				lx[i] = lx[i-1] * (1.0 - qx[i-1]);
			}
			mx[18] = num_input[3][k][18] / num_input[2][k][18];
			qx[18] = 10.0 * mx[18] / (1.0 + (1.0 - 0.5) * 10.0 * mx[18]);
			lx[18] = lx[17] * (1.0 - qx[17]);
			
			nLx[0] = 0.2*lx[0]+0.8*lx[1];
			nLx[1] = (0.5*lx[1]+(1.0-0.5)*lx[2])*4.0;
			for(i = 2;i < 18;i ++)
				nLx[i] = (0.5*lx[i]+(1.0-0.5)*lx[i+1])*5.0;
			Tx[18] = nLx[18] = lx[18]/mx[18];
			for(i = 17;i >= 0;i --)
				Tx[i] = Tx[i+1]+nLx[i];
			
			for(i = 0;i < 19;i ++){
				et[i]=Tx[i]/lx[i];
				if(des_seled == 1)
					HEnLx[i] = num_input[4][k][i] * nLx[i];
				else
					HEnLx[i] = (1.0 - num_input[4][k][i]) * nLx[i];
			}
			
			HETx[18]=HEnLx[18];
			for(i = 17;i >= 0;i --)
				HETx[i] = HETx[i+1] + HEnLx[i];
	
			for(i = 0;i < 19;i ++){
				het[i] = HETx[i] / lx[i];
				perct[i] = het[i] / et[i] * 100.0;
			}
	
			//写入表格
			for(i = 0;i < 19;i ++){
				str = "e"+k+i;
				obj = document.getElementById(str);
				obj.innerHTML = et[i].toFixed(2);
				
				str = "h"+k+i;
				obj = document.getElementById(str);
				obj.innerHTML = het[i].toFixed(2);
			
				str = "perc"+k+i;
				obj = document.getElementById(str);
				obj.innerHTML = perct[i].toFixed(2);
			}
	}
}

function res_clicked(){//进入指标结果页面
	var des_year,des_area,des_sel;
	
	if(all_check() == 1){
		for(var i = 1;i < 6;i ++){
			str = "nav_left_"+i;
			obj = document.getElementById(str);
			obj.classList.remove('nav_left_current');
			
			str = "right_"+i;
			obj = document.getElementById(str);
			obj.style.display = "none";
		}
		obj = document.getElementById("nav_left_5");
		obj.classList.add('nav_left_current');
		obj = document.getElementById("right_5");
		obj.style.display = "block";
		
		obj = document.getElementById("des_year");
		des_year = obj.value;
		obj = document.getElementById("res_year");
		obj.innerHTML = des_year;
		
		obj = document.getElementById("des_country");
		des_country = obj.value;
		obj = document.getElementById("res_country");
		obj.innerHTML = des_country;
		
		obj = document.getElementById("des_region");
		des_region = obj.value;
		obj = document.getElementById("res_region");
		obj.innerHTML = des_region;
		
		obj = document.getElementById("des_district");
		des_district = obj.value;
		obj = document.getElementById("res_district");
		obj.innerHTML = des_district;
		
		main_count();//计算
		
		obj = document.getElementById("he_unit");
		obj.innerHTML = str_he[parseInt(des_seled)] + "<sub>x</sub>";
		
	}else{
		str = "请填写完整基本信息与各项数据内容:";
		for(i = 0;i < 4;i ++)
			if(check_mark[i] == 1){
				str =str + "\n" + check_str[i];
			}
		alert(str);
	}
	
}