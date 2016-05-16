<?php
class testimonial extends CI_Controller{
	
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
		$rid=$this->session->userdata("cstone_session_role");
		$data['permission']="";
		$data['title']="Testimonial";
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$view=$per->row()->view;	
			$data['permission']=$per;	
				
		}			
		if($view==0){
			
			$this->load->view("admin/permissionview",$data);
			
		}else{
			
			$data['content']=$this->load->view("admin/testimonial/testimonialview",$data,true);
			$this->load->view("admin/headerbodyview",$data);
			
		}
	}
	
	function gettestimonial(){
		
		$uid=$this->session->userdata("cstone_session_adminid");
		$rid=$this->session->userdata("cstone_session_role");
		
		$c=$this->cstoneadminmodel->gettestimonial();
		$data['testimonial']=$c;
		
		$str=$this->load->view("admin/testimonial/testimonialtblview",$data,true);
		
		$value=array(
			'result'=>$str
		);
		echo json_encode($value);
	}
	
	function addtestimonial(){
			
		$data=array();
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$str=-1;
		
		$cd=$this->cstoneadminmodel->gettestimonialdetails($id);
		$data['testimonialdetail']=$cd;
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}
		if($id!=""){			
			
			if($edit==1){
				$str=$this->load->view("admin/testimonial/addedittestimonialview",$data,true);
			}
		}else{
			if($add==1){
				$str=$this->load->view("admin/testimonial/addedittestimonialview",$data,true);
			}
		}		
		
		$value=array(
			'result'=>$str
		);	
			
		echo json_encode($value);
	}
		
	function testimonialstatus(){
		
		$testimonialId=$this->input->post("id");
		$title=$this->input->post("title");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$q=-1;
		$status=1;
		
		$msg="Testimonial Status Approved";
		
		if($title=="Suspend"){
			
			$status=0;
			$msg="Testimonial Status Rejected";
		}
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}		
			
		if($edit==1){
			
			$data['testimonialId']=$testimonialId;
			$data['status']=$status;
			
			$q=$this->cstoneadminmodel->savetestimonialstatus($data);	
		}			
		$value=array(
			'result'=>$q,
			'msg'=>$msg
		);
		echo json_encode($value);
	}
	
	function savetestimonial(){
		
		$testimonialId=$this->input->post("testimonialId");
		$comments=$this->input->post("comments");
		$commentedBy=$this->input->post("commentedBy");
		
		$data['testimonialId']=$testimonialId;
		$data['comments']=$comments;
		$data['commentedBy']=$commentedBy;
		$data['updatedBy']=$this->session->userdata("cstone_session_adminid");
		$data['updatedDate']=$this->admin->getCustomDate("%Y-%m-%d %H:%i:%s",now());
				
		$result=0;
		
		$cid=$this->cstoneadminmodel->savetestimonial($data);
		
		$result=$cid;
		
		$value=array(
			'result'=>$result
		);	
			
		echo json_encode($value);
	}
	
	function deletetestimonial(){
		
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		
		$del=1;	
		$msg="Testimonial Deleted";
			
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$del=$per->row()->delete;	
		}
		
		$data['status']=-1;
		
		if($del==1){
			
			$q=$this->cstoneadminmodel->deletetestimonial($id,$data);
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