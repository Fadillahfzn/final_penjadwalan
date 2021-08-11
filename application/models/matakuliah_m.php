<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah_m extends CI_Model
{
	function getall()
	{
		$query = $this->db->get('matakuliah');
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return array();
		}
	}

	function getfind_byid()
	{
	}

	function getsimpan($data)
	{
		$query = $this->db->insert('matakuliah', $data);
		return $query;
	}

	function gethapus($id)
	{
		$query = $this->db->where('idmakul', $id)
			->delete('matakuliah');
		return $query;
	}

	function getedit($id, $data)
	{
		$query = $this->db->set($data)
			->where('idmakul', $id)
			->update('matakuliah');
		return $query;
	}
}
