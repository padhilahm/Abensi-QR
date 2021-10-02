<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      
    if ( ! function_exists('tanggal'))
    {
        function tanggal($tanggal)
        {
            $array_tanggal = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );

        $bulan = $array_tanggal[date('m', strtotime($tanggal))];
        $tahun = date('Y', strtotime($tanggal));
        $tanggal_s = ltrim(date('d', strtotime($tanggal)), '0');

        return $tanggal_s.' '.$bulan.' '.$tahun;
        }
    }
      
    