<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 03/11/2018
 * Time: 22:20
 */

class Copyrights extends Dbh
{

    public function getCopyrights($langID, $postID, $mediaID) {

        $copyrights = array();

        $sql = "SELECT * FROM copyrights INNER JOIN copyrights2pages ON copyrights.id = copyrights2pages.id_copyright WHERE id_lang=".$langID." AND id_post=".$postID." AND id_media=".$mediaID." ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $copyrights[] = $row;

            }

            return $copyrights;

        }

    }

}

$copyrights = new Copyrights();