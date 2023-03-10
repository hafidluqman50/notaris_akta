<?php 

class Surataktamodel extends CI_Model
{
	var $table = 'tba_template_akta';
    function __construct() {
        parent::__construct();
    }

    function findDebitur() {
        $this->db->where('jenis_surat','debitur');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return array();
        }
    }

    function findPpat() {
        $this->db->where('jenis_surat','ppat');
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return array();
        }
    }

    function findById($id) {
        $this->db->where('id_surat', $id);
        $query = $this->db->get($this->table);

        if ($query->num_rows() >= 1) {
            return $query->row_array();
        }
        else {
            return array();
        }
    }

    function showSurat() {
    	$this->db->where('id_surat',1);
    	$query = $this->db->get($this->table);
    	return $query->row_array();
    }

    function suratSkmhtBni() {
        $this->db->where('id_surat',2);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    function suratSkmhtBri() {
        $this->db->where('id_surat',3);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    function suratAphtBni() {
        $this->db->where('id_surat',4);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    function suratAphtBri() {
        $this->db->where('id_surat',5);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    function suratAjb() {
        $this->db->where('id_surat',6);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    function getDataColumn($table,$where,$keyword,$value) {
        $this->db->where($where,$keyword);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            return $data[$value];
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
        $this->db->where('id_surat',$id);
        $this->db->update($this->table,$data);
    }

    function deleteData($id) {
        $data['status'] = 0;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }
}