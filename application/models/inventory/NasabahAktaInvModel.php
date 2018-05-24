<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class NasabahAktaInvModel extends CI_Model {
	var $table = 'tba_u_inv_akta';
	public $query;

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
		$this->db->where('id_u_inv_akta',$id);
		$query = $this->db->get($this->table);
		if ($query->num_rows() >= 1) {
			return $query->row_array();
		}
		else {
			return array();
		}
	}

	function exportData(array $array) {
		$this->db->where($array);
		$this->query = $this->db->get($this->table);
		return $this;
	}

	function getResult() {
		$get = $this->query;
		if ($get->num_rows() >= 1) {
			return $get->result_array();
		}
		else {
			return array();
		}
	}

	function countRows() {
		$count = $this->query;
		return $count->num_rows();
	}

    function insertData($data) {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert($this->table,$data);
    }

    function updateData($id,$data) {
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	$this->db->where('id_u_inv_akta',$id);
    	$this->db->update($this->table,$data);
    }

    function deleteData($id,$id_akta) {
    	$this->db->where(['id_u_inv_akta'=>$id,'id_inv_akta'=>$id_akta])
    			 ->delete();
    }
}