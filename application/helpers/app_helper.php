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
    //
}

function footSkmht($row) {
    //
}

function headApht() {
    //
}

function footApht($row) {
    //
}

function headAjb() {
    //
}

function footAjb($row) {
    //
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