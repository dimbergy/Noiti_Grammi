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

}


$productions = new Productions();