<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SertifikatInvModel extends CI_Model {
	var $table = 'tba_inv_sertifikat';

	function __construct() {
		parent::__construct();
	}

	function exportData($where,$value) {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_sertifikat','tba_u_inv_sertifikat.id_u_inv_sertifikat = tba_inv_sertifikat.id_u_inv_sertifikat')
				 ->where($where,$value);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query->result_array();
		}
		else {
			return array();
		}
	}

	function findAll($id) {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_sertifikat','tba_u_inv_sertifikat.id_u_inv_sertifikat = tba_inv_sertifikat.id_u_inv_sertifikat')
				 ->where('tba_inv_sertifikat.id_u_inv_sertifikat',$id);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query->result_array();
		}
		else {
			return array();
		}
	}

	function findById($id,$id_sertifikat) {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_sertifikat','tba_u_inv_sertifikat.id_u_inv_sertifikat = tba_inv_sertifikat.id_u_inv_sertifikat')
				 ->where('tba_inv_sertifikat.id_u_inv_sertifikat',$id);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query->row_array();
		}
		else {
			return array();
		}
	}

    function insertData($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table,$data);
    }

    function updateData($id,$data) {
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	$this->db->where('id_inv_sertifikat',$id);
    	$this->db->update($this->table,$data);
    }

    function deleteData($id,$id_sertifikat) {
    	$this->db->where(['id_u_inv_sertifikat'=>$id_sertifikat,'id_inv_sertifikat'=>$id])
    			 ->delete();
    }
}