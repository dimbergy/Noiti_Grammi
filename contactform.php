<?php

include ('database/dbh.database.php');
include ('database/contacts.database.php');

$conn = $contacts->getConn();

if(isset($_POST['lname'], $_POST['fname'], $_POST['email'], $_POST['country'], $_POST['message'])) {


    if(isset($_POST['lname']) && !empty($_POST['lname'])) {
    $lname = $_POST['lname'];
    $lname = stripslashes($_POST['lname']);
    $lname = mysqli_real_escape_string($conn, $lname);

} else {
        $response['error'] = $tran['error_empty'];
    }

    if(isset($_POST['fname']) && !empty($_POST['fname'])) {
        $fname=$_POST['fname'];
        $fname=stripslashes($_POST['fname']);
        $fname=mysqli_real_escape_string($conn, $fname);
    } else {
        $response['error'] = $tran['error_empty'];
    }


    $email=$_POST['email'];
    $email=stripslashes($_POST['email']);
    $email=mysqli_real_escape_string($conn, $email);

    $country=$_POST['country'];
    $country=stripslashes($_POST['country']);
    $country=mysqli_real_escape_string($conn, $country);

    $message=$_POST['message'];
    $message=stripslashes($_POST['message']);
    $message=mysqli_real_escape_string($conn, $message);


    $insert = $contacts->insertContactMessages($lname, $fname, $email, $country, $message);

    echo $insert;


}

