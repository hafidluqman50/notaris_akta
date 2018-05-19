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

	public function cetak_excel() {
		$akta_selesai_bri  = $this->akta_inv->exportData(['status'=>1,'jenis_bank'=>'BRI']);
		$akta_selesai_bni  = $this->akta_inv->exportData(['status'=>1,'jenis_bank'=>'BNI']);
		$akta_selesai_bsm  = $this->akta_inv->exportData(['status'=>1,'jenis_bank'=>'BSM']);
		$akta_belum_bri    = $this->akta_inv->exportData(['status'=>0,'jenis_bank'=>'BRI']);
		$akta_belum_bni    = $this->akta_inv->exportData(['status'=>0,'jenis_bank'=>'BNI']);
		$akta_belum_bsm    = $this->akta_inv->exportData(['status'=>0,'jenis_bank'=>'BSM']);
		$sertifikat_bri    = $this->sertifikat_inv->exportData(['jenis_bank'=>'BRI']);
		$sertifikat_bni    = $this->sertifikat_inv->exportData(['jenis_bank'=>'BNI']);
		$sertifikat_bsm    = $this->sertifikat_inv->exportData(['jenis_bank'=>'BSM']);
		$sertifikat_luar   = $this->sertifikat_inv->WhereNotIn(['BRI','BNI','BSM']);
		
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
					  ->setCellValue('T5','LAP SLS')
					  ->setCellValue('U5','ATR ODR')
					  ->setCellValue('V5','KET');
				foreach(range('A','V') as $columnID)
				{
				    $excel->setActiveSheetIndex($i)->getColumnDimension($columnID)->setAutoSize(true);
				}
				$excel->setActiveSheetIndex($i)->getSheetView()->setZoomScale(70);
				$excel->setActiveSheetIndex($i)
					  ->getStyle('A5:V5')->applyFromArray([
					  	'fill' => [
					  		'type' => PHPExcel_Style_Fill::FILL_SOLID,
					  		'color' => ['rgb'=>'245,245,245']
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
					  ->getStyle('B5:V5')
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
					  		'color' => ['rgb'=>'245,245,245']
					  	],
					  	'borders' => [
					  		'allborders' => [
					  			'style' => PHPExcel_Style_Border::BORDER_THIN
					  		]
					  	]
					  ]);
				$excel->setActiveSheetIndex($i)
					  ->getStyle('F6:H6')->applyFromArray([
					  	'fill' => [
					  		'type' => PHPExcel_Style_Fill::FILL_SOLID,
					  		'color' => ['rgb'=>'245,245,245']
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
		  foreach ($akta_selesai_bri->getResult() as $key => $data) {
		  	$selesai_bri[] = [
					'nasabah_akta'    => $data['nasabah_akta'],
					'jenis_bank'      => $data['jenis_bank'],
					'kelengkapan'     => $data['kelengkapan'],
					'jenis_akta'      => $data['jenis_akta'],
					'tgl_akta'		  => $data['tgl_akta'],
					'no_akta'		  => $data['no_akta'],
					'ketik_akt'		  => $data['ketik_akt'],
					'call_akt'		  => $data['call_akt'],
					'ttd_akd'		  => $data['ttd_akd'],
					'atr_mnt'		  => $data['atr_mnt'],
					'mnt_kmb'		  => $data['mnt_kmb'],
					'print_sal'       => $data['print_sal'],
					'rpk_mnt'         => $data['rpk_mnt'],
					'invoice'         => $data['invoice'],
					'dan_lap'         => $data['dan_lap'],
					'exp_skmht'       => $data['exp_skmht'],
					'exp_cnot'        => $data['exp_cnot'],
					'per_lap'         => $data['per_lap'],
					'no_sps'          => $data['no_sps'],
					'atr_odr'         => $data['atr_odr'],
					'jenis_pekerjaan' => $data['jenis_pekerjaan'],
					'keterangan'      => $data['keterangan']
		  	];
		  }
		  for ($i=1; $i <= $akta_selesai_bri->countRows(); $i++) { 
		  		$counter = $i+5;
		  		$index = $i-1;
				$excel->setActiveSheetIndex(0)
					  ->setCellValue('A'.$counter,$i)
					  ->setCellValue('B'.$counter,$selesai_bri[$index]['nasabah_akta'])
					  ->setCellValue('C'.$counter,$selesai_bri[$index]['kelengkapan'])
					  ->setCellValue('D'.$counter,$selesai_bri[$index]['jenis_pekerjaan'])
					  ->setCellValue('E'.$counter,$selesai_bri[$index]['jenis_akta'])
					  ->setCellValue('F'.$counter,$selesai_bri[$index]['tgl_akta'])
					  ->setCellValue('G'.$counter,$selesai_bri[$index]['no_akta'])
					  ->setCellValue('H'.$counter,$selesai_bri[$index]['ketik_akt'])
					  ->setCellValue('I'.$counter,$selesai_bri[$index]['call_akt'])
					  ->setCellValue('J'.$counter,$selesai_bri[$index]['ttd_akd'])
					  ->setCellValue('K'.$counter,$selesai_bri[$index]['atr_mnt'])
					  ->setCellValue('L'.$counter,$selesai_bri[$index]['mnt_kmb'])
					  ->setCellValue('M'.$counter,$selesai_bri[$index]['print_sal'])
					  ->setCellValue('N'.$counter,$selesai_bri[$index]['rpk_mnt'])
					  ->setCellValue('O'.$counter,$selesai_bri[$index]['invoice'])
					  ->setCellValue('P'.$counter,$selesai_bri[$index]['dan_lap'])
					  ->setCellValue('Q'.$counter,$selesai_bri[$index]['exp_skmht'])
					  ->setCellValue('R'.$counter,$selesai_bri[$index]['exp_cnot'])
					  ->setCellValue('S'.$counter,$selesai_bri[$index]['per_lap'])
					  ->setCellValue('T'.$counter,$selesai_bri[$index]['no_sps'])
					  ->setCellValue('U'.$counter,$selesai_bri[$index]['atr_odr'])
					  ->setCellValue('V'.$counter,$selesai_bri[$index]['keterangan']);
		  }
		 // END SHEET DATA SELESAI BRI //


			// SHEET DATA SELESAI BNI //
		  foreach ($akta_selesai_bni->getResult() as $key => $data) {
		  	$selesai_bni[] = [
					'nasabah_akta'    => $data['nasabah_akta'],
					'jenis_bank'      => $data['jenis_bank'],
					'kelengkapan'     => $data['kelengkapan'],
					'jenis_akta'      => $data['jenis_akta'],
					'tgl_akta'		  => $data['tgl_akta'],
					'no_akta'		  => $data['no_akta'],
					'ketik_akt'		  => $data['ketik_akt'],
					'call_akt'		  => $data['call_akt'],
					'ttd_akd'		  => $data['ttd_akd'],
					'atr_mnt'		  => $data['atr_mnt'],
					'mnt_kmb'		  => $data['mnt_kmb'],
					'print_sal'       => $data['print_sal'],
					'rpk_mnt'         => $data['rpk_mnt'],
					'invoice'         => $data['invoice'],
					'dan_lap'         => $data['dan_lap'],
					'exp_skmht'       => $data['exp_skmht'],
					'exp_cnot'        => $data['exp_cnot'],
					'per_lap'         => $data['per_lap'],
					'no_sps'          => $data['no_sps'],
					'atr_odr'         => $data['atr_odr'],
					'jenis_pekerjaan' => $data['jenis_pekerjaan'],
					'keterangan'      => $data['keterangan']
		  	];
		  }
		  for ($i=1; $i <= $akta_selesai_bni->countRows(); $i++) { 
		  		$counter = $i+5;
		  		$index = $i-1;
				$excel->setActiveSheetIndex(1)
					  ->setCellValue('A'.$counter,$i)
					  ->setCellValue('B'.$counter,$selesai_bni[$index]['nasabah_akta'])
					  ->setCellValue('C'.$counter,$selesai_bni[$index]['kelengkapan'])
					  ->setCellValue('D'.$counter,$selesai_bni[$index]['jenis_pekerjaan'])
					  ->setCellValue('E'.$counter,$selesai_bni[$index]['jenis_akta'])
					  ->setCellValue('F'.$counter,$selesai_bni[$index]['tgl_akta'])
					  ->setCellValue('G'.$counter,$selesai_bni[$index]['no_akta'])
					  ->setCellValue('H'.$counter,$selesai_bni[$index]['ketik_akt'])
					  ->setCellValue('I'.$counter,$selesai_bni[$index]['call_akt'])
					  ->setCellValue('J'.$counter,$selesai_bni[$index]['ttd_akd'])
					  ->setCellValue('K'.$counter,$selesai_bni[$index]['atr_mnt'])
					  ->setCellValue('L'.$counter,$selesai_bni[$index]['mnt_kmb'])
					  ->setCellValue('M'.$counter,$selesai_bni[$index]['print_sal'])
					  ->setCellValue('N'.$counter,$selesai_bni[$index]['rpk_mnt'])
					  ->setCellValue('O'.$counter,$selesai_bni[$index]['invoice'])
					  ->setCellValue('P'.$counter,$selesai_bni[$index]['dan_lap'])
					  ->setCellValue('Q'.$counter,$selesai_bni[$index]['exp_skmht'])
					  ->setCellValue('R'.$counter,$selesai_bni[$index]['exp_cnot'])
					  ->setCellValue('S'.$counter,$selesai_bni[$index]['per_lap'])
					  ->setCellValue('T'.$counter,$selesai_bni[$index]['no_sps'])
					  ->setCellValue('U'.$counter,$selesai_bni[$index]['atr_odr'])
					  ->setCellValue('V'.$counter,$selesai_bni[$index]['keterangan']);
		  }
		 // END SHEET DATA SELESAI BNI //

			// SHEET DATA SELESAI BSM //
		  foreach ($akta_selesai_bsm->getResult() as $key => $data) {
		  	$selesai_bsm[] = [
					'nasabah_akta'    => $data['nasabah_akta'],
					'jenis_bank'      => $data['jenis_bank'],
					'kelengkapan'     => $data['kelengkapan'],
					'jenis_akta'      => $data['jenis_akta'],
					'tgl_akta'		  => $data['tgl_akta'],
					'no_akta'		  => $data['no_akta'],
					'ketik_akt'		  => $data['ketik_akt'],
					'call_akt'		  => $data['call_akt'],
					'ttd_akd'		  => $data['ttd_akd'],
					'atr_mnt'		  => $data['atr_mnt'],
					'mnt_kmb'		  => $data['mnt_kmb'],
					'print_sal'       => $data['print_sal'],
					'rpk_mnt'         => $data['rpk_mnt'],
					'invoice'         => $data['invoice'],
					'dan_lap'         => $data['dan_lap'],
					'exp_skmht'       => $data['exp_skmht'],
					'exp_cnot'        => $data['exp_cnot'],
					'per_lap'         => $data['per_lap'],
					'no_sps'          => $data['no_sps'],
					'atr_odr'         => $data['atr_odr'],
					'jenis_pekerjaan' => $data['jenis_pekerjaan'],
					'keterangan'      => $data['keterangan']
		  	];
		  }
		  for ($i=1; $i <= $akta_selesai_bsm->countRows(); $i++) { 
		  		$counter = $i+5;
		  		$index = $i-1;
		  		$cek = $this->akta_inv->exportData(['nasabah_akta'=>$selesai_bsm[$index]['nasabah_akta']])->countRows();
				$merge = $cek + $counter - 1;
				$excel->setActiveSheetIndex(2)
					  ->setCellValue('A'.$counter,$i)
					  ->setCellValue('B'.$counter,$selesai_bsm[$index]['nasabah_akta'])
					  ->setCellValue('C'.$counter,$selesai_bsm[$index]['kelengkapan'])
					  ->setCellValue('D'.$counter,$selesai_bsm[$index]['jenis_pekerjaan'])
					  ->setCellValue('E'.$counter,$selesai_bsm[$index]['jenis_akta'])
					  ->setCellValue('F'.$counter,$selesai_bsm[$index]['tgl_akta'])
					  ->setCellValue('G'.$counter,$selesai_bsm[$index]['no_akta'])
					  ->setCellValue('H'.$counter,$selesai_bsm[$index]['ketik_akt'])
					  ->setCellValue('I'.$counter,$selesai_bsm[$index]['call_akt'])
					  ->setCellValue('J'.$counter,$selesai_bsm[$index]['ttd_akd'])
					  ->setCellValue('K'.$counter,$selesai_bsm[$index]['atr_mnt'])
					  ->setCellValue('L'.$counter,$selesai_bsm[$index]['mnt_kmb'])
					  ->setCellValue('M'.$counter,$selesai_bsm[$index]['print_sal'])
					  ->setCellValue('N'.$counter,$selesai_bsm[$index]['rpk_mnt'])
					  ->setCellValue('O'.$counter,$selesai_bsm[$index]['invoice'])
					  ->setCellValue('P'.$counter,$selesai_bsm[$index]['dan_lap'])
					  ->setCellValue('Q'.$counter,$selesai_bsm[$index]['exp_skmht'])
					  ->setCellValue('R'.$counter,$selesai_bsm[$index]['exp_cnot'])
					  ->setCellValue('S'.$counter,$selesai_bsm[$index]['per_lap'])
					  ->setCellValue('T'.$counter,$selesai_bsm[$index]['no_sps'])
					  ->setCellValue('U'.$counter,$selesai_bsm[$index]['atr_odr'])
					  ->setCellValue('V'.$counter,$selesai_bsm[$index]['keterangan']);
		  }
		 // END SHEET DATA SELESAI BSM //

		  // SHEET DATA SERTIFIKAT BRI //

		  foreach ($sertifikat_bri->getResult() as $key => $data) {
		  		$srt_bri[] = [
						'nasabah_sertifikat' => $data['nasabah_sertifikat'],
						'jenis_bank'         => $data['jenis_bank'],
						'jenis_sertifikat'   => $data['jenis_sertifikat'],
						'nomor'              => $data['nomor'],
						'kantor'             => $data['kantor'],
						'bpn'                => $data['bpn'],
						'luar'               => $data['luar'],
						'order'              => $data['ket_order'],
						'masuk'              => $data['masuk'],
						'keluar'             => $data['keluar'],
						'keterangan'		 => $data['keterangan']
		  		];
		  }

		  for ($i=1; $i <=$sertifikat_bri->countRows() ; $i++) { 
		  	$counter = $i+6;
		  	$index = $i-1;
		  	$var = $sertifikat_luar->countRows() + $counter + 1;
		  	$var2 = $sertifikat_luar->countRows() + $counter + 2;
		  	$excel->setActiveSheetIndex(3)
		  		  ->mergeCells('A'.$var.':E'.$var)
		  		  ->mergeCells('A'.$var2.':H'.$var2)
		  		  ->setCellValue('A'.$counter,$i)
		  		  ->setCellValue('B'.$counter,$srt_bri[$index]['jenis_sertifikat'])
		  		  ->setCellValue('C'.$counter,$srt_bri[$index]['nomor'])
		  		  ->setCellValue('D'.$counter,$srt_bri[$index]['jenis_bank'])
		  		  ->setCellValue('E'.$counter,$srt_bri[$index]['nasabah_sertifikat'])
		  		  ->setCellValue('F'.$counter,$srt_bri[$index]['kantor'])
		  		  ->setCellValue('G'.$counter,$srt_bri[$index]['bpn'])
		  		  ->setCellValue('H'.$counter,$srt_bri[$index]['luar'])
		  		  ->setCellValue('I'.$counter,$srt_bri[$index]['order'])
		  		  ->setCellValue('J'.$counter,$srt_bri[$index]['masuk'])
		  		  ->setCellValue('K'.$counter,$srt_bri[$index]['keluar'])
		  		  ->setCellValue('L'.$counter,$srt_bri[$index]['keterangan']);
		  }
		  $excel->setActiveSheetIndex(3)
		  		  ->setCellValue('A'.$var,'JUMLAH : ')
		  		  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
		  		  ->setCellValue('F'.$var,'')
		  		  ->setCellValue('G'.$var,'')
		  		  ->setCellValue('H'.$var,'');
		  // END SHEET DATA SERTIFIKAT BRI //

		  // SHEET DATA SERTIFIKAT BRI //

		  foreach ($sertifikat_bri->getResult() as $key => $data) {
		  		$srt_bri[] = [
						'nasabah_sertifikat' => $data['nasabah_sertifikat'],
						'jenis_bank'         => $data['jenis_bank'],
						'jenis_sertifikat'   => $data['jenis_sertifikat'],
						'nomor'              => $data['nomor'],
						'kantor'             => $data['kantor'],
						'bpn'                => $data['bpn'],
						'luar'               => $data['luar'],
						'order'              => $data['ket_order'],
						'masuk'              => $data['masuk'],
						'keluar'             => $data['keluar'],
						'keterangan'		 => $data['keterangan']
		  		];
		  }

		  for ($i=1; $i <= $sertifikat_bri->countRows() ; $i++) { 
		  	$counter = $i+6;
		  	$index = $i-1;
		  	$excel->setActiveSheetIndex(3)
		  		  ->setCellValue('A'.$counter,$i)
		  		  ->setCellValue('B'.$counter,$srt_bri[$index]['jenis_sertifikat'])
		  		  ->setCellValue('C'.$counter,$srt_bri[$index]['nomor'])
		  		  ->setCellValue('D'.$counter,$srt_bri[$index]['jenis_bank'])
		  		  ->setCellValue('E'.$counter,$srt_bri[$index]['nasabah_sertifikat'])
		  		  ->setCellValue('F'.$counter,$srt_bri[$index]['kantor'])
		  		  ->setCellValue('G'.$counter,$srt_bri[$index]['bpn'])
		  		  ->setCellValue('H'.$counter,$srt_bri[$index]['luar'])
		  		  ->setCellValue('I'.$counter,$srt_bri[$index]['order'])
		  		  ->setCellValue('J'.$counter,$srt_bri[$index]['masuk'])
		  		  ->setCellValue('K'.$counter,$srt_bri[$index]['keluar'])
		  		  ->setCellValue('L'.$counter,$srt_bri[$index]['keterangan']);
		  }

		  // END SHEET DATA SERTIFIKAT BRI // 										

		  // SHEET DATA SERTIFIKAT BNI //

		  foreach ($sertifikat_bni->getResult() as $key => $data) {
		  		$srt_bni[] = [
						'nasabah_sertifikat' => $data['nasabah_sertifikat'],
						'jenis_bank'         => $data['jenis_bank'],
						'jenis_sertifikat'   => $data['jenis_sertifikat'],
						'nomor'              => $data['nomor'],
						'kantor'             => $data['kantor'],
						'bpn'                => $data['bpn'],
						'luar'               => $data['luar'],
						'order'              => $data['ket_order'],
						'masuk'              => $data['masuk'],
						'keluar'             => $data['keluar'],
						'keterangan'		 => $data['keterangan']
		  		];
		  }

		  for ($i=1; $i <= $sertifikat_bni->countRows() ; $i++) { 
		  	$counter = $i+6;
		  	$index = $i-1;
		  	$var = $sertifikat_luar->countRows() + $counter + 1;
		  	$var2 = $sertifikat_luar->countRows() + $counter + 2;
		  	$excel->setActiveSheetIndex(4)
		  		  ->mergeCells('A'.$var.':E'.$var)
		  		  ->mergeCells('A'.$var2.':H'.$var2)
		  		  ->setCellValue('A'.$counter,$i)
		  		  ->setCellValue('B'.$counter,$srt_bni[$index]['jenis_sertifikat'])
		  		  ->setCellValue('C'.$counter,$srt_bni[$index]['nomor'])
		  		  ->setCellValue('D'.$counter,$srt_bni[$index]['jenis_bank'])
		  		  ->setCellValue('E'.$counter,$srt_bni[$index]['nasabah_sertifikat'])
		  		  ->setCellValue('F'.$counter,$srt_bni[$index]['kantor'])
		  		  ->setCellValue('G'.$counter,$srt_bni[$index]['bpn'])
		  		  ->setCellValue('H'.$counter,$srt_bni[$index]['luar'])
		  		  ->setCellValue('I'.$counter,$srt_bni[$index]['order'])
		  		  ->setCellValue('J'.$counter,$srt_bni[$index]['masuk'])
		  		  ->setCellValue('K'.$counter,$srt_bni[$index]['keluar'])
		  		  ->setCellValue('L'.$counter,$srt_bni[$index]['keterangan']);
		  }
		  $excel->setActiveSheetIndex(4)
		  		  ->setCellValue('A'.$var,'JUMLAH : ')
		  		  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
		  		  ->setCellValue('F'.$var,'')
		  		  ->setCellValue('G'.$var,'')
		  		  ->setCellValue('H'.$var,'');
		  // END SHEET DATA SERTIFIKAT BNI //

		  // SHEET DATA SERTIFIKAT BSM //

		  foreach ($sertifikat_bsm->getResult() as $key => $data) {
		  		$srt_bsm[] = [
						'nasabah_sertifikat' => $data['nasabah_sertifikat'],
						'jenis_bank'         => $data['jenis_bank'],
						'jenis_sertifikat'   => $data['jenis_sertifikat'],
						'nomor'              => $data['nomor'],
						'kantor'             => $data['kantor'],
						'bpn'                => $data['bpn'],
						'luar'               => $data['luar'],
						'order'              => $data['ket_order'],
						'masuk'              => $data['masuk'],
						'keluar'             => $data['keluar'],
						'keterangan'		 => $data['keterangan']
		  		];
		  }

		  for ($i=1; $i <=$sertifikat_bsm->countRows() ; $i++) { 
		  	$counter = $i+6;
		  	$index = $i-1;
		  	$var = $sertifikat_luar->countRows() + $counter + 1;
		  	$var2 = $sertifikat_luar->countRows() + $counter + 2;
		  	$excel->setActiveSheetIndex(5)
		  		  ->mergeCells('A'.$var.':E'.$var)
		  		  ->mergeCells('A'.$var2.':H'.$var2)
		  		  ->setCellValue('A'.$counter,$i)
		  		  ->setCellValue('B'.$counter,$srt_bsm[$index]['jenis_sertifikat'])
		  		  ->setCellValue('C'.$counter,$srt_bsm[$index]['nomor'])
		  		  ->setCellValue('D'.$counter,$srt_bsm[$index]['jenis_bank'])
		  		  ->setCellValue('E'.$counter,$srt_bsm[$index]['nasabah_sertifikat'])
		  		  ->setCellValue('F'.$counter,$srt_bsm[$index]['kantor'])
		  		  ->setCellValue('G'.$counter,$srt_bsm[$index]['bpn'])
		  		  ->setCellValue('H'.$counter,$srt_bsm[$index]['luar'])
		  		  ->setCellValue('I'.$counter,$srt_bsm[$index]['order'])
		  		  ->setCellValue('J'.$counter,$srt_bsm[$index]['masuk'])
		  		  ->setCellValue('K'.$counter,$srt_bsm[$index]['keluar'])
		  		  ->setCellValue('L'.$counter,$srt_bsm[$index]['keterangan']);
		  }
		  $excel->setActiveSheetIndex(5)
		  		  ->setCellValue('A'.$var,'JUMLAH : ')
		  		  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
		  		  ->setCellValue('F'.$var,'')
		  		  ->setCellValue('G'.$var,'')
		  		  ->setCellValue('H'.$var,'');
		  // END SHEET DATA SERTIFIKAT BSM //

		 // SHEET DATA SELESAI BRI //
		  foreach ($akta_belum_bri->getResult() as $key => $data) {
		  	$belum_bri[] = [
					'nasabah_akta'    => $data['nasabah_akta'],
					'jenis_bank'      => $data['jenis_bank'],
					'kelengkapan'     => $data['kelengkapan'],
					'jenis_akta'      => $data['jenis_akta'],
					'tgl_akta'		  => $data['tgl_akta'],
					'no_akta'		  => $data['no_akta'],
					'ketik_akt'		  => $data['ketik_akt'],
					'call_akt'		  => $data['call_akt'],
					'ttd_akd'		  => $data['ttd_akd'],
					'atr_mnt'		  => $data['atr_mnt'],
					'mnt_kmb'		  => $data['mnt_kmb'],
					'print_sal'       => $data['print_sal'],
					'rpk_mnt'         => $data['rpk_mnt'],
					'invoice'         => $data['invoice'],
					'dan_lap'         => $data['dan_lap'],
					'exp_skmht'       => $data['exp_skmht'],
					'exp_cnot'        => $data['exp_cnot'],
					'per_lap'         => $data['per_lap'],
					'no_sps'          => $data['no_sps'],
					'atr_odr'         => $data['atr_odr'],
					'jenis_pekerjaan' => $data['jenis_pekerjaan'],
					'keterangan'      => $data['keterangan']
		  	];
		  }
		  for ($i=1; $i <= $akta_belum_bri->countRows(); $i++) { 
		  		$counter = $i+5;
		  		$index = $i-1;
				$excel->setActiveSheetIndex(6)
					  ->setCellValue('A'.$counter,$i)
					  ->setCellValue('B'.$counter,$belum_bri[$index]['nasabah_akta'])
					  ->setCellValue('C'.$counter,$belum_bri[$index]['kelengkapan'])
					  ->setCellValue('D'.$counter,$belum_bri[$index]['jenis_pekerjaan'])
					  ->setCellValue('E'.$counter,$belum_bri[$index]['jenis_akta'])
					  ->setCellValue('F'.$counter,$belum_bri[$index]['tgl_akta'])
					  ->setCellValue('G'.$counter,$belum_bri[$index]['no_akta'])
					  ->setCellValue('H'.$counter,$belum_bri[$index]['ketik_akt'])
					  ->setCellValue('I'.$counter,$belum_bri[$index]['call_akt'])
					  ->setCellValue('J'.$counter,$belum_bri[$index]['ttd_akd'])
					  ->setCellValue('K'.$counter,$belum_bri[$index]['atr_mnt'])
					  ->setCellValue('L'.$counter,$belum_bri[$index]['mnt_kmb'])
					  ->setCellValue('M'.$counter,$belum_bri[$index]['print_sal'])
					  ->setCellValue('N'.$counter,$belum_bri[$index]['rpk_mnt'])
					  ->setCellValue('O'.$counter,$belum_bri[$index]['invoice'])
					  ->setCellValue('P'.$counter,$belum_bri[$index]['dan_lap'])
					  ->setCellValue('Q'.$counter,$belum_bri[$index]['exp_skmht'])
					  ->setCellValue('R'.$counter,$belum_bri[$index]['exp_cnot'])
					  ->setCellValue('S'.$counter,$belum_bri[$index]['per_lap'])
					  ->setCellValue('T'.$counter,$belum_bri[$index]['no_sps'])
					  ->setCellValue('U'.$counter,$belum_bri[$index]['atr_odr'])
					  ->setCellValue('V'.$counter,$belum_bri[$index]['keterangan']);
		  }
		 // END SHEET DATA SELESAI BRI //

		 // SHEET DATA SELESAI BNI //
		  foreach ($akta_belum_bni->getResult() as $key => $data) {
		  	$belum_bni[] = [
					'nasabah_akta'    => $data['nasabah_akta'],
					'jenis_bank'      => $data['jenis_bank'],
					'kelengkapan'     => $data['kelengkapan'],
					'jenis_akta'      => $data['jenis_akta'],
					'tgl_akta'		  => $data['tgl_akta'],
					'no_akta'		  => $data['no_akta'],
					'ketik_akt'		  => $data['ketik_akt'],
					'call_akt'		  => $data['call_akt'],
					'ttd_akd'		  => $data['ttd_akd'],
					'atr_mnt'		  => $data['atr_mnt'],
					'mnt_kmb'		  => $data['mnt_kmb'],
					'print_sal'       => $data['print_sal'],
					'rpk_mnt'         => $data['rpk_mnt'],
					'invoice'         => $data['invoice'],
					'dan_lap'         => $data['dan_lap'],
					'exp_skmht'       => $data['exp_skmht'],
					'exp_cnot'        => $data['exp_cnot'],
					'per_lap'         => $data['per_lap'],
					'no_sps'          => $data['no_sps'],
					'atr_odr'         => $data['atr_odr'],
					'jenis_pekerjaan' => $data['jenis_pekerjaan'],
					'keterangan'      => $data['keterangan']
		  	];
		  }
		  for ($i=1; $i <= $akta_belum_bni->countRows(); $i++) { 
		  		$counter = $i+5;
		  		$index = $i-1;
				$excel->setActiveSheetIndex(7)
					  ->setCellValue('A'.$counter,$i)
					  ->setCellValue('B'.$counter,$belum_bni[$index]['nasabah_akta'])
					  ->setCellValue('C'.$counter,$belum_bni[$index]['kelengkapan'])
					  ->setCellValue('D'.$counter,$belum_bni[$index]['jenis_pekerjaan'])
					  ->setCellValue('E'.$counter,$belum_bni[$index]['jenis_akta'])
					  ->setCellValue('F'.$counter,$belum_bni[$index]['tgl_akta'])
					  ->setCellValue('G'.$counter,$belum_bni[$index]['no_akta'])
					  ->setCellValue('H'.$counter,$belum_bni[$index]['ketik_akt'])
					  ->setCellValue('I'.$counter,$belum_bni[$index]['call_akt'])
					  ->setCellValue('J'.$counter,$belum_bni[$index]['ttd_akd'])
					  ->setCellValue('K'.$counter,$belum_bni[$index]['atr_mnt'])
					  ->setCellValue('L'.$counter,$belum_bni[$index]['mnt_kmb'])
					  ->setCellValue('M'.$counter,$belum_bni[$index]['print_sal'])
					  ->setCellValue('N'.$counter,$belum_bni[$index]['rpk_mnt'])
					  ->setCellValue('O'.$counter,$belum_bni[$index]['invoice'])
					  ->setCellValue('P'.$counter,$belum_bni[$index]['dan_lap'])
					  ->setCellValue('Q'.$counter,$belum_bni[$index]['exp_skmht'])
					  ->setCellValue('R'.$counter,$belum_bni[$index]['exp_cnot'])
					  ->setCellValue('S'.$counter,$belum_bni[$index]['per_lap'])
					  ->setCellValue('T'.$counter,$belum_bni[$index]['no_sps'])
					  ->setCellValue('U'.$counter,$belum_bni[$index]['atr_odr'])
					  ->setCellValue('V'.$counter,$belum_bni[$index]['keterangan']);
		  }
		 // END SHEET DATA SELESAI BNI //

		 // SHEET DATA SELESAI BSM //
		  foreach ($akta_belum_bsm->getResult() as $key => $data) {
		  	$belum_bsm[] = [
					'nasabah_akta'    => $data['nasabah_akta'],
					'jenis_bank'      => $data['jenis_bank'],
					'kelengkapan'     => $data['kelengkapan'],
					'jenis_akta'      => $data['jenis_akta'],
					'tgl_akta'		  => $data['tgl_akta'],
					'no_akta'		  => $data['no_akta'],
					'ketik_akt'		  => $data['ketik_akt'],
					'call_akt'		  => $data['call_akt'],
					'ttd_akd'		  => $data['ttd_akd'],
					'atr_mnt'		  => $data['atr_mnt'],
					'mnt_kmb'		  => $data['mnt_kmb'],
					'print_sal'       => $data['print_sal'],
					'rpk_mnt'         => $data['rpk_mnt'],
					'invoice'         => $data['invoice'],
					'dan_lap'         => $data['dan_lap'],
					'exp_skmht'       => $data['exp_skmht'],
					'exp_cnot'        => $data['exp_cnot'],
					'per_lap'         => $data['per_lap'],
					'no_sps'          => $data['no_sps'],
					'atr_odr'         => $data['atr_odr'],
					'jenis_pekerjaan' => $data['jenis_pekerjaan'],
					'keterangan'      => $data['keterangan']
		  	];
		  }
		  for ($i=1; $i <= $akta_belum_bsm->countRows(); $i++) { 
		  		$counter = $i+5;
		  		$index = $i-1;
				$excel->setActiveSheetIndex(8)
					  ->setCellValue('A'.$counter,$i)
					  ->setCellValue('B'.$counter,$belum_bsm[$index]['nasabah_akta'])
					  ->setCellValue('C'.$counter,$belum_bsm[$index]['kelengkapan'])
					  ->setCellValue('D'.$counter,$belum_bsm[$index]['jenis_pekerjaan'])
					  ->setCellValue('E'.$counter,$belum_bsm[$index]['jenis_akta'])
					  ->setCellValue('F'.$counter,$belum_bsm[$index]['tgl_akta'])
					  ->setCellValue('G'.$counter,$belum_bsm[$index]['no_akta'])
					  ->setCellValue('H'.$counter,$belum_bsm[$index]['ketik_akt'])
					  ->setCellValue('I'.$counter,$belum_bsm[$index]['call_akt'])
					  ->setCellValue('J'.$counter,$belum_bsm[$index]['ttd_akd'])
					  ->setCellValue('K'.$counter,$belum_bsm[$index]['atr_mnt'])
					  ->setCellValue('L'.$counter,$belum_bsm[$index]['mnt_kmb'])
					  ->setCellValue('M'.$counter,$belum_bsm[$index]['print_sal'])
					  ->setCellValue('N'.$counter,$belum_bsm[$index]['rpk_mnt'])
					  ->setCellValue('O'.$counter,$belum_bsm[$index]['invoice'])
					  ->setCellValue('P'.$counter,$belum_bsm[$index]['dan_lap'])
					  ->setCellValue('Q'.$counter,$belum_bsm[$index]['exp_skmht'])
					  ->setCellValue('R'.$counter,$belum_bsm[$index]['exp_cnot'])
					  ->setCellValue('S'.$counter,$belum_bsm[$index]['per_lap'])
					  ->setCellValue('T'.$counter,$belum_bsm[$index]['no_sps'])
					  ->setCellValue('U'.$counter,$belum_bsm[$index]['atr_odr'])
					  ->setCellValue('V'.$counter,$belum_bsm[$index]['keterangan']);
		  }
		 // END SHEET DATA SELESAI BSM //

		  // SHEET DATA SERTIFIKAT LUAR KOTA //

		  foreach ($sertifikat_luar->getResult() as $key => $data) {
		  		$srt_luar[] = [
						'nasabah_sertifikat' => $data['nasabah_sertifikat'],
						'jenis_bank'         => $data['jenis_bank'],
						'jenis_sertifikat'   => $data['jenis_sertifikat'],
						'nomor'              => $data['nomor'],
						'kantor'             => $data['kantor'],
						'bpn'                => $data['bpn'],
						'luar'               => $data['luar'],
						'order'              => $data['ket_order'],
						'masuk'              => $data['masuk'],
						'keluar'             => $data['keluar'],
						'keterangan'		 => $data['keterangan']
		  		];
		  }

		  for ($i=1; $i <= $sertifikat_luar->countRows() ; $i++) { 
		  	$counter = $i+6;
		  	$index = $i-1;
		  	$var = $sertifikat_luar->countRows() + $counter + 1;
		  	$var2 = $sertifikat_luar->countRows() + $counter + 2;
		  	$excel->setActiveSheetIndex(9)
		  		  ->mergeCells('A'.$var.':E'.$var)
		  		  ->mergeCells('A'.$var2.':H'.$var2)
		  		  ->setCellValue('A'.$counter,$i)
		  		  ->setCellValue('B'.$counter,$srt_luar[$index]['jenis_sertifikat'])
		  		  ->setCellValue('C'.$counter,$srt_luar[$index]['nomor'])
		  		  ->setCellValue('D'.$counter,$srt_luar[$index]['jenis_bank'])
		  		  ->setCellValue('E'.$counter,$srt_luar[$index]['nasabah_sertifikat'])
		  		  ->setCellValue('F'.$counter,$srt_luar[$index]['kantor'])
		  		  ->setCellValue('G'.$counter,$srt_luar[$index]['bpn'])
		  		  ->setCellValue('H'.$counter,$srt_luar[$index]['luar'])
		  		  ->setCellValue('I'.$counter,$srt_luar[$index]['order'])
		  		  ->setCellValue('J'.$counter,$srt_luar[$index]['masuk'])
		  		  ->setCellValue('K'.$counter,$srt_luar[$index]['keluar'])
		  		  ->setCellValue('L'.$counter,$srt_luar[$index]['keterangan']);
		  }
		  $excel->setActiveSheetIndex(9)
		  		  ->setCellValue('A'.$var,'JUMLAH : ')
		  		  ->setCellValue('A'.$var2,'TOTAL SERTIFIKAT : ')
		  		  ->setCellValue('F'.$var,'')
		  		  ->setCellValue('G'.$var,'')
		  		  ->setCellValue('H'.$var,'');
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