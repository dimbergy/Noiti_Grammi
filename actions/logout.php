<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 18/11/2018
 * Time: 10:18
 */

if(isset($_POST['logoutSubmit'])):

    session_start();
    session_unset();
    session_destroy();


else:

    session_start();

endif;

?>