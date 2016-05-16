<?php
class events extends CI_Controller{
	
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
		$data['title']="Events";
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,4);
			$view=$per->row()->view;	
			$data['permission']=$per;	
				
		}			
		if($view==0){
			
			$this->load->view("admin/permissionview",$data);
			
		}else{
			
			$data['content']=$this->load->view("admin/events/eventsview",$data,true);
			$this->load->view("admin/headerbodyview",$data);
			
		}
	}
	
	function getevents(){
		
		$uid=$this->session->userdata("cstone_session_adminid");
		$rid=$this->session->userdata("cstone_session_role");
		
		$c=$this->cstoneadminmodel->getevents();
		$data['events']=$c;
		
		$str=$this->load->view("admin/events/eventstblview",$data,true);
		
		$value=array(
			'result'=>$str
		);
		echo json_encode($value);
	}
	
	function addevents(){
			
		$data=array();
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$str=-1;
		
		$cd=$this->cstoneadminmodel->geteventsdetails($id);
		$data['eventsdetail']=$cd;
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,4);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}
		if($id!=""){			
			
			if($edit==1){
				$str=$this->load->view("admin/events/addediteventsview",$data,true);
			}
		}else{
			if($add==1){
				$str=$this->load->view("admin/events/addediteventsview",$data,true);
			}
		}		
		
		$value=array(
			'result'=>$str
		);	
			
		echo json_encode($value);
	}
		
	function eventsstatus(){
		
		$eventsId=$this->input->post("id");
		$title=$this->input->post("title");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$q=-1;
		$status=1;
		
		$msg="Events status approved";
		
		if($title=="Suspend"){
			
			$status=0;
			$msg="Events status rejected";
		}
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,4);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}		
			
		if($edit==1){
			
			$data['eventsId']=$eventsId;
			$data['status']=$status;
			
			$q=$this->cstoneadminmodel->saveeventsstatus($data);	
		}			
		$value=array(
			'result'=>$q,
			'msg'=>$msg
		);
		echo json_encode($value);
	}
	
	function saveevents(){
		
		$eventsId=$this->input->post("eventsId");
		$eventName=$this->input->post("eventName");
		$eventDesciption=$this->input->post("eventDesciption");
		
		
		$result=0;
		
		$data['eventsId']=$eventsId;
		$data['eventName']=$eventName;
		$data['eventDesciption']=$eventDesciption;
		$data['updatedBy']=$this->session->userdata("cstone_session_adminid");
		$data['updatedDate']=$this->admin->getCustomDate("%Y-%m-%d %H:%i:%s",now());
						
		$cid=$this->cstoneadminmodel->saveevents($data);
		
		$result=$cid;
		
		$value=array(
			'result'=>$result
		);	
			
		echo json_encode($value);
	}
	
	function deleteevents(){
		
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		
		$del=1;	
		$msg="Events deleted";
			
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,4);
			$del=$per->row()->delete;	
		}
		
		$data['status']=-1;
		
		if($del==1){
			
			$q=$this->cstoneadminmodel->deleteevents($id,$data);
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