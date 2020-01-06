<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 03/11/2018
 * Time: 22:10
 */

class Links extends Dbh
{

    public function getLinks($langID) {

        $sql = "SELECT * FROM links INNER JOIN links2languages ON links.id = links2languages.id_link INNER JOIN media_files ON links.id_media_file = media_files.id WHERE id_lang=".$langID." ORDER BY links_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $links[] = $row;

            endwhile;

            return $links;

        endif;

    }

}


$links = new Links();