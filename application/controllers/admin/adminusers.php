<?php
class adminusers extends CI_Controller{
	
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
		
		$uid=$this->session->userdata("cstone_session_adminid");		
		$view=1;
		$rid=$this->session->userdata("provident_session_role");
		$data['permission']="";
		$data['title']="Admin Users";
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,1);
			$view=$per->row()->view;	
			$data['permission']=$per;	
				
		}			
		if($view==0){
			
			$this->load->view("admin/permissionview",$data);
			
		}else{
			
			$data['content']=$this->load->view("admin/admin_users/adminusersview",$data,true);
			$this->load->view("admin/headerbodyview",$data);
			
		}
	}
	
	function getadminusers(){
		
		$uid=$this->session->userdata("cstone_session_adminid");
		$rid=$this->session->userdata("cstone_session_role");
		
		$users=$this->cstoneadminmodel->getadminusers($uid,$rid);
		$data['adminusers']=$users;
		
		$str=$this->load->view("admin/admin_users/adminuserstblview",$data,true);
		
		$value=array(
			'result'=>$str
		);
		echo json_encode($value);
	}
	
	function checkadminusername(){
		
		$name=$this->admin->escapespecialchrs(trim($this->input->post('username')));
		$edit=$this->admin->escapespecialchrs($this->input->post('edit'));
		$q=0;
		
		if(strtolower($edit)!=strtolower($name)){
			
			$query=$this->cstoneadminmodel->checkadminusername($name);
			$q=$query->num_rows();
		}
		$result="true";
		if($q>0){
			$result="false";
		}		
		echo $result;
	}
	
	function checkadminemail(){
		
		$name=$this->admin->escapespecialchrs(trim($this->input->post('email')));
		$edit=$this->admin->escapespecialchrs($this->input->post('edit'));
		$q=0;
		
		if(strtolower($edit)!=strtolower($name)){
			
			$query=$this->cstoneadminmodel->checkadminemail($name);
			$q=$query->num_rows();
		}
		$result="true";
		if($q>0){
			$result="false";
		}		
		echo $result;
	}
	
	function getprofile(){
		
		$uid=$this->session->userdata('cstone_session_adminid');
		$roleid=$this->session->userdata('cstone_session_role');
		$uType=$this->session->userdata('biesse_session_type');
		
		$q=$this->cstoneadminmodel->getprofiledetails($uid,$roleid,$uType);
		
		$data['utype']=$uType;
		$data['profile']=$q;
		
		$str=$this->load->view("admin/admin_users/profileview",$data,true);
		
		$value=array(
			'result'=>$str,
			'type'=>$uType
		);	
			
		echo json_encode($value);
	}
	
	function addadminuser(){
			
		$data=array();
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$str=-1;
		
		$q=$this->cstoneadminmodel->getadminuserdetails($id);
		$data['adminuser']=$q;
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,1);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}
		if($id!=""){			
			
			if($edit==1){
				$str=$this->load->view("admin/admin_users/addeditadminusersview",$data,true);
			}
		}else{
			if($add==1){
				$str=$this->load->view("admin/admin_users/addeditadminusersview",$data,true);
			}
		}		
		
		$value=array(
			'result'=>$str
		);	
			
		echo json_encode($value);
	}
		
	function adminstatus(){
		
		$adminId=$this->input->post("id");
		$title=$this->input->post("title");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$q=-1;
		$status=1;
		
		$msg="Admin user account activated !!!";
		
		if($title=="Suspend"){
			
			$status=0;
			$msg="Admin user account suspended !!!";
		}
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,1);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}		
			
		if($edit==1){
			
			$data['adminId']=$adminId;
			$data['status']=$status;
			
			$q=$this->cstoneadminmodel->saveadminstatus($data);	
		}			
		$value=array(
			'result'=>$q,
			'msg'=>$msg
		);
		echo json_encode($value);
	}
	
	function saveadminuser(){
		
		$adminId=$this->input->post("adminId");
		$fisrtName=$this->input->post("firstName");
		$lastName=$this->input->post("lastName");
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$email=$this->input->post("email");
		$roleId=$this->input->post("roleId");
		
		$data['adminId']=$adminId;
		$data['firstName']=$fisrtName;
		$data['lastName']=$lastName;
		$data['username']=$username;
		$data['email']=$email;
		$data['password']=$password;
		$data['roleId']=$roleId==""?0:$roleId;
		$data['updatedBy']=$this->session->userdata("cstone_session_adminid");
		$data['updatedDate']=$this->admin->getCustomDate("%Y-%m-%d %H:%i:%s",now());
		$result=0;
		
		$result=$this->cstoneadminmodel->saveadminuser($data);
		
		/*if($result>0 && $data['adminId']==""){
			
			$uid=$this->session->userdata("cstone_session_adminid");
			$from='noreply@honeycombindia.net';
			$fromName='Provident';
			$to=$data['email'];
			$cc="";
			$sub="Provident Admin User Registration";
			
			$txt="Hi ".$data['firstName'].",<br/><br/>";
			$txt.="Please use the following details to use Biesse Application<br/><br/>";
			$txt.="Url : http://tagme.honeycombindia.net/admin/login<br/>";
			$txt.="Username : ".$data['username']."<br/>";
			$txt.="Password : ".$data['password']."<br/><br/>";
			$txt.="Thanks,<br/>";
			$txt.="Biesse Application<br/>";
			$this->admin->sendmail($from,$fromName,$to,$cc,$sub,$txt);
		}*/
		$value=array(
			'result'=>$result
		);		
		echo json_encode($value);
	}
	
	function saveprofile(){
		
		$userId=$this->input->post("userId");
		$fisrtName=$this->input->post("firstName");
		$lastName=$this->input->post("lastName");
		$name=$this->input->post("name");
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		
		$type=$this->session->userdata("biesse_session_type");
		
		if($type=="admin"){
			
			$data['adminId']=$userId;
			$data['firstName']=$fisrtName;
			$data['lastName']=$lastName;
			
		}else if($type=="user"){
			
			$data['userId']=$userId;
			$data['name']=$name;
			
		}
		
		$data['username']=$username;
		$data['password']=$password;
		$data['updatedBy']=$this->session->userdata("cstone_session_adminid");
		$data['updatedDate']=$this->admin->getCustomDate("%Y-%m-%d %H:%i:%s",now());
		$result=0;
		
		$result=$this->cstoneadminmodel->saveprofile($data,$type);
		
		$value=array(
			'result'=>$result
		);	
			
		echo json_encode($value);
	}
	
	function deleteadminuser(){
		
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		
		$del=1;	
		$msg="Admin user account deleted !!!";
			
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,1);
			$del=$per->row()->delete;	
		}
		
		$data['status']=-1;
		
		if($del==1){
			
			$q=$this->cstoneadminmodel->deleteadminuser($id,$data);
		}else{
			
			$q=-1;
		}
		
		$value=array(
			'result'=>$q,
			'msg'=>$msg
		);
		
		echo json_encode($value);
	}
}