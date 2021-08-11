<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_m extends CI_Model {
	function getall(){
		$query=$this->db->get('dosen');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid(){
		
	}
	
	function getsimpan($data){
		$query=$this->db->insert('dosen',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('iddosen',$id)
						->delete('dosen');
		return $query;
	}
	
	function getedit(){
		
	}
}