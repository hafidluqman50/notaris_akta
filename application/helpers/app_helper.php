<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('islogin'))
{
function isLogin() {
        $ci = &get_instance();
        if ($ci->session->userdata('is_login') == TRUE) {
            return TRUE;
        } else {
            $ci->session->set_flashdata('error', 'Anda tidak memiliki hak akses');
            redirect('home');
        }
    }
}

if (!function_exists('humanDate'))
{
function humanDate($date) {
        $tanggal = date('d F Y',strtotime($date));
        return $tanggal;
    }
}

function romawi() {
	$array_bulan = array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
    $bulan = $array_bulan[date('n')];
    return $bulan;
}

if (!function_exists('autoCode'))
{
function autoCode($table,$prefix) {
		$ci = &get_instance();
        $ci->db->order_by('id','desc');
        $ci->db->limit(1);
        $query = $ci->db->get($table);
        $kode = '';
        if ($query->num_rows() > 0) {
        	$data = $query->row_array();
        	$no = $data['id'] + 1;
        	if (strlen($data['id']) == 1) {
        		$kode = $prefix.'00'.$no;
        	}
        	else if (strlen($data['id']) == 2) {
        		$kode = $prefix.'0'.$no;
        	}
        	else if (strlen($data['id']) == 3) {
        		$kode = $prefix.$no;
        	}
        }
        else {
        	$kode = $prefix.'001';
        }
        return $kode;
    }
}

if (!function_exists('autoCodeInv'))
{
function autoCodeInv() {
		$ci = &get_instance();
        $ci->db->order_by('id','desc');
        $ci->db->limit(1);
        $query = $ci->db->get('tb_penjualan');
        $kode = '';
        if ($query->num_rows() > 0) {
        	$data = $query->row_array();
            $no = explode('/', $data['no_invoice']);
        	$kode = (int)$no[0] + 1;
        }
        else {
        	$kode = '1';
        }
        return $kode.'/NN/INV/'.romawi().'/'.date('Y');
    }
}

function rupiah($uang) {
    $jagaw = number_format($uang,2,",",".");
    $uang = 'Rp'.$jagaw;
    return $uang;
}

function tanggal_ppat($tgl) {
    $tanggal= explode('-',$tgl);
    return $tanggal[2].'/'.$tanggal[1].'/'.$tanggal[0];
}

function format_hari($tanggal) {
    $cek = date('D',strtotime($tanggal));
    $array = ['Sun'=>'Minggu','Mon'=>'Senin','Tue'=>'Selasa','Wed'=>'Rabu','Thu'=>'Kamis','Fri'=>
    "Jum'at",'Sat'=>'Sabtu'];
    return $array[$cek];
}

if (!function_exists('headLetter'))
{
function headLetter() {
		$data = array('{no_akta}', 
                        '{hari}',
                        '{tanggal_akta}',
                        '{tanggal_akta_terbilang}',
                        '{waktu}',
                        '{waktu_terbilang}', 
                        '{gelar_debitur}',
                        '{nama_debitur}',
						'{kota_lahir_debitur}', 
						'{tgl_lahir_debitur}', 
                        '{tgl_lhr_dbt_terbilang}',
                        '{warga_debitur}',
                        '{pekerjaan_debitur}', 
						'{alamat_debitur}',
                        '{rt_debitur}',
                        '{rw_debitur}',
                        '{kelurahan_debitur}',
                        '{nama_kelurahan_debitur}',
                        '{kecamatan_debitur}',
                        '{kota_debitur}',
                        '{nama_kota_debitur}',
                        '{jenis_identitas_debitur}',
                        '{no_identitas_debitur}',
                        '{tgl_sk_penerima_fidusia}',
                        '{tgl_sk_terbilang}',
                        '{gelar_persetujuan}',
                        '{nama_persetujuan}',
                        '{kota_lahir_persetujuan}',
                        '{tgl_lahir_persetujuan}',
                        '{tgl_lhr_persetujuan_terbilang}',
                        '{warga_persetujuan}',
                        '{pekerjaan_persetujuan}',
                        '{alamat_persetujuan}',
                        '{rt_persetujuan}',
                        '{rw_persetujuan}',
                        '{kelurahan_persetujuan}',
                        '{nama_kelurahan_persetujuan}',
                        '{kecamatan_persetujuan}',
                        '{kota_persetujuan}',
                        '{nama_kota_persetujuan}',
                        '{jenis_identitas_persetujuan}',
                        '{no_identitas_persetujuan}',
                        '{no_sk_penerima_fidusia}',
                        '{nilai_hutang}',
                        '{nilai_hutang_terbilang}',
                        '{nilai_penjaminan}',
                        '{nilai_penjaminan_terbilang}',
                        '{merk}',
                        '{type}',
                        '{thn_buat}',
                        // '{thn_rakit}',
                        '{warna}',
                        '{no_rangka}',
                        '{no_mesin}',
                        '{no_polisi}',
                        '{bukti_hak}',
                        '{bpkb_atas_nama}',
                        '{nilai_obyek}',
                        '{nilai_obyek_terbilang}'
                        );
		return $data;
    }
}

if (!function_exists('tailLetter'))
{
function tailLetter($row) {

		$data = array($row['no_akta'], 
                        format_hari($row['tanggal_akta']),
						humanDate($row['tanggal_akta']),
						format_tanggal($row['tanggal_akta']), 
						format_waktu($row['jam_akta']), 
						waktu_terbilang($row['jam_akta']), 
						$row['gelar_debitur'],
                        $row['nama_debitur'],
						$row['kota_lahir_debitur'],
                        humanDate($row['tgl_lahir_debitur']),
                        format_tanggal($row['tgl_lahir_debitur']),
                        $row['warga_debitur'],
                        $row['pekerjaan_debitur'],
                        $row['alamat_debitur'],
                        $row['rt_debitur'],
                        $row['rw_debitur'],
                        $row['kelurahan_debitur'],
                        $row['nama_kelurahan_debitur'],
                        $row['kecamatan_debitur'],
                        $row['kota_debitur'],
                        $row['nama_kota_debitur'],
                        $row['jenis_identitas_debitur'],
                        $row['no_identitas_debitur'],
                        humanDate($row['tgl_sk_penerima_fidusia']),
                        format_tanggal($row['tgl_sk_penerima_fidusia']),
                        $row['gelar_persetujuan'],
                        $row['nama_persetujuan'],
                        $row['kota_lahir_persetujuan'],
                        humanDate($row['tgl_lahir_persetujuan']),
                        format_tanggal($row['tgl_lahir_persetujuan']),
                        $row['warga_persetujuan'],
                        $row['pekerjaan_persetujuan'],
                        $row['alamat_persetujuan'],
                        $row['rt_persetujuan'],
                        $row['rw_persetujuan'],
                        $row['kelurahan_persetujuan'],
                        $row['nama_kelurahan_persetujuan'],
                        $row['kecamatan_persetujuan'],
                        $row['kota_persetujuan'],
                        $row['nama_kota_persetujuan'],
                        $row['jenis_identitas_persetujuan'],
                        $row['no_identitas_persetujuan'],
                        $row['no_sk_penerima_fidusia'],
                        // humanDate($row['tgl_sk_penerima_fidusia']),
                        // format_tanggal($row['tgl_sk_penerima_fidusia']),
                        rupiah($row['nilai_hutang']),
                        terbilang($row['nilai_hutang']),
                        rupiah($row['nilai_penjaminan']),
                        terbilang($row['nilai_penjaminan']),
                        $row['merk'],
                        $row['type'],
                        $row['thn_buat'],
                        $row['warna'],
                        $row['no_rangka'],
                        $row['no_mesin'],
                        $row['no_polisi'],
                        $row['bukti_hak'],
                        $row['bpkb_atas_nama'],
                        rupiah($row['nilai_obyek']),
                        terbilang($row['nilai_obyek'])
						);
        return $data;
    }
}

function headSkmht() {
    $array = [
        '{no_akta}',
        '{hari}',
        '{tanggal_akta}',
        '{tanggal_akta_terbilang}',
        '{bulan}',
        '{tahun}',
        '{tahun_terbilang}',
        '{gelar_penjual}',
        '{nama_penjual}',
        '{kota_lahir_penjual}',
        '{tgl_lhr_penjual}',
        '{tgl_lhr_penjual_terbilang}',
        '{pekerjaan_penjual}',
        '{alamat_penjual}',
        '{rt_penjual}',
        '{kelurahan_penjual}',
        '{nama_kelurahan_penjual}',
        '{kecamatan_penjual}',
        '{kota_penjual}',
        '{nama_kota_penjual}',
        '{no_identitas_penjual}',
        '{kedudukan_keluarga_penjual}',
        '{gelar_persetujuan}',
        '{nama_persetujuan}',
        '{kota_lahir_persetujuan}',
        '{tgl_lhr_persetujuan}',
        '{tgl_lhr_persetujuan_terbilang}',
        '{pekerjaan_persetujuan}',
        '{alamat_persetujuan}',
        '{rt_persetujuan}',
        '{kelurahan_persetujuan}',
        '{nama_kelurahan_persetujuan}',
        '{kecamatan_persetujuan}',
        '{kota_persetujuan}',
        '{nama_kota_persetujuan}',
        '{no_identitas_persetujuan}',
        '{nilai_perjanjian}',
        '{nilai_perjanjian_terbilang}',
        '{nomor_perjanjian_kredit}',
        '{tanggal_perjanjian}',
        '{tanggal_perjanjian_terbilang}',
        '{peringkat_tanggungan}',
        '{nilai_tanggungan}',
        '{nilai_tanggungan_terbilang}',
        '{jenis_kepemilikan}',
        '{nomor_kepemilikan}',
        '{nomor_surat_ukur}',
        '{tanggal_surat_ukur}',
        '{tanggal_surat_ukur_terbilang}',
        '{luas_tanah}',
        '{luas_tanah_terbilang}',
        '{nomor_nib}',
        '{nomor_spptpbb}',
        '{kecamatan_tanah}',
        '{nama_kelurahan_tanah}',
        '{luas_bangunan}',
        '{luas_bangunan_terbilang}',
        '{alamat_bangunan}',
        '{rt_bangunan}',
        '{kelurahan_bangunan}',
        '{nama_kelurahan_bangunan}',
        '{kecamatan_bangunan}',
        '{kota_bangunan}',
        '{nama_kota_bangunan}',
        '{tanggal_dibuat_apht}',
        '{tanggal_dibuat_apht_terbilang}'
    ];
    return $array;
}

function footSkmht($row) {
    $data = [
        $row['nomor_akta_skmht'],
        format_hari($row['tanggal_akta_skmht']),
        pecah_tanggal($row['tanggal_akta_skmht']),
        tanggal_terbilang($row['tanggal_akta_skmht']),
        pecah_bulan($row['tanggal_akta_skmht']),
        pecah_tahun($row['tanggal_akta_skmht']),
        tahun_terbilang($row['tanggal_akta_skmht']),
        $row['gelar_penjual'],
        $row['nama_penjual'],
        $row['kota_lahir_penjual'],
        reverseDate($row['tanggal_lahir_penjual']),
        format_tanggal($row['tanggal_lahir_penjual']),
        $row['pekerjaan_penjual'],
        $row['alamat_penjual'],
        $row['rt_penjual'],
        $row['kelurahan_penjual'],
        $row['nama_kelurahan_penjual'],
        $row['kecamatan_penjual'],
        $row['kota_penjual'],
        $row['nama_kota_penjual'],
        $row['no_identitas_penjual'],
        $row['kedudukan_keluarga_penjual'],
        $row['gelar_persetujuan'],
        $row['nama_persetujuan'],
        $row['kota_lahir_persetujuan'],
        reverseDate($row['tanggal_lahir_persetujuan']),
        format_tanggal($row['tanggal_lahir_persetujuan']),
        $row['pekerjaan_persetujuan'],
        $row['alamat_persetujuan'],
        $row['rt_persetujuan'],
        $row['kelurahan_persetujuan'],
        $row['nama_kelurahan_persetujuan'],
        $row['kecamatan_persetujuan'],
        $row['kota_persetujuan'],
        $row['nama_kota_persetujuan'],
        $row['no_identitas_persetujuan'],
        rupiah($row['nilai_perjanjian']),
        rupiah_terbilang($row['nilai_perjanjian']),
        $row['nomor_perjanjian_kredit'],
        reverseDate($row['tanggal_perjanjian']),
        format_tanggal($row['tanggal_perjanjian']),
        $row['peringkat_tanggungan'],
        rupiah($row['nilai_tanggungan']),
        rupiah_terbilang($row['nilai_tanggungan']),
        $row['jenis_kepemilikan'],
        $row['nomor_kepemilikan'],
        $row['nomor_surat_ukur'],
        reverseDate($row['tanggal_surat_ukur']),
        format_tanggal($row['tanggal_surat_ukur']),
        $row['luas_tanah'],
        terbilang($row['luas_tanah']),
        $row['nomor_nib'],
        $row['nomor_spptpbb'],
        $row['kecamatan_tanah'],
        $row['nama_kelurahan_tanah'],
        $row['luas_bangunan'],
        terbilang($row['luas_bangunan']),
        $row['alamat_bangunan'],
        $row['rt_bangunan'],
        $row['kelurahan_bangunan'],
        $row['nama_kelurahan_bangunan'],
        $row['kecamatan_bangunan'],
        $row['kota_bangunan'],
        $row['nama_kota_bangunan'],
        $row['tanggal_dibuat_apht'],
        format_tanggal($row['tanggal_dibuat_apht'])
    ];
    return $data;
}

function headApht() {
    $array = [
        '{no_akta}',
        '{hari}',
        '{tanggal_akta}',
        '{tanggal_akta_terbilang}',
        '{bulan}',
        '{tahun}',
        '{tahun_terbilang}',
        '{nomor_akta_skmht}',
        '{tanggal_akta_skmht}',
        '{tanggal_akta_skmht_terbilang}',
        '{gelar_penjual}',
        '{nama_penjual}',
        '{kota_lahir_penjual}',
        '{tgl_lhr_penjual}',
        '{tgl_lhr_penjual_terbilang}',
        '{pekerjaan_penjual}',
        '{alamat_penjual}',
        '{rt_penjual}',
        '{kelurahan_penjual}',
        '{nama_kelurahan_penjual}',
        '{kecamatan_penjual}',
        '{kota_penjual}',
        '{nama_kota_penjual}',
        '{no_identitas_penjual}',
        '{kedudukan_keluarga_penjual}',
        '{gelar_persetujuan}',
        '{nama_persetujuan}',
        '{kota_lahir_persetujuan}',
        '{tgl_lhr_persetujuan}',
        '{tgl_lhr_persetujuan_terbilang}',
        '{pekerjaan_persetujuan}',
        '{alamat_persetujuan}',
        '{rt_persetujuan}',
        '{kelurahan_persetujuan}',
        '{nama_kelurahan_persetujuan}',
        '{kecamatan_persetujuan}',
        '{kota_persetujuan}',
        '{nama_kota_persetujuan}',
        '{no_identitas_persetujuan}',
        '{nilai_perjanjian}',
        '{nilai_perjanjian_terbilang}',
        '{nomor_perjanjian_kredit}',
        '{tanggal_perjanjian}',
        '{tanggal_perjanjian_terbilang}',
        '{peringkat_tanggungan}',
        '{nilai_tanggungan}',
        '{nilai_tanggungan_terbilang}',
        '{jenis_kepemilikan}',
        '{nomor_kepemilikan}',
        '{nomor_surat_ukur}',
        '{tanggal_surat_ukur}',
        '{tanggal_surat_ukur_terbilang}',
        '{luas_tanah}',
        '{luas_tanah_terbilang}',
        '{nomor_nib}',
        '{nomor_spptpbb}',
        '{kecamatan_tanah}',
        '{nama_kelurahan_tanah}',
        '{luas_bangunan}',
        '{luas_bangunan_terbilang}',
        '{alamat_bangunan}',
        '{rt_bangunan}',
        '{kelurahan_bangunan}',
        '{nama_kelurahan_bangunan}',
        '{kecamatan_bangunan}',
        '{kota_bangunan}',
        '{nama_kota_bangunan}'
    ];
    return $array;
}

function footApht($row) {
    $data = [
        $row['nomor_akta_apht'],
        format_hari($row['tanggal_akta_apht']),
        pecah_tanggal($row['tanggal_akta_apht']),
        tanggal_terbilang($row['tanggal_akta_apht']),
        pecah_bulan($row['tanggal_akta_apht']),
        pecah_tahun($row['tanggal_akta_apht']),
        tahun_terbilang($row['tanggal_akta_apht']),
        $row['nomor_akta_skmht'],
        reverseDate($row['tanggal_akta_skmht']),
        format_tanggal($row['tanggal_akta_skmht']),
        $row['gelar_penjual'],
        $row['nama_penjual'],
        $row['kota_lahir_penjual'],
        reverseDate($row['tanggal_lahir_penjual']),
        format_tanggal($row['tanggal_lahir_penjual']),
        $row['pekerjaan_penjual'],
        $row['alamat_penjual'],
        $row['rt_penjual'],
        $row['kelurahan_penjual'],
        $row['nama_kelurahan_penjual'],
        $row['kecamatan_penjual'],
        $row['kota_penjual'],
        $row['nama_kota_penjual'],
        $row['no_identitas_penjual'],
        $row['kedudukan_keluarga_penjual'],
        $row['gelar_persetujuan'],
        $row['nama_persetujuan'],
        $row['kota_lahir_persetujuan'],
        reverseDate($row['tanggal_lahir_persetujuan']),
        format_tanggal($row['tanggal_lahir_persetujuan']),
        $row['pekerjaan_persetujuan'],
        $row['alamat_persetujuan'],
        $row['rt_persetujuan'],
        $row['kelurahan_persetujuan'],
        $row['nama_kelurahan_persetujuan'],
        $row['kecamatan_persetujuan'],
        $row['kota_persetujuan'],
        $row['nama_kota_persetujuan'],
        $row['no_identitas_persetujuan'],
        rupiah($row['nilai_perjanjian']),
        rupiah_terbilang($row['nilai_perjanjian']),
        $row['nomor_perjanjian_kredit'],
        reverseDate($row['tanggal_perjanjian']),
        format_tanggal($row['tanggal_perjanjian']),
        $row['peringkat_tanggungan'],
        rupiah($row['nilai_tanggungan']),
        rupiah_terbilang($row['nilai_tanggungan']),
        $row['jenis_kepemilikan'],
        $row['nomor_kepemilikan'],
        $row['nomor_surat_ukur'],
        reverseDate($row['tanggal_surat_ukur']),
        format_tanggal($row['tanggal_surat_ukur']),
        $row['luas_tanah'],
        terbilang($row['luas_tanah']),
        $row['nomor_nib'],
        $row['nomor_spptpbb'],
        $row['kecamatan_tanah'],
        $row['nama_kelurahan_tanah'],
        $row['luas_bangunan'],
        terbilang($row['luas_bangunan']),
        $row['alamat_bangunan'],
        $row['rt_bangunan'],
        $row['kelurahan_bangunan'],
        $row['nama_kelurahan_bangunan'],
        $row['kecamatan_bangunan'],
        $row['kota_bangunan'],
        $row['nama_kota_bangunan'],
    ];
    return $data;
}

function headAjb() {
    $array = [
        '{no_akta}',
        '{hari}',
        '{tanggal_akta}',
        '{tanggal_akta_terbilang}',
        '{bulan}',
        '{tahun}',
        '{tahun_terbilang}',
        '{gelar_penjual}',
        '{nama_penjual}',
        '{kota_lahir_penjual}',
        '{tgl_lhr_penjual}',
        '{tgl_lhr_penjual_terbilang}',
        '{pekerjaan_penjual}',
        '{alamat_penjual}',
        '{rt_penjual}',
        '{kelurahan_penjual}',
        '{nama_kelurahan_penjual}',
        '{kecamatan_penjual}',
        '{kota_penjual}',
        '{nama_kota_penjual}',
        '{no_identitas_penjual}',
        '{kedudukan_keluarga_penjual}',
        '{gelar_persetujuan}',
        '{nama_persetujuan}',
        '{kota_lahir_persetujuan}',
        '{tgl_lhr_persetujuan}',
        '{tgl_lhr_persetujuan_terbilang}',
        '{pekerjaan_persetujuan}',
        '{alamat_persetujuan}',
        '{rt_persetujuan}',
        '{kelurahan_persetujuan}',
        '{nama_kelurahan_persetujuan}',
        '{kecamatan_persetujuan}',
        '{kota_persetujuan}',
        '{nama_kota_persetujuan}',
        '{no_identitas_persetujuan}',
        '{gelar_pembeli}',
        '{nama_pembeli}',
        '{kota_lahir_pembeli}',
        '{tgl_lhr_pembeli}',
        '{tgl_lhr_pembeli_terbilang}',
        '{pekerjaan_pembeli}',
        '{alamat_pembeli}',
        '{rt_pembeli}',
        '{kelurahan_pembeli}',
        '{nama_kelurahan_pembeli}',
        '{kecamatan_pembeli}',
        '{kota_pembeli}',
        '{nama_kota_pembeli}',
        '{no_identitas_pembeli}',
        '{jenis_kepemilikan}',
        '{nomor_kepemilikan}',
        '{nomor_surat_ukur}',
        '{tanggal_surat_ukur}',
        '{tanggal_surat_ukur_terbilang}',
        '{luas_tanah}',
        '{luas_tanah_terbilang}',
        '{nomor_nib}',
        '{nomor_spptpbb}',
        '{kecamatan_tanah}',
        '{nama_kelurahan_tanah}',
        '{luas_bangunan}',
        '{luas_bangunan_terbilang}',
        '{alamat_bangunan}',
        '{rt_bangunan}',
        '{kelurahan_bangunan}',
        '{nama_kelurahan_bangunan}',
        '{kecamatan_bangunan}',
        '{kota_bangunan}',
        '{nama_kota_bangunan}',
        '{nilai_beli}',
        '{nilai_beli_terbilang}'
    ];
    return $array;
}

function footAjb($row) {
    $data = [
        $row['nomor_akta_ajb'],
        format_hari($row['tanggal_akta_ajb']),
        pecah_tanggal($row['tanggal_akta_ajb']),
        tanggal_terbilang($row['tanggal_akta_ajb']),
        pecah_bulan($row['tanggal_akta_ajb']),
        pecah_tahun($row['tanggal_akta_ajb']),
        tahun_terbilang($row['tanggal_akta_ajb']),
        $row['gelar_penjual'],
        $row['nama_penjual'],
        $row['kota_lahir_penjual'],
        reverseDate($row['tanggal_lahir_penjual']),
        format_tanggal($row['tanggal_lahir_penjual']),
        $row['pekerjaan_penjual'],
        $row['alamat_penjual'],
        $row['rt_penjual'],
        $row['kelurahan_penjual'],
        $row['nama_kelurahan_penjual'],
        $row['kecamatan_penjual'],
        $row['kota_penjual'],
        $row['nama_kota_penjual'],
        $row['no_identitas_penjual'],
        $row['kedudukan_keluarga_penjual'],
        $row['gelar_persetujuan'],
        $row['nama_persetujuan'],
        $row['kota_lahir_persetujuan'],
        reverseDate($row['tanggal_lahir_persetujuan']),
        format_tanggal($row['tanggal_lahir_persetujuan']),
        $row['pekerjaan_persetujuan'],
        $row['alamat_persetujuan'],
        $row['rt_persetujuan'],
        $row['kelurahan_persetujuan'],
        $row['nama_kelurahan_persetujuan'],
        $row['kecamatan_persetujuan'],
        $row['kota_persetujuan'],
        $row['nama_kota_persetujuan'],
        $row['no_identitas_persetujuan'],
        $row['gelar_pembeli'],
        $row['nama_pembeli'],
        $row['kota_lahir_pembeli'],
        reverseDate($row['tanggal_lahir_pembeli']),
        format_tanggal($row['tanggal_lahir_pembeli']),
        $row['pekerjaan_pembeli'],
        $row['alamat_pembeli'],
        $row['rt_pembeli'],
        $row['kelurahan_pembeli'],
        $row['nama_kelurahan_pembeli'],
        $row['kecamatan_pembeli'],
        $row['kota_pembeli'],
        $row['nama_kota_pembeli'],
        $row['no_identitas_pembeli'],
        $row['jenis_kepemilikan'],
        $row['nomor_kepemilikan'],
        $row['nomor_surat_ukur'],
        reverseDate($row['tanggal_surat_ukur']),
        format_tanggal($row['tanggal_surat_ukur']),
        $row['luas_tanah'],
        terbilang($row['luas_tanah']),
        $row['nomor_nib'],
        $row['nomor_spptpbb'],
        $row['kecamatan_tanah'],
        $row['nama_kelurahan_tanah'],
        $row['luas_bangunan'],
        terbilang($row['luas_bangunan']),
        $row['alamat_bangunan'],
        $row['rt_bangunan'],
        $row['kelurahan_bangunan'],
        $row['nama_kelurahan_bangunan'],
        $row['kecamatan_bangunan'],
        $row['kota_bangunan'],
        $row['nama_kota_bangunan'],
        rupiah($row['nilai_beli']),
        rupiah_terbilang($row['nilai_beli'])
    ];
    return $data;
}

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}

function rupiah_terbilang($uang) {
    $get = terbilang($uang);
    return $get.' Rupiah';
}

function pecah_tanggal($tanggal) {
    $explode = explode('-',$tanggal);
    return $explode[2];
}

function tanggal_terbilang($tanggal) {
    $get = pecah_tanggal($tanggal);
    return terbilang($get);
}

function reverseDate($tanggal) {
    $explode = explode('-',$tanggal);
    return $explode[2].'-'.$explode[1].'-'.$explode[0];
}

function pecah_bulan($tanggal) {
    $explode = explode('-',$tanggal);
    switch ($explode[1]) {
        case '01':
        $bulan = 'Januari';
            break;

        case '02':
        $bulan = 'Februari';
            break;

        case '03':
        $bulan = 'Maret';
            break;

        case '04':
        $bulan = 'April';
            break;

        case '05':
        $bulan = 'Mei';
            break;

        case '06':
        $bulan = 'Juni';
            break;

        case '07':
        $bulan = 'Juli';
            break;

        case '08':
        $bulan = 'Agustus';
            break;

        case '09':
        $bulan = 'September';
            break;
        
        case '10':
        $bulan = 'Oktober';
            break;

        case '11':
        $bulan = 'November';
            break;

        case '12':
        $bulan = 'Desember';
            break;

        default:
            $bulan = 'Not Definied';
            break;
    }
    return $bulan;
}

function pecah_tahun($tanggal) {
    $explode = explode('-',$tanggal);
    return $explode[0];
}

function tahun_terbilang($tanggal) {
    $get = pecah_tahun($tanggal);
    return terbilang($get);
}

function format_tanggal($tanggal) {
    $explode = explode('-',$tanggal);
    $tanggal = terbilang($explode[2]);
    switch ($explode[1]) {
        case '01':
        $bulan = 'Januari';
            break;

        case '02':
        $bulan = 'Februari';
            break;

        case '03':
        $bulan = 'Maret';
            break;

        case '04':
        $bulan = 'April';
            break;

        case '05':
        $bulan = 'Mei';
            break;

        case '06':
        $bulan = 'Juni';
            break;

        case '07':
        $bulan = 'Juli';
            break;

        case '08':
        $bulan = 'Agustus';
            break;

        case '09':
        $bulan = 'September';
            break;
        
        case '10':
        $bulan = 'Oktober';
            break;

        case '11':
        $bulan = 'November';
            break;

        case '12':
        $bulan = 'Desember';
            break;

        default:
            $bulan = 'Not Definied';
            break;
    }
$tahun = terbilang($explode[0]);

return $tanggal.' '.$bulan.' '.$tahun;
}

function format_waktu($jam) {
    $explode = explode(':',$jam);
    $jam = $explode[0];
    $menit = $explode[1];
    $wilayah = 'WITA';
    return $jam.'.'.$menit.' '.$wilayah;
}

function waktu_terbilang($jam) {
    $explode = explode(':',$jam);
    $jam = terbilang($explode[0]);
    $menit = terbilang($explode[1]);
    $wilayah = 'Waktu Indonesia Tengah';
    return $jam.'.'.$menit.' '.$wilayah;
}

function terbilang($x, $style=3) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}

function jumlahHari($from, $to) {
    $first_date = strtotime($from);
    $second_date = strtotime($to);
    $offset = $second_date-$first_date; 
    return floor($offset/60/60/24);
}

function getJenisFidusia($tipe) {
    $nama_tipe = '';
    switch ($tipe) {
        case '1':
            $nama_tipe = 'Fidusia A/N Sendiri';
        break;
        case '2':
            $nama_tipe = 'Fidusia A/N Istri/Suami';
        break;
        case '4':
            $nama_tipe = 'Fidusia A/N Orang Lain';
        break;
        case '5':
            $nama_tipe = 'Fidusia A/N PT/CV';
        break;
        
        default:
            $nama_tipe = '-';
            break;
    }
    return $nama_tipe;
}