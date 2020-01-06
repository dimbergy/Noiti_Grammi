<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 11/11/2018
 * Time: 08:59
 */

class Css extends Dbh
{

    public function getPagesCss() {

        $sql = "SELECT * FROM posts WHERE posts.id_page=1 AND posts.active=1";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $pagesCss[] = $row;

            endwhile;

            return $pagesCss;

        endif;

    }


    public function getProductionsCss() {

        $sql = "SELECT * FROM posts INNER JOIN media_files ON posts.id = media_files.id_post WHERE posts.id_page=2 AND media_files.id_type=1 AND posts.active=1";

        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productionsCss[] = $row;

            endwhile;

            return $productionsCss;

        endif;

    }

    public function getParallaxCss() {

        $sql = "SELECT * FROM posts INNER JOIN media_files ON posts.id = media_files.id_post WHERE posts.id_page=1 AND media_files.id_type=1 AND posts.active=1";

        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $parallaxCss[] = $row;

            endwhile;

            return $parallaxCss;

        endif;

    }

}


$css = new Css();