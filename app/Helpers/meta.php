<?php

if (!function_exists('meta')) {
    function metaData()
    {
        return session('meta_data', []);
    }
}
