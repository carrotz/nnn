var data_line = new Array();
//初始化对象
for(var i=0;i<6;i++){
  data_line[i] = new Object();
  data_line[i].date=2006 + i;
  data_line[i].num=0;
}

for(var i=0;i<data_morbidity.length;i++){
  switch(data_morbidity[i].incidence.substr(0,4)){
    case "2006":
      data_line[0].num++;
    case "2007":
      data_line[1].num++;
    case "2008":
      data_line[2].num++;
    case "2009":
      data_line[3].num++;
    case "2010":
      data_line[4].num++;
    case "2011":
      data_line[5].num++;
  }
}
//console.log(data_line);