<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Akta extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		isLogin();
		$this->load->model('fidusia/aktamodel','akta');
	}

	public function debitur()
	{
		$data['title'] = 'Data Debitur';
		$data['page']  = 'fidusia';
		$data['baris'] = $this->akta->findAll();
		$this->load->view('data_debitur/data',$data);
	}

	public function add_debitur() {
		$data['title'] = 'Tambah Data Debitur';
		$data['page']  = 'fidusia';
		$this->load->view('data_debitur/form',$data);
	}

	public function edit_debitur($id) {
		$data['title'] = 'Tambah Data Debitur';
		$data['page']  = 'fidusia';
		$data['row'] = $this->akta->findById($id);
		$this->load->view('data_debitur/form',$data);
	}

	public function save_debitur() {
		if ($this->input->post('process')) {

			$no_akta = $this->input->post('no_akta');
			$tanggal_akta = $this->input->post('tanggal_akta');
			$jam_akta = $this->input->post('jam_akta');
			$jam_selesai_akta = $this->input->post('jam_selesai_akta');
			$jenis_fidusia = $this->input->post('jenis_fidusia');
			$gelar_debitur = $this->input->post('gelar_debitur');
			$nama_debitur = $this->input->post('nama_debitur');
			$alias_debitur = $this->input->post('alias_debitur');
			$pekerjaan_debitur = $this->input->post('pekerjaan_debitur');
			$kota_lahir_debitur = $this->input->post('kota_lahir_debitur');
			$tgl_lahir_debitur = $this->input->post('tanggal_lahir');
			$warga_debitur = $this->input->post('warga_debitur');
			$alamat_debitur = $this->input->post('alamat_debitur');
			$rt_debitur = $this->input->post('rt_debitur');
			$rw_debitur = $this->input->post('rw_debitur');
			$lurah_debitur = $this->input->post('lurah_debitur');
			$nama_lurah_debitur = $this->input->post('nama_lurah_debitur');
			$kecamatan_debitur = $this->input->post('kecamatan_debitur');
			$kota_debitur = $this->input->post('kota_debitur');
			$nama_kota_debitur = $this->input->post('nama_kota_debitur');
			$jenis_identitas_debitur = $this->input->post('jenis_identitas_debitur');
			$no_identitas_debitur = $this->input->post('no_identitas_debitur');
			$status_akta = $this->input->post('status_akta');
			$id = $this->input->post('id');

			$data = array('no_akta' => $no_akta, 
							'tanggal_akta' => $tanggal_akta,
							'jam_akta' => $jam_akta,
							'jam_selesai_akta' => $jam_selesai_akta,
							'jenis_fidusia' => $jenis_fidusia,
							'gelar_debitur' => $gelar_debitur,
							'nama_debitur' => $nama_debitur,
							'alias_debitur' => $alias_debitur,
							'pekerjaan_debitur' => $pekerjaan_debitur,
							'kota_lahir_debitur' => $kota_lahir_debitur,
							'tgl_lahir_debitur' => $tgl_lahir_debitur,
							'warga_debitur' => $warga_debitur,
							'alamat_debitur' => $alamat_debitur,
							'rt_debitur' => $rt_debitur,
							'rw_debitur' => $rw_debitur,
							'kelurahan_debitur' => $lurah_debitur,
							'nama_kelurahan_debitur' => $nama_lurah_debitur,
							'kecamatan_debitur' => $kecamatan_debitur,
							'kota_debitur' => $kota_debitur,
							'nama_kota_debitur' => $nama_kota_debitur,
							'jenis_identitas_debitur' => $jenis_identitas_debitur,
							'no_identitas_debitur' => $no_identitas_debitur,
							'status_akta' => $status_akta,
							'status' => 1
						);

			if ($id == '') {
				$this->akta->insertData($data);
				$this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
			}
			else {
				$this->akta->updateData($id,$data);
				$this->session->set_flashdata('pesan', 'Data berhasil diubah!');
			}
			redirect('fidusia/akta/debitur');
		}
	}

}