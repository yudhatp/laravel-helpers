<?php

namespace Yudhatp\Helpers;

class Helpers
{
    public static function indonesianMonthName($date) {
        $date = date_create($date);
        $month = date_format($date,"n");
        $day = date_format($date,"d");
        $year = date_format($date,"Y");
        $name = array (1 =>   'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        return $day.' '.$name[$month].' '.$year;
    }

    public static function indonesianShortMonthName($date) {
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
			$temp = $this->terbilang($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = $this->terbilang($nilai/10)." Puluh". $this->terbilang($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . $this->terbilang($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->terbilang($nilai/100) . " Ratus" . $this->terbilang($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . $this->terbilang($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->terbilang($nilai/1000) . " Ribu" . $this->terbilang($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->terbilang($nilai/1000000) . " Juta" . $this->terbilang($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->terbilang($nilai/1000000000) . " Milyar" . $this->terbilang(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->terbilang($nilai/1000000000000) . " Trilyun" . $this->terbilang(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
}
