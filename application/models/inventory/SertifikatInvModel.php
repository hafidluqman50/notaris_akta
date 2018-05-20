<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class SertifikatInvModel extends CI_Model {
	var $table = 'tba_inv_sertifikat';
	public $query;

	function __construct() {
		parent::__construct();
	}

	public function WhereNotIn(array $array) {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_sertifikat','tba_u_inv_sertifikat.id_u_inv_sertifikat = tba_inv_sertifikat.id_u_inv_sertifikat')
				 ->where_not_in('jenis_bank',$array);
		$this->query = $this->db->get();
		return $this;
	}

	public function exportData(array $array) {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_sertifikat','tba_u_inv_sertifikat.id_u_inv_sertifikat = tba_inv_sertifikat.id_u_inv_sertifikat')
				 ->where($array)
				 ->order_by('tba_inv_sertifikat.id_u_inv_sertifikat','');
		$this->query = $this->db->get();
		return $this;
	}

	public function getResult() {
		$query = $this->query;
		if ($query->num_rows() >= 1) {
			return $query->result_array();
		}
		else {
			return array();
		}
	}

	function countRows() {
		$count = $this->query;
		return $count->num_rows();
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