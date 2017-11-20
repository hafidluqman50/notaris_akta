<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions {

		var $table = 'tb_transaksi';
		var $table_akun = 'tb_akun';
		
		public function __construct()
		{
			
		}

		public function __get($var)
		{
		   return get_instance()->$var;
		}

		private function findAccountById($id_akun) 
		{
	        $this->db->where('id',$id_akun);
	        $query = $this->db->get('tb_akun');
	        if ($query->num_rows() > 0) {
	            return $query->row_array();
	        }
	        else {
	            return array();
	        }
		}

		private function posisiTrans($id_akun,$jenis) 
		{
			$position = '';
			$dataAkun = $this->findAccountById($id_akun);
			if ($dataAkun) {
				if ($jenis == 'add') {
					if ($dataAkun['type'] == 1 || $dataAkun['type'] == 5) {
						$position = 'debet';
					}
					else {
						$position = 'kredit';
					}
				}
				else {
					if ($dataAkun['type'] == 1 || $dataAkun['type'] == 5) {
						$position = 'kredit';
					}
					else {
						$position = 'debet';
					}
				}
			}
			return $position;
		}

		public function proceedToParent($id_akun,$nominal,$tipe) {
			$dataAkun = $this->findAccountById($id_akun);
			if ($dataAkun['parent'] != 0) {
				if ($tipe == 'add') {
					$this->db->set('saldo_awal', 'saldo_awal+'. $nominal.'',false);
			        $this->db->where('id', $dataAkun['parent']);
			        $this->db->update('tb_akun');
				}
				else {
					$this->db->set('saldo_awal', 'saldo_awal-'. $nominal.'',false);
			        $this->db->where('id', $dataAkun['parent']);
			        $this->db->update('tb_akun');
				}
			}
		}

        public function addTrans($kode_trans,$id_akun,$nominal)
        {
        	$position = $this->posisiTrans($id_akun,'add');
        	$data = array('kode_transaksi' => $kode_trans,
        					'id_akun' => $id_akun,
        					'tanggal' => date('Y-m-d'),
        					$position => $nominal,
        					'created_at' => date('Y-m-d H:i:s'),
							'id_petugas' => $this->session->userdata('id')
        				);
        	$create = $this->db->insert($this->table, $data);
        	if ($position == 'debit') {
        		$this->proceedToParent($id_akun,$nominal,'add');
        	}
        	else {
        		$this->proceedToParent($id_akun,$nominal,'sub');
        	}
        }

        public function updateTrans($kode_trans,$id_akun,$nominal)
        {
        	$position = $this->posisiTrans($id_akun,'add');
        	$data = array('kode_transaksi' => $kode_trans,
        					'id_akun' => $id_akun,
        					'tanggal' => date('Y-m-d'),
        					$position => $nominal,
        					'updated_at' => date('Y-m-d H:i:s'),
							'id_petugas' => $this->session->userdata('id')
        				);
        	$this->db->where('id_akun', $id_akun);
        	$this->db->where('kode_transaksi', $kode_trans);
        	$this->db->update($this->table, $data);
        }

        public function addTransManual($kode_trans,$id_akun,$debit,$credit)
        {
        	$position = $this->posisiTrans($id_akun,'add');
        	$data = array('kode_transaksi' => $kode_trans,
        					'id_akun' => $id_akun,
        					'tanggal' => date('Y-m-d'),
        					'debet' => $debit,
        					'kredit' => $credit,
        					'created_at' => date('Y-m-d H:i:s'),
							'id_petugas' => $this->session->userdata('id')
        				);
        	$create = $this->db->insert($this->table, $data);
        	if ($debit != 0) {
        		$this->proceedToParent($id_akun,$debit,'add');
        	}
        	else {
        		$this->proceedToParent($id_akun,$credit,'sub');
        	}
        }

        public function updateTransManual($kode_trans,$id_akun,$debit,$credit)
        {
        	$position = $this->posisiTrans($id_akun,'add');
        	$data = array('kode_transaksi' => $kode_trans,
        					'id_akun' => $id_akun,
        					'tanggal' => date('Y-m-d'),
        					'debet' => $debit,
        					'kredit' => $credit,
        					'updated_at' => date('Y-m-d H:i:s'),
							'id_petugas' => $this->session->userdata('id')
        				);
        	
        	$this->db->where('id_akun', $id_akun);
        	$this->db->where('kode_transaksi', $kode_trans);
        	$this->db->update($this->table, $data);
        }

        public function addNominalAccount($id,$nominal) {
	        $this->db->set('saldo_awal', 'saldo_awal+'. $nominal.'',false);
	        $this->db->where('id', $id);
	        $this->db->update($this->table_akun);
	    }

	    public function removeNominalAccount($id,$nominal) {
	        $this->db->set('saldo_awal', 'saldo_awal-'. $nominal.'',false);
	        $this->db->where('id', $id);
	        $this->db->update($this->table_akun);
	    }
}