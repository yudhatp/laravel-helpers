<?php

namespace Yudhatp\Helpers;

use Carbon\Carbon;
use DateTime;

class Helpers
{

	function isPrime($number) {
		if ($number <= 1) {
			return false;
		}
		for ($i = 2; $i <= sqrt($number); $i++) {
			if ($number % $i == 0) {
				return false;
			}
		}
		return true;
	}

	function isPalindrome($str) {
		$str = preg_replace("/[^a-zA-Z0-9]/", "", strtolower($str));
		$reverse_str = strrev($str);
		
		if ($str == $reverse_str) {
			return true;
		} else {
			return false;
		}
	}

	public static function randomHexColor(){
		return '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
	}
	
	public static function filenameWithTimestamp($name, $extention){
		$timestamp = time();
        return $timestamp. "_" . $name . ".".$extention;
	}

	public static function indonesianMonthName($date) {
        $tmp = date_format(new DateTime($date),"n");
        $month = array (1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        return $month[$tmp];
    }

	public static function indonesianDayName($date) {
        $tmp = date_format(new DateTime($date),"w");
		$tmp = ($tmp == 0) ? 7 : $tmp;
        $day = array (1 =>   'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
        return $day[$tmp];
    }

	public static function indonesianPoliceNumberformat($string)
	{
	  $string = strtoupper(trim($string));  
	
	  $pattern = '/^([A-Z]{1,3})(\s|-)*([1-9][0-9]{0,3})(\s|-)*([A-Z]{0,3}|[1-9][0-9]{1,2})$/i';
	  if (preg_match($pattern, $string)) {
		return trim(strtoupper(preg_replace($pattern, '$1 $3 $5', $string)));
	  }
	
	  // militer dan kepolisian
	  $pattern = '/^([0-9]{1,5})(\s|-)*([0-9]{2}|[IVX]{1,5})*/';
	  if (preg_match($pattern, $string)) {
		return trim(strtoupper(preg_replace($pattern, '$1-$3', $string)));
	  }
	  
	  return null;
	}

	public static function addDays($date, $day){
		return Carbon::createFromFormat('Y-m-d',$date)->addDays($day)->toDateString();
	}

	public static function calcIDFormatDecimal($number){
        $temp = str_replace('.','-',$number);
        $temp = str_replace(',','.',$temp);
		$temp = str_replace('-','',$temp);
        return $temp;
    }

	public static function indonesianFormatDecimal($number){
        $temp = str_replace('.','-',$number);
        $temp = str_replace(',','.',$temp);
		$temp = str_replace('-',',',$temp);
        return $temp;
    }

	public static function generatePassword($char)
    {
        $tmp = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  		return substr(str_shuffle($tmp), 0, $char);
    }

	public static function isWeekend($date){
		$day = date('D', strtotime($date));
        if($day == "Sat" || $day == "Sun"){
            return true;
        }else{
			return false;
		}
	}

	public static function getAgeIndonesian($birthdate){
		$tmp     	= new DateTime($birthdate);
        $curdate   	= new DateTime();
        $diff       = $tmp->diff($curdate);
        $year       = $diff->y;
        $month      = $diff->m;
        $day        = $diff->d;
		return $year." Tahun, ".$month." Bulan, ".$day." Hari";
	}
    public static function indonesianDate($date) {
        $date = date_create($date);
        $month = date_format($date,"n");
        $day = date_format($date,"d");
        $year = date_format($date,"Y");
        $name = array (1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        return $day.' '.$name[$month].' '.$year;
    }

    public static function indonesianShortDate($date) {
        $date = date_create($date);
        $month = date_format($date,"n");
        $day = date_format($date,"d");
        $year = date_format($date,"y");
        $name = array (1 =>   'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Aug','Sep','Okt','Nov','Des');
        return $day.' '.$name[$month].' '.$year;
    }

    public static function terbilang($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = static::terbilang($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = static::terbilang($nilai/10)." Puluh". static::terbilang($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . static::terbilang($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = static::terbilang($nilai/100) . " Ratus" . static::terbilang($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . static::terbilang($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = static::terbilang($nilai/1000) . " Ribu" . static::terbilang($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = static::terbilang($nilai/1000000) . " Juta" . static::terbilang($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = static::terbilang($nilai/1000000000) . " Milyar" . static::terbilang(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = static::terbilang($nilai/1000000000000) . " Trilyun" . static::terbilang(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
}
