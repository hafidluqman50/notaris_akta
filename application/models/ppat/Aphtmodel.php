<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Aphtmodel extends CI_Model
{
	var $table = 'tba_ppat_apht';

	function __construct()
	{
		parent::__construct();
	}

    function cekAkta($id) {
        $this->db->select('id_skmht,nama_penjual,kedudukan_keluarga_penjual,nama_persetujuan')
                 ->from('tba_ppat_skmht')
                 ->where('id_skmht',$id);
        $result = $this->db->get();
        if ($result->num_rows() >= 1) {
            return $result->row_array();
        }
        else {
            return array();
        }
    }

    function findAkta($id) {
        $this->db->select('*')
                 ->from($this->table)
                 ->where('id_skmht',$id);
        $result = $this->db->get();
        if ($result->num_rows() >= 1) {
            return $result->row_array();
        }
        else {
            return array();
        }
    }

    function getIdSkmht($id) {
        $this->db->where('id_apht',$id);
        $query = $this->db->get($this->table);
        $array = $query->row_array();
        return $array['id_skmht'];
    }

    function findById($id) {
        $this->db->where('id_apht', $id_user);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() >= 1) {
            return $query->row_array();
        }
        else {
            return array();
        }
    }

    function cekSkmhtById($id) {
        $this->db->select('tba_ppat_skmht.*,tba_ppat_apht.*')
                 ->from('tba_ppat_apht')
                 ->join('tba_ppat_skmht','tba_ppat_skmht.id_skmht=tba_ppat_apht.id_skmht','inner')
                 ->where('tba_ppat_apht.id_skmht',$id);
        $result = $this->db->get();
        return $result->row_array();
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
        $this->db->where('id_apht',$id);
        $this->db->update($this->table,$data);
    }

    function deleteData($id) {
        $data['status'] = 0;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }
}