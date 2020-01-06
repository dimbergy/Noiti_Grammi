<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 31/10/2018
 * Time: 08:02
 */

class Dbh {

    private $server;
    private $user;
    private $password;
    private $database;

    protected function connect(){

        $this->server = "localhost";
        $this->user = "dimbergy";
        $this->password = "52QXI8pr";
        $this->database = "noitigrammi_db";

        $conn = new mysqli($this->server, $this->user, $this->password, $this->database);
        mysqli_set_charset($conn,"utf8");

        return $conn;
    }

}

