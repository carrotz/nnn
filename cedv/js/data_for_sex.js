var data_male = new Array();
var data_female = new Array();

var i=0;
var m_count=0;
var f_count=0;
data_tumor.forEach(function(d){
  data_male[i] = new Object();
  data_male[i].cname = d.cname;
  data_male[i].icd_o_3 = d.icd_o_3;
  data_male[i].count = 0;

  data_female[i] = new Object();
  data_female[i].cname = d.cname;
  data_female[i].icd_o_3 = d.icd_o_3;
  data_female[i].count = 0;
  data_morbidity.forEach(function(p){
    if(p.icd_o_3 == d.icd_o_3){
      if(p.sex == 1){
        data_male[i].count ++;
        m_count++;
      }
      if(p.sex == 2){
        data_female[i].count ++;
        f_count++;
      }
    }
  });
  i++;
});

//排序
//data_topArray.sort(function(x,y){return y.count - x.count});
data_male.sort(function(x,y){return y.count - x.count});
data_female.sort(function(x,y){return y.count - x.count});

//取前10
var data_male10 = data_male.slice(0,10);
var data_female10 = data_female.slice(0,10);

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
//化所占百分比
data_male10.forEach(function(d){
  d.count = changeTwoDecimal_f(d.count/m_count*100);
});
data_female10.forEach(function(d){
  d.count = changeTwoDecimal_f(d.count/m_count*100);
});