<?php
class home extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->admin->nocache();
		$this->load->model("cstonehomemodel","",true);
	}
	
	function index(){
		
		$data['products']=$this->cstonehomemodel->getproducts();
		$data['testimonials']=$this->cstonehomemodel->gettestimonials();
		$data['careers']=$this->cstonehomemodel->getcareers();
		
		$data['content']=$this->load->view("homeview",$data,true);
		$this->load->view("homebodyview",$data);
	}
	
	function sendcontactinfo(){
		$name= $this->input->post("name");
		$email= $this->input->post("email");
		$phone= $this->input->post("phone");
		$message= $this->input->post("message");
		
		if($email && $name && $message){
			
			$sett=$this->cstonehomemodel->getsettings(1);
			$sett->row()->host;	
					
			$from="";
			$to='info@cstonesoft.com';
			$cc="";
			$sub="Cstone - Contact user details";
			
			$txt="Hi ,<br/><br/>";
			$txt.="Cstone - Contact user details<br/><br/>";
			$txt.="Name : ".$name."<br/>";
			$txt.="Email : ".$email."<br/>";
			$txt.="Phone : ".$phone."<br/>";
			$txt.="Message : ".$message."<br/><br/>";
			$txt.="Thanks,<br/>";
			$txt.="Cstone<br/>";
			$result=$this->admin->sendmail($from,"Cstone",$to,$cc,$sub,$txt);
		}	
		
		$data['result']=$result;
		$res=$this->load->view('contactmsgview',$data,true);
		$value=array(
			'result'=>$result,
			'view'=>$res
		);
		echo json_encode($value);
	}
	
	function sendcareerinfo(){
		$name= $this->input->post("careername");
		$email= $this->input->post("careeremail");
		$phone= $this->input->post("careerphone");
		$job= $this->input->post("careerjob");
		$message= $this->input->post("careermessage");
		
		$upload_dir = ("uploads/");
		if($_FILES){
			move_uploaded_file($_FILES['careerresume']['tmp_name'],$upload_dir.$_FILES['careerresume']['name']);
			$resume = $_FILES['careerresume']['name'];
		}
		
		if($email && $name && $message){
			
			$sett=$this->cstonehomemodel->getsettings(1);
			$sett->row()->host;	
					
			$from="";
			$to='info@cstonesoft.com';
			$cc="";
			$sub="Cstone - Career details";
			
			$txt="Hi ,<br/><br/>";
			$txt.="Cstone - Career details<br/><br/>";
			$txt.="Name : ".$name."<br/>";
			$txt.="Email : ".$email."<br/>";
			$txt.="Phone : ".$phone."<br/>";
			$txt.="Job Name : ".$job."<br/>";
			/*$txt.="Resume: <a href='www.cstonesoft.com/index.php/uploads/'".$resume."'>".$resume."</a><br/>";*/
			$txt.="Message : ".$message."<br/><br/>";
			$txt.="Thanks,<br/>";
			$txt.="Cstone<br/>";
			$result=$this->admin->sendmailattach($from,"Cstone",$to,$cc,$sub,$txt,$resume);
		}	
		
		$data['result']=$result;
		$res=$this->load->view('contactmsgview',$data,true);
		$value=array(
			'result'=>$result,
			'view'=>$res
		);
		echo json_encode($value);
	}
	
	function getnews(){
		$data=array();
		$result=0;
		$data['news']=$this->cstonehomemodel->getnews();
		$result=1;
		$res=$this->load->view('newsview',$data,true);
		$value=array(
			'result'=>$result,
			'view'=>$res
		);
		echo json_encode($value);
	}
	
}