<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 04/11/2018
 * Time: 04:00
 */

class Parallax extends Dbh
{

    public function getParallax($langID) {

        $sql = "SELECT * FROM parallax WHERE id_lang=".$langID." ORDER BY parallax_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $parallax[] = $row;

            endwhile;

            return $parallax;

        endif;

    }

}

$parallax = new Parallax();