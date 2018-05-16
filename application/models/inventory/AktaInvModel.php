<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AktaInvModel extends CI_Model {
	var $table = 'tba_inv_akta';

	function __construct() {
		parent::__construct();
	}

	function exportData() {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_akta','tba_u_inv_akta.id_u_inv_akta = tba_inv_akta.id_u_inv_akta');
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
				 ->join('tba_u_inv_akta','tba_u_inv_akta.id_u_inv_akta = tba_inv_akta.id_u_inv_akta')
				 ->where('tba_inv_akta.id_u_inv_akta',$id);
		$query = $this->db->get();
		if ($query->num_rows() >= 1) {
			return $query->result_array();
		}
		else {
			return array();
		}
	}

	function findById($id_akta,$id) {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_akta','tba_u_inv_akta.id_u_inv_akta = tba_inv_akta.id_u_inv_akta')
				 ->where(['tba_inv_akta.id_u_inv_akta'=>$id_akta,'tba_inv_akta.id_inv_akta'=>$id]);
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
    	$this->db->where('id_inv_akta',$id);
    	$this->db->update($this->table,$data);
    }

    function deleteData($id_akta,$id) {
    	$this->db->where(['id_u_inv_akta'=>$id_akta,'id_inv_akta'=>$id])
    			 ->delete();
    }
}