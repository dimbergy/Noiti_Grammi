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

        $pagesCss = array();

        $sql = "SELECT * FROM posts WHERE posts.id_page=1 AND posts.active=1";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $pagesCss[] = $row;

            }

            return $pagesCss;

        }

    }


    public function getProductionsCss() {

        $productionsCss = array();

        $sql = "SELECT * FROM posts INNER JOIN media_files ON posts.id = media_files.id_post WHERE posts.id_page=2 AND media_files.id_type=1 AND posts.active=1";

        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsCss[] = $row;

            }

            return $productionsCss;

        }

    }

    public function getParallaxCss() {

        $parallaxCss = array();

        $sql = "SELECT * FROM posts INNER JOIN media_files ON posts.id = media_files.id_post WHERE posts.id_page=1 AND media_files.id_type=1 AND posts.active=1";

        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $parallaxCss[] = $row;

            }

            return $parallaxCss;

        }

    }

}


$css = new Css();