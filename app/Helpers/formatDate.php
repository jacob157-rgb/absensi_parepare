<?php

use Carbon\Carbon;

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        return Carbon::parse($date)->translatedFormat('d F Y');
    }
}
if (!function_exists('formatTanggalLengkap')) {
    function formatTanggalLengkap($date)
    {
        return Carbon::parse($date)->translatedFormat('l, d F Y');
    }
}

if (!function_exists('formatTanggalLengkapWaktu')) {
    function formatTanggalLengkapWaktu($date)
    {
        return Carbon::parse($date)->translatedFormat('l, d F Y H:i:s');
    }
}

if (!function_exists('formatBulan')) {
    function formatBulan($date)
    {
        return Carbon::parse($date)->translatedFormat('F');
    }
}

if (!function_exists('formatTahun')) {
    function formatTahun($date)
    {
        return Carbon::parse($date)->translatedFormat('Y');
    }
}

if (!function_exists('formatTanggal')) {
    function formatTanggal($date)
    {
        return Carbon::parse($date)->translatedFormat('d');
    }
}

if (!function_exists('formatHari')) {
    function formatHari($date)
    {
        return Carbon::parse($date)->translatedFormat('l');
    }
}

if (!function_exists('formatJamMenit')) {
    function formatJamMenit($date)
    {
        return Carbon::parse($date)->translatedFormat('H:i');
    }
}
