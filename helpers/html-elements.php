<?php

if (!function_exists('get_create_button')) {
    function get_create_button(string $url) :string {
        $html = "<a href=\"$url\" class=\"btn btn-primary\">
                     Neu anlegen
                 </a>";

        return $html;
    }
}

if (!function_exists('get_show_button')) {
    function get_show_button(string $url) :string {
        $html = "<a href=\"$url\" class=\"btn btn-primary\">
                     Anzeigen
                 </a>";

        return $html;
    }
}

if (!function_exists('get_edit_button')) {
    function get_edit_button(string $url) :string {
        $html = "<a href=\"$url\" class=\"btn btn-success\">
                     Bearbeiten
                 </a>";

        return $html;
    }
}

if (!function_exists('get_delete_button')) {
    function get_delete_button(string $url, int $id) :string {
        $html = "<a href=\"javascript:deleteElement($url, $id)\" class=\"btn btn-danger\">
                     Löschen
                 </a>";

        return $html;
    }
}