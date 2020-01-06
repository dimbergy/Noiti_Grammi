<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 22/06/2019
 * Time: 21:15
 */

include ('../database/dbh.database.php');
include ('../database/contacts.database.php');


if(isset($_POST['contactId']) && !empty($_POST['contactId'])) {


    $tmp = $_POST['contactId'];
    $id = (int)$tmp;
    $result = $contacts->deleteContact($id);

    if($result == 1) {
        $response['id'] = $id;
        $response['message'] = "Η εγγραφή διαγράφηκε με επιτυχία.";
        $response['class'] = 'alert-success';
    } else {
        $response['message'] = "Η διαγραφή της εγγραφής απέτυχε.";
        $response['class'] = 'alert-danger';
    }
    
}

echo json_encode($response);

