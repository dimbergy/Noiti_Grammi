<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 05/11/2018
 * Time: 00:15
 */

class Country extends Dbh
{

    public function getAllCountries() {

        $sql = "SELECT * FROM country";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $countries[] = $row;

            endwhile;

            return $countries;

        endif;

    }

}

$country = new Country();