<?php
class Loginmodel extends CI_Model {

    var $table = 'tb_user';

    function __construct() {
        parent::__construct();
    }

    function checkLogin($username, $password) {
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $this->db->where('status', 1);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }

    function getPassword($id) {
        $this->db->select('*');
        $this->db->where('id_user', $id);
        $this->db->where('status', 1);
        $query = $this->db->get($this->table, 1);

        if ($query->num_rows() == 1) {
            $data = $query->row_array();
            return $data['password'];
        }
    }

    function updatePass($id,$data) {
        $this->db->where('id_user',$id);
        $this->db->update($this->table,$data);
    }
}