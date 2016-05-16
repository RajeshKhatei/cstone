<?php
class login extends  CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->admin->nocache();
		$this->load->model("cstoneadminmodel","",true);
		if($this->session->userdata('cstone_session_adminid')!=null){ // Function to check Session is set or not			
				redirect('admin/dashboard');			
		} 
	}
	
	function index(){
		$this->load->view("admin/loginview");
	}
	
	function auth(){
		$username=$this->input->post("username");
		$password=$this->input->post("password");
		$data['username']=$username;
		$data['password']=$password;
		
		$q=$this->cstoneadminmodel->auth($data);
		$result=0;
		$status=0;
		if($q->num_rows()>0){
			$result=$q->row()->status==0?-1:1;
			if($result==1){
								
				$userdata=array(
					'cstone_session_adminid'=>$q->row()->adminId,
					'cstone_session_role'=>$q->row()->roleId,
					'cstone_session_name'=>$q->row()->firstName ." ". $q->row()->lastName
				);
				$this->session->set_userdata($userdata);
			}
		}
		$data['result']=$result;
		$res=$this->load->view('admin/loginmsgview',$data,true);
		$value=array(
			'result'=>$result,
			'view'=>$res
		);
		echo json_encode($value);
	}
	
	function resetpwd(){
		$email=$this->input->post("email");
		$q=$this->cstoneadminmodel->checkadminemail($email);
		$result=0;
		$pwd="";
		if($q->num_rows()>0){
			$result=1;
		}
		if($result==1){	
			$pwd=uniqid();
			$from='info@cstone.org';
			$fromName='cstone';
			$to=$email;
			$cc="";
			$sub="Admin User Forgot Password";
			
			$txt="Dear ".$q->row()->firstName.",<br><br>";
			$txt.="Your new password : ".$pwd ."<br><br>";
			$txt.="Thanks,<br/>";
			$txt.="cstone Team<br/>";
			if(!$this->admin->sendmailforgotpwd($from,$fromName,$to,$cc,$sub,$txt)){	
				$result=-1;
			}else{
				$data['email']=$email;
				$data['password']=$pwd;
				$rq=$this->cstoneadminmodel->resetpwd($data);
			}	
		}
		$data['result']=$result;
		$res=$this->load->view('admin/forgotpwdmsgview',$data,true);
		$value=array(
			'result'=>$result,
			'view'=>$res
		);
		echo json_encode($value);
	}
}