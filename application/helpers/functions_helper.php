<?php

function generate_csrf()
{
    $ci = &get_instance();
    $return['token_name'] = $ci->security->get_csrf_token_name();
    $return['hash'] = $ci->security->get_csrf_hash();
    return $return; 
}

function generateRandomString($_length=null) {
    if(@$_length && $_length>5){
        $length = $_length;
    } else{
        $length = 8;
    }
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function day_to_hari($day){
    $return = '';
    switch ($day) {
        case "Sun":
            $return = 'Minggu';
            break;
        case "Mon":
            $return = 'Senin';
            break;
        case "Tue":
            $return = 'Selasa';
            break;
        case "Wed":
            $return = 'Rabu';
            break;
        case "Thu":
            $return = 'Kamis';
            break;
        case "Fri":
            $return = 'Jumat';
            break;
        case "Sat":
            $return = 'Sabtu';
            break;
        default:
            $return = '';
    }
    return $return;
}


function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return $hex;
}

function hexToStr($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}


function tanggal_format($date=null){
    $result = '-';
    if(@$date){
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
    }
    return $result;
}

function rp_format($angka){
	$hasil_rupiah = number_format($angka,0,',','.');
	return $hasil_rupiah;

}

function nama_bulan($angka){
    $bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
    return $bulan[$angka-1];
}