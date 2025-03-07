<?php

if (!function_exists('load_assets')) {
    function load_assets() :string {
        $assets = require dirname(__DIR__) . '/config/assets.php';
        $string = '';

        foreach ($assets as $a) {
            if ($a['type'] === 'css') {
                $integrity = empty($a['integrity']) ? '' : 'integrity="' . $a['integrity'] . '"';
                $crossorigin = empty($a['crossorigin']) ? '' : 'crossorigin="' . $a['crossorigin'] . '"';
                $string .= '<link rel="stylesheet" href="' . $a['url'] . '" ' . $integrity . ' ' . $crossorigin . ' />';
            }

            if ($a['type'] === 'js') {
                $integrity = empty($a['integrity']) ? '' : 'integrity="' . $a['integrity'] . '"';
                $crossorigin = empty($a['crossorigin']) ? '' : 'crossorigin="' . $a['crossorigin'] . '"';
                $string .= '<script src="' . $a['url'] . '" ' . $integrity . ' ' . $crossorigin . '></script>';
            }
        }

        return $string;
    }
}