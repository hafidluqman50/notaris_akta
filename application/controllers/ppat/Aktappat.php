<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aktappat extends CI_Controller {

	function __construct() {
		parent::__construct();
		isLogin();
		$this->load->model('ppat/ppatpenjualmodel','penjual');
		$this->load->model('ppat/skmhtmodel','skmht');
		$this->load->model('ppat/aphtmodel','apht');
		$this->load->model('ppat/ajbmodel','ajb');
		$this->load->model('Surataktamodel','surat');
	}

	//============= AKTA PPAT ============//
	public function data_penjual() {
		$data['title'] = 'Data PPAT Penjual';
		$data['page'] = 'ppat';
		if ($this->session->userdata('level') == 1) {
			$data['data_penjual'] = $this->penjual->findAll();
		}
		else {
			$data['data_penjual'] = $this->penjual->findAll($this->session->userdata('id'));
		}
		$this->load->view('data_ppat/data_penjual',$data);
	}

	public function add_penjual() {
		$data['title'] = 'Tambah Data PPAT Penjual';
		$data['page']  = 'ppat';
		$this->load->view('data_ppat/form_penjual',$data);
	}

	public function edit_penjual($id) {
		$data['title'] = 'Edit Data PPAT Penjual';
		$data['page']  = 'ppat';
		$data['row']   = $this->penjual->findById($id);
		$this->load->view('data_ppat/form_penjual',$data);
	}

	public function delete_penjual($id) {
		$this->penjual->deleteData($id);
		$this->session->set_flashdata('pesan','Berhasil Menghapus Data');
		redirect('ppat/aktappat/data_penjual');
	}

	public function save_penjual() {
		if ($this->input->post('takis')) {
			$gelar_penjual              = $this->input->post('gelar_penjual');
			$nama_penjual               = $this->input->post('nama_penjual');
			$tempat_lahir_penjual       = $this->input->post('tmpt_lhr_penjual');
			$tanggal_lahir_penjual      = $this->input->post('tgl_lhr_penjual');
			$pekerjaan_penjual          = $this->input->post('pekerjaan_penjual');
			$alamat_penjual             = $this->input->post('alamat_penjual');
			$rt_penjual                 = $this->input->post('rt_penjual');
			$kelurahan_penjual          = $this->input->post('kelurahan_penjual');
			$nama_kelurahan_penjual     = $this->input->post('nama_kelurahan_penjual');
			$kecamatan_penjual          = $this->input->post('kecamatan_penjual');
			$kota_penjual               = $this->input->post('kota_penjual');
			$nama_kota_penjual          = $this->input->post('nama_kota_penjual');
			$nomor_identitas_penjual    = $this->input->post('nomor_identitas_penjual');
			$kedudukan_keluarga_penjual = $this->input->post('kedudukan_keluarga_penjual');
			$id_ppat                 = $this->input->post('id');
			$data = [
				'gelar_penjual'              => $gelar_penjual,
				'nama_penjual'               => $nama_penjual,
				'tempat_lahir_penjual'       => $tempat_lahir_penjual,
				'tanggal_lahir_penjual'      => $tanggal_lahir_penjual,
				'pekerjaan_penjual'          => $pekerjaan_penjual,
				'alamat_penjual'             => $alamat_penjual,
				'rt_penjual'                 => $rt_penjual,
				'kelurahan_penjual'          => $kelurahan_penjual,
				'nama_kelurahan_penjual'     => $nama_kelurahan_penjual,
				'kecamatan_penjual'          => $kecamatan_penjual,
				'kota_penjual'               => $kota_penjual,
				'nama_kota_penjual'          => $nama_kota_penjual,
				'nomor_identitas_penjual'    => $nomor_identitas_penjual,
				'kedudukan_keluarga_penjual' => $kedudukan_keluarga_penjual,
			];
			if ($id_ppat == '') {
				$this->penjual->insertData($data);
				$this->session->set_flashdata('pesan','Berhasil Menambah penjual');
				redirect('ppat/aktappat/data_penjual');
			}
			else {
				$this->penjual->updateData($id,$data);
				$this->session->set_flashdata('pesan','Berhasil Update Data penjual');
				redirect('ppat/aktappat/data_penjual');
			}
		}
	}

	public function data_skmht($id) {
		$data['title'] = 'Data PPAT SKMHT';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id;
		$data['data_skmht'] = $this->skmht->findAll($id);
		$this->load->view('data_ppat/data_skmht',$data);
	}

	public function add_skmht($id) {
		$data['title'] = 'Tambah Data PPAT SKMHT';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id;
		$this->load->view('data_ppat/form_skmht',$data);
	}

	public function edit_skmht($id_skmht,$id_ppat) {
		$data['title'] = 'Edit Data PPAT SKMHT';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id_ppat;
		$data['row'] = $this->skmht->findById($id_skmht,$id_ppat);
		$this->load->view('data_ppat/form_skmht',$data);
	}

	public function delete_skmht($id_skmht,$id_ppat) {
		$this->skmht->deleteData($id_skmht,$id_ppat);
		$this->session->set_flashdata('pesan','Berhasil Menghapus Data');
		redirect('ppat/aktappat/data_skmht/'.$id_ppat);
	}

	public function data_apht($id) {
		$data['title'] = 'Data PPAT APHT';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id;
		$data['data_apht'] = $this->apht->findAll($id);
		$this->load->view('data_ppat/data_apht',$data);
	}

	public function add_apht($id) {
		$data['title'] = 'Tambah Data PPAT APHT';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id;
		$this->load->view('data_ppat/form_apht',$data);
	}

	public function edit_apht($id_apht,$id_ppat) {
		$data['title'] = 'Edit Data PPAT APHT';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id_ppat;
		$data['row'] = $this->apht->findById($id_apht,$id_ppat);
		$this->load->view('data_ppat/form_apht',$data);
	}

	public function delete_apht($id_apht,$id_ppat) {
		$this->apht->deleteData($id_apht,$id_ppat);
		$this->session->set_flashdata('pesan','Berhasil Hapus Data');
		redirect('ppat/aktappat/data_apht/'.$id_ppat);
	}

	public function data_ajb($id) {
		$data['title'] = 'Data PPAT AJB';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id;
		$data['data_ajb'] = $this->ajb->findAll($id);
		$this->load->view('data_ppat/data_ajb',$data);
	}

	public function add_ajb($id) {
		$data['title'] = 'Tambah Data PPAT AJB';
		$data['page']  = 'ppat';
		$data['id_ppat'] = $id;
		$this->load->view('data_ppat/form_ajb',$data);
	}

	public function edit_ajb($id_ajb,$id_ppat) {
		$data['title'] = 'Edit Data PPAT AJB';
		$data['page'] = 'ppat';
		$data['id_ppat'] = $id_ppat;
		$data['row'] = $this->ajb->findById($id_ajb,$id_ppat);
		$this->load->view('data_ppat/form_ajb',$data);
	}

	public function delete_ajb($id_ajb,$id_ppat) {
		$this->ajb->deleteData($id_ajb,$id_ppat);
		$this->session->set_flashdata('pesan','Berhasil Hapus AJB');
		redirect('ppat/aktappat/data_ajb/'.$id_ppat);
	}
	
	public function save_skmht() {
		if ($this->input->post('takis')) {
			$nomor_akta                  = $this->input->post('nomor_akta');
			$tanggal_akta                = $this->input->post('tgl_surat_akta');
			$nasabah_bank				 = $this->input->post('nasabah_bank');
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
			$kelurahan_bangunan          = $this->input->post('kelurahan_bangunan');
			$nama_kelurahan_bangunan     = $this->input->post('nama_kelurahan_bangunan');
			$kecamatan_bangunan          = $this->input->post('kecamatan_bangunan');
			$kota_bangunan               = $this->input->post('kota_bangunan');
			$nama_kota_bangunan          = $this->input->post('nama_kota_bangunan');
			$tanggal_dibuat_apht         = $this->input->post('tanggal_dibuat_apht');
			$id_ppat                     = $this->input->post('id_ppat');
			$id                          = $this->input->post('id');
			$array = [
				'id_ppat'                     => $id_ppat,
				'nomor_akta_skmht'            => $nomor_akta,
				'tanggal_akta_skmht'          => $tanggal_akta,
				'nasabah_bank'				  => $nasabah_bank,
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
				'nama_kelurahan_tanah'        => $nama_kelurahan_tanah,
				'luas_bangunan'               => $luas_bangunan,
				'alamat_bangunan'             => $alamat_bangunan,
				'rt_bangunan'                 => $rt_bangunan,
				'kelurahan_bangunan'          => $kelurahan_bangunan,
				'nama_kelurahan_bangunan'	  => $nama_kelurahan_bangunan,
				'kecamatan_bangunan'	      => $kecamatan_bangunan,
				'kota_bangunan'				  => $kota_bangunan,
				'nama_kota_bangunan'		  => $nama_kota_bangunan,
				'tanggal_dibuat_apht'		  => $tanggal_dibuat_apht
			];
			if ($id == '') {
				$this->skmht->insertData($array);
				$this->session->set_flashdata('pesan','Data Berhasil Tertambah');
				redirect('ppat/aktappat/data_skmht/'.$id_ppat);
			}
			else {
				$this->skmht->updateData($id,$array);
				$this->session->set_flashdata('pesan','Data Berhasil Diubah');
				redirect('ppat/aktappat/data_skmht/'.$id_ppat);
			}
		}
	}

	public function save_apht() {
		if ($this->input->post('takis')) {
			$nomor_akta                  = $this->input->post('nomor_akta_apht');
			$tanggal_akta                = $this->input->post('tanggal_akta_apht');
			$nasabah_bank				 = $this->input->post('nasabah_bank');
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
			$nomor_akta_skmht            = $this->input->post('nomor_akta_skmht');
			$tanggal_akta_skmht          = $this->input->post('tanggal_akta_skmht');
			$nilai_perjanjian            = $this->input->post('nilai_perjanjian');
			$nomor_perjanjian_kredit     = $this->input->post('nomor_perjanjian_kredit');
			$tanggal_perjanjian_kredit   = $this->input->post('tanggal_perjanjian_kredit');
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
			$kelurahan_bangunan          = $this->input->post('kelurahan_bangunan');
			$nama_kelurahan_bangunan     = $this->input->post('nama_kelurahan_bangunan');
			$kecamatan_bangunan          = $this->input->post('kecamatan_bangunan');
			$kota_bangunan               = $this->input->post('kota_bangunan');
			$nama_kota_bangunan          = $this->input->post('nama_kota_bangunan');
			$id_ppat  				 = $this->input->post('id_ppat');
			$id                          = $this->input->post('id');
			$array = [
				'id_ppat'				      => $id_ppat,
				'nomor_akta_apht'             => $nomor_akta,
				'tanggal_akta_apht'           => $tanggal_akta,
				'nasabah_bank'				  => $nasabah_bank,
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
				'nomor_akta_skmht'            => $nomor_akta_skmht,
				'tanggal_akta_skmht'          => $tanggal_akta_skmht,
				'nilai_perjanjian'            => $nilai_perjanjian,
				'nomor_perjanjian_kredit'     => $nomor_perjanjian_kredit,
				'tanggal_perjanjian_kredit'   => $tanggal_perjanjian_kredit,
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
				'nama_kelurahan_tanah'        => $nama_kelurahan_tanah,
				'luas_bangunan'               => $luas_bangunan,
				'alamat_bangunan'             => $alamat_bangunan,
				'rt_bangunan'                 => $rt_bangunan,
				'kelurahan_bangunan'          => $kelurahan_bangunan,
				'nama_kelurahan_bangunan'     => $nama_kelurahan_bangunan,
				'kecamatan_bangunan'          => $kecamatan_bangunan,
				'kota_bangunan'               => $kota_bangunan,
				'nama_kota_bangunan'          => $nama_kota_bangunan,
			];
			if ($id == '') {
				$this->apht->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Input APHT');
				redirect('ppat/aktappat/data_apht/'.$id_ppat);
			}
			else {
				$this->apht->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Data');
				redirect('ppat/aktappat/data_apht/'.$id_ppat);
			}
		}
	}

	public function save_ajb() {
		if ($this->input->post('takis')) {
			$id_apht                     = $this->input->post('id_apht');
			$nomor_akta                  = $this->input->post('nomor_akta_ajb');
			$tanggal_akta                = $this->input->post('tanggal_akta_ajb');
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
			$gelar_pembeli               = $this->input->post('gelar_pembeli');
			$nama_pembeli                = $this->input->post('nama_pembeli');
			$tempat_lahir_pembeli        = $this->input->post('tmpt_lhr_pembeli');
			$tanggal_lahir_pembeli       = $this->input->post('tgl_lhr_pembeli');
			$pekerjaan_pembeli           = $this->input->post('pekerjaan_pembeli');
			$alamat_pembeli              = $this->input->post('alamat_pembeli');
			$rt_pembeli                  = $this->input->post('rt_pembeli');
			$kelurahan_pembeli           = $this->input->post('kelurahan_pembeli');
			$nama_kelurahan_pembeli      = $this->input->post('nama_kelurahan_pembeli');
			$kecamatan_pembeli           = $this->input->post('kecamatan_pembeli');
			$kota_pembeli                = $this->input->post('kota_pembeli');
			$nama_kota_pembeli           = $this->input->post('nama_kota_pembeli');
			$nomor_identitas_pembeli     = $this->input->post('nomor_identitas_pembeli');
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
			$kelurahan_bangunan          = $this->input->post('kelurahan_bangunan');
			$nama_kelurahan_bangunan     = $this->input->post('nama_kelurahan_bangunan');
			$kecamatan_bangunan          = $this->input->post('kecamatan_bangunan');
			$kota_bangunan               = $this->input->post('kota_bangunan');
			$nama_kota_bangunan          = $this->input->post('nama_kota_bangunan');
			$nilai_beli                  = $this->input->post('nilai_beli');
			$id_ppat                  = $this->input->post('id_ppat');
			$id                          = $this->input->post('id');
			$array = [
				'id_ppat'				      => $id_ppat,
				'nomor_akta_ajb'              => $nomor_akta,
				'tanggal_akta_ajb'            => $tanggal_akta,
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
				'gelar_pembeli'               => $gelar_pembeli,
				'nama_pembeli'                => $nama_pembeli,
				'tempat_lahir_pembeli'        => $tempat_lahir_pembeli,
				'tanggal_lahir_pembeli'       => $tanggal_lahir_pembeli,
				'pekerjaan_pembeli'           => $pekerjaan_pembeli,
				'alamat_pembeli'              => $alamat_pembeli,
				'rt_pembeli'                  => $rt_pembeli,
				'kelurahan_pembeli'           => $kelurahan_pembeli,
				'nama_kelurahan_pembeli'      => $nama_kelurahan_pembeli,
				'kecamatan_pembeli'           => $kecamatan_pembeli,
				'kota_pembeli'                => $kota_pembeli,
				'nama_kota_pembeli'           => $nama_kota_pembeli,
				'nomor_identitas_pembeli'     => $nomor_identitas_pembeli,
				'jenis_kepemilikan'           => $jenis_kepemilikan,
				'nomor_kepemilikan'           => $nomor_kepemilikan,
				'nomor_surat_ukur'            => $nomor_surat_ukur,
				'tanggal_surat_ukur'          => $tanggal_surat_ukur,
				'luas_tanah'                  => $luas_tanah,
				'nomor_nib'                   => $nomor_nib,
				'nomor_spptpbb'               => $nomor_spptpbb,
				'kecamatan_tanah'             => $kecamatan_tanah,
				'nama_kelurahan_tanah'        => $nama_kelurahan_tanah,
				'luas_bangunan'               => $luas_bangunan,
				'alamat_bangunan'             => $alamat_bangunan,
				'rt_bangunan'                 => $rt_bangunan,
				'kelurahan_bangunan'          => $kelurahan_bangunan,
				'nama_kelurahan_bangunan'     => $nama_kelurahan_bangunan,
				'kecamatan_bangunan'          => $kecamatan_bangunan,
				'kota_bangunan'               => $kota_bangunan,
				'nama_kota_bangunan'          => $nama_kota_bangunan,
				'nilai_beli'                  => $nilai_beli
			];
			if ($id == '') {
				$this->ajb->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Membuat Akta PPAT');
				redirect('ppat/aktappat/data_ajb/'.$id_ppat);
			}
			else {
				$this->ajb->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Edit AJB');
				redirect('ppat/aktappat/data_ajb/'.$id_ppat);
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

	// public function tambah_surat_ppat() {
	// 	$data['title'] = 'Form Surat PPAT';
	// 	$data['page'] = 'ppat';
	// 	$this->load->view('surat_akta/form_surat_ppat',$data);
	// }

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
				'nama_surat'  => $nama_surat,
				'template'    => $template,
				'jenis_surat' => $jenis_surat,
				'created_at'  => date('Y-m-d H:i:s'),
				'updated_at'  => date('Y-m-d H:i:s')
			];
			if ($id == '') {
				$this->surat->insertData($array);
				$this->session->set_flashdata('pesan','Berhasil Membuat Surat');
			}
			else {
				$this->surat->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Update Surat');
			}
			redirect('ppat/aktappat/surat_ppat');
		}
	}

	public function cetak_skmht_bni($id,$id_ppat) {
		$skmht                             = $this->skmht->cetakSurat($id,$id_ppat);
		$surat_skmht                       = $this->surat->suratSkmhtBni();
		$row                               = [];
		$row['nomor_akta_skmht']           = $skmht['nomor_akta_skmht'];
		$row['tanggal_akta_skmht']         = $skmht['tanggal_akta_skmht'];
		$row['gelar_penjual']              = $skmht['gelar_penjual'];
		$row['nama_penjual']               = $skmht['nama_penjual'];
		$row['kota_lahir_penjual']         = $skmht['tempat_lahir_penjual'];
		$row['tanggal_lahir_penjual']      = $skmht['tanggal_lahir_penjual'];
		$row['pekerjaan_penjual']          = $skmht['pekerjaan_penjual'];
		$row['alamat_penjual']             = $skmht['alamat_penjual'];
		$row['rt_penjual']                 = $skmht['rt_penjual'];
		$row['kelurahan_penjual']          = $skmht['kelurahan_penjual'];
		$row['nama_kelurahan_penjual']     = $skmht['nama_kelurahan_penjual'];
		$row['kecamatan_penjual']          = $skmht['kecamatan_penjual'];
		$row['kota_penjual']               = $skmht['kota_penjual'];
		$row['nama_kota_penjual']          = $skmht['nama_kota_penjual'];
		$row['no_identitas_penjual']       = $skmht['nomor_identitas_penjual'];
		$row['kedudukan_keluarga_penjual'] = $skmht['kedudukan_keluarga_penjual'];
		$row['gelar_persetujuan']          = $skmht['gelar_persetujuan'];
		$row['nama_persetujuan']           = $skmht['nama_persetujuan'];
		$row['kota_lahir_persetujuan']     = $skmht['tempat_lahir_persetujuan'];
		$row['tanggal_lahir_persetujuan']  = $skmht['tanggal_lahir_persetujuan'];
		$row['pekerjaan_persetujuan']      = $skmht['pekerjaan_persetujuan'];
		$row['alamat_persetujuan']         = $skmht['alamat_persetujuan'];
		$row['rt_persetujuan']             = $skmht['rt_persetujuan'];
		$row['kelurahan_persetujuan']      = $skmht['kelurahan_persetujuan'];
		$row['nama_kelurahan_persetujuan'] = $skmht['nama_kelurahan_persetujuan'];
		$row['kecamatan_persetujuan']      = $skmht['kecamatan_persetujuan'];
		$row['kota_persetujuan']           = $skmht['kota_persetujuan'];
		$row['nama_kota_persetujuan']      = $skmht['nama_kota_persetujuan'];
		$row['no_identitas_persetujuan']   = $skmht['nomor_identitas_persetujuan'];
		$row['nilai_perjanjian']           = $skmht['nilai_perjanjian'];
		$row['nomor_perjanjian_kredit']    = $skmht['nomor_perjanjian_kredit'];
		$row['tanggal_perjanjian']         = $skmht['tanggal_perjanjian'];
		$row['peringkat_tanggungan']       = $skmht['peringkat_tanggungan'];
		$row['nilai_tanggungan']		   = $skmht['nilai_tanggungan'];
		$row['jenis_kepemilikan']          = $skmht['jenis_kepemilikan'];
		$row['nomor_kepemilikan']          = $skmht['nomor_kepemilikan'];
		$row['nomor_surat_ukur']           = $skmht['nomor_surat_ukur'];
		$row['tanggal_surat_ukur']         = $skmht['tanggal_surat_ukur'];
		$row['luas_tanah']                 = $skmht['luas_tanah'];
		$row['nomor_nib']                  = $skmht['nomor_nib'];
		$row['nomor_spptpbb']              = $skmht['nomor_spptpbb'];
		$row['kecamatan_tanah']            = $skmht['kecamatan_tanah'];
		$row['nama_kelurahan_tanah']       = $skmht['nama_kelurahan_tanah'];
		$row['luas_bangunan']              = $skmht['luas_bangunan'];
		$row['alamat_bangunan']            = $skmht['alamat_bangunan'];
		$row['rt_bangunan']                = $skmht['rt_bangunan'];
		$row['kelurahan_bangunan']         = $skmht['kelurahan_bangunan'];
		$row['nama_kelurahan_bangunan']    = $skmht['nama_kelurahan_bangunan'];
		$row['kecamatan_bangunan']         = $skmht['kecamatan_bangunan'];
		$row['kota_bangunan']              = $skmht['kota_bangunan'];
		$row['nama_kota_bangunan']         = $skmht['nama_kota_bangunan'];
		$row['tanggal_dibuat_apht']        = $skmht['tanggal_dibuat_apht'];
		$dataStart                         = headSkmht();
		$dataEnd                           = footSkmht($row);
		$format                            = $surat_skmht['template'];
		$data['format_surat'] = str_replace($dataStart,$dataEnd,$format);
		$this->load->view('surat_akta/cetak_skmht',$data);
	}

	public function cetak_skmht_bri($id,$id_ppat) {
		$skmht                             = $this->skmht->cetakSurat($id,$id_ppat);
		$surat_skmht                       = $this->surat->suratSkmhtBri();
		$row                               = [];
		$row['nomor_akta_skmht']           = $skmht['nomor_akta_skmht'];
		$row['tanggal_akta_skmht']         = $skmht['tanggal_akta_skmht'];
		$row['gelar_penjual']              = $skmht['gelar_penjual'];
		$row['nama_penjual']               = $skmht['nama_penjual'];
		$row['kota_lahir_penjual']         = $skmht['tempat_lahir_penjual'];
		$row['tanggal_lahir_penjual']      = $skmht['tanggal_lahir_penjual'];
		$row['pekerjaan_penjual']          = $skmht['pekerjaan_penjual'];
		$row['alamat_penjual']             = $skmht['alamat_penjual'];
		$row['rt_penjual']                 = $skmht['rt_penjual'];
		$row['kelurahan_penjual']          = $skmht['kelurahan_penjual'];
		$row['nama_kelurahan_penjual']     = $skmht['nama_kelurahan_penjual'];
		$row['kecamatan_penjual']          = $skmht['kecamatan_penjual'];
		$row['kota_penjual']               = $skmht['kota_penjual'];
		$row['nama_kota_penjual']          = $skmht['nama_kota_penjual'];
		$row['no_identitas_penjual']       = $skmht['nomor_identitas_penjual'];
		$row['kedudukan_keluarga_penjual'] = $skmht['kedudukan_keluarga_penjual'];
		$row['gelar_persetujuan']          = $skmht['gelar_persetujuan'];
		$row['nama_persetujuan']           = $skmht['nama_persetujuan'];
		$row['kota_lahir_persetujuan']     = $skmht['tempat_lahir_persetujuan'];
		$row['tanggal_lahir_persetujuan']  = $skmht['tanggal_lahir_persetujuan'];
		$row['pekerjaan_persetujuan']      = $skmht['pekerjaan_persetujuan'];
		$row['alamat_persetujuan']         = $skmht['alamat_persetujuan'];
		$row['rt_persetujuan']             = $skmht['rt_persetujuan'];
		$row['kelurahan_persetujuan']      = $skmht['kelurahan_persetujuan'];
		$row['nama_kelurahan_persetujuan'] = $skmht['nama_kelurahan_persetujuan'];
		$row['kecamatan_persetujuan']      = $skmht['kecamatan_persetujuan'];
		$row['kota_persetujuan']           = $skmht['kota_persetujuan'];
		$row['nama_kota_persetujuan']      = $skmht['nama_kota_persetujuan'];
		$row['no_identitas_persetujuan']   = $skmht['nomor_identitas_persetujuan'];
		$row['nilai_perjanjian']           = $skmht['nilai_perjanjian'];
		$row['nomor_perjanjian_kredit']    = $skmht['nomor_perjanjian_kredit'];
		$row['tanggal_perjanjian']         = $skmht['tanggal_perjanjian'];
		$row['peringkat_tanggungan']       = $skmht['peringkat_tanggungan'];
		$row['nilai_tanggungan']		   = $skmht['nilai_tanggungan'];
		$row['jenis_kepemilikan']          = $skmht['jenis_kepemilikan'];
		$row['nomor_kepemilikan']          = $skmht['nomor_kepemilikan'];
		$row['nomor_surat_ukur']           = $skmht['nomor_surat_ukur'];
		$row['tanggal_surat_ukur']         = $skmht['tanggal_surat_ukur'];
		$row['luas_tanah']                 = $skmht['luas_tanah'];
		$row['nomor_nib']                  = $skmht['nomor_nib'];
		$row['nomor_spptpbb']              = $skmht['nomor_spptpbb'];
		$row['kecamatan_tanah']            = $skmht['kecamatan_tanah'];
		$row['nama_kelurahan_tanah']       = $skmht['nama_kelurahan_tanah'];
		$row['luas_bangunan']              = $skmht['luas_bangunan'];
		$row['alamat_bangunan']            = $skmht['alamat_bangunan'];
		$row['rt_bangunan']                = $skmht['rt_bangunan'];
		$row['kelurahan_bangunan']         = $skmht['kelurahan_bangunan'];
		$row['nama_kelurahan_bangunan']    = $skmht['nama_kelurahan_bangunan'];
		$row['kecamatan_bangunan']         = $skmht['kecamatan_bangunan'];
		$row['kota_bangunan']              = $skmht['kota_bangunan'];
		$row['nama_kota_bangunan']         = $skmht['nama_kota_bangunan'];
		$row['tanggal_dibuat_apht']        = $skmht['tanggal_dibuat_apht'];
		$dataStart                         = headSkmht();
		$dataEnd                           = footSkmht($row);
		$format                            = $surat_skmht['template'];
		$data['format_surat'] = str_replace($dataStart,$dataEnd,$format);
		$this->load->view('surat_akta/cetak_skmht',$data);
	}

	public function cetak_apht_bni($id,$id_ppat) {
		$apht                              = $this->apht->cetakSurat($id,$id_ppat);
		$surat_apht                        = $this->surat->suratAphtBni();
		$row                               = [];
		$row['nomor_akta_apht']            = $apht['nomor_akta_apht'];
		$row['tanggal_akta_apht']          = $apht['tanggal_akta_apht'];
		$row['nomor_akta_skmht']           = $apht['nomor_akta_skmht'];
		$row['tanggal_akta_skmht']         = $apht['tanggal_akta_skmht'];
		$row['gelar_penjual']              = $apht['gelar_penjual'];
		$row['nama_penjual']               = $apht['nama_penjual'];
		$row['kota_lahir_penjual']         = $apht['tempat_lahir_penjual'];
		$row['tanggal_lahir_penjual']      = $apht['tanggal_lahir_penjual'];
		$row['pekerjaan_penjual']          = $apht['pekerjaan_penjual'];
		$row['alamat_penjual']             = $apht['alamat_penjual'];
		$row['rt_penjual']                 = $apht['rt_penjual'];
		$row['kelurahan_penjual']          = $apht['kelurahan_penjual'];
		$row['nama_kelurahan_penjual']     = $apht['nama_kelurahan_penjual'];
		$row['kecamatan_penjual']          = $apht['kecamatan_penjual'];
		$row['kota_penjual']               = $apht['kota_penjual'];
		$row['nama_kota_penjual']          = $apht['nama_kota_penjual'];
		$row['no_identitas_penjual']       = $apht['nomor_identitas_penjual'];
		$row['kedudukan_keluarga_penjual'] = $apht['kedudukan_keluarga_penjual'];
		$row['gelar_persetujuan']          = $apht['gelar_persetujuan'];
		$row['nama_persetujuan']           = $apht['nama_persetujuan'];
		$row['kota_lahir_persetujuan']     = $apht['tempat_lahir_persetujuan'];
		$row['tanggal_lahir_persetujuan']  = $apht['tanggal_lahir_persetujuan'];
		$row['pekerjaan_persetujuan']      = $apht['pekerjaan_persetujuan'];
		$row['alamat_persetujuan']         = $apht['alamat_persetujuan'];
		$row['rt_persetujuan']             = $apht['rt_persetujuan'];
		$row['kelurahan_persetujuan']      = $apht['kelurahan_persetujuan'];
		$row['nama_kelurahan_persetujuan'] = $apht['nama_kelurahan_persetujuan'];
		$row['kecamatan_persetujuan']      = $apht['kecamatan_persetujuan'];
		$row['kota_persetujuan']           = $apht['kota_persetujuan'];
		$row['nama_kota_persetujuan']      = $apht['nama_kota_persetujuan'];
		$row['no_identitas_persetujuan']   = $apht['nomor_identitas_persetujuan'];
		$row['nilai_perjanjian']           = $apht['nilai_perjanjian'];
		$row['nomor_perjanjian_kredit']    = $apht['nomor_perjanjian_kredit'];
		$row['tanggal_perjanjian']         = $apht['tanggal_perjanjian_kredit'];
		$row['peringkat_tanggungan']       = $apht['peringkat_tanggungan'];
		$row['nilai_tanggungan']           = $apht['nilai_tanggungan'];
		$row['jenis_kepemilikan']          = $apht['jenis_kepemilikan'];
		$row['nomor_kepemilikan']          = $apht['nomor_kepemilikan'];
		$row['nomor_surat_ukur']           = $apht['nomor_surat_ukur'];
		$row['tanggal_surat_ukur']         = $apht['tanggal_surat_ukur'];
		$row['luas_tanah']                 = $apht['luas_tanah'];
		$row['nomor_nib']                  = $apht['nomor_nib'];
		$row['nomor_spptpbb']              = $apht['nomor_spptpbb'];
		$row['kecamatan_tanah']            = $apht['kecamatan_tanah'];
		$row['nama_kelurahan_tanah']       = $apht['nama_kelurahan_tanah'];
		$row['luas_bangunan']              = $apht['luas_bangunan'];
		$row['alamat_bangunan']            = $apht['alamat_bangunan'];
		$row['rt_bangunan']                = $apht['rt_bangunan'];
		$row['kelurahan_bangunan']         = $apht['kelurahan_bangunan'];
		$row['nama_kelurahan_bangunan']    = $apht['nama_kelurahan_bangunan'];
		$row['kecamatan_bangunan']         = $apht['kecamatan_bangunan'];
		$row['kota_bangunan']              = $apht['kota_bangunan'];
		$row['nama_kota_bangunan']         = $apht['nama_kota_bangunan'];
		$dataStart                         = headApht();
		$dataEnd                           = footApht($row);
		$format                            = $surat_apht['template'];
		$data['format_surat'] = str_replace($dataStart,$dataEnd,$format);
		$this->load->view('surat_akta/cetak_apht',$data);
	}

	public function cetak_apht_bri($id,$id_ppat) {
		$apht                              = $this->apht->cetakSurat($id,$id_ppat);
		$surat_apht                        = $this->surat->suratAphtBri();
		$row                               = [];
		$row['nomor_akta_apht']            = $apht['nomor_akta_apht'];
		$row['tanggal_akta_apht']          = $apht['tanggal_akta_apht'];
		$row['nomor_akta_skmht']           = $apht['nomor_akta_skmht'];
		$row['tanggal_akta_skmht']         = $apht['tanggal_akta_skmht'];
		$row['gelar_penjual']              = $apht['gelar_penjual'];
		$row['nama_penjual']               = $apht['nama_penjual'];
		$row['kota_lahir_penjual']         = $apht['tempat_lahir_penjual'];
		$row['tanggal_lahir_penjual']      = $apht['tanggal_lahir_penjual'];
		$row['pekerjaan_penjual']          = $apht['pekerjaan_penjual'];
		$row['alamat_penjual']             = $apht['alamat_penjual'];
		$row['rt_penjual']                 = $apht['rt_penjual'];
		$row['kelurahan_penjual']          = $apht['kelurahan_penjual'];
		$row['nama_kelurahan_penjual']     = $apht['nama_kelurahan_penjual'];
		$row['kecamatan_penjual']          = $apht['kecamatan_penjual'];
		$row['kota_penjual']               = $apht['kota_penjual'];
		$row['nama_kota_penjual']          = $apht['nama_kota_penjual'];
		$row['no_identitas_penjual']       = $apht['nomor_identitas_penjual'];
		$row['kedudukan_keluarga_penjual'] = $apht['kedudukan_keluarga_penjual'];
		$row['gelar_persetujuan']          = $apht['gelar_persetujuan'];
		$row['nama_persetujuan']           = $apht['nama_persetujuan'];
		$row['kota_lahir_persetujuan']     = $apht['tempat_lahir_persetujuan'];
		$row['tanggal_lahir_persetujuan']  = $apht['tanggal_lahir_persetujuan'];
		$row['pekerjaan_persetujuan']      = $apht['pekerjaan_persetujuan'];
		$row['alamat_persetujuan']         = $apht['alamat_persetujuan'];
		$row['rt_persetujuan']             = $apht['rt_persetujuan'];
		$row['kelurahan_persetujuan']      = $apht['kelurahan_persetujuan'];
		$row['nama_kelurahan_persetujuan'] = $apht['nama_kelurahan_persetujuan'];
		$row['kecamatan_persetujuan']      = $apht['kecamatan_persetujuan'];
		$row['kota_persetujuan']           = $apht['kota_persetujuan'];
		$row['nama_kota_persetujuan']      = $apht['nama_kota_persetujuan'];
		$row['no_identitas_persetujuan']   = $apht['nomor_identitas_persetujuan'];
		$row['nilai_perjanjian']           = $apht['nilai_perjanjian'];
		$row['nomor_perjanjian_kredit']    = $apht['nomor_perjanjian_kredit'];
		$row['tanggal_perjanjian']         = $apht['tanggal_perjanjian_kredit'];
		$row['peringkat_tanggungan']       = $apht['peringkat_tanggungan'];
		$row['nilai_tanggungan']           = $apht['nilai_tanggungan'];
		$row['jenis_kepemilikan']          = $apht['jenis_kepemilikan'];
		$row['nomor_kepemilikan']          = $apht['nomor_kepemilikan'];
		$row['nomor_surat_ukur']           = $apht['nomor_surat_ukur'];
		$row['tanggal_surat_ukur']         = $apht['tanggal_surat_ukur'];
		$row['luas_tanah']                 = $apht['luas_tanah'];
		$row['nomor_nib']                  = $apht['nomor_nib'];
		$row['nomor_spptpbb']              = $apht['nomor_spptpbb'];
		$row['kecamatan_tanah']            = $apht['kecamatan_tanah'];
		$row['nama_kelurahan_tanah']       = $apht['nama_kelurahan_tanah'];
		$row['luas_bangunan']              = $apht['luas_bangunan'];
		$row['alamat_bangunan']            = $apht['alamat_bangunan'];
		$row['rt_bangunan']                = $apht['rt_bangunan'];
		$row['kelurahan_bangunan']         = $apht['kelurahan_bangunan'];
		$row['nama_kelurahan_bangunan']    = $apht['nama_kelurahan_bangunan'];
		$row['kecamatan_bangunan']         = $apht['kecamatan_bangunan'];
		$row['kota_bangunan']              = $apht['kota_bangunan'];
		$row['nama_kota_bangunan']         = $apht['nama_kota_bangunan'];
		$dataStart                         = headApht();
		$dataEnd                           = footApht($row);
		$format                            = $surat_apht['template'];
		$data['format_surat'] = str_replace($dataStart,$dataEnd,$format);
		$this->load->view('surat_akta/cetak_apht',$data);
	}

	public function cetak_ajb($id,$id_debitur) {
		$ajb                               = $this->ajb->cetakSurat($id,$id_debitur);
		$surat_ajb                         = $this->surat->suratAjb();
		$row                               = [];
		$row['nomor_akta_ajb']             = $ajb['nomor_akta_ajb'];
		$row['tanggal_akta_ajb']           = $ajb['tanggal_akta_ajb'];
		$row['gelar_penjual']              = $ajb['gelar_penjual'];
		$row['nama_penjual']               = $ajb['nama_penjual'];
		$row['kota_lahir_penjual']         = $ajb['tempat_lahir_penjual'];
		$row['tanggal_lahir_penjual']      = $ajb['tanggal_lahir_penjual'];
		$row['pekerjaan_penjual']          = $ajb['pekerjaan_penjual'];
		$row['alamat_penjual']             = $ajb['alamat_penjual'];
		$row['rt_penjual']                 = $ajb['rt_penjual'];
		$row['kelurahan_penjual']          = $ajb['kelurahan_penjual'];
		$row['nama_kelurahan_penjual']     = $ajb['nama_kelurahan_penjual'];
		$row['kecamatan_penjual']          = $ajb['kecamatan_penjual'];
		$row['kota_penjual']               = $ajb['kota_penjual'];
		$row['nama_kota_penjual']          = $ajb['nama_kota_penjual'];
		$row['no_identitas_penjual']       = $ajb['nomor_identitas_penjual'];
		$row['kedudukan_keluarga_penjual'] = $ajb['kedudukan_keluarga_penjual'];
		$row['gelar_persetujuan']          = $ajb['gelar_persetujuan'];
		$row['nama_persetujuan']           = $ajb['nama_persetujuan'];
		$row['kota_lahir_persetujuan']     = $ajb['tempat_lahir_persetujuan'];
		$row['tanggal_lahir_persetujuan']  = $ajb['tanggal_lahir_persetujuan'];
		$row['pekerjaan_persetujuan']      = $ajb['pekerjaan_persetujuan'];
		$row['alamat_persetujuan']         = $ajb['alamat_persetujuan'];
		$row['rt_persetujuan']             = $ajb['rt_persetujuan'];
		$row['kelurahan_persetujuan']      = $ajb['kelurahan_persetujuan'];
		$row['nama_kelurahan_persetujuan'] = $ajb['nama_kelurahan_persetujuan'];
		$row['kecamatan_persetujuan']      = $ajb['kecamatan_persetujuan'];
		$row['kota_persetujuan']           = $ajb['kota_persetujuan'];
		$row['nama_kota_persetujuan']      = $ajb['nama_kota_persetujuan'];
		$row['no_identitas_persetujuan']   = $ajb['nomor_identitas_persetujuan'];
		$row['gelar_pembeli']              = $ajb['gelar_pembeli'];
		$row['nama_pembeli']               = $ajb['nama_pembeli'];
		$row['kota_lahir_pembeli']         = $ajb['tempat_lahir_pembeli'];
		$row['tanggal_lahir_pembeli']      = $ajb['tanggal_lahir_pembeli'];
		$row['pekerjaan_pembeli']          = $ajb['pekerjaan_pembeli'];
		$row['alamat_pembeli']             = $ajb['alamat_pembeli'];
		$row['rt_pembeli']                 = $ajb['rt_pembeli'];
		$row['kelurahan_pembeli']          = $ajb['kelurahan_pembeli'];
		$row['nama_kelurahan_pembeli']     = $ajb['nama_kelurahan_pembeli'];
		$row['kecamatan_pembeli']          = $ajb['kecamatan_pembeli'];
		$row['kota_pembeli']               = $ajb['kota_pembeli'];
		$row['nama_kota_pembeli']          = $ajb['nama_kota_pembeli'];
		$row['no_identitas_pembeli']       = $ajb['nomor_identitas_pembeli'];
		$row['jenis_kepemilikan']          = $ajb['jenis_kepemilikan'];
		$row['nomor_kepemilikan']          = $ajb['nomor_kepemilikan'];
		$row['nomor_surat_ukur']           = $ajb['nomor_surat_ukur'];
		$row['tanggal_surat_ukur']         = $ajb['tanggal_surat_ukur'];
		$row['luas_tanah']                 = $ajb['luas_tanah'];
		$row['nomor_nib']                  = $ajb['nomor_nib'];
		$row['nomor_spptpbb']              = $ajb['nomor_spptpbb'];
		$row['kecamatan_tanah']            = $ajb['kecamatan_tanah'];
		$row['nama_kelurahan_tanah']       = $ajb['nama_kelurahan_tanah'];
		$row['luas_bangunan']              = $ajb['luas_bangunan'];
		$row['alamat_bangunan']            = $ajb['alamat_bangunan'];
		$row['rt_bangunan']                = $ajb['rt_bangunan'];
		$row['kelurahan_bangunan']         = $ajb['kelurahan_bangunan'];
		$row['nama_kelurahan_bangunan']    = $ajb['nama_kelurahan_bangunan'];
		$row['kecamatan_bangunan']         = $ajb['kecamatan_bangunan'];
		$row['kota_bangunan']              = $ajb['kota_bangunan'];
		$row['nama_kota_bangunan']         = $ajb['nama_kota_bangunan'];
		$row['nilai_beli']				   = $ajb['nilai_beli'];
		$dataStart                         = headAjb();
		$dataEnd                           = footAjb($row);
		$format                            = $surat_ajb['template'];
		$data['format_surat'] = str_replace($dataStart,$dataEnd,$format);
		$this->load->view('surat_akta/cetak_ajb',$data);
	}
	//============= END TEMPLATE SURAT PPAT =============//
}