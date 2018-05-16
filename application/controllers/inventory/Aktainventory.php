<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aktainventory extends CI_Controller {
	function __construct() {
		parent::__construct();
		isLogin();
		$this->load->library('PHPExcel');
		$this->load->model('inventory/NasabahAktaInvModel','nasabah_akta');
		$this->load->model('inventory/NasabahSertifikatInvModel','nasabah_sertifikat');
		$this->load->model('inventory/AktaInvModel','akta_inv');
		$this->load->model('inventory/SertifikatInvModel','sertifikat_inv');
	}

	public function data_inventory() {
		$data['title']        = 'Data Inventory';
		$data['page']         = 'inventory';
		$data['data_akta']    = $this->nasabah_akta->findAll();
		$data['data_sertifikat'] = $this->nasabah_sertifikat->findAll();
		$this->load->view('inventory/data_inventory',$data);
	}

	public function monitor_akta($id) {
		$data['title'] = 'Data Inventory PPAT';
		$data['page'] = 'inventory';
		$data['data_inv'] = $this->akta_inv->findAll($id);
		$data['id'] = $id;
		$this->load->view('inventory/data_inv_akta',$data);
	}

	public function monitor_sertifikat($id) {
		$data['title'] = 'Data Inventory sertifikat';
		$data['page'] = 'inventory';
		$data['data_inv'] = $this->sertifikat_inv->findAll($id);
		$data['id'] = $id;
		$this->load->view('inventory/data_inv_sertifikat',$data);
	}

	public function selesai_akta($id) {
		$this->nasabah_akta->updateData($id,['status'=>1]);
		$this->session->set_flashdata('pesan','Data Telah Selesai Dimonitor');
		redirect('inventory/aktainventory/data_inventory');
	}

	public function add_nasabah_akta() {
		$data['title']     = 'Tambah Data Nasabah PPAT';
		$data['page']      = 'inventory';
		$this->load->view('inventory/form_nasabah_akta',$data);
	}

	public function edit_nasabah_akta($id) {
		$data['title']     = 'Tambah Data Nasabah PPAT';
		$data['page']      = 'inventory';
		$data['row']       = $this->nasabah_akta->findById($id);
		$this->load->view('inventory/form_nasabah_akta',$data);
	}

	public function delete_nasabah_akta($id) {
		$this->nasabah_akta->deleteData($id);
		$this->session->set_flashdata('pesan','Berhasil Hapus');
		redirect('inventory/aktainventory/data_inventory');
	}

	public function add_nasabah_sertifikat() {
		$data['title'] = 'Tambah Data Nasabah sertifikat';
		$data['page']  = 'inventory';
		$this->load->view('inventory/form_nasabah_sertifikat',$data);
	}

	public function edit_nasabah_sertifikat($id) {
		$data['title'] = 'Tambah Data Nasabah sertifikat';
		$data['page']  = 'inventory';
		$data['row']   = $this->nasabah_sertifikat->findById($id);
		$this->load->view('inventory/form_nasabah_sertifikat',$data);
	}

	public function delete_nasabah_sertifikat($id) {
		$this->nasabah_sertifikat->deleteData($id);
		$this->session->set_flashdata('pesan','Berhasil Hapus');
		redirect('inventory/aktainventory/data_inventory');
	}

	public function add_inv_akta($id) {
		$data['title']         = 'Tambah Data Inventory PPAT';
		$data['page']          = 'inventory';
		$data['id_u_inv_akta'] = $id;
		$this->load->view('inventory/form_inv_akta',$data);
	}

	public function edit_inv_akta($id,$id_inv) {
		$data['title']         = 'Tambah Data Inventory PPAT';
		$data['page']          = 'inventory';
		$data['id_inv_akta']   = $id;
		$data['row']           = $this->akta_inv->findById($id,$id_inv);
		// var_dump($data);
		$this->load->view('inventory/form_inv_akta',$data);
	}

	public function delete_inv_akta($id,$id_inv) {
		//
	}

	public function add_inv_sertifikat($id) {
		$data['title']            = 'Tambah Data Inventory PPAT';
		$data['page']             = 'inventory';
		$data['id_inv_sertifikat'] = $id;
		// $data['row']           = ''
		$this->load->view('inventory/form_inv_sertifikat',$data);
	}

	public function edit_inv_sertifikat($id,$id_inv) {
		$data['title']            = 'Tambah Data Inventory PPAT';
		$data['page']             = 'inventory';
		$data['id_inv_sertifikat'] = $id;
		$data['row']              = $this->sertifikat_inv->findById($id,$id_inv);
		$this->load->view('inventory/form_inv_sertifikat',$data);
	}


	public function delete_inv_sertifikat($id,$id_inv) {
		//
	}

	public function save_nasabah_akta() {
		if ($this->input->post('takis')) {
			$nasabah         = $this->input->post('nasabah');
			$kelengkapan     = $this->input->post('kelengkapan');
			$jenis_bank      = $this->input->post('jenis_bank');
			$jenis_pekerjaan = $this->input->post('jenis_pekerjaan');
			$print_sal       = $this->input->post('print_sal');
			$rpk_mnt         = $this->input->post('rpk_mnt');
			$invoice         = $this->input->post('invoice');
			$dan_lap         = $this->input->post('dan_lap');
			$exp_skmht       = $this->input->post('exp_skmht');
			$exp_cnot        = $this->input->post('exp_cnot');
			$per_lap         = $this->input->post('per_lap');
			$no_sps          = $this->input->post('no_sps');
			$atr_odr         = $this->input->post('atr_odr');
			$keterangan      = $this->input->post('keterangan');
			$id 			 = $this->input->post('id');
			$array = [
				'nasabah_akta'    => strtoupper($nasabah),
				'kelengkapan'     => strtoupper($kelengkapan),
				'jenis_bank'	  => strtoupper($jenis_bank),
				'jenis_pekerjaan' => strtoupper($jenis_pekerjaan),
				'print_sal'       => strtoupper($print_sal),
				'rpk_mnt'         => strtoupper($rpk_mnt),
				'invoice'         => strtoupper($invoice),
				'dan_lap'         => strtoupper($dan_lap),
				'exp_skmht'       => strtoupper($exp_skmht),
				'exp_cnot'        => strtoupper($exp_cnot),
				'per_lap'         => strtoupper($per_lap),
				'no_sps'          => strtoupper($no_sps),
				'atr_odr'         => strtoupper($atr_odr),
				'keterangan'      => strtoupper($keterangan),
				'status'          => 0
			];
			if ($id == '') {
				$this->nasabah_akta->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Input Data');
				redirect('inventory/aktainventory/data_inventory');
			}
			else {
				$this->nasabah_akta->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Data');
				redirect('inventory/aktainventory/data_inventory');
			}
		}
	}

	public function save_nasabah_sertifikat() {
		if ($this->input->post('takis')) {
			$nomor            = $this->input->post('nomor');
			$jenis_sertifikat = $this->input->post('jenis_sertifikat');
			$jenis_bank       = $this->input->post('jenis_bank');
			$nasabah          = $this->input->post('nasabah_sertifikat');
			$posisi_kantor    = $this->input->post('kantor');
			$posisi_bpn       = $this->input->post('bpn');
			$posisi_luar      = $this->input->post('luar');
			$keterangan       = $this->input->post('keterangan');
			$id               = $this->input->post('id');
			$array = [
				'nomor'            => $nomor,
				'jenis_sertifikat' => strtoupper($jenis_sertifikat),
				'jenis_bank'       => strtoupper($jenis_bank),
				'nasabah_sertifikat'  => strtoupper($nasabah),
				'kantor'           => $posisi_kantor,
				'bpn'              => $posisi_bpn,
				'luar'             => $posisi_luar,
				'keterangan'       => strtoupper($keterangan)
			];
			if ($id == '') {
				$this->nasabah_sertifikat->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Input Data');
				redirect('inventory/aktainventory/data_inventory');
			}
			else {
				$this->nasabah_sertifikat->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Data');
				redirect('inventory/aktainventory/data_inventory');
			}
		}
	}

	public function save_inv_akta() {
		if ($this->input->post('takis')) {
			$nomor_akta  = $this->input->post('no_akta');
			$tgl_akta    = $this->input->post('tgl_akta');
			$jenis_akta  = $this->input->post('jenis_akta');
			$ketik_akt   = $this->input->post('ketik_akt');
			$call_akt    = $this->input->post('call_akt');
			$ttd_akd     = $this->input->post('ttd_akd');
			$atr_mnt     = $this->input->post('atr_mnt');
			$mnt_kmb     = $this->input->post('mnt_kmb');
			$id_inv_akta = $this->input->post('id_inv_akta');
			$id          = $this->input->post('id');
			$array = [
				'no_akta'       => $nomor_akta,
				'tgl_akta'      => $tgl_akta,
				'jenis_akta'    => $jenis_akta,
				'ketik_akt'     => $ketik_akt,
				'call_akt'      => $call_akt,
				'ttd_akd'       => $ttd_akd,
				'atr_mnt'       => $atr_mnt,
				'mnt_kmb'       => $mnt_kmb,
				'id_u_inv_akta' => $id_inv_akta,
			];
			if ($id == '') {
				$this->akta_inv->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Input Data');
				redirect('inventory/aktainventory/monitor_akta/'.$id_inv_akta);
			}
			else {
				$this->akta_inv->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Data');
				redirect('inventory/aktainventory/monitor_akta/'.$id_inv_akta);
			}
		}
	}

	public function save_inv_sertifikat() {
		if ($this->input->post('takis')) {
			$ket_order         = $this->input->post('ket_order');
			$masuk             = $this->input->post('masuk');
			$keluar            = $this->input->post('keluar');
			$id_inv_sertifikat = $this->input->post('id_inv_sertifikat');
			$id                = $this->input->post('id');
			$array = [
				'ket_order'           => strtoupper($ket_order),
				'masuk'               => $masuk,
				'keluar'              => $keluar,
				'id_u_inv_sertifikat' => $id_inv_sertifikat
			];
			if ($id == '') {
				$this->sertifikat_inv->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Input Data');
				redirect('inventory/aktainventory/monitor_sertifikat/'.$id_inv_sertifikat);
			}
			else {
				$this->sertifikat_inv->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Data');
				redirect('inventory/aktainventory/monitor_sertifikat/'.$id_inv_sertifikat);
			}
		}
	}

	public function cetak_excel() {
		$akta       = $this->akta_inv->exportData();
		$sertifikat = $this->sertifikat_inv->exportData();
		$excel      = new PHPExcel();
		$richText   = new PHPExcel_RichText();
		$bold = $richText->createTextRun('INVENTARIS PPAT');
		$bold->getFont()->setBold(true);
		$excel->getProperties()
			  ->setTitle('Inventory Notaris')
			  ->setCreator('Nia Nuswantari');
		$excel->getSheet(0)->setTitle('Selesai BRI');
		$workSheet1 = new PHPExcel_Worksheet($excel,'Selesai BNI');
		$workSheet2 = new PHPExcel_Worksheet($excel,'Selesai BSM');
		$workSheet3 = new PHPExcel_Worksheet($excel,'Sertifikat BRI');
		$workSheet4 = new PHPExcel_Worksheet($excel,'Sertifikat BNI');
		$workSheet5 = new PHPExcel_Worksheet($excel,'Sertifikat BSM');
		$workSheet6 = new PHPExcel_Worksheet($excel,'BRI');
		$workSheet7 = new PHPExcel_Worksheet($excel,'BNI');
		$workSheet8 = new PHPExcel_Worksheet($excel,'BSM');
		$workSheet9 = new PHPExcel_Worksheet($excel,'Luar Kota');
		$excel->addSheet($workSheet1);
		$excel->addSheet($workSheet2);
		$excel->addSheet($workSheet3);
		$excel->addSheet($workSheet4);
		$excel->addSheet($workSheet5);
		$excel->addSheet($workSheet6);
		$excel->addSheet($workSheet7);
		$excel->addSheet($workSheet8);
		$excel->addSheet($workSheet9);
		$excel->getActiveSheet()
			  ->mergeCells('A1:X1')
			  ->setCellValue('A1',$richText)
			  ->setCellValue('A2','MUHDI')
			  ->setCellValue('A3','BRI KONVENSIONAL')
			  ->setCellValue('A5','NO')
			  ->setCellValue('B5','NASABAH')
			  ->setCellValue('C5','KELENGKAPAN')
			  ->setCellValue('D5','JENIS PEKERJAAN')
			  ->setCellValue('E5','JENIS AKTA')
			  ->setCellValue('F5','TGL AKTA')
			  ->setCellValue('G5','NO AKTA')
			  ->setCellValue('H5','KETIK AKT')
			  ->setCellValue('I5','CALL AKT')
			  ->setCellValue('J5','TTD AKD')
			  ->setCellValue('K5','ATR MNT')
			  ->setCellValue('L5','MNT KMB')
			  ->setCellValue('M5','PRINT SAL')
			  ->setCellValue('N5','RPK MNT')
			  ->setCellValue('O5','INVOICE')
			  ->setCellValue('P5','DANLAP')
			  ->setCellValue('Q5','EXP SKMHT')
			  ->setCellValue('R5','EXP CNOT')
			  ->setCellValue('S5','PER LAP')
			  ->setCellValue('T5','LAP SLS')
			  ->setCellValue('U5','ATR ODR')
			  ->setCellValue('V5','KET')
			  ->getStyle('B5:V5')
			  ->getFill()
			  ->getStartColor()
			  ->setRGB(220,220,220);
		$excel->getActiveSheet()
			  ->getStyle('B5:V5')
			  ->getFont()
			  ->setSize(11);
		// $excel->setActiveSheet(3)
		// 	  ->setCellValue();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Inventory Notaris.xls"');
		header('Cache-Control: max-age=0');
		$to_excel = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
		$to_excel->save('php://output');
	}
}