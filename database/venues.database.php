<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 04/11/2018
 * Time: 04:14
 */

class Venues extends Dbh
{
    public function getVenues($langID, $postID) {

        $sql = "SELECT * FROM venues INNER JOIN venues2languages ON venues.id = venues2languages.id_venue INNER JOIN venues2posts ON venues.id=venues2posts.id_venue WHERE venues2posts.id_lang=".$langID." AND venues2languages.id_lang=".$langID." AND venues2posts.id_post=".$postID." ORDER BY event_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $venues[] = $row;

            endwhile;

            return $venues;

        endif;

    }

}

$venues = new Venues();