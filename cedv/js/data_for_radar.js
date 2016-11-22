   	var data_radar = new Array();

   	for(var i=0;i<data_topArray.length;i++){
   		all_number = all_number + data_topArray[i].count;
   		if(i<=9){
   			data_radar[i] = new Object();
   			data_radar[i].icd_o_3 = data_topArray[i].icd_o_3;
   			data_radar[i].cname = data_topArray[i].cname;
   			data_radar[i].count = data_topArray[i].count;
   		}
   	}
    //数组元素打乱
function arrChange(i,j){
    var tmp = new Object();
    tmp.icd_o_3 = data_topArray[i].icd_o_3;
    tmp.cname = data_topArray[i].cname;
    tmp.count = data_topArray[i].count;
    data_radar[i].icd_o_3 = data_radar[j].icd_o_3;
    data_radar[i].cname = data_radar[j].cname;
    data_radar[i].count = data_radar[j].count;
    data_radar[j].icd_o_3 = tmp.icd_o_3;
    data_radar[j].cname = tmp.cname;
    data_radar[j].count = tmp.count;
}
arrChange(2,5);
//arrChange(4,8);