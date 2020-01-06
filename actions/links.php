<?php

if(isset($_POST['linkTitleGr']) && !empty($_POST['linkTitleGr'])) {

    $linkTitleGr = $_POST['linkTitleGr'];
    $response['msgTitleGr'] = $linkTitleGr;

} else {

    $response['msgTitleGr'] = 'Δεν έχετε εισαγάγει όνομα συνδέσμου για ελληνικά.';

}

if(isset($_POST['linkTitleEn']) && !empty($_POST['linkTitleEn'])) {

    $linkTitleEn = $_POST['linkTitleEn'];
    $response['msgTitleEn'] = $linkTitleEn;


} else {

    $response['msgTitleEn'] = 'Δεν έχετε εισαγάγει όνομα συνδέσμου για αγγλικά.';

}


if(isset($_POST['linkUrlGr']) && !empty($_POST['linkUrlGr'])) {

    $linkUrlGr = $_POST['linkUrlGr'];
    $response['msgUrlGr'] = $linkUrlGr;


} else {

    $response['msgUrlGr'] = 'Δεν έχετε εισαγάγει διεύθυνση συνδέσμου για ελληνικά.';

}

if(isset($_POST['linkUrlEn']) && !empty($_POST['linkUrlEn'])) {

    $linkUrlEn = $_POST['linkUrlEn'];
    $response['msgUrlEn'] = $linkUrlEn;


} else {

    $response['msgUrlEn'] = 'Δεν έχετε εισαγάγει διεύθυνση συνδέσμου για αγγλικά.';


}

if(isset($_POST['linkOrigin']) && !empty($_POST['linkOrigin'])) {

    $linkOrigin = $_POST['linkOrigin'];
    $response['msgOrigin'] = $linkOrigin;


} else {

    $response['msgOrigin'] = 'Δεν έχετε εισαγάγει έδρα συνδέσμου.';


}


if(isset($_POST['linkTitleGr']) && !empty($_POST['linkTitleGr']) && isset($_POST['linkTitleEn']) && !empty($_POST['linkTitleEn']) && isset($_POST['linkUrlGr']) && !empty($_POST['linkUrlGr']) && isset($_POST['linkUrlEn']) && !empty($_POST['linkUrlEn']) && isset($_POST['linkOrigin']) && !empty($_POST['linkOrigin'])) {


    if(isset($_FILES['linkImgUpload']) && !empty($_FILES['linkImgUpload'])) {

        $target_dir = "../img/portfolio/";
        $target_file = $target_dir . basename($_FILES["linkImgUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["linkImgUpload"]["tmp_name"]);
            if($check !== false) {
                $error = "Το αρχείο που μεταφορτώασατε είναι εικόνα της μορφής - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $error = "Το αρχείο που μεταφορτώασατε δεν είναι εικόνα.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            $error = "Η εικόνα που ανεβάσατε υπάρχει ήδη.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["linkImgUpload"]["size"] > 500000) {
            $error = "Η εικόνα που ανεβάσατε είναι πολύ μεγάλη.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $error = "Μόνο εικόνες της μορφής JPG, JPEG, PNG & GIF επιτρέπονται.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $response['msgFile'] = "Η μεταφόρτωση της εικόνας απέτυχε.".$error;
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["linkImgUpload"]["tmp_name"], $target_file)) {
                $response['msgFile'] = "Η εικόνα ". basename( $_FILES["linkImgUpload"]["name"]). " μεταφορτώθηκε με επιτυχία.";


                // TODO code for db INSERT


            } else {
                $response['msgFile'] = "Παρουσιάστηκε σφάλμα κατά τη διαδικασία μεταφόρτωσης της εικόνας.";
            }
        }


    } else {

        $response['msgFile'] = 'Δεν έχετε εισαγάγει αρχείο εικόνας.';
    }


} else {

    $response['fail'] = 'Δεν έχετε συμπληρώσει όλα τα απαραίτητα πεδία.';
}




echo json_encode($response);

