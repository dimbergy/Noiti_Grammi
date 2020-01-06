<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 31/10/2018
 * Time: 08:17
 */

class Contacts extends Dbh
{

    public function getAllContacts(){

        $sql = "SELECT * FROM contact ORDER BY date_sent DESC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

            if($numRows > 0):

                while($row = $result->fetch_assoc()):

                    $contact[] = $row;

                endwhile;

                    return $contact;

            endif;
    }

    public function deleteContact($contactID) {

        $sql = "DELETE FROM contact WHERE ID =".$contactID;
        $result = $this->connect()->query($sql);

        if($result):

            $response = 1;

        else:

            $response = 0;

        endif;

        return $response;
    }


    public function insertContactMessages($lname, $fname, $email, $country, $message){

        $sql = "INSERT INTO contact (lastname, firstname, email, country, message, date_sent) VALUES ('$lname', '$fname', '$email', '$country', '$message', now())";
        $result = $this->connect()->query($sql);

        if($result):
            $response = true;
        else:
            $response = false;
        endif;

        return $response;
    }


    public function getConn() {

        $conn = $this->connect();

        return $conn;

    }

}


$contacts = new Contacts();

