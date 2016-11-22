
    //处理数据js-pie
    var data_topArray = new Array();
    var all_number = 0;
    for(var i=0;i<data_tumor.length ;i++){
    	data_topArray[i] = new Object();
    	data_topArray[i].icd_o_3 = data_tumor[i].icd_o_3;
    	data_topArray[i].cname = data_tumor[i].cname;
   	 	data_topArray[i].count = 0;

 	   	for(var j = 0;j<data_morbidity.length;j++){
    		if(data_tumor[i].icd_o_3 == data_morbidity[j].icd_o_3.substr(0,3))
    			data_topArray[i].count ++;					//发病人数
    	}
    }

    //排序
   	data_topArray.sort(function(x,y){return y.count - x.count});

   	var data = new Array();

   	for(var i=0;i<data_topArray.length;i++){
   		all_number = all_number + data_topArray[i].count;
   		if(i<=9){
   			data[i] = new Object();
   			data[i].icd_o_3 = data_topArray[i].icd_o_3;
   			data[i].cname = data_topArray[i].cname;
   			data[i].count = data_topArray[i].count;
   		} else {
   			//console.log(data[9].count);
   			data[9].icd_o_3 = "other";
   			data[9].cname = "其他";
   			//console.log(data[9].count);
   			//data[9].count = data[9].count;
   			data[9].count = Number(data[9].count) + Number(data_topArray[i].count);
   			//console.log(data_topArray[i].count);
   		}
   	}
   	//console.log(all_number);