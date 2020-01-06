<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 18/11/2018
 * Time: 10:18
 */


if(isset($_POST['loginSubmit']) && !empty($_POST['email']) && !empty($_POST['password'])):


    if($_POST['email'] === 'olga.pozeli@gmail.com' && $_POST['password'] === 'olga6544242@!'):


        session_start();
        $_SESSION['success'] = TRUE;

    else:

        session_unset();
        session_destroy();

    endif;



endif;