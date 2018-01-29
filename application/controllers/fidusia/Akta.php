<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akta extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		isLogin();
		$this->load->model('fidusia/aktamodel','akta');
		$this->load->model('Surataktamodel','surat');
	}

	//========= AKTA FIDUSIA ========//
	public function debitur()
	{
		$data['title'] = 'Data Debitur';
		$data['page']  = 'fidusia';
		if ($this->session->userdata('level') == 1) {
			$data['baris'] = $this->akta->findAll();
		}
		else {
			$data['baris'] = $this->akta->findAll($this->session->userdata('id'));
		}
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
		$data['row']   = $this->akta->findById($id);
		$this->load->view('data_debitur/form',$data);
	}

	public function save_debitur() {
		if ($this->input->post('process')) {
			$no_akta                     = $this->input->post('no_akta');
			$tanggal_akta                = $this->input->post('tanggal_akta');
			$jam_akta                    = $this->input->post('jam_akta');
			$jam_selesai_akta            = $this->input->post('jam_selesai_akta');
			$jenis_fidusia               = $this->input->post('jenis_fidusia');
			$gelar_debitur               = $this->input->post('gelar_debitur');
			$nama_debitur                = $this->input->post('nama_debitur');
			$alias_debitur               = $this->input->post('alias_debitur');
			$pekerjaan_debitur           = $this->input->post('pekerjaan_debitur');
			$kota_lahir_debitur          = $this->input->post('kota_lahir_debitur');
			$tgl_lahir_debitur           = $this->input->post('tanggal_lahir');
			$warga_debitur               = $this->input->post('warga_debitur');
			$alamat_debitur              = $this->input->post('alamat_debitur');
			$rt_debitur                  = $this->input->post('rt_debitur');
			$rw_debitur                  = $this->input->post('rw_debitur');
			$lurah_debitur               = $this->input->post('lurah_debitur');
			$nama_lurah_debitur          = $this->input->post('nama_lurah_debitur');
			$kecamatan_debitur           = $this->input->post('kecamatan_debitur');
			$kota_debitur                = $this->input->post('kota_debitur');
			$nama_kota_debitur           = $this->input->post('nama_kota_debitur');
			$jenis_identitas_debitur     = $this->input->post('jenis_identitas_debitur');
			$no_identitas_debitur        = $this->input->post('no_identitas_debitur');
			$status_akta                 = $this->input->post('status_akta');
			$jenis_persetujuan           = $this->input->post('jenis_persetujuan');
			$gelar_persetujuan           = $this->input->post('gelar_persetujuan');
			$nama_persetujuan            = $this->input->post('nama_persetujuan');
			$alias_persetujuan           = $this->input->post('alias_persetujuan');
			$pekerjaan_persetujuan       = $this->input->post('pekerjaan_persetujuan');
			$kota_lahir_persetujuan      = $this->input->post('kota_lahir_persetujuan');
			$tgl_lahir_persetujuan       = $this->input->post('tgl_lahir_persetujuan');
			$warga_persetujuan = $this->input->post('warga_persetujuan');
			$warga_persetujuan           = $this->input->post('warga_persetujuan');
			$alamat_persetujuan          = $this->input->post('alamat_persetujuan');
			$rt_persetujuan              = $this->input->post('rt_persetujuan');
			$rw_persetujuan              = $this->input->post('rw_persetujuan');
			$kelurahan_persetujuan       = $this->input->post('kelurahan_persetujuan');
			$nama_kelurahan_persetujuan  = $this->input->post('nama_kelurahan_persetujuan');
			$kecamatan_persetujuan       = $this->input->post('kecamatan_persetujuan');
			$kota_persetujuan            = $this->input->post('kota_persetujuan');
			$nama_kota_persetujuan       = $this->input->post('nama_kota_persetujuan');
			$jenis_identitas_persetujuan = $this->input->post('jenis_identitas_persetujuan');
			$no_identitas_persetujuan    = $this->input->post('no_identitas_persetujuan');
			$gelar_pemilik               = $this->input->post('gelar_pemilik');
			$nama_pemilik                = $this->input->post('nama_pemilik');
			$alias_pemilik               = $this->input->post('alias_pemilik');
			$pekerjaan_pemilik           = $this->input->post('pekerjaan_pemilik');
			$kota_lahir_pemilik          = $this->input->post('kota_lahir_pemilik');
			$tgl_lahir_pemilik           = $this->input->post('tgl_lahir_pemilik');
			$alamat_pemilik              = $this->input->post('alamat_pemilik');
			$rt_pemilik                  = $this->input->post('rt_pemilik');
			$rw_pemilik                  = $this->input->post('rw_pemilik');
			$kelurahan_pemilik           = $this->input->post('kelurahan_pemilik');
			$nama_kelurahan_pemilik      = $this->input->post('nama_kelurahan_pemilik');
			$kecamatan_pemilik           = $this->input->post('kecamatan_pemilik');
			$kota_pemilik                = $this->input->post('kota_pemilik');
			$nama_kota_pemilik           = $this->input->post('nama_kota_pemilik');
			$jenis_identitas_pemilik     = $this->input->post('jenis_identitas_pemilik');
			$no_identitas_pemilik        = $this->input->post('no_identitas_pemilik');
			$nama_cv                     = $this->input->post('nama_cv');
			$kedudukan_cv                = $this->input->post('kedudukan_cv');
			$tgl_akta_pendirian_cv       = $this->input->post('tgl_akta_pendirian_cv');
			$no_akta_pendirian_cv        = $this->input->post('no_akta_pendirian_cv');
			$nota_akta_pendirian_cv      = $this->input->post('nota_akta_pendirian_cv');
			$tgl_setuju                  = $this->input->post('tgl_setuju');
			$tgl_pk                      = $this->input->post('tgl_pk');
			$no_pk                       = $this->input->post('no_pk');
			$tgl_sk_fidusia_debitur      = $this->input->post('tgl_sk_fidusia_debitur');
			$no_langganan                = $this->input->post('no_langganan');
			$nilai_hutang                = $this->input->post('nilai_hutang');
			$nilai_obyek                 = $this->input->post('nilai_obyek');
			$nilai_penjaminan            = $this->input->post('nilai_penjaminan');
			$no_polisi                   = $this->input->post('no_polisi');
			$merk                        = $this->input->post('merk');
			$type                        = $this->input->post('type');
			$jenis_kendaraan             = $this->input->post('jenis_kendaraan');
			$model                       = $this->input->post('model');
			$thn_buat                    = $this->input->post('thn_buat');
			$thn_rakit                   = $this->input->post('thn_rakit');
			$silinder                    = $this->input->post('silinder');
			$warna                       = $this->input->post('warna');
			$warna                       = $this->input->post('warna');
			$no_rangka                   = $this->input->post('no_rangka');
			$no_mesin                    = $this->input->post('no_mesin');
			$bpkb_nmr                    = $this->input->post('bpkb_nmr');
			$bpkb_atas_nama              = $this->input->post('bpkb_atas_nama');
			$bpkb_tanggal                = $this->input->post('bpkb_tanggal');
			$bpkb_dikeluarkan_oleh       = $this->input->post('bpkb_dikeluarkan_oleh');
			$sumbu                       = $this->input->post('sumbu');
			$roda                        = $this->input->post('roda');
			$kondisi                     = $this->input->post('kondisi');
			$bukti_hak                   = $this->input->post('bukti_hak');
			$tgl_spb                     = $this->input->post('tgl_spb');
			$tgl_kwitansi                = $this->input->post('tgl_kwitansi');
			$tgl_setuju_cv 				 = $this->input->post('tgl_setuju_cv');
			$peradilan_negeri            = $this->input->post('peradilan_negeri');
			$penerima_fidusia            = $this->input->post('penerima_fidusia');
			$kedudukan                   = $this->input->post('kedudukan');
			$cabang                      = $this->input->post('cabang');
			$alamat_penerima_fidusia     = $this->input->post('alamat_penerima_fidusia');
			$nama_penerima_fidusia       = $this->input->post('nama_penerima_fidusia');
			$jabatan_penerima_fidusia    = $this->input->post('jabatan_penerima_fidusia');
			$tgl_sk_penerima_fidusia     = $this->input->post('tgl_sk_penerima_fidusia');
			$no_sk_penerima_fidusia      = $this->input->post('no_sk_penerima_fidusia');
			$kanwil                      = $this->input->post('kanwil');
			$alamat_kanwil               = $this->input->post('alamat_kanwil');
			$no_surat_pengantar          = $this->input->post('no_surat_pengantar');
			$tgl_surat_pengantar         = $this->input->post('tgl_surat_pengantar');
			$tgl_sk_notaris              = $this->input->post('tgl_sk_notaris');
			$kode_customer               = $this->input->post('kode_customer');
			$nama_customer               = $this->input->post('nama_customer');
			$pnbp                        = $this->input->post('pnbp');
			$admin_bank                  = $this->input->post('admin_bank');
			$materai                     = $this->input->post('materai');
			$admin_dan_operasional       = $this->input->post('admin_dan_operasional');
			$jumlah                      = $this->input->post('jumlah');
			$biaya_akta                  = $this->input->post('biaya_akta');
			$no_sertifikat               = $this->input->post('no_sertifikat');
			$no_bukti_setoran            = $this->input->post('no_bukti_setoran');
			$tgl_setor                   = $this->input->post('tgl_setor');
			$nama_karyawan               = $this->input->post('nama_karyawan');
			$id                          = $this->input->post('id');

			$data = array(
							'no_akta'                     => $no_akta, 
							'tanggal_akta'                => $tanggal_akta,
							'jam_akta'                    => $jam_akta,
							'jam_selesai_akta'            => $jam_selesai_akta,
							'jenis_fidusia'               => $jenis_fidusia,
							'gelar_debitur'               => $gelar_debitur,
							'nama_debitur'                => $nama_debitur,
							'alias_debitur'               => $alias_debitur,
							'pekerjaan_debitur'           => $pekerjaan_debitur,
							'kota_lahir_debitur'          => $kota_lahir_debitur,
							'tgl_lahir_debitur'           => $tgl_lahir_debitur,
							'warga_debitur'               => $warga_debitur,
							'alamat_debitur'              => $alamat_debitur,
							'rt_debitur'                  => $rt_debitur,
							'rw_debitur'                  => $rw_debitur,
							'kelurahan_debitur'           => $lurah_debitur,
							'nama_kelurahan_debitur'      => $nama_lurah_debitur,
							'kecamatan_debitur'           => $kecamatan_debitur,
							'kota_debitur'                => $kota_debitur,
							'nama_kota_debitur'           => $nama_kota_debitur,
							'jenis_identitas_debitur'     => $jenis_identitas_debitur,
							'no_identitas_debitur'        => $no_identitas_debitur,
							'status_akta'                 => $status_akta,
							'jenis_persetujuan'           => $jenis_persetujuan,
							'gelar_persetujuan'           => $gelar_persetujuan,
							'nama_persetujuan'            => $nama_persetujuan,
							'alias_persetujuan'           => $alias_persetujuan,
							'pekerjaan_persetujuan'       => $pekerjaan_persetujuan,
							'kota_lahir_persetujuan'	  => $kota_lahir_persetujuan,
							'tgl_lahir_persetujuan'       => $tgl_lahir_persetujuan,
							'warga_persetujuan' => $warga_persetujuan,
							'alamat_persetujuan'		  => $alamat_persetujuan,
							'rt_persetujuan'              => $rt_persetujuan,
							'rw_persetujuan'              => $rw_persetujuan,
							'kelurahan_persetujuan'       => $kelurahan_persetujuan,
							'nama_kelurahan_persetujuan'  => $nama_kelurahan_persetujuan,
							'kecamatan_persetujuan'       => $kecamatan_persetujuan,
							'kota_persetujuan'            => $kota_persetujuan,
							'nama_kota_persetujuan'       => $nama_kota_persetujuan,
							'jenis_identitas_persetujuan' => $jenis_identitas_persetujuan,
							'no_identitas_persetujuan'    => $no_identitas_persetujuan,
							'gelar_pemilik'               => $gelar_pemilik,
							'nama_pemilik'                => $nama_pemilik,
							'alias_pemilik'               => $alias_pemilik,
							'pekerjaan_pemilik'           => $pekerjaan_pemilik,
							'kota_lahir_pemilik'          => $kota_lahir_pemilik,
							'tgl_lahir_pemilik'           => $tgl_lahir_pemilik,
							'alamat_pemilik'              => $alamat_pemilik,
							'rt_pemilik'                  => $rt_pemilik,
							'rw_pemilik'                  => $rw_pemilik,
							'kelurahan_pemilik'           => $kelurahan_pemilik,
							'nama_kelurahan_pemilik'      => $nama_kelurahan_pemilik,
							'kecamatan_pemilik'           => $kecamatan_pemilik,
							'kota_pemilik'                => $kota_pemilik,
							'nama_kota_pemilik'           => $nama_kota_pemilik,
							'jenis_identitas_pemilik'     => $jenis_identitas_pemilik,
							'no_identitas_pemilik'        => $no_identitas_pemilik,
							'nama_cv'                     => $nama_cv,
							'kedudukan_cv'                => $kedudukan_cv,
							'tgl_akta_pendirian_cv'       => $tgl_akta_pendirian_cv,
							'no_akta_pendirian_cv'        => $no_akta_pendirian_cv,
							'nota_akta_pendirian_cv'      => $nota_akta_pendirian_cv,
							'tgl_setuju_cv'               => $tgl_setuju_cv,
							'tgl_pk'                      => $tgl_pk,
							'no_pk'                       => $no_pk,
							'tgl_sk_fidusia_debitur'      => $tgl_sk_fidusia_debitur,
							'no_langganan'                => $no_langganan,
							'nilai_hutang'                => $nilai_hutang,
							'nilai_penjaminan'            => $nilai_penjaminan,
							'nilai_obyek'                 => $nilai_obyek,
							'no_polisi'                   => $no_polisi,
							'merk'                        => $merk,
							'type'                        => $type,
							'jenis_kendaraan'             => $jenis_kendaraan,
							'model'                       => $model,
							'thn_buat'                    => $thn_buat,
							'thn_rakit'                   => $thn_rakit,
							'silinder'                    => $silinder,
							'warna'                       => $warna,
							'no_rangka'                   => $no_rangka,
							'no_mesin'                    => $no_mesin,
							'bpkb_nmr'                    => $bpkb_nmr,
							'bpkb_atas_nama'              => $bpkb_atas_nama,
							'bpkb_tanggal'                => $bpkb_tanggal,
							'bpkb_dikeluarkan_oleh'       => $bpkb_dikeluarkan_oleh,
							'sumbu'                       => $sumbu,
							'roda'                        => $roda,
							'kondisi'                     => $kondisi,
							'bukti_hak'                   => $bukti_hak,
							'tgl_spb'                     => $tgl_spb,
							'tgl_kwitansi'                => $tgl_kwitansi,
							'peradilan_negeri'            => $peradilan_negeri,
							'penerima_fidusia'            => $penerima_fidusia,
							'kedudukan'                   => $kedudukan,
							'cabang'                      => $cabang,
							'alamat_penerima_fidusia'     => $alamat_penerima_fidusia,
							'nama_penerima_fidusia'       => $nama_penerima_fidusia,
							'jabatan_penerima_fidusia'    => $jabatan_penerima_fidusia,
							'tgl_sk_penerima_fidusia'     => $tgl_sk_penerima_fidusia,
							'no_sk_penerima_fidusia'      => $no_sk_penerima_fidusia,
							'kanwil'                      => $kanwil,
							'alamat_kanwil'               => $alamat_kanwil,
							'no_surat_pengantar'          => $no_surat_pengantar,
							'tgl_surat_pengantar'         => $tgl_surat_pengantar,
							'tgl_sk_notaris'              => $tgl_sk_notaris,
							'kode_customer'               => $kode_customer,
							'nama_customer'               => $nama_customer,
							'pnbp'                        => $pnbp,
							'admin_bank'                  => $admin_bank,
							'materai'                     => $materai,
							'admin_dan_operasional'       => $admin_dan_operasional,
							'jumlah'                      => $jumlah,
							'biaya_akta'                  => $biaya_akta,
							'no_sertifikat'               => $no_sertifikat,
							'no_bukti_setoran'            => $no_bukti_setoran,
							'tgl_setor'                   => $tgl_setor,
							'nama_karyawan'               => $nama_karyawan,
							'id_petugas'               	  => $this->session->userdata('id'),
							'created_at'                  => date('Y-m-d H:i:s'),
							'updated_at'				  => date('Y-m-d H:i:s'),
							'status'                      => 1
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
	//============= END AKTA FIDUSIA ==========//

	//============= TEMPLATE SURAT FIDUSIA ============//
	public function surat_debitur() {
		$data['title'] = 'Surat Akta';
		$data['page'] = 'surat';
		$data['row'] = $this->surat->findDebitur();
		$this->load->view('surat_akta/data_surat_debitur',$data);
	}

	// public function tambah_surat_debitur() {
	// 	$data['title'] = 'Tambah Surat';
	// 	$data['page'] = 'surat';
	// 	$this->load->view('data_debitur/form_surat',$data);
	// }

	public function edit_surat_debitur($id) {
		$data['title'] = 'Edit Surat';
		$data['page'] = 'surat';
		$data['row'] = $this->surat->findById($id);
		$this->load->view('surat_akta/form_surat_debitur',$data);
	}

	// public function hapus_surat($id) {
	// 	$this->surat->deleteData($id);
	// 	$this->session->set_flashdata('pesan','Berhasil Menghapus Surat');
	// 	redirect('fidusia/akta/surat_akta');
	// }

	public function save_surat_debitur() {
		if ($this->input->post('takis')) {
			$nama_surat  = $this->input->post('nama_surat');
			$template    = $this->input->post('template');
			$jenis_surat = 'debitur';
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
				$this->session->set_flashdata('pesan','Berhasil Menambahkan Template Surat');
			}
			else {
				$this->surat->updateData($id,$array);
				$this->session->set_flashdata('pesan','Berhasil Mengubah Template Surat');
			}
			redirect('/fidusia/akta/surat_akta');
		}
	}

	public function cetak_debitur($id) {
		$akta                               = $this->akta->findById($id);
		$surat                              = $this->surat->showSurat();
		$row                                = [];
		$row['no_akta']                     = $akta['no_akta'];
		$row['tanggal_akta']                = $akta['tanggal_akta'];
		$row['jam_akta']                    = $akta['jam_akta'];
		$row['gelar_debitur']               = $akta['gelar_debitur'];
		$row['nama_debitur']                = $akta['nama_debitur'];
		$row['kota_lahir_debitur']          = $akta['kota_lahir_debitur'];
		$row['tgl_lahir_debitur']           = $akta['tgl_lahir_debitur'];
		$row['warga_debitur']               = $akta['warga_debitur'];
		$row['pekerjaan_debitur']           = $akta['pekerjaan_debitur'];
		$row['alamat_debitur']              = $akta['alamat_debitur'];
		$row['rt_debitur']                  = $akta['rt_debitur'];
		$row['rw_debitur']                  = $akta['rw_debitur'];
		$row['kelurahan_debitur']           = $akta['kelurahan_debitur'];
		$row['nama_kelurahan_debitur']      = $akta['nama_kelurahan_debitur'];
		$row['kecamatan_debitur']           = $akta['kecamatan_debitur'];
		$row['kota_debitur']                = $akta['kota_debitur'];
		$row['nama_kota_debitur']           = $akta['nama_kota_debitur'];
		$row['jenis_identitas_debitur']     = $akta['jenis_identitas_debitur'];
		$row['no_identitas_debitur']        = $akta['no_identitas_debitur'];
		$row['tgl_sk_penerima_fidusia']     = $akta['tgl_sk_penerima_fidusia'];
		$row['gelar_persetujuan']           = $akta['gelar_persetujuan'];
		$row['nama_persetujuan']			= $akta['nama_persetujuan'];
		$row['kota_lahir_persetujuan']      = $akta['kota_lahir_persetujuan'];
		$row['tgl_lahir_persetujuan']       = $akta['tgl_lahir_persetujuan'];
		$row['warga_persetujuan']           = $akta['warga_persetujuan'];
		$row['pekerjaan_persetujuan']       = $akta['pekerjaan_persetujuan'];
		$row['alamat_persetujuan']          = $akta['alamat_persetujuan'];
		$row['rt_persetujuan']              = $akta['rt_persetujuan'];
		$row['rw_persetujuan']              = $akta['rw_persetujuan'];
		$row['kelurahan_persetujuan']       = $akta['kelurahan_persetujuan'];
		$row['nama_kelurahan_persetujuan']  = $akta['nama_kelurahan_persetujuan'];
		$row['kecamatan_persetujuan']       = $akta['kecamatan_persetujuan'];
		$row['kota_persetujuan']            = $akta['kota_persetujuan'];
		$row['nama_kota_persetujuan']       = $akta['nama_kota_persetujuan'];
		$row['jenis_identitas_persetujuan'] = $akta['jenis_identitas_persetujuan'];
		$row['no_identitas_persetujuan']    = $akta['no_identitas_persetujuan'];
		$row['no_sk_penerima_fidusia']      = $akta['no_sk_penerima_fidusia'];
		$row['nilai_penjaminan']            = $akta['nilai_penjaminan'];
		$row['nilai_hutang']				= $akta['nilai_hutang'];
		$row['merk']                        = $akta['merk'];
		$row['type']                        = $akta['type'];
		$row['thn_buat']                    = $akta['thn_buat'];
		$row['warna']                       = $akta['warna'];
		$row['no_rangka']                   = $akta['no_rangka'];
		$row['no_mesin']                    = $akta['no_mesin'];
		$row['no_polisi']                   = $akta['no_polisi'];
		$row['bukti_hak']                   = $akta['bukti_hak'];
		$row['bpkb_atas_nama']              = $akta['bpkb_atas_nama'];
		$row['nilai_obyek']                 = $akta['nilai_obyek'];
		$dataStart                         = headLetter();
		$dataEnd                           = tailLetter($row);
		$format                            = $surat['template'];
		// var_dump($dataEnd);
		// exit;
		$data['format_surat']              = str_replace($dataStart,$dataEnd,$format);
		$this->load->view('surat_akta/cetak_debitur',$data);
	}
	//============= END TEMPLATE SURAT FIDUSIA ============//
}