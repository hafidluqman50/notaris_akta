<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AktaInvModel extends CI_Model {
	var $table = 'tba_inv_akta';
	public $query;

	function __construct() {
		parent::__construct();
	}

	public function exportData(array $array) {
		$this->db->select('*')
				 ->from($this->table)
				 ->join('tba_u_inv_akta','tba_u_inv_akta.id_u_inv_akta = tba_inv_akta.id_u_inv_akta')
				 ->where($array)
				 ->order_by('tba_inv_akta.id_u_inv_akta','');
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

	public function getRow() {
		$query = $this->query;
		if ($query->num_rows() >= 1) {
			return $query->row_array();
		}
		else {
			return array();
		}
	}

	function countRows() {
		$count = $this->query;
		return $count->num_rows();
	}

	function getData($value) {
		$this->db->select('*')
				 ->from($this->table)
				 ->where('id_u_inv_akta',$value);
		$query = $this->db->get();
		return $query->result_array();
	}

	function countNasabah($value) {
		$this->db->from($this->table)->where('id_u_inv_akta',$value);
		$query = $this->db->get();
		return $query->num_rows();
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