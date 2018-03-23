<?php

if(!isset($_SESSION['admin_id']) && empty($_SESSION['admin_id']))
{
	header("location:backeyes");
}

define('TUBEIMG', '../upload/eyetube_storage/');
define('TUBEVID', '../upload/eyetube_storage/');
define('TUBESTATIC', ($_SERVER['SERVER_NAME'] == 'localhost') ? $base_url . '/' . str_replace('../', '', TUBEIMG) . '/ori_' : 'http://static.eyesoccer.id/v1/cache/images/');

function file_name($file = '')
{
    if ($file) {
        $str = seo_title($_FILES[$file]['name']);
        $split = explode("-", $str, -1);
        $sfile = implode("-", $split);
        $ext = substr($str, strrpos($str, '-') + 1);
        $filename = date('dmY') . rand(1000, 9999) . '-' . $sfile . "." . $ext;

        return $filename;
    }
}

function seo_title($text)
{
    // replace non letter or digits by -
    $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

    // trim
    $text = trim($text, '-');

    // transliterate
    //$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // lowercase
    $text = strtolower($text);

    // remove unwanted characters
    $text = preg_replace('/[^-\w]+/', '', $text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

?>