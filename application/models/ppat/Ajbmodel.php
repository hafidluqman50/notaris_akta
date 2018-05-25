<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajbmodel extends CI_Model
{
	var $table = 'tba_ppat_ajb';

	function __construct()
	{
		parent::__construct();
	}

    function findAll($id) {
        $this->db->select('*')
                 ->from($this->table)  
                 ->join('tba_ppat_biodata','tba_ppat_biodata.id_ppat = tba_ppat_ajb.id_ppat')
                 ->where('tba_ppat_ajb.id_ppat',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return array();
        }
    }

    function cetakSurat($id,$id_ppat) {
        $this->db->select('*')
                 ->from($this->table)
                 ->join('tba_ppat_biodata','tba_ppat_biodata.id_ppat = tba_ppat_ajb.id_ppat')
                 ->where(['tba_ppat_ajb.id_ajb'=>$id,'tba_ppat_ajb.id_ppat'=>$id_ppat]);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        else {
            return array();
        }
    }

    function findById($id,$id_ppat) {
        $this->db->where(['id_ajb'=>$id,'id_ppat'=>$id_ppat]);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() >= 1) {
            return $query->row_array();
        }
        else {
            return array();
        }
    }

    function findAkta($id) {
        $this->db->select('*')
                ->from($this->table)
                ->where('id_apht',$id);
        $result = $this->db->get();
        if ($result->num_rows() >= 1 ) {
            return $result->row_array();
        }
        else {
            return array();
        }
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
        $this->db->where('id_ajb',$id);
        $this->db->update($this->table,$data);
    }

    function deleteData($id,$id_ppat) {
        $this->db->from($this->table)->where(['id_ajb'=>$id,'id_ppat'=>$id_ppat])->delete();
    }
}