<?php
class roles extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->admin->nocache();
		$this->load->model("cstoneadminmodel","",true);
		if($this->session->userdata('cstone_session_adminid')==null){ // Function to check Session is set or not	
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest')
			{
				$value=array(
					'session'=>'false'
				);			
				echo json_encode($value);
				exit();
			}else{
				redirect('admin/login');
			}
		}
		$this->admin->nocache(); 
	}
	
	function index(){
		
		$view=1;
		$rid=$this->session->userdata("biesse_session_roleid");
		$data['permission']="";
		$data['title']="Roles";
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,2);
			$view=$per->row()->view;	
			$data['permission']=$per;		
		}	
			
		$roles=$this->cstoneadminmodel->getroles();
		$data['roles']=$roles;
		
		if($view==0){
			
			$this->load->view("admin/permissionview",$data);
			
		}else{
			
			$data['roles']=$roles;
			$data['content']=$this->load->view("admin/admin_users/adminrolesview",$data,true);
			$this->load->view("admin/headerbodyview",$data);
		}
	}
	
	function getroles(){
		
		$roles=$this->cstoneadminmodel->getroles();
		$data['roles']=$roles;
		
		$str=$this->load->view("admin/admin_users/adminrolestblview",$data,true);
		
		$value=array(
			'result'=>$str
		);
		echo json_encode($value);
	}
	
	
	function addrole(){	
	
		$data=array();
		$rid=$this->session->userdata("biesse_session_roleid");
		$id=$this->input->post("id");
		$add=1;
		$edit=1;
		$str=-1;
		
		if($rid!=0){
			$per=$this->cstoneadminmodel->getpermission($rid,2);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}
		
		$data['modules']=$this->cstoneadminmodel->getrolepermission($id);
		$q=$this->cstoneadminmodel->getroledetails($id);
		$data['role']=$q;
		
		if($id!=""){
			if($edit==1){
				
				$str=$this->load->view("admin/admin_users/addeditrolesview",$data,true);
			}
		}else{
			if($add==1){
				
				$str=$this->load->view("admin/admin_users/addeditrolesview",$data,true);
			}
		}
		
		$value=array(
			'result'=>$str
		);
		
		echo json_encode($value);
	}
	
	function delrole(){
		
		$id=$this->input->post("id");
		$rid=$this->session->userdata("biesse_session_roleid");
		$del=1;	
		$msg="Role Deleted!!!";	
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,2);
			$del=$per->row()->delete;	
		}
		
		$data['status']=-1;
		if($del==1){
			
			$q=$this->cstoneadminmodel->delrole($id,$data);
		}else{
			
			$q=-1;
		}
		$value=array(
			'result'=>$q,
			'msg'=>$msg
		);
		echo json_encode($value);
	}
	
	function checkrolename(){
		
		$name=$this->admin->escapespecialchrs(trim($this->input->post('roleName')));
		$edit=$this->admin->escapespecialchrs($this->input->post('edit'));
		$q=0;
		
		if(strtolower($edit)!=strtolower($name)){
			$query=$this->cstoneadminmodel->checkrolename($name);
			$q=$query->num_rows();
		}
		
		$result="true";
		if($q>0){
			$result="false";
		}		
		echo $result;
	}
	
	function saverole(){
		
		$a=$this->input->post();
		$roleId=$a['roleId'];
		$roleName=$a['roleName'];
		$permissionId="";
		$data1=array(
			'roleId'=>$roleId,
			'roleName'=>$roleName,
			'status'=>1
		);
		
		$roleId=$this->cstoneadminmodel->saverole($data1);
		$moduleIdarr=array();
		
		foreach ($a as $k=>$v){
			$arr=explode("_",$k);
			$moduleId=isset($arr[1])?$arr[1]:"";
			if(!in_array($moduleId, $moduleIdarr)){
				$moduleIdarr[]=$moduleId;
			}
		}
		
		$data=array(
			'roleId'=>$roleId,
			'view'=>0,
			'add'=>0,
			'edit'=>0,
			'delete'=>0,
			'status'=>1
		);
		$this->cstoneadminmodel->resetpermission($data);
		
		foreach ($moduleIdarr as $v){
			if($v!=""){
				$data2['roleId']=$roleId;
				$data2['permissionId']='';
				$data2['moduleId']=$v;
				$data2['view']=isset($a['view_'.$v])?1:0;
				$data2['add']=isset($a['add_'.$v])?1:0;
				$data2['edit']=isset($a['edit_'.$v])?1:0;
				$data2['delete']=isset($a['delete_'.$v])?1:0;
				$data2['status']=1;
				$q=$this->cstoneadminmodel->savepermission($data2);
			}
		}
		$value=array(
			'result'=>1
		);
		echo json_encode($value);
		
	}
}