<?php

if (!function_exists('redirect_if_not_administrator')) {
    function redirect_if_not_administrator() :void {
        if (empty($_SESSION['user'])) {
            redirect(base_url('admin/login'));
        }
    }
}