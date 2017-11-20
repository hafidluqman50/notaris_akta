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

if (!function_exists('headLetter'))
{
function headLetter() {
		$data = array('{nomor}', 
						'{nama}',
						'{memo}', 
						'{tanggal}', 
						'{nominal}', 
						'{terbilang}',
                        '{nama_item}', 
						'{total_item}', 
						'{terbilang_item}');
		return $data;
    }
}

if (!function_exists('tailLetter'))
{
function tailLetter($row) {

		$data = array($row['no_invoice'], 
						$row['pembayar'],
						$row['ket'], 
						humanDate($row['tanggal']), 
						number_format($row['nominal']), 
						terbilang($row['nominal']).' Rupiah.',
                        $row['nama_item'],
						$row['jumlah'],
						terbilang($row['jumlah'])
						);
		return $data;
    }
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