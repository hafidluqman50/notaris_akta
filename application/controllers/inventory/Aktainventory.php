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
		$data['id_inv_akta'] = $id;
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
		$this->akta_inv->deleteData($id_inv,$id);
		$this->session->set_flashdata('pesan','Berhasil Delete Data');
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
		$this->sertifikat_inv->deleteData($id_inv,$id);
		$this->session->set_flashdata('pesan','Berhasil Delete Data');
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
			$lap_sls		 = $this->input->post('lap_sls');
			$no_sps          = $this->input->post('no_sps');
			$atr_odr         = $this->input->post('atr_odr');
			$keterangan      = $this->input->post('keterangan');
			$status 		 = $this->input->post('status');
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
				'lap_sls'		  => strtoupper($lap_sls),
				'no_sps'          => strtoupper($no_sps),
				'atr_odr'         => strtoupper($atr_odr),
				'keterangan'      => strtoupper($keterangan),
				'status'          => $status
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
				'jenis_akta'    => strtoupper($jenis_akta),
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

	public function coba() {
		$nasabah_selesai_bri = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BRI'])->getResult();
		$int_selesai_bri = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BRI'])->countRows();
		foreach ($nasabah_selesai_bri as $key => $value) {
			echo '</br>';
			echo 'No :';
			echo $key+1;
			echo '</br>';
			echo 'Nasabah :'.$value['nasabah_akta'].'</br>';
			foreach ($this->akta_inv->getData($value['id_u_inv_akta']) as $key => $value) {
				echo 'Jenis Akta :'.$value['jenis_akta'].'</br>';
				echo 'Tgl Akta :'.$value['tgl_akta'].'</br>';
			}
		}
	}

	public function cetak_excel() {
		$akta_inv            = $this->akta_inv;
		$srt_inv             = $this->sertifikat_inv;
		$nasabah_selesai_bri = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BRI'])->getResult();
		$int_selesai_bri     = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BRI'])->countRows();
		$nasabah_selesai_bni = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BNI'])->getResult();
		$int_selesai_bni     = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BNI'])->countRows();
		$nasabah_selesai_bsm = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BSM'])->getResult();
		$int_selesai_bsm     = $this->nasabah_akta->exportData(['status'=>1,'jenis_bank'=>'BSM'])->countRows();
		$nasabah_belum_bri   = $this->nasabah_akta->exportData(['status'=>0,'jenis_bank'=>'BRI'])->getResult();
		$int_belum_bri       = $this->nasabah_akta->exportData(['status'=>0,'jenis_bank'=>'BRI'])->countRows();
		$nasabah_belum_bni   = $this->nasabah_akta->exportData(['status'=>0,'jenis_bank'=>'BNI'])->getResult();
		$int_belum_bni       = $this->nasabah_akta->exportData(['status'=>0,'jenis_bank'=>'BNI'])->countRows();
		$nasabah_belum_bsm   = $this->nasabah_akta->exportData(['status'=>0,'jenis_bank'=>'BSM'])->getResult();
		$int_belum_bsm       = $this->nasabah_akta->exportData(['status'=>0,'jenis_bank'=>'BSM'])->countRows();
		$nasabah_srt_bri     = $this->nasabah_sertifikat->exportData(['jenis_bank'=>'BRI'])->getResult();
		$int_srt_bri         = $this->nasabah_sertifikat->exportData(['jenis_bank'=>'BRI'])->countRows();
		$nasabah_srt_bni     = $this->nasabah_sertifikat->exportData(['jenis_bank'=>'BNI'])->getResult();
		$int_srt_bni         = $this->nasabah_sertifikat->exportData(['jenis_bank'=>'BNI'])->countRows();
		$nasabah_srt_bsm     = $this->nasabah_sertifikat->exportData(['jenis_bank'=>'BSM'])->getResult();
		$int_srt_bsm         = $this->nasabah_sertifikat->exportData(['jenis_bank'=>'BSM'])->countRows();
		$nasabah_srt_luar    = $this->nasabah_sertifikat->WhereNotIn(['BRI','BNI','BSM'])->getResult();
		$int_srt_luar        = $this->nasabah_sertifikat->WhereNotIn(['BRI','BNI','BSM'])->countRows();
		$excel      = new PHPExcel();
		
		$excel->getProperties()
			  ->setTitle('Inventory Notaris')
			  ->setCreator('Nia Nuswantari');
		
		$excel->getSheet(0)->setTitle('Selesai BRI');
		$array = ['Selesai BNI','Selesai BSM','Sertifikat BRI','Sertifikat BNI','Sertifikat BSM','BRI','BNI','BSM','Luar Kota'];
		for ($i=0; $i < 9; $i++) {
			$counter = $i+1; 
			${'workSheet'.$counter} = new PHPExcel_Worksheet($excel,$array[$i]);
			$excel->addSheet(${'workSheet'.$counter});
		}

		$array = ['BRI KONVENSIONAL','BNI KONVENSIONAL','Bank Mandiri Syariah','Luar Kota'];
		for ($i=0; $i < 10; $i++) {
			if ($i >= 0 && $i <= 2 || $i >= 6 && $i <= 8) {
				switch ($i) {
					case '6':
						$counter = $i - 6;
						break;

					case '7':
						$counter = $i - 6;
						break;
					
					case '8':
						$counter = $i - 6;
						break;

					default:
						$counter = $i;
						break;
				}
				$excel->setActiveSheetIndex($i)
					  ->mergeCells('A1:V1')
					  ->mergeCells('A2:V2')
					  ->mergeCells('A3:V3')
					  ->setCellValue('A1','INVENTARIS PPAT')
					  ->setCellValue('A2','MUHDI')
					  ->setCellValue('A3',$array[$counter])
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
					  ->setCellValue('U5','ATR ODR')
					  ->setCellValue('V5','KET');
					  if ($i >= 0 && $i <= 2) {
					  	$excel->setActiveSheetIndex($i)
					  		  ->setCellValue('T5','LAP SLS');
					  }
					  elseif ($i >= 6 && $i <= 8) {
					  	$excel->setActiveSheetIndex($i)
					  		  ->setCellValue('T5','NO SPS');
					  }
				foreach(range('A','V') as $columnID)
				{
				    $excel->setActiveSheetIndex($i)->getColumnDimension($columnID)->setAutoSize(true);
				}
				$excel->setActiveSheetIndex($i)->getSheetView()->setZoomScale(70);
				$excel->setActiveSheetIndex($i)
					  ->getStyle('A5:V5')->applyFromArray([
					  	'fill' => [
					  		'type' => PHPExcel_Style_Fill::FILL_SOLID,
					  		'color' => ['rgb'=>'189, 195, 199']
					  	],
					  	'borders' => [
					  		'allborders' => [
					  			'style' => PHPExcel_Style_Border::BORDER_THIN
					  		]
					  	]
					  ]);
				$styleArray = [
					    'alignment' => [
					    	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
					    ],
					    'font' => [
					    	'bold' => false,
					    	'size' => 12,
					    	'name' => 'Calibri'
					    ]
					];
				$excel->setActiveSheetIndex($i)
					  ->getStyle('A5:V5')
					  ->applyFromArray($styleArray);
			}
			elseif($i >= 3 && $i <= 5 || $i == 9) {
				switch ($i) {
					case '3' :
						$counter = $i - 3;
						break;

					case '4' :
						$counter = $i - 3;
						break;

					case '5' :
						$counter = $i - 3;
						break;

					case '9':
						$counter = $i - 6;
						break;

					default:
						$counter = 'yeah';
						break;
				}
				$excel->setActiveSheetIndex($i)
					  ->mergeCells('A1:L1')
					  ->mergeCells('A2:L2')
					  ->mergeCells('A3:L3')
					  ->mergeCells('A5:A6')
					  ->mergeCells('B5:B6')
					  ->mergeCells('C5:C6')
					  ->mergeCells('D5:D6')
					  ->mergeCells('E5:E6')
					  ->mergeCells('F5:H5')
					  ->mergeCells('I5:I6')
					  ->mergeCells('J5:J6')
					  ->mergeCells('K5:K6')
					  ->mergeCells('L5:L6')
					  ->setCellValue('A1','DAFTAR SERTIFIKAT')
					  ->setCellValue('A2','MUHDI')
					  ->setCellValue('A3',$array[$counter])
					  ->setCellValue('A5','NO')
					  ->setCellValue('B5','JENIS SERTIFIKAT')
					  ->setCellValue('C5','NOMOR')
					  ->setCellValue('D5','BANK')
					  ->setCellValue('E5','NASABAH')
					  ->setCellValue('F5','POSISI')
					  ->setCellValue('F6','KANTOR')
					  ->setCellValue('G6','BPN')
					  ->setCellValue('H6','LUAR')
					  ->setCellValue('I5','ORDER')
					  ->setCellValue('J5','MASUK')
					  ->setCellValue('K5','KELUAR')
					  ->setCellValue('L5','KETERANGAN');
				foreach(range('A','L') as $columnID)
				{
				    $excel->setActiveSheetIndex($i)->getColumnDimension($columnID)->setAutoSize(true);
				}
				$excel->setActiveSheetIndex($i)->getSheetView()->setZoomScale(70);
				$excel->setActiveSheetIndex($i)
					  ->getStyle('A5:L5')->applyFromArray([
					  	'fill' => [
					  		'type' => PHPExcel_Style_Fill::FILL_SOLID,
					  		'color' => ['rgb'=>'173,255,47']
					  	],
					  	'borders' => [
					  		'allborders' => [
					  			'style' => PHPExcel_Style_Border::BORDER_THIN
					  		]
					  	],
					  	'alignment' => [
					  		'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
					  	]
					  ]);
				$excel->setActiveSheetIndex($i)
					  ->getStyle('F6:H6')->applyFromArray([
					  	'fill' => [
					  		'type' => PHPExcel_Style_Fill::FILL_SOLID,
					  		'color' => ['rgb'=>'173,255,47']
					  	],
					  	'alignment' => [
					  		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
					  	],
					  	'borders' => [
					  		'allborders' => [
					  			'style' => PHPExcel_Style_Border::BORDER_THIN
					  		]
					  	]
					  ]);
				$styleArray = [
					    'alignment' => [
					    	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
					    ],
					    'font' => [
					    	'bold' => false,
					    	'size' => 12,
					    	'name' => 'Calibri'
					    ]
					];
				$excel->setActiveSheetIndex($i)
					  ->getStyle('A5:L5')
					  ->applyFromArray($styleArray);
			}
		}

		// SHEET DATA SELESAI BRI //
		if ($int_selesai_bri > 0) {
			$counterInside = 5;
			$counter       = 6;
			foreach ($nasabah_selesai_bri as $key => $value) {
				$akta_selesai_bri  = $akta_inv->getData($value['id_u_inv_akta']);
				$excel->setActiveSheetIndex(0)
					  ->setCellValue('A'.$counter,$key+1)
					  ->setCellValue('B'.$counter,$value['nasabah_akta'])
					  ->setCellValue('C'.$counter,$value['kelengkapan'])
					  ->setCellValue('D'.$counter,$value['jenis_pekerjaan'])
					  ->setCellValue('M'.$counter,$value['print_sal'])
					  ->setCellValue('N'.$counter,$value['rpk_mnt'])
					  ->setCellValue('O'.$counter,number_format($value['invoice']))
					  ->setCellValue('P'.$counter,$value['dan_lap'])
					  ->setCellValue('Q'.$counter,$value['exp_skmht'])
					  ->setCellValue('R'.$counter,$value['exp_cnot'])
					  ->setCellValue('S'.$counter,$value['per_lap'])
					  ->setCellValue('T'.$counter,$value['lap_sls'])
					  ->setCellValue('U'.$counter,$value['atr_odr'])
					  ->setCellValue('V'.$counter,$value['keterangan']);
					foreach ($akta_selesai_bri as $i => $dataAkta) { 
						$counterInside++;
						$excel->setActiveSheetIndex(0)
							  ->setCellValue('E'.$counterInside,$dataAkta['jenis_akta'])
							  ->setCellValue('F'.$counterInside,tanggal_ppat($dataAkta['tgl_akta']))
							  ->setCellValue('G'.$counterInside,$dataAkta['no_akta'])
							  ->setCellValue('H'.$counterInside,tanggal_ppat($dataAkta['ketik_akt']))
							  ->setCellValue('I'.$counterInside,tanggal_ppat($dataAkta['call_akt']))
							  ->setCellValue('J'.$counterInside,tanggal_ppat($dataAkta['ttd_akd']))
							  ->setCellValue('K'.$counterInside,tanggal_ppat($dataAkta['atr_mnt']))
							  ->setCellValue('L'.$counterInside,tanggal_ppat($dataAkta['mnt_kmb']));
				}
				$excel->setActiveSheetIndex(0)
			  	  ->mergeCells('A'.$counter.':A'.$counterInside)
			  	  ->mergeCells('B'.$counter.':B'.$counterInside)
			  	  ->mergeCells('C'.$counter.':C'.$counterInside)
			  	  ->mergeCells('D'.$counter.':D'.$counterInside)
			  	  ->mergeCells('M'.$counter.':M'.$counterInside)
			  	  ->mergeCells('N'.$counter.':N'.$counterInside)
			  	  ->mergeCells('O'.$counter.':O'.$counterInside)
			  	  ->mergeCells('P'.$counter.':P'.$counterInside)
			  	  ->mergeCells('Q'.$counter.':Q'.$counterInside)
			  	  ->mergeCells('R'.$counter.':R'.$counterInside)
			  	  ->mergeCells('S'.$counter.':S'.$counterInside)
			  	  ->mergeCells('T'.$counter.':T'.$counterInside)
			  	  ->mergeCells('U'.$counter.':U'.$counterInside)
			  	  ->mergeCells('V'.$counter.':V'.$counterInside);
				$counter = $counterInside + 1;
			}
		}
		// END SHEET DATA SELESAI BRI //

		// SHEET DATA SELESAI BNI //
		if ($int_selesai_bni > 0) {
			$counterInside = 5;
			$counter       = 6;
			foreach ($nasabah_selesai_bni as $key => $value) {
				$akta_selesai_bni  = $akta_inv->getData($value['id_u_inv_akta']);
				$excel->setActiveSheetIndex(1)
					  ->setCellValue('A'.$counter,$key+1)
					  ->setCellValue('B'.$counter,$value['nasabah_akta'])
					  ->setCellValue('C'.$counter,$value['kelengkapan'])
					  ->setCellValue('D'.$counter,$value['jenis_pekerjaan'])
					  ->setCellValue('M'.$counter,$value['print_sal'])
					  ->setCellValue('N'.$counter,$value['rpk_mnt'])
					  ->setCellValue('O'.$counter,number_format($value['invoice']))
					  ->setCellValue('P'.$counter,$value['dan_lap'])
					  ->setCellValue('Q'.$counter,$value['exp_skmht'])
					  ->setCellValue('R'.$counter,$value['exp_cnot'])
					  ->setCellValue('S'.$counter,$value['per_lap'])
					  ->setCellValue('T'.$counter,$value['lap_sls'])
					  ->setCellValue('U'.$counter,$value['atr_odr'])
					  ->setCellValue('V'.$counter,$value['keterangan']);
					foreach ($akta_selesai_bni as $i => $dataAkta) { 
						$counterInside++;
						$excel->setActiveSheetIndex(1)
							  ->setCellValue('E'.$counterInside,$dataAkta['jenis_akta'])
							  ->setCellValue('F'.$counterInside,tanggal_ppat($dataAkta['tgl_akta']))
							  ->setCellValue('G'.$counterInside,$dataAkta['no_akta'])
							  ->setCellValue('H'.$counterInside,tanggal_ppat($dataAkta['ketik_akt']))
							  ->setCellValue('I'.$counterInside,tanggal_ppat($dataAkta['call_akt']))
							  ->setCellValue('J'.$counterInside,tanggal_ppat($dataAkta['ttd_akd']))
							  ->setCellValue('K'.$counterInside,tanggal_ppat($dataAkta['atr_mnt']))
							  ->setCellValue('L'.$counterInside,tanggal_ppat($dataAkta['mnt_kmb']));
				}
				$excel->setActiveSheetIndex(1)
			  	  ->mergeCells('A'.$counter.':A'.$counterInside)
			  	  ->mergeCells('B'.$counter.':B'.$counterInside)
			  	  ->mergeCells('C'.$counter.':C'.$counterInside)
			  	  ->mergeCells('D'.$counter.':D'.$counterInside)
			  	  ->mergeCells('M'.$counter.':M'.$counterInside)
			  	  ->mergeCells('N'.$counter.':N'.$counterInside)
			  	  ->mergeCells('O'.$counter.':O'.$counterInside)
			  	  ->mergeCells('P'.$counter.':P'.$counterInside)
			  	  ->mergeCells('Q'.$counter.':Q'.$counterInside)
			  	  ->mergeCells('R'.$counter.':R'.$counterInside)
			  	  ->mergeCells('S'.$counter.':S'.$counterInside)
			  	  ->mergeCells('T'.$counter.':T'.$counterInside)
			  	  ->mergeCells('U'.$counter.':U'.$counterInside)
			  	  ->mergeCells('V'.$counter.':V'.$counterInside);
				$counter = $counterInside + 1;
			}
		}
		// END SHEET DATA SELESAI BNI //

		// SHEET DATA SELESAI BSM //
		if ($int_selesai_bsm > 0) {
			$counterInside = 5;
			$counter       = 6;
			foreach ($nasabah_selesai_bsm as $key => $value) {
				$akta_selesai_bsm  = $akta_inv->getData($value['id_u_inv_akta']);
				$excel->setActiveSheetIndex(2)
					  ->setCellValue('A'.$counter,$key+1)
					  ->setCellValue('B'.$counter,$value['nasabah_akta'])
					  ->setCellValue('C'.$counter,$value['kelengkapan'])
					  ->setCellValue('D'.$counter,$value['jenis_pekerjaan'])
					  ->setCellValue('M'.$counter,$value['print_sal'])
					  ->setCellValue('N'.$counter,$value['rpk_mnt'])
					  ->setCellValue('O'.$counter,number_format($value['invoice']))
					  ->setCellValue('P'.$counter,$value['dan_lap'])
					  ->setCellValue('Q'.$counter,$value['exp_skmht'])
					  ->setCellValue('R'.$counter,$value['exp_cnot'])
					  ->setCellValue('S'.$counter,$value['per_lap'])
					  ->setCellValue('T'.$counter,$value['lap_sls'])
					  ->setCellValue('U'.$counter,$value['atr_odr'])
					  ->setCellValue('V'.$counter,$value['keterangan']);
					foreach ($akta_selesai_bsm as $i => $dataAkta) { 
						$counterInside++;
						$excel->setActiveSheetIndex(2)
							  ->setCellValue('E'.$counterInside,$dataAkta['jenis_akta'])
							  ->setCellValue('F'.$counterInside,tanggal_ppat($dataAkta['tgl_akta']))
							  ->setCellValue('G'.$counterInside,$dataAkta['no_akta'])
							  ->setCellValue('H'.$counterInside,tanggal_ppat($dataAkta['ketik_akt']))
							  ->setCellValue('I'.$counterInside,tanggal_ppat($dataAkta['call_akt']))
							  ->setCellValue('J'.$counterInside,tanggal_ppat($dataAkta['ttd_akd']))
							  ->setCellValue('K'.$counterInside,tanggal_ppat($dataAkta['atr_mnt']))
							  ->setCellValue('L'.$counterInside,tanggal_ppat($dataAkta['mnt_kmb']));
				}
				$excel->setActiveSheetIndex(2)
			  	  ->mergeCells('A'.$counter.':A'.$counterInside)
			  	  ->mergeCells('B'.$counter.':B'.$counterInside)
			  	  ->mergeCells('C'.$counter.':C'.$counterInside)
			  	  ->mergeCells('D'.$counter.':D'.$counterInside)
			  	  ->mergeCells('M'.$counter.':M'.$counterInside)
			  	  ->mergeCells('N'.$counter.':N'.$counterInside)
			  	  ->mergeCells('O'.$counter.':O'.$counterInside)
			  	  ->mergeCells('P'.$counter.':P'.$counterInside)
			  	  ->mergeCells('Q'.$counter.':Q'.$counterInside)
			  	  ->mergeCells('R'.$counter.':R'.$counterInside)
			  	  ->mergeCells('S'.$counter.':S'.$counterInside)
			  	  ->mergeCells('T'.$counter.':T'.$counterInside)
			  	  ->mergeCells('U'.$counter.':U'.$counterInside)
			  	  ->mergeCells('V'.$counter.':V'.$counterInside);
				$counter = $counterInside + 1;
			}
		}
		 // END SHEET DATA SELESAI BSM //
		 
		// SHEET DATA SERTIFIKAT BRI //
		if ($int_srt_bri > 0) {
			$counterInside = 6;
			$counter       = 7;
			foreach ($sertifikat_bri as $key => $data) {
				$var  = $int_srt_bri + $counter + 1;
				$var2 = $int_srt_bri + $counter + 2;
				$sertifikat_bri = $srt_inv->getData($data['id_u_inv_sertifikat']);
			  	$excel->setActiveSheetIndex(3)
			  		  ->setCellValue('A'.$counter,$key+1)
			  		  ->setCellValue('B'.$counter,$data['jenis_sertifikat'])
			  		  ->setCellValue('C'.$counter,$data['nomor'])
			  		  ->setCellValue('D'.$counter,$data['jenis_bank'])
			  		  ->setCellValue('E'.$counter,$data['nasabah_sertifikat'])
			  		  ->setCellValue('F'.$counter,$data['kantor'])
			  		  ->setCellValue('G'.$counter,$data['bpn'])
			  		  ->setCellValue('H'.$counter,$data['luar'])
			  		  ->setCellValue('L'.$counter,$data['keterangan']);
			  		  foreach ($sertifikat_bri as $key => $value) {
			  		  	$counterInside++;
			  		  	$excel->setActiveSheetIndex(3)
					  		  ->setCellValue('I'.$counterInside,$value['ket_order'])
					  		  ->setCellValue('J'.$counterInside,humanDate($value['masuk']))
					  		  ->setCellValue('K'.$counterInside,humanDate($value['keluar']));
			  		  }
				$excel->setActiveSheetIndex(3)
					  ->mergeCells('A'.$counter.':A'.$counterInside)
					  ->mergeCells('B'.$counter.':B'.$counterInside)
					  ->mergeCells('C'.$counter.':C'.$counterInside)
					  ->mergeCells('D'.$counter.':D'.$counterInside)
					  ->mergeCells('E'.$counter.':E'.$counterInside)
					  ->mergeCells('F'.$counter.':F'.$counterInside)
					  ->mergeCells('G'.$counter.':G'.$counterInside)
					  ->mergeCells('H'.$counter.':H'.$counterInside)
					  ->mergeCells('L'.$counter.':L'.$counterInside);
				 $counter = $counterInside + 1;
			}
			$excel->setActiveSheetIndex(3)
			  	  ->mergeCells('A'.$var.':E'.$var)
			  	  ->mergeCells('A'.$var2.':E'.$var2)
			  	  ->mergeCells('F'.$var2.':H'.$var2)
			  	  ->setCellValue('A'.$var,'JUMLAH : ')
			  	  ->setCellValue('F'.$var,'=SUM(F7:F'.$counterInside.')')
			  	  ->setCellValue('G'.$var,'=SUM(G7:G'.$counterInside.')')
			  	  ->setCellValue('H'.$var,'=SUM(H7:H'.$counterInside.')')
			  	  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
			  	  ->setCellValue('F'.$var2,$int_srt_luar);
		}

		// // END SHEET DATA SERTIFIKAT BRI // 										

		// // SHEET DATA SERTIFIKAT BNI //
		if ($int_srt_bni > 0) {
			$counterInside = 6;
			$counter       = 7;
			foreach ($nasabah_srt_bni as $key => $data) {
				$var  = $int_srt_bni + $counter + 1;
				$var2 = $int_srt_bni + $counter + 2;
				$sertifikat_bni = $srt_inv->getData($data['id_u_inv_sertifikat']);
			  	$excel->setActiveSheetIndex(4)
			  		  ->setCellValue('A'.$counter,$key+1)
			  		  ->setCellValue('B'.$counter,$data['jenis_sertifikat'])
			  		  ->setCellValue('C'.$counter,$data['nomor'])
			  		  ->setCellValue('D'.$counter,$data['jenis_bank'])
			  		  ->setCellValue('E'.$counter,$data['nasabah_sertifikat'])
			  		  ->setCellValue('F'.$counter,$data['kantor'])
			  		  ->setCellValue('G'.$counter,$data['bpn'])
			  		  ->setCellValue('H'.$counter,$data['luar'])
			  		  ->setCellValue('L'.$counter,$data['keterangan']);
			  		  foreach ($sertifikat_bni as $key => $value) {
			  		  	$counterInside++;
			  		  	$excel->setActiveSheetIndex(4)
					  		  ->setCellValue('I'.$counterInside,$value['ket_order'])
					  		  ->setCellValue('J'.$counterInside,humanDate($value['masuk']))
					  		  ->setCellValue('K'.$counterInside,humanDate($value['keluar']));
			  		  }
				$excel->setActiveSheetIndex(4)
					  ->mergeCells('A'.$counter.':A'.$counterInside)
					  ->mergeCells('B'.$counter.':B'.$counterInside)
					  ->mergeCells('C'.$counter.':C'.$counterInside)
					  ->mergeCells('D'.$counter.':D'.$counterInside)
					  ->mergeCells('E'.$counter.':E'.$counterInside)
					  ->mergeCells('F'.$counter.':F'.$counterInside)
					  ->mergeCells('G'.$counter.':G'.$counterInside)
					  ->mergeCells('H'.$counter.':H'.$counterInside)
					  ->mergeCells('L'.$counter.':L'.$counterInside);
				 $counter = $counterInside + 1;
			}
			$excel->setActiveSheetIndex(4)
			  	  ->mergeCells('A'.$var.':E'.$var)
			  	  ->mergeCells('A'.$var2.':E'.$var2)
			  	  ->mergeCells('F'.$var2.':H'.$var2)
			  	  ->setCellValue('A'.$var,'JUMLAH : ')
			  	  ->setCellValue('F'.$var,'=SUM(F7:F'.$counterInside.')')
			  	  ->setCellValue('G'.$var,'=SUM(G7:G'.$counterInside.')')
			  	  ->setCellValue('H'.$var,'=SUM(H7:H'.$counterInside.')')
			  	  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
			  	  ->setCellValue('F'.$var2,$int_srt_luar);
		}
		// // END SHEET DATA SERTIFIKAT BNI //

		// // SHEET DATA SERTIFIKAT BSM //
		if ($int_srt_bsm > 0) {
			$counterInside = 6;
			$counter       = 7;
			foreach ($nasabah_srt_bsm as $key => $data) {
				$var  = $int_srt_bsm + $counter + 1;
				$var2 = $int_srt_bsm + $counter + 2;
				$sertifikat_bsm = $srt_inv->getData($data['id_u_inv_sertifikat']);
			  	$excel->setActiveSheetIndex(5)
			  		  ->setCellValue('A'.$counter,$key+1)
			  		  ->setCellValue('B'.$counter,$data['jenis_sertifikat'])
			  		  ->setCellValue('C'.$counter,$data['nomor'])
			  		  ->setCellValue('D'.$counter,$data['jenis_bank'])
			  		  ->setCellValue('E'.$counter,$data['nasabah_sertifikat'])
			  		  ->setCellValue('F'.$counter,$data['kantor'])
			  		  ->setCellValue('G'.$counter,$data['bpn'])
			  		  ->setCellValue('H'.$counter,$data['luar'])
			  		  ->setCellValue('L'.$counter,$data['keterangan']);
			  		  foreach ($sertifikat_bsm as $key => $value) {
			  		  	$counterInside++;
			  		  	$excel->setActiveSheetIndex(5)
					  		  ->setCellValue('I'.$counterInside,$value['ket_order'])
					  		  ->setCellValue('J'.$counterInside,humanDate($value['masuk']))
					  		  ->setCellValue('K'.$counterInside,humanDate($value['keluar']));
			  		  }
				$excel->setActiveSheetIndex(5)
					  ->mergeCells('A'.$counter.':A'.$counterInside)
					  ->mergeCells('B'.$counter.':B'.$counterInside)
					  ->mergeCells('C'.$counter.':C'.$counterInside)
					  ->mergeCells('D'.$counter.':D'.$counterInside)
					  ->mergeCells('E'.$counter.':E'.$counterInside)
					  ->mergeCells('F'.$counter.':F'.$counterInside)
					  ->mergeCells('G'.$counter.':G'.$counterInside)
					  ->mergeCells('H'.$counter.':H'.$counterInside)
					  ->mergeCells('L'.$counter.':L'.$counterInside);
				 $counter = $counterInside + 1;
			}
			$excel->setActiveSheetIndex(5)
			  	  ->mergeCells('A'.$var.':E'.$var)
			  	  ->mergeCells('A'.$var2.':E'.$var2)
			  	  ->mergeCells('F'.$var2.':H'.$var2)
			  	  ->setCellValue('A'.$var,'JUMLAH : ')
			  	  ->setCellValue('F'.$var,'=SUM(F7:F'.$counterInside.')')
			  	  ->setCellValue('G'.$var,'=SUM(G7:G'.$counterInside.')')
			  	  ->setCellValue('H'.$var,'=SUM(H7:H'.$counterInside.')')
			  	  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
			  	  ->setCellValue('F'.$var2,$int_srt_luar);
		}
		// END SHEET DATA SERTIFIKAT BSM //

		// SHEET DATA BELUM BRI //
		if ($int_belum_bri > 0) {
			$counterInside = 5;
			$counter       = 6;
			foreach ($nasabah_belum_bri as $key => $value) {
				$akta_belum_bri  = $akta_inv->getData($value['id_u_inv_akta']);
				$excel->setActiveSheetIndex(6)
					  ->setCellValue('A'.$counter,$key+1)
					  ->setCellValue('B'.$counter,$value['nasabah_akta'])
					  ->setCellValue('C'.$counter,$value['kelengkapan'])
					  ->setCellValue('D'.$counter,$value['jenis_pekerjaan'])
					  ->setCellValue('M'.$counter,$value['print_sal'])
					  ->setCellValue('N'.$counter,$value['rpk_mnt'])
					  ->setCellValue('O'.$counter,number_format($value['invoice']))
					  ->setCellValue('P'.$counter,$value['dan_lap'])
					  ->setCellValue('Q'.$counter,$value['exp_skmht'])
					  ->setCellValue('R'.$counter,$value['exp_cnot'])
					  ->setCellValue('S'.$counter,$value['per_lap'])
					  ->setCellValue('T'.$counter,$value['no_sps'])
					  ->setCellValue('U'.$counter,$value['atr_odr'])
					  ->setCellValue('V'.$counter,$value['keterangan']);
					foreach ($akta_belum_bri as $i => $dataAkta) { 
						$counterInside++;
						$excel->setActiveSheetIndex(6)
							  ->setCellValue('E'.$counterInside,$dataAkta['jenis_akta'])
							  ->setCellValue('F'.$counterInside,tanggal_ppat($dataAkta['tgl_akta']))
							  ->setCellValue('G'.$counterInside,$dataAkta['no_akta'])
							  ->setCellValue('H'.$counterInside,tanggal_ppat($dataAkta['ketik_akt']))
							  ->setCellValue('I'.$counterInside,tanggal_ppat($dataAkta['call_akt']))
							  ->setCellValue('J'.$counterInside,tanggal_ppat($dataAkta['ttd_akd']))
							  ->setCellValue('K'.$counterInside,tanggal_ppat($dataAkta['atr_mnt']))
							  ->setCellValue('L'.$counterInside,tanggal_ppat($dataAkta['mnt_kmb']));
				}
				$excel->setActiveSheetIndex(6)
			  	  ->mergeCells('A'.$counter.':A'.$counterInside)
			  	  ->mergeCells('B'.$counter.':B'.$counterInside)
			  	  ->mergeCells('C'.$counter.':C'.$counterInside)
			  	  ->mergeCells('D'.$counter.':D'.$counterInside)
			  	  ->mergeCells('M'.$counter.':M'.$counterInside)
			  	  ->mergeCells('N'.$counter.':N'.$counterInside)
			  	  ->mergeCells('O'.$counter.':O'.$counterInside)
			  	  ->mergeCells('P'.$counter.':P'.$counterInside)
			  	  ->mergeCells('Q'.$counter.':Q'.$counterInside)
			  	  ->mergeCells('R'.$counter.':R'.$counterInside)
			  	  ->mergeCells('S'.$counter.':S'.$counterInside)
			  	  ->mergeCells('T'.$counter.':T'.$counterInside)
			  	  ->mergeCells('U'.$counter.':U'.$counterInside)
			  	  ->mergeCells('V'.$counter.':V'.$counterInside);
				$counter = $counterInside + 1;
			}
		}
		// END SHEET DATA BELUM BRI //

		// SHEET DATA BELUM BNI //
		
		if ($int_belum_bni > 0) {
			$counterInside = 5;
			$counter       = 6;
			foreach ($nasabah_belum_bni as $key => $value) {
				$akta_belum_bni  = $akta_inv->getData($value['id_u_inv_akta']);
				$excel->setActiveSheetIndex(7)
					  ->setCellValue('A'.$counter,$key+1)
					  ->setCellValue('B'.$counter,$value['nasabah_akta'])
					  ->setCellValue('C'.$counter,$value['kelengkapan'])
					  ->setCellValue('D'.$counter,$value['jenis_pekerjaan'])
					  ->setCellValue('M'.$counter,$value['print_sal'])
					  ->setCellValue('N'.$counter,$value['rpk_mnt'])
					  ->setCellValue('O'.$counter,number_format($value['invoice']))
					  ->setCellValue('P'.$counter,$value['dan_lap'])
					  ->setCellValue('Q'.$counter,$value['exp_skmht'])
					  ->setCellValue('R'.$counter,$value['exp_cnot'])
					  ->setCellValue('S'.$counter,$value['per_lap'])
					  ->setCellValue('T'.$counter,$value['no_sps'])
					  ->setCellValue('U'.$counter,$value['atr_odr'])
					  ->setCellValue('V'.$counter,$value['keterangan']);
					foreach ($akta_belum_bni as $i => $dataAkta) { 
						$counterInside++;
						$excel->setActiveSheetIndex(7)
							  ->setCellValue('E'.$counterInside,$dataAkta['jenis_akta'])
							  ->setCellValue('F'.$counterInside,tanggal_ppat($dataAkta['tgl_akta']))
							  ->setCellValue('G'.$counterInside,$dataAkta['no_akta'])
							  ->setCellValue('H'.$counterInside,tanggal_ppat($dataAkta['ketik_akt']))
							  ->setCellValue('I'.$counterInside,tanggal_ppat($dataAkta['call_akt']))
							  ->setCellValue('J'.$counterInside,tanggal_ppat($dataAkta['ttd_akd']))
							  ->setCellValue('K'.$counterInside,tanggal_ppat($dataAkta['atr_mnt']))
							  ->setCellValue('L'.$counterInside,tanggal_ppat($dataAkta['mnt_kmb']));
				}
				$excel->setActiveSheetIndex(7)
			  	  ->mergeCells('A'.$counter.':A'.$counterInside)
			  	  ->mergeCells('B'.$counter.':B'.$counterInside)
			  	  ->mergeCells('C'.$counter.':C'.$counterInside)
			  	  ->mergeCells('D'.$counter.':D'.$counterInside)
			  	  ->mergeCells('M'.$counter.':M'.$counterInside)
			  	  ->mergeCells('N'.$counter.':N'.$counterInside)
			  	  ->mergeCells('O'.$counter.':O'.$counterInside)
			  	  ->mergeCells('P'.$counter.':P'.$counterInside)
			  	  ->mergeCells('Q'.$counter.':Q'.$counterInside)
			  	  ->mergeCells('R'.$counter.':R'.$counterInside)
			  	  ->mergeCells('S'.$counter.':S'.$counterInside)
			  	  ->mergeCells('T'.$counter.':T'.$counterInside)
			  	  ->mergeCells('U'.$counter.':U'.$counterInside)
			  	  ->mergeCells('V'.$counter.':V'.$counterInside);
				$counter = $counterInside + 1;
			}
		}
		// END SHEET DATA BELUM BNI //

		// SHEET DATA BELUM BSM //
		if ($int_belum_bsm > 0) {
			$counterInside = 5;
			$counter       = 6;
			foreach ($nasabah_belum_bsm as $key => $value) {
				$akta_belum_bsm  = $akta_inv->getData($value['id_u_inv_akta']);
				$excel->setActiveSheetIndex(8)
					  ->setCellValue('A'.$counter,$key+1)
					  ->setCellValue('B'.$counter,$value['nasabah_akta'])
					  ->setCellValue('C'.$counter,$value['kelengkapan'])
					  ->setCellValue('D'.$counter,$value['jenis_pekerjaan'])
					  ->setCellValue('M'.$counter,$value['print_sal'])
					  ->setCellValue('N'.$counter,$value['rpk_mnt'])
					  ->setCellValue('O'.$counter,number_format($value['invoice']))
					  ->setCellValue('P'.$counter,$value['dan_lap'])
					  ->setCellValue('Q'.$counter,$value['exp_skmht'])
					  ->setCellValue('R'.$counter,$value['exp_cnot'])
					  ->setCellValue('S'.$counter,$value['per_lap'])
					  ->setCellValue('T'.$counter,$value['no_sps'])
					  ->setCellValue('U'.$counter,$value['atr_odr'])
					  ->setCellValue('V'.$counter,$value['keterangan']);
					foreach ($akta_belum_bsm as $i => $dataAkta) { 
						$counterInside++;
						$excel->setActiveSheetIndex(8)
							  ->setCellValue('E'.$counterInside,$dataAkta['jenis_akta'])
							  ->setCellValue('F'.$counterInside,tanggal_ppat($dataAkta['tgl_akta']))
							  ->setCellValue('G'.$counterInside,$dataAkta['no_akta'])
							  ->setCellValue('H'.$counterInside,tanggal_ppat($dataAkta['ketik_akt']))
							  ->setCellValue('I'.$counterInside,tanggal_ppat($dataAkta['call_akt']))
							  ->setCellValue('J'.$counterInside,tanggal_ppat($dataAkta['ttd_akd']))
							  ->setCellValue('K'.$counterInside,tanggal_ppat($dataAkta['atr_mnt']))
							  ->setCellValue('L'.$counterInside,tanggal_ppat($dataAkta['mnt_kmb']));
				}
				$excel->setActiveSheetIndex(8)
			  	  ->mergeCells('A'.$counter.':A'.$counterInside)
			  	  ->mergeCells('B'.$counter.':B'.$counterInside)
			  	  ->mergeCells('C'.$counter.':C'.$counterInside)
			  	  ->mergeCells('D'.$counter.':D'.$counterInside)
			  	  ->mergeCells('M'.$counter.':M'.$counterInside)
			  	  ->mergeCells('N'.$counter.':N'.$counterInside)
			  	  ->mergeCells('O'.$counter.':O'.$counterInside)
			  	  ->mergeCells('P'.$counter.':P'.$counterInside)
			  	  ->mergeCells('Q'.$counter.':Q'.$counterInside)
			  	  ->mergeCells('R'.$counter.':R'.$counterInside)
			  	  ->mergeCells('S'.$counter.':S'.$counterInside)
			  	  ->mergeCells('T'.$counter.':T'.$counterInside)
			  	  ->mergeCells('U'.$counter.':U'.$counterInside)
			  	  ->mergeCells('V'.$counter.':V'.$counterInside);
				$counter = $counterInside + 1;
			}
		}
		// END SHEET DATA BELUM BSM //

		// SHEET DATA SERTIFIKAT LUAR KOTA //
		if ($int_srt_luar > 0) {
			$counterInside = 6;
			$counter       = 7;
			foreach ($nasabah_srt_luar as $key => $data) {
				$var  = $int_srt_luar + $counter + 1;
				$var2 = $int_srt_luar + $counter + 2;
				$sertifikat_luar = $srt_inv->getData($data['id_u_inv_sertifikat']);
			  	$excel->setActiveSheetIndex(9)
			  		  ->setCellValue('A'.$counter,$key+1)
			  		  ->setCellValue('B'.$counter,$data['jenis_sertifikat'])
			  		  ->setCellValue('C'.$counter,$data['nomor'])
			  		  ->setCellValue('D'.$counter,$data['jenis_bank'])
			  		  ->setCellValue('E'.$counter,$data['nasabah_sertifikat'])
			  		  ->setCellValue('F'.$counter,$data['kantor'])
			  		  ->setCellValue('G'.$counter,$data['bpn'])
			  		  ->setCellValue('H'.$counter,$data['luar'])
			  		  ->setCellValue('L'.$counter,$data['keterangan']);
			  		  foreach ($sertifikat_luar as $key => $value) {
			  		  	$counterInside++;
			  		  	$excel->setActiveSheetIndex(9)
					  		  ->setCellValue('I'.$counterInside,$value['ket_order'])
					  		  ->setCellValue('J'.$counterInside,humanDate($value['masuk']))
					  		  ->setCellValue('K'.$counterInside,humanDate($value['keluar']));
			  		  }
				$excel->setActiveSheetIndex(9)
					  ->mergeCells('A'.$counter.':A'.$counterInside)
					  ->mergeCells('B'.$counter.':B'.$counterInside)
					  ->mergeCells('C'.$counter.':C'.$counterInside)
					  ->mergeCells('D'.$counter.':D'.$counterInside)
					  ->mergeCells('E'.$counter.':E'.$counterInside)
					  ->mergeCells('F'.$counter.':F'.$counterInside)
					  ->mergeCells('G'.$counter.':G'.$counterInside)
					  ->mergeCells('H'.$counter.':H'.$counterInside)
					  ->mergeCells('L'.$counter.':L'.$counterInside);
				 	  $counter = $counterInside + 1;
			}
			$excel->setActiveSheetIndex(9)
			  	  ->mergeCells('A'.$var.':E'.$var)
			  	  ->mergeCells('A'.$var2.':E'.$var2)
			  	  ->mergeCells('F'.$var2.':H'.$var2)
			  	  ->setCellValue('A'.$var,'JUMLAH : ')
			  	  ->setCellValue('F'.$var,'=SUM(F7:F'.$counterInside.')')
			  	  ->setCellValue('G'.$var,'=SUM(G7:G'.$counterInside.')')
			  	  ->setCellValue('H'.$var,'=SUM(H7:H'.$counterInside.')')
			  	  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
			  	  ->setCellValue('F'.$var2,$int_srt_luar);
		}
		// END SHEET DATA SERTIFIKAT LUAR //

		  $excel->getDefaultStyle()->applyFromArray([
		  	'borders' => [
		  		'allborders' => [
		  			'style' => PHPExcel_Style_Border::BORDER_THIN
		  		]
		  	],
		    'font'  => [
		        'bold'  => false,
		        'size'  => 12,
		        'name'  => 'Calibri'
		    ]
		  ]);
		  for ($i=0; $i < 10; $i++) { 
		  	for ($j=1; $j < 4; $j++) {
			  $excel->setActiveSheetIndex($i)->getStyle('A1:A3')->applyFromArray([
			  	'font' => [
			  		'bold' => true,
			  		'size' => 20,
			  		'name' => 'Calibri',
			  	]
			  ]);
			  $excel->setActiveSheetIndex($i)->getRowDimension($j)->setRowHeight(30);
			  $excel->setActiveSheetIndex($i)->getStyle('A1:A3')->applyFromArray([
			  		'alignment' => [
					  		'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
					  	]
					]);
		  	}
		  }
		  $excel->setActiveSheetIndex(0);
		  // END SHEET DATA SERTIFIKAT LUAR KOTA //

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Inventory Notaris.xlsx"');
		header('Cache-Control: max-age=0');
		$to_excel = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
		$to_excel->save('php://output');
		// $this->load->view('errors/coming_soon');
	}
}