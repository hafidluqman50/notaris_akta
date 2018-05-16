<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktamodel extends CI_Model {

    var $table = 'tba_akta_debitur';

    function __construct() {
        parent::__construct();
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
        $this->db->where('id_fidusia', $id_user);
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
        $this->db->where('id)fidusia',$id);
        $this->db->update($this->table,$data);
    }

    function deleteData($id) {
        $data['status'] = 0;
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id)fidusia',$id);
        $this->db->update($this->table,$data);
    }

}