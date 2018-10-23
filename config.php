<?php

$lang = 'el';

if (isset($_GET['language']) && $_GET['language'] != "") {
    $lang = $_GET['language'];
    setcookie('lang', $lang, time() + (3600 * 24 * 30), '/');
}else if ($_GET['language'] == ""){

    if( $_SERVER['REQUEST_URI'] === '/en/') {
        $lang ='en';
    } else {
        $lang ='el';
    }
    setcookie('lang', $lang, time() + (3600 * 24 * 30), '/');
} else {
    if (isset($_COOKIE['lang'])) {
        $lang = $_COOKIE['lang'];
    } else {
        setcookie('lang', $lang, time() + (3600 * 24 * 30), '/');
    }
}


include ('languages/generic.php');
include ('languages/'.$lang.'.php');
