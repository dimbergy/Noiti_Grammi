<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 02/11/2018
 * Time: 23:17
 */

class Languages extends Dbh
{

    protected function getLanguages() {

        $languages = array();

        $sql = "SELECT * FROM languages";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $languages[] = $row;

            }

            return $languages;

        }

    }
}