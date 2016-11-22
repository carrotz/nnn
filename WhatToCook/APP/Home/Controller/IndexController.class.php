<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class IndexController extends Controller {
    public function index(){
		$database = M('type');
		$tmp = M('recipe');
		
		$level1 = array();
		$level2 = array();
		
		$re = $database->where('fatherid = 0')->select();
		
		foreach($re as $i){
			
			
            $level1[$i['id']] = $i['name'];
            $where2['fatherid'] = $i['id'];
            $re2 = $database->where($where2)->select();
            $level2[$i['id']] = array();
            foreach($re2 as $j){
                $level2[$i['id']][$j['id']] = $j['name'];/*
				$data['recipe_fid'] = $i['id'];
				$where['recipe_id'] = $j['id'];
				$tmp->where($where)->data($data)->save();*/
            }
        }
		
		
		$this->assign('level1',$level1);
        $this->assign('level2',json_encode($level2));
		
        $this->display();
    }
	
	public function recipeDetail(){
		$database = M('recipe');
		$db_type = M('type');
		
		$where = "";
		if($_POST['classification2'] != "")
			$where .= 'recipe_id = '.$_POST['classification2'];
		else if($_POST['classification1'] != "")
			$where .= 'recipe_fid = '.$_POST['classification1'];
		
		if($_POST['tags1'] != ""){
			$tags1 = explode(',',$_POST['tags1']);
			foreach($tags1 as $i){
				if($where != "")
					$where .= ' and ';
				$where .= " (flavour like '%".$i."%' or material like  '%".$i."%') ";
			}
		}
		if($_POST['tags2'] != ""){
			$tags2 = explode(',',$_POST['tags2']);
			foreach($tags2 as $i){
				if($where != "")
					$where .= ' and ';
				$where .= " (flavour not like '%".$i."%' and material not like  '%".$i."%') ";
			}
		}
		
		$re = $database->where($where)->select();
		
		$len = count($re);
		if($len > 0){
            $sel = rand(0,$len-1);

            $re1 = $db_type->where('id = '.$re[$sel]['recipe_fid'])->find();
            $this->assign('class1',$re1['name']);
            $re2 = $db_type->where('id = '.$re[$sel]['recipe_id'])->find();
            $this->assign('class2',$re2['name']);

            $this->assign('recipe_name',$re[$sel]['recipe_name']);
            $this->assign('found','1');
            $this->assign('sel',json_encode($re[$sel]));
            $this->display();
        }else{
            $this->assign('sel','0');
            $this->assign('found','0');
            $this->display();
        }
	}
}