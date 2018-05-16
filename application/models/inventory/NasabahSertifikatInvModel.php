<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class NasabahSertifikatInvModel extends CI_Model {
	var $table = 'tba_u_inv_sertifikat';
	function __construct() {
		parent::__construct();
	}

	function findAll() {
		$query = $this->db->get($this->table);
		if ($query->num_rows() >= 1) {
			return $query->result_array();
		}
		else {
			return array();
		}
	}

	function findById($id) {
		$this->db->where('id_u_inv_sertifikat',$id);
		$query = $this->db->get($this->table);
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
    	$this->db->where('id_u_inv_sertifikat',$id);
    	$this->db->update($this->table,$data);
    }

    function deleteData($id,$id_sertifikat) {
    	$this->db->where('id_u_inv_sertifikat',$id)
    			 ->delete();
    }
}