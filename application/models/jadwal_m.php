<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_m extends CI_Model {
	function getall(){
		$query=$this->db->order_by('hari')
						->get('jadwal');
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function gethari($hari){
		$query=$this->db->select('*')
						->from('jadwal')
						->join('matakuliah', 'matakuliah.kodemakul = jadwal.kodemakul')
						->join('dosen','dosen.npp=jadwal.npp')
						->join('ruangan','ruangan.idruangan=jadwal.idruangan')
						->where('jadwal.hari',$hari)
						->get();
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return array();
		}
	}
	
	function getfind_byid(){
		
	}
	
	function getsimpan($data){
		$query=$this->db->insert('jadwal',$data);
		return $query;
	}
	
	function gethapus($id){
		$query=$this->db->where('idjadwal',$id)
						->delete('jadwal');
		return $query;
	}
	
	function getedit(){
		
	}
}