<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AktaPpat extends CI_Controller {

	function __construct() {
		parent::__construct();
		isLogin();
		$this->load->model('ppat/skmhtmodel','skmht');
		$this->load->model('ppat/aphtmodel','apht');
		$this->load->model('ppat/ajbmodel','ajb');
		$this->load->model('Surataktamodel','surat');
	}

	//============= AKTA PPAT ============//
	public function data_skmht() {
		$data['title'] = 'Data SKMHT';
		$data['page'] = 'ppat';
		if ($this->session->userdata('level') == 1) {
			$data['data_skmht'] = $this->skmht->findAll();
		}
		else {
			$data['data_skmht'] = $this->skhmt->findAll($this->session->userdata('id'));
		}
		$this->load->view('data_ppat/data_skmht',$data);
	}

	public function add_skmht() {
		$data['title'] = 'Tambah Data SKMHT';
		$data['page'] = 'ppat';
		$this->load->view('data_ppat/form_skmht',$data);
	}

	public function edit_skmht($id) {
		$data['title'] = 'Edit Data SKMHT';
		$data['page'] = 'ppat';
		$data['row'] = $this->ppat->findById($id);
		$this->load->view('data_ppat/form_skmht',$data);
	}

	public function data_apht() {
		$data['title'] = 'Data APHT';
		$data['page'] = 'ppat';
		if ($this->session->userdata('level') == 1) {
			$data['data_skmht'] = $this->skmht->findAll();
		}
		else {
			$data['data_skmht'] = $this->skmht->findAll($this->session->userdata('id'));
		}
		$this->load->view('data_ppat/data_apht',$data);
	}

	public function form_apht($id) {
		$data['title'] = 'Add Data APHT';
		$data['page'] = 'ppat';
		$data['cek'] = $this->apht->cekAkta($id);
		$data['row'] = $this->apht->findAkta($id);
		$this->load->view('data_ppat/form_apht',$data);
	}

	public function data_ajb() {
		$data['title'] = 'Data AJB';
		$data['page'] = 'ppat';
		if ($this->session->userdata('level') == 1) {
			$data['data_skmht'] = $this->skmht->findAll();
		}
		else {
			$data['data_skmht'] = $this->skmht->findAll($this->session->userdata('id'));
		}
		$this->load->view('data_ppat/data_ajb',$data);
	}

	public function form_ajb($id) {
		$data['title'] = 'Tambah Data AJB';
		$data['page']  = 'ppat';
		$data['cek']   = $this->ajb->cekAkta($id);
		$data['row']   = $this->ajb->findAkta($id);
		$this->load->view('data_ppat/form_ajb',$data);
	}
	
	public function save_skmht() {
		if ($this->input->post('takis')) {
			$nomor_akta                  = $this->input->post('nomor_akta');
			$tanggal_akta                = $this->input->post('tgl_surat_akta');
			$gelar_penjual               = $this->input->post('gelar_penjual');
			$nama_penjual                = $this->input->post('nama_penjual');
			$tempat_lahir_penjual        = $this->input->post('tmpt_lhr_penjual');
			$tanggal_lahir_penjual       = $this->input->post('tgl_lhr_penjual');
			$pekerjaan_penjual           = $this->input->post('pekerjaan_penjual');
			$alamat_penjual              = $this->input->post('alamat_penjual');
			$rt_penjual                  = $this->input->post('rt_penjual');
			$kelurahan_penjual           = $this->input->post('kelurahan_penjual');
			$nama_kelurahan_penjual      = $this->input->post('nama_kelurahan_penjual');
			$kecamatan_penjual           = $this->input->post('kecamatan_penjual');
			$kota_penjual                = $this->input->post('kota_penjual');
			$nama_kota_penjual           = $this->input->post('nama_kota_penjual');
			$nomor_identitas_penjual     = $this->input->post('nomor_identitas_penjual');
			$kedudukan_keluarga_penjual  = $this->input->post('kedudukan_keluarga_penjual');
			$gelar_persetujuan           = $this->input->post('gelar_persetujuan');
			$nama_persetujuan            = $this->input->post('nama_persetujuan');
			$tempat_lahir_persetujuan    = $this->input->post('tmpt_lhr_persetujuan');
			$tanggal_lahir_persetujuan   = $this->input->post('tgl_lhr_persetujuan');
			$pekerjaan_persetujuan       = $this->input->post('pekerjaan_persetujuan');
			$alamat_persetujuan          = $this->input->post('alamat_persetujuan');
			$rt_persetujuan              = $this->input->post('rt_persetujuan');
			$kelurahan_persetujuan       = $this->input->post('kelurahan_persetujuan');
			$nama_kelurahan_persetujuan  = $this->input->post('nama_kelurahan_persetujuan');
			$kecamatan_persetujuan       = $this->input->post('kecamatan_persetujuan');
			$kota_persetujuan            = $this->input->post('kota_persetujuan');
			$nama_kota_persetujuan       = $this->input->post('nama_kota_persetujuan');
			$nomor_identitas_persetujuan = $this->input->post('nomor_identitas_persetujuan');
			$nilai_perjanjian            = $this->input->post('nilai_perjanjian');
			$nomor_perjanjian_kredit     = $this->input->post('nomor_perjanjian_kredit');
			$tanggal_perjanjian          = $this->input->post('tanggal_perjanjian');
			$peringkat_tanggungan        = $this->input->post('peringkat_tanggungan');
			$nilai_tanggungan            = $this->input->post('nilai_tanggungan');
			$jenis_kepemilikan           = $this->input->post('jenis_kepemilikan');
			$nomor_kepemilikan           = $this->input->post('nomor_kepemilikan');
			$nomor_surat_ukur            = $this->input->post('nomor_surat_ukur');
			$tanggal_surat_ukur          = $this->input->post('tanggal_surat_ukur');
			$luas_tanah                  = $this->input->post('luas_tanah');
			$nomor_nib                   = $this->input->post('nomor_nib');
			$nomor_spptpbb               = $this->input->post('nomor_spptpbb');
			$kecamatan_tanah             = $this->input->post('kecamatan_tanah');
			$kelurahan_tanah             = $this->input->post('kelurahan_tanah');
			$nama_kelurahan_tanah        = $this->input->post('nama_kelurahan_tanah');
			$luas_bangunan               = $this->input->post('luas_bangunan');
			$alamat_bangunan             = $this->input->post('alamat_bangunan');
			$rt_bangunan                 = $this->input->post('rt_bangunan');
			$tanggal_dibuat_apht		 = $this->input->post('tanggal_dibaut_apht');
			$status                      = 1;
			$id                          = $this->input->post('id');
			$array = [
				'nomor_akta_skmht'            => $nomor_akta,
				'tanggal_akta_skmht'          => $tanggal_akta,
				'gelar_penjual'               => $gelar_penjual,
				'nama_penjual'                => $nama_penjual,
				'tempat_lahir_penjual'        => $tempat_lahir_penjual,
				'tanggal_lahir_penjual'       => $tanggal_lahir_penjual,
				'pekerjaan_penjual'           => $pekerjaan_penjual,
				'alamat_penjual'              => $alamat_penjual,
				'rt_penjual'                  => $rt_penjual,
				'kelurahan_penjual'           => $kelurahan_penjual,
				'nama_kelurahan_penjual'      => $nama_kelurahan_penjual,
				'kecamatan_penjual'           => $kecamatan_penjual,
				'kota_penjual'                => $kota_penjual,
				'nama_kota_penjual'           => $nama_kota_penjual,
				'nomor_identitas_penjual'     => $nomor_identitas_penjual,
				'kedudukan_keluarga_penjual'  => $kedudukan_keluarga_penjual,
				'gelar_persetujuan'           => $gelar_persetujuan,
				'nama_persetujuan'            => $nama_persetujuan,
				'tempat_lahir_persetujuan'    => $tempat_lahir_persetujuan,
				'tanggal_lahir_persetujuan'   => $tanggal_lahir_persetujuan,
				'pekerjaan_persetujuan'       => $pekerjaan_persetujuan,
				'alamat_persetujuan'          => $alamat_persetujuan,
				'rt_persetujuan'              => $rt_persetujuan,
				'kelurahan_persetujuan'       => $kelurahan_persetujuan,
				'nama_kelurahan_persetujuan'  => $nama_kelurahan_persetujuan,
				'kecamatan_persetujuan'       => $kecamatan_persetujuan,
				'kota_persetujuan'            => $kota_persetujuan,
				'nama_kota_persetujuan'       => $nama_kota_persetujuan,
				'nomor_identitas_persetujuan' => $nomor_identitas_persetujuan,
				'nilai_perjanjian'            => $nilai_perjanjian,
				'nomor_perjanjian_kredit'     => $nomor_perjanjian_kredit,
				'tanggal_perjanjian'          => $tanggal_perjanjian,
				'peringkat_tanggungan'        => $peringkat_tanggungan,
				'nilai_tanggungan'            => $nilai_tanggungan,
				'jenis_kepemilikan'           => $jenis_kepemilikan,
				'nomor_kepemilikan'           => $nomor_kepemilikan,
				'nomor_surat_ukur'            => $nomor_surat_ukur,
				'tanggal_surat_ukur'          => $tanggal_surat_ukur,
				'luas_tanah'                  => $luas_tanah,
				'nomor_nib'                   => $nomor_nib,
				'nomor_spptpbb'               => $nomor_spptpbb,
				'kecamatan_tanah'             => $kecamatan_tanah,
				'kelurahan_tanah'             => $kelurahan_tanah,
				'nama_kelurahan_tanah'        => $nama_kelurahan_tanah,
				'luas_bangunan'               => $luas_bangunan,
				'alamat_bangunan'             => $alamat_bangunan,
				'rt_bangunan'                 => $rt_bangunan,
				'tanggal_dibuat_apht'		  => $tanggal_dibuat_apht,
				'status'                      => $status
			];
			if ($id == '') {
				$this->skmht->insertData($array);
				$redirect = $this->db->insert_id();
				redirect('ppat/aktappat/form_apht/'.$redirect);
			}
			else {
				$this->skmht->updateData($id,$array);
				$this->session->set_flashdata('pesan','Data Berhasil Diubah');
				redirect('ppat/aktappat/data_skmht');
			}
		}
	}

	public function save_apht() {
		if ($this->input->post('takis')) {
			$id_skmht               = $this->input->post('id_skmht');
			$nomor_akta             = $this->input->post('nomor_akta_apht');
			$tanggal_akta           = $this->input->post('tanggal_akta_apht');
			$nomor_hak_tanggungan   = $this->input->post('nomor_hak_tanggungan');
			$tanggal_hak_tanggungan = $this->input->post('tanggal_hak_tanggungan');
			$id                     = $this->input->post('id');
			// var_dump($id_skmht);
			// exit;
			$array = [
				'id_skmht'				 => $id_skmht,
				'nomor_akta_apht'        => $nomor_akta,
				'tanggal_akta_apht'      => $tanggal_akta,
				'nomor_hak_tanggungan'   => $nomor_hak_tanggungan,
				'tanggal_hak_tanggungan' => $tanggal_hak_tanggungan
			];
			if ($id == '') {
				$this->apht->insertData($array);
				$get = $this->db->insert_id();
				$redirect = $this->apht->getIdSkmht($get);
				redirect('ppat/aktappat/form_ajb/'.$redirect);
			}
			else {
				$this->apht->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Data');
				redirect('ppat/aktappat/data_apht');
			}
		}
	}

	public function save_ajb() {
		if ($this->input->post('takis')) {
			$id_apht                 = $this->input->post('id_apht');
			$nomor_akta              = $this->input->post('nomor_akta_ajb');
			$tanggal_akta            = $this->input->post('tanggal_akta_ajb');
			$gelar_pembeli           = $this->input->post('gelar_pembeli');
			$nama_pembeli            = $this->input->post('nama_pembeli');
			$tempat_lahir_pembeli    = $this->input->post('tmpt_lhr_pembeli');
			$tanggal_lahir_pembeli   = $this->input->post('tgl_lhr_pembeli');
			$pekerjaan_pembeli       = $this->input->post('pekerjaan_pembeli');
			$alamat_pembeli          = $this->input->post('alamat_pembeli');
			$rt_pembeli              = $this->input->post('rt_pembeli');
			$kelurahan_pembeli       = $this->input->post('kelurahan_pembeli');
			$nama_kelurahan_pembeli  = $this->input->post('nama_kelurahan_pembeli');
			$kecamatan_pembeli       = $this->input->post('kecamatan_pembeli');
			$kota_pembeli            = $this->input->post('kota_pembeli');
			$nama_kota_pembeli       = $this->input->post('nama_kota_pembeli');
			$nomor_identitas_pembeli = $this->input->post('nomor_identitas_pembeli');
			$nilai_beli              = $this->input->post('nilai_beli');
			$id                      = $this->input->post('id');
			$array = [
				'id_apht'                 => $id_apht,
				'nomor_akta_ajb'          => $nomor_akta,
				'tanggal_akta_ajb'        => $tanggal_akta,
				'gelar_pembeli'           => $gelar_pembeli,
				'nama_pembeli'            => $nama_pembeli,
				'tempat_lahir_pembeli'    => $tempat_lahir_pembeli,
				'tanggal_lahir_pembeli'   => $tanggal_lahir_pembeli,
				'pekerjaan_pembeli'       => $pekerjaan_pembeli,
				'alamat_pembeli'          => $alamat_pembeli,
				'rt_pembeli'              => $rt_pembeli,
				'kelurahan_pembeli'       => $kelurahan_pembeli,
				'nama_kelurahan_pembeli'  => $nama_kelurahan_pembeli,
				'kecamatan_pembeli'       => $kecamatan_pembeli,
				'kota_pembeli'            => $kota_pembeli,
				'nama_kota_pembeli'       => $nama_kota_pembeli,
				'nomor_identitas_pembeli' => $nomor_identitas_pembeli,
				'nilai_beli'              => $nilai_beli
			];
			if ($id == '') {
				$this->ajb->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Membuat Akta PPAT');
				redirect('ppat/aktappat/data_ajb');
			}
			else {
				$this->ajb->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Edit AJB');
				redirect('ppat/aktappat/data_ajb');
			}
		}
	}
	//============ END AKTA PPAT ===========//

	//============ TEMPLATE SURAT PPAT ==========//
	public function surat_ppat() {
		$data['title'] = 'Data Surat PPAT';
		$data['page'] = 'ppat';
		$data['row'] = $this->surat->findPpat();
		$this->load->view('surat_akta/data_surat_ppat',$data);
	}

	public function tambah_surat_ppat() {
		$data['title'] = 'Form Surat PPAT';
		$data['page'] = 'ppat';
		$this->load->view('surat_akta/form_surat_ppat',$data);
	}

	public function edit_surat_ppat($id) {
		$data['title'] = 'Data Surat PPAT';
		$data['page'] = 'ppat';
		$data['row'] = $this->surat->findById($id);
		$this->load->view('surat_akta/form_surat_ppat',$data);
	}

	public function save_surat_ppat() {
		if ($this->input->post('takis')) {
			$nama_surat  = $this->input->post('nama_surat');
			$template    = $this->input->post('template');
			$jenis_surat = 'ppat';
			$id          = $this->input->post('id_surat');
			$array = [
				'nama_surat' => $nama_surat,
				'template' => $template,
				'jenis_surat' => $jenis_surat,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			if ($id == '') {
				$this->surat->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Membuat Surat');
			}
			else {
				$this->surat->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Surat');
			}
			redirect('fidusia/akta/data_surat_ppat');
		}
	}

	public function cetak_surat_skmht($id) {
		// TO DO LIST
	}

	public function cetak_surat_apht($id) {
		// TO DO LIST
	}

	public function cetak_surat_ajb($id) {
		// TO DO LIST
	}
	//============= END TEMPLATE SURAT PPAT =============//
}