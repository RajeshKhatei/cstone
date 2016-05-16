<?php
class logout extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->admin->nocache();
	}
	
	function index(){
		//$this->session->sess_destroy();
		
		$role=$this->session->userdata("cstone_session_role");
				
		$this->session->unset_userdata('cstone_session_adminid');
		$this->session->unset_userdata('cstone_session_role');
		$this->session->unset_userdata('cstone_session_name');
		
		$this->session->sess_destroy();
		
		/*if($role == '1'){
			redirect(site_url().'admin/login');
		}else if($role == '2'){
			redirect(site_url().'channelpartner/login');
		}*/
		
		redirect(site_url().'admin/login');
	}
}