<?php
class cstoneadminmodel extends CI_Model{
//Common Model
	
	//Admin Login authentication
	function auth($data){
		$sql="SELECT * 
			FROM admin_users
			WHERE username='".$data['username']."'
			AND password='".$data['password']."'
			AND status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//User Login authentication
	function channelpartnerloginauth($data){
		$sql="SELECT * 
			FROM channel_partner
			WHERE registrationNum='".$data['registrationNum']."'
			AND password='".$data['password']."'
			AND status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//Setting
	function getsettings($sid){
		$sql="SELECT * 
			FROM admin_settings s			
			WHERE settingId=$sid";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//Permissions
	function getpermission($rid,$mid){
		$sql="SELECT * 
			FROM admin_permissions p 
			WHERE p.roleId=$rid 
			AND p.moduleId=$mid";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function resetpermission($data){
		$rid=$data['roleId'];
		$this->db->where("roleId",$rid);
		$q=$this->db->update("admin_permissions",$data);
		
	}
	
	function savepermission($data1){
		$rid=$data1['roleId'];
		$pid=$data1['permissionId'];
		$this->db->where("moduleId",$data1['moduleId']);
		$this->db->where("roleId",$rid);
		$query = $this->db->get('admin_permissions');
		if($query->num_rows()>0){
			$data1['permissionId']=$query->row()->permissionId;
			$this->db->where("moduleId",$data1['moduleId']);
			$this->db->where("roleId",$rid);
			$this->db->update("admin_permissions",$data1);
		}else{
			$this->db->insert("admin_permissions",$data1);
			$pid=$this->db->insert_id();
		}
		return $pid;
	}
	
	//Admin users
	function getadminusers($uid,$rid){		
		$cond="a.createdBy='$uid'";
		if($rid==1){
			$cond="1";
		}
		
		$sql="SELECT a.adminId,a.username,a.firstName,a.lastName,
			a.email,a.password,a.roleId,a.status,r.roleName 
			FROM admin_users a
			LEFT JOIN admin_roles r
			ON a.roleId=r.roleId
			WHERE a.roleId!=0 AND $cond AND a.status != -1 
			";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function getadminuserdetails($uid){
		$sql="SELECT * 
			FROM admin_users
			WHERE adminId='$uid'";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	/*function getprofiledetails($uid,$roleid,$uType){
		
		if($uType == "admin" AND $roleid==1){
			
			$sql="SELECT * 
				FROM admin_users
				WHERE adminId='$uid'";
				
		}else if($uType == "user"){
			
			$sql="SELECT * 
				FROM users
				WHERE userId='$uid'";
		}
		$query=$this->db->query($sql);
		
		return $query;
	}*/
	
	function checkadminusername($un){
		$sql="SELECT * 
			FROM admin_users
			WHERE username='$un' AND status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function checkadminemail($eid){
		$sql="SELECT * 
			FROM admin_users
			WHERE email='$eid' AND status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function checkuseremail($eid){
		$sql="SELECT * 
			FROM employee
			WHERE email='$eid' AND status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function saveadminuser($data){
		$id=$data['adminId'];
		
		if($id!=""){
			$this->db->where("adminId",$id);
			$this->db->update("admin_users",$data);
			$id=$this->db->affected_rows();
		}else{
			$data['status']=1;
			$data['createdBy']=$data['updatedBy'];
			$data['createdDate']=$data['updatedDate'];
			$this->db->insert("admin_users",$data);
			$id=$this->db->insert_id();
		}
		
		return $id;
	}
	
	function saveprofile($data,$type){
				
		if($type=="admin"){
			
			$id=$data['adminId'];
			
			$this->db->where("adminId",$id);
			$this->db->update("admin_users",$data);
			
			$id=$this->db->affected_rows();
			
		}else if($type=="user"){
			
			$id=$data['userId'];
			
			$this->db->where("userId",$id);
			$this->db->update("users",$data);
			
			$id=$this->db->affected_rows();
		}
		
		return $id;
	}
	
	function resetpwd($data){
		$this->db->where("email",$data['email']);
		$this->db->update("admin_users",$data);
	}
	
	function resetuserpwd($data){
		$this->db->where("email",$data['email']);
		$this->db->update("employee",$data);
	}
		
	function saveadminstatus($data){
		$this->db->where("adminId",$data['adminId']);
		$this->db->update("admin_users",$data);
		
		return $this->db->affected_rows();
	}
	
	function deleteadminuser($id,$data){
		$this->db->where("adminId",$id);
		$this->db->update("admin_users",$data);
		
		return $this->db->affected_rows();
	}
	
	function getaminusers(){
		$sql="SELECT * 
			FROM admin_users WHERE status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//Admin roles
	function getroles(){
		$sql="SELECT * 
			FROM admin_roles WHERE status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function getemployeeroles(){
		$sql="SELECT * 
			FROM admin_roles 
			WHERE status=1 AND roleId !=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function getrolepermission($rid){
		$sql="SELECT m.moduleId,m.moduleName,r.roleId,r.roleName,p.permissionId,
			p.view,p.add,p.edit,p.delete 
			FROM admin_modules m 
			LEFT JOIN admin_permissions p 
			ON m.moduleId=p.moduleId
			AND p.roleId='$rid'
			LEFT JOIN admin_roles r 
			ON p.roleId=r.roleId";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function getroledetails($rid){
		$sql="SELECT * 
			FROM admin_roles
			WHERE roleId='$rid'";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function checkrolename($rn){
		$sql="SELECT * 
			FROM admin_roles
			WHERE roleName='$rn' AND status=1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function saverole($data1){
		$rid=$data1['roleId'];
		if($rid!=""){
			$this->db->where("roleId",$rid);
			$this->db->update("admin_roles",$data1);
		}else{
			$this->db->insert("admin_roles",$data1);
			$rid=$this->db->insert_id();
			$q=$this->getmodules();
			foreach ($q->result() as $row){
				$data['moduleId']=$row->moduleId;
				$data['roleId']=$rid;
				$data['status']=1;
				$this->db->insert("admin_permissions",$data);
			}
		}
		return $rid;		
	}
	
	function getmodules(){
		$sql="SELECT * 
			FROM admin_modules";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function delrole($id,$data){
		$this->db->where("roleId",$id);
		$this->db->update("admin_roles",$data);
		
		return $this->db->affected_rows();
	}
	
//Common Model
	
//product
	function getproduct(){
				
		$sql="SELECT *
			FROM product
			WHERE status !=-1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function getproductdetails($cid){
		$sql="SELECT *
			FROM product
			WHERE productId='$cid' AND status !=-1";
			$query=$this->db->query($sql);
		
		return $query;
	}
		
	function saveproduct($data){
		$id=$data['productId'];
		
		if($id!=""){
			$this->db->where("productId",$id);
			$this->db->update("product",$data);
			$id=$this->db->affected_rows();
		}else{
			$data['status']=1;
			$data['createdBy']=$data['updatedBy'];
			$data['createdDate']=$data['updatedDate'];
			$this->db->insert("product",$data);
			$id=$this->db->insert_id();
		}
		
		return $id;
	}
		
	function saveproductstatus($data){
		$this->db->where("productId",$data['productId']);
		$this->db->update("product",$data);
		
		return $this->db->affected_rows();
	}
	
	function deleteproduct($id,$data){
		$this->db->where("productId",$id);
		$this->db->update("product",$data);
		
		return $this->db->affected_rows();
	}
	
	//testimonial
	function gettestimonial(){
				
		$sql="SELECT *
			FROM testimonial
			WHERE status !=-1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function gettestimonialdetails($cid){
		$sql="SELECT *
			FROM testimonial
			WHERE testimonialId='$cid' AND status !=-1";
			$query=$this->db->query($sql);
		
		return $query;
	}
		
	function savetestimonial($data){
		$id=$data['testimonialId'];
		
		if($id!=""){
			$this->db->where("testimonialId",$id);
			$this->db->update("testimonial",$data);
			$id=$this->db->affected_rows();
		}else{
			$data['status']=1;
			$data['createdBy']=$data['updatedBy'];
			$data['createdDate']=$data['updatedDate'];
			$this->db->insert("testimonial",$data);
			$id=$this->db->insert_id();
		}
		
		return $id;
	}
		
	function savetestimonialstatus($data){
		$this->db->where("testimonialId",$data['testimonialId']);
		$this->db->update("testimonial",$data);
		
		return $this->db->affected_rows();
	}
	
	function deletetestimonial($id,$data){
		$this->db->where("testimonialId",$id);
		$this->db->update("testimonial",$data);
		
		return $this->db->affected_rows();
	}
	
	//career
	function getcareer(){
				
		$sql="SELECT *
			FROM career
			WHERE status !=-1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function getcareerdetails($cid){
		$sql="SELECT *
			FROM career
			WHERE careerId='$cid' AND status !=-1";
			$query=$this->db->query($sql);
		
		return $query;
	}
		
	function savecareer($data){
		$id=$data['careerId'];
		
		if($id!=""){
			$this->db->where("careerId",$id);
			$this->db->update("career",$data);
			$id=$this->db->affected_rows();
		}else{
			$data['status']=1;
			$data['createdBy']=$data['updatedBy'];
			$data['createdDate']=$data['updatedDate'];
			$this->db->insert("career",$data);
			$id=$this->db->insert_id();
		}
		
		return $id;
	}
		
	function savecareerstatus($data){
		$this->db->where("careerId",$data['careerId']);
		$this->db->update("career",$data);
		
		return $this->db->affected_rows();
	}
	
	function deletecareer($id,$data){
		$this->db->where("careerId",$id);
		$this->db->update("career",$data);
		
		return $this->db->affected_rows();
	}
	
	//events
	function getevents(){
				
		$sql="SELECT *
			FROM events
			WHERE status !=-1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	function geteventsdetails($eid){
		$sql="SELECT *
			FROM events
			WHERE eventsId='$eid' AND status !=-1";
			$query=$this->db->query($sql);
		
		return $query;
	}
		
	function saveevents($data){
		$id=$data['eventsId'];
		
		if($id!=""){
			$this->db->where("eventsId",$id);
			$this->db->update("events",$data);
			$id=$this->db->affected_rows();
		}else{
			$data['status']=1;
			$data['createdBy']=$data['updatedBy'];
			$data['createdDate']=$data['updatedDate'];
			$this->db->insert("events",$data);
			$id=$this->db->insert_id();
		}
		
		return $id;
	}
		
	function saveeventsstatus($data){
		$this->db->where("eventsId",$data['eventsId']);
		$this->db->update("events",$data);
		
		return $this->db->affected_rows();
	}
	
	function deleteevents($id,$data){
		$this->db->where("eventsId",$id);
		$this->db->update("events",$data);
		
		return $this->db->affected_rows();
	}

}
?>