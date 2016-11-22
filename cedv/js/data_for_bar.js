var data_sex = new Array();
for(var i=0;i<6;i++){
  data_sex[i] = new Object();
  data_sex[i].year=2006 + i;
  data_sex[i].male=0;
  data_sex[i].female=0;
  data_sex[i].num=0;
}


function push_toData_sex(i,j){
  data_sex[i].num++;
  if(data_morbidity[j].sex == 1){
    data_sex[i].male++;
  }
  if(data_morbidity[j].sex == 2){
    data_sex[i].female--;
  }
}

for(var i=0;i<data_morbidity.length;i++){
  switch(data_morbidity[i].incidence.substr(0,4)){
    case "2006":
      push_toData_sex(0,i);
    case "2007":
      push_toData_sex(1,i);
    case "2008":
      push_toData_sex(2,i);
    case "2009":
      push_toData_sex(3,i);
    case "2010":
      push_toData_sex(4,i);
    case "2011":
      push_toData_sex(5,i);
  }
}
//console.log(data_sex);
var data_bar = new Array();
for(var i=0;i<6;i++){
  data_bar[i] = new Object();
  data_bar[i].name = 2006 +i;
  data_bar[i].value = data_sex[i].num?data_sex[i].male/data_sex[i].num:0;
  var j = i+6;
  data_bar[j] =new Object();
  data_bar[j].name = 2006 +i;
  data_bar[j].value = data_sex[i].num?data_sex[i].female/data_sex[i].num:0;
}
//console.log(data_bar);
/*
for(var i=0;i<6;i++){
  data1[i].value = data1[i].value/data_sex[i].num;
  var j = i+6;
  data1[j].value = data1[j].value/data_sex[i].num;
}*/