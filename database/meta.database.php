<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 03/11/2018
 * Time: 22:06
 */

class Meta extends Dbh
{

    public function getMeta($pageID, $langID) {

        $metas = array();

        $sql = "SELECT * FROM meta WHERE id_page=".$pageID." AND id_lang=".$langID;
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $metas[] = $row;

            }

            return $metas;

        }

    }

}


$meta = new Meta();