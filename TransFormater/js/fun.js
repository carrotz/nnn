var arr = new Array();
var str1 = new Array();
var str2 = new Array();
var len = 0;
var front1,back1,front2,back2;




function part1_ans(){
    var tmp = $('#text1').val();
    arr = tmp.split('\n');
    for(i = 0;i < arr.length;i ++)
        arr[i] = arr[i].replace(/(^\s+)|(\s+$)/g,"");
    
    var del_front_1 = $('#del_front_1').val();
    var line = 0;
    var space_par = $('#space_par').val();
   
    
    
    str1 = new Array();
    str2 = new Array();
    len = 0;
    var len1 = 0;
    var len2 = 0;
    

    //按行分解
    if($('input[name="stRadioOptions"]:checked').val() == 1){

        for(i = 0;i < arr.length;i ++){
            if(arr[i] == ""){
                j = 0;
                while(j < space_par){
                    if(arr[i+j] != "")
                        break;
                    j ++;
                }
                //alert(j+"  "+space_par);
                if(j == space_par){
                    str1[len] = str2[len] = "";
                    len ++;
                }
            }
            else if(line == 0){
                str1[len] = arr[i];
                line = 1;
            }
            else if(line == 1){
                str2[len] = arr[i]
                line = 0;
                len ++;
            }
        }
    }
    
    //按段分解
    if($('input[name="stRadioOptions"]:checked').val() == 2){
        var lan_mark = 0;
        
        for(i = 0;i < arr.length;i ++){
            if(arr[i] == ""){
                j = 0;
                while(j < space_par){
                    if(arr[i+j] != "")
                        break;
                    j ++;
                }
                
                if(j == space_par){
                    if(lan_mark == 0){
                        str1[len1] = arr[i];
                        len1 ++;
                    }
                    else if(lan_mark == 1){
                        str2[len2] = arr[i]
                        len2 ++;
                    }
                    lan_mark = (lan_mark+1)%2;
                }
            }
            else if(lan_mark == 0){
                str1[len1] = arr[i];
                len1 ++;
            }
            else if(lan_mark == 1){
                str2[len2] = arr[i]
                len2 ++;
            }
        }
        
        len = len1 < len2 ? len1 : len2;
    }
    
    //去除前后字符
    front1 = "/^"+$('#del_front_1').val()+"/g";
    back1 = "/"+$('#del_back_1').val()+"$/g";
    front2 = '/^'+$('#del_front_2').val()+'/g';
    back2 = "/"+$('#del_back_2').val()+"$/g";
    for(i = 0;i < len;i ++){
        str1[i] = str1[i].replace(eval(front1),"");
        str1[i] = str1[i].replace(eval(back1),"");
        str2[i] = str2[i].replace(eval(front2),"");
        str2[i] = str2[i].replace(eval(back2),"");
    }
    
    part2_print();
}

function part2_print(){
    
    
    //添加前后字符
    for(i = 0;i < len;i ++){
        if(str1[i] != "")
            str1[i] = $('#add_front_1').val() + str1[i] + $('#add_back_1').val();
        if(str2[i] != "")
            str2[i] = $('#add_front_2').val() + str2[i] + $('#add_back_2').val();
    }
    
    var res = "";
    
    var line_space = "\n";
    for(j = 0;j < $('#ed_space_line').val();j ++)
        line_space += "\n";
    var par_space = "";
    for(j = 0;j < $('#ed_space_par').val();j ++)
        par_space += "\n";
    
    //按行分割
    if($('input[name="edRadioOptions"]:checked').val() == 1){
        for(i = 0;i < len;i ++){
            if(str1[i] != ""){
                res += str1[i] + line_space;
                res += str2[i] + line_space;
            }
            else{
                res += par_space;
            }
        }
    }
    
    //按段分割
    if($('input[name="edRadioOptions"]:checked').val() == 2){
        i = j = 0;
        
        while(i < len){
            if(str1[i] != ""){
                res += str1[i] + line_space;
            }
            else{    
                res += par_space;
                while(j <= i){
                    if(str2[j] != "")
                        res += str2[j] + line_space;
                    else 
                        res += par_space;
                    j ++;
                }
                
                
            }
            i ++;
        }
    }
    
    //全文分割
    if($('input[name="edRadioOptions"]:checked').val() == 3){
        for(i = 0;i < len;i ++)
            res += str1[i] + line_space;
        res += $('#ed_split_mark').val() + line_space;
        for(i = 0;i < len;i ++)
            res += str2[i] + line_space;
    }

    //一行内分割
    if($('input[name="edRadioOptions"]:checked').val() == 4){
        for(i = 0;i < len;i ++){
            if(str1[i] != ""){
                res +=  str1[i] + " " +$('#ed_split_mark').val() 
                        + " " + str2[i] + line_space;
            }
            else{
                res += par_space;
            }
        }
    }

    
    $('#text2').val(res);
        
}

//开始转换
$(".btn_start").click(function(){
    //alert($('input[name="edRadioOptions"]:checked').val());
    
    part1_ans();
    
    
    var spliter = "\n";
});

//还原默认设置
$(".btn_reset").click(function(){
    
});
                      
//清空原文
$(".btn_clean1").click(function(){
    $('#text1').val("");
});

//清空结果
$(".btn_clean2").click(function(){
    $('#text2').val("");
});
