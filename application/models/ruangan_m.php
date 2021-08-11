<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_m extends CI_Model {
	function getall(){
		$query=$this->db->get('ruangan');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid(){
		
	}
	
	function getsimpan($data){
		$query=$this->db->insert('ruangan',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('idruangan',$id)
						->delete('ruangan');
		return $query;
	}
	
	function getedit(){
		
	}
}