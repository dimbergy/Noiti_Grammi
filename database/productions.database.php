<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 01/11/2018
 * Time: 08:12
 */


class Productions extends Dbh
{

    public function getAllProductions($lang) {

        $productions = array();

        $sql = "SELECT * FROM posts INNER JOIN posts2languages ON posts.id = posts2languages.id_post WHERE posts.id_page=2 AND posts2languages.id_lang=".$lang." AND posts.active=1 ORDER BY posts.tabindex DESC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productions[] = $row;

            endwhile;

            return $productions;

        endif;

    }


    public function getNavigation($lang) {

        $navigation = array();

        $sql = "SELECT p.html_id, pl.navigation  FROM posts p INNER JOIN posts2languages pl ON p.id = pl.id_post WHERE p.id_page=1 AND pl.id_lang=".$lang." AND p.active=1 ORDER BY p.tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while($row = $result->fetch_assoc()) {
                $navigation[] = $row;
            }
            return $navigation;
        }

    }

}


$productions = new Productions();