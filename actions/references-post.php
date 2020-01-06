<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 03/02/2019
 * Time: 08:42
 */

include('../database/dbh.database.php');
include('../database/references.database.php');



if(isset($_POST['formId']) && !empty($_POST['formId']) && $_POST['formId'] == 1) {

    if (isset($_POST['addRefShowGr']) && !empty($_POST['addRefShowGr'])) {

        $showID = (int)$_POST['addRefShowGr'];


        if(isset($_POST['addRefTitleGr']) && !empty($_POST['addRefTitleGr'])) {

            $refTitleGr = $_POST['addRefTitleGr'];

        } else {
            $response['refTitle'] = 'Δεν έχετε ορίσει τίτλο αναφοράς.';
        }

        if(isset($_POST['addRefUrlGr']) && !empty($_POST['addRefUrlGr'])) {
            $refUrlGr = $_POST['addRefUrlGr'];


        } else {
            $response['refUrl'] = 'Δεν έχετε ορίσει σύνδεσμο αναφοράς.';
        }

        $refOrder = (int)$_POST['addRefOrderGr'];


        $response['result'] = $references->insertShowReferencesGr($showID, $refTitleGr, $refUrlGr, $refOrder);


    } else {

        $response['show'] = 'Δεν έχετε επιλέξει παράσταση.';
    }
}





if(isset($_POST['formId']) && !empty($_POST['formId']) && $_POST['formId'] == 2) {


    if (isset($_POST['addRefShowEn']) && !empty($_POST['addRefShowEn'])) {

        $showID = (int)$_POST['addRefShowEn'];


        if(isset($_POST['addRefTitleEn']) && !empty($_POST['addRefTitleEn'])) {

            $refTitleGr = $_POST['addRefTitleEn'];

        } else {
            $response['refTitle'] = 'Reference title is not defined.';
        }

        if(isset($_POST['addRefUrlEn']) && !empty($_POST['addRefUrlEn'])) {
            $refUrlGr = $_POST['addRefUrlEn'];

        } else {
            $response['refUrl'] = 'Reference URL is not defined.';
        }

        $refOrder = (int)$_POST['addRefOrderEn'];

        $response['result'] = $references->insertShowReferencesEn($showID, $refTitleGr, $refUrlGr, $refOrder);


    } else {

        $response['show'] = 'No show has been selected.';
    }

}

echo json_encode($response);


