<?php
class product extends CI_Controller{
	
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
		$data['title']="Product";
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$view=$per->row()->view;	
			$data['permission']=$per;	
				
		}			
		if($view==0){
			
			$this->load->view("admin/permissionview",$data);
			
		}else{
			
			$data['content']=$this->load->view("admin/product/productview",$data,true);
			$this->load->view("admin/headerbodyview",$data);
			
		}
	}
	
	function getproduct(){
		
		$uid=$this->session->userdata("cstone_session_adminid");
		$rid=$this->session->userdata("cstone_session_role");
		
		$c=$this->cstoneadminmodel->getproduct();
		$data['product']=$c;
		
		$str=$this->load->view("admin/product/producttblview",$data,true);
		
		$value=array(
			'result'=>$str
		);
		echo json_encode($value);
	}
	
	function addproduct(){
			
		$data=array();
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$str=-1;
		
		$cd=$this->cstoneadminmodel->getproductdetails($id);
		$data['productdetail']=$cd;
		
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}
		if($id!=""){			
			
			if($edit==1){
				$str=$this->load->view("admin/product/addeditproductview",$data,true);
			}
		}else{
			if($add==1){
				$str=$this->load->view("admin/product/addeditproductview",$data,true);
			}
		}		
		
		$value=array(
			'result'=>$str
		);	
			
		echo json_encode($value);
	}
		
	function productstatus(){
		
		$productId=$this->input->post("id");
		$title=$this->input->post("title");
		$rid=$this->session->userdata("cstone_session_role");
		$add=1;
		$edit=1;
		$q=-1;
		$status=1;
		
		$msg="Product Status Approved";
		
		if($title=="Suspend"){
			
			$status=0;
			$msg="Product Status Rejected";
		}
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$add=$per->row()->add;	
			$edit=$per->row()->edit;		
		}		
			
		if($edit==1){
			
			$data['productId']=$productId;
			$data['status']=$status;
			
			$q=$this->cstoneadminmodel->saveproductstatus($data);	
		}			
		$value=array(
			'result'=>$q,
			'msg'=>$msg
		);
		echo json_encode($value);
	}
	
	function saveproduct(){
		
		$productId=$this->input->post("productId");
		$productName=$this->input->post("productName");
		$shortDesc=$this->input->post("shortDesc");
		$longDesc=$this->input->post("longDesc");
		
		$data['productId']=$productId;
		$data['productName']=$productName;
		$data['shortDesc']=$shortDesc;
		$data['longDesc']=$longDesc;
		$data['updatedBy']=$this->session->userdata("cstone_session_adminid");
		$data['updatedDate']=$this->admin->getCustomDate("%Y-%m-%d %H:%i:%s",now());
				
		$result=0;
		
		$cid=$this->cstoneadminmodel->saveproduct($data);
		
		$result=$cid;
		
		$value=array(
			'result'=>$result
		);	
			
		echo json_encode($value);
	}
	
	function deleteproduct(){
		
		$id=$this->input->post("id");
		$rid=$this->session->userdata("cstone_session_role");
		
		$del=1;	
		$msg="Product Deleted";
			
		if($rid!=0){
			
			$per=$this->cstoneadminmodel->getpermission($rid,3);
			$del=$per->row()->delete;	
		}
		
		$data['status']=-1;
		
		if($del==1){
			
			$q=$this->cstoneadminmodel->deleteproduct($id,$data);
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