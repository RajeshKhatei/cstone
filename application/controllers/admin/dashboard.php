<?php
class dashboard extends CI_Controller{
	
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
		$data['title']="Dashboard";
		$data['content']=$this->load->view("admin/dashboardview",$data,true);
		$this->load->view("admin/headerbodyview",$data);
	}
	
}