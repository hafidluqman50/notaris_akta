<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajbmodel extends CI_Model
{
	var $table = 'tba_ppat_ajb';

	function __construct()
	{
		parent::__construct();
	}

    function cekAkta($id) {
        $this->db->select('tba_ppat_apht.id_apht,tba_ppat_skmht.nama_penjual,tba_ppat_skmht.kedudukan_keluarga_penjual,tba_ppat_skmht.nama_persetujuan')
                ->from('tba_ppat_apht')
                ->join('tba_ppat_skmht','tba_ppat_skmht.id_skmht=tba_ppat_apht.id_skmht','inner')
                ->where('tba_ppat_apht.id_apht',$id);
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
                ->where('id_apht',$id);
        $result = $this->db->get();
        if ($result->num_rows() >= 1 ) {
            return $result->row_array();
        }
        else {
            return array();
        }
    }    

    function cekSkmhtById($id) {
        $this->db->select('tba_ppat_skmht.*,tba_ppat_apht.*,tba_ppat_ajb.*')
                 ->from('tba_ppat_ajb')
                 ->join('tba_ppat_apht','tba_ppat_apht.id_apht=tba_ppat_ajb.id_apht','inner')
                 ->join('tba_ppat_skmht','tba_ppat_apht.id_skmht=tba_ppat_skmht.id_skmht','inner')
                 ->where('tba_ppat_apht.id_skmht',$id);
        $result = $this->db->get();
        return $result->row_array();
    }

	function findAll($id_petugas = '') {
        if ($id_petugas != '') {
            $this->db->where('id_petugas', $id_petugas);
        }
        $this->db->where('status', 1);
        $query = $this->db->get($this->table);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        else {
            return array();
        }
    }

    function findById($id_user) {
        $this->db->where('id', $id_user);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() >= 1) {
            return $query->row_array();
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

    function deleteData($id) {
        $data['status'] = 0;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id',$id);
        $this->db->update($this->table,$data);
    }
}