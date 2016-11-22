var data_box = new Array;
for(var i=0; i<6; i++){
  data_box[i] = new Array();
  data_box[i][0] = 2006 + i;
  data_box[i][1] = new Array();
}
for(var i=0;i<data_morbidity.length;i++){
  switch(data_morbidity[i].incidence.substr(0,4)){
    case "2006":
      data_box[0][1].push(data_morbidity[i].age);
      break;
    case "2007":
      data_box[1][1].push(data_morbidity[i].age);
      break;
    case "2008":
      data_box[2][1].push(data_morbidity[i].age);
      break;
    case "2009":
      data_box[3][1].push(data_morbidity[i].age);
      break;
    case "2010":
      data_box[4][1].push(data_morbidity[i].age);
      break;
    case "2011":
      data_box[5][1].push(data_morbidity[i].age);
        break;
  }



}