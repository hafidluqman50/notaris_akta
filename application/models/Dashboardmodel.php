<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboardmodel extends CI_Model {

    var $table_sales = 'tb_penjualan';

    function __construct() {
        parent::__construct();
    }

    function findExpSales($tipe) {
        $dateExp = date('Y-m-d', strtotime(' -10 day'));
        $this->db->order_by('id', 'asc');
        $this->db->where('status_bayar !=','Paid');
        $this->db->where('status',1);
        $this->db->where('tanggal <=',$dateExp);
        $query = $this->db->get($this->table_sales);
        if ($query->num_rows() > 0) {
            if ($tipe == 'num') {
                return $query->num_rows();
            }
            else {
                return $query->result_array();
            }
        }
        else {
            return null;
        }
    }




}
