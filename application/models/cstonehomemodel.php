<?php
class cstonehomemodel extends CI_Model{
	
	function getsettings($sid){
		$sql="SELECT * 
			FROM admin_settings s			
			WHERE settingId=$sid";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//product
	function getproducts(){
				
		$sql="SELECT *
			FROM product
			WHERE status = 1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//testimonial
	function gettestimonials(){
				
		$sql="SELECT *
			FROM testimonial
			WHERE status = 1";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//career
	function getcareers(){
				
		$sql="SELECT *
			FROM career
			WHERE status = 1
			ORDER BY createdDate DESC";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
	//news
	
	function getnews(){
		$sql="SELECT *
			FROM events
			WHERE status = 1
			ORDER BY createdDate DESC";
		$query=$this->db->query($sql);
		
		return $query;
	}
	
}