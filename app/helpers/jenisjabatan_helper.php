<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

if (!function_exists('get_nama_jenisjabatan')) {

    function get_nama_jenisjabatan($str) {
        if ($str == '2') {
            return "Struktural ";
        } else if ($str == '3') {
            return "Fungsional Khusus ";
        } else if ($str == '4') {
            return "Fungsional Umum ";
        }
    }

}

