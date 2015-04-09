<?php
namespace Marvel\Controller;
use Think\Controller;
class SystemController extends Controller {
    public function index(){
		$this->display();
    }
    
    public function show(){
    	if(!session('admin')) $this->redirect('index');
    	$this->display();
    }
    
    public function login(){
    	$cdt=$_POST;
    	$cdt['password']=md5($cdt['password']);
    	$r=M('admin')->where($cdt)->find();
    	if($r){
    		session('admin',$r['username']);
    		echo 1;
    	}else{
    		echo 0;
    	}
    }
    
    public function getRanking(){
    	$cdt['createDate']= array('egt',$_POST['startTime']);
    	$r=M('user')->where($cdt)->order('score desc,createDate asc')->limit(20)->select();
    	for($i=0;$i<count($r);$i++){
    		$r[$i]['phone']=substr_replace($r[$i]['phone'],'****',3,4);
    	}
    	$this->ajaxReturn($r,'json');
    }
    
    protected  function add(){
    	$data['username']="admin";
    	$data['password']=md5('111111');
    	M('admin')->add($data);
    }
    
}