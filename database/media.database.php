<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 03/11/2018
 * Time: 20:16
 */

class Media extends Dbh
{

    public function getProductionsPhotos($projectID, $typeID) {

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=".$typeID." AND id_page=2 AND id_post=".$projectID." ORDER BY file_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productionsPhotos[] = $row;

            endwhile;

            return $productionsPhotos;

        endif;

    }


    public function getProductionsSmall() {

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=3 AND id_page=2";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productionsSmall[] = $row;

            endwhile;

            return $productionsSmall;

        endif;

    }


    public function getProductionsParallax($projectID) {

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=1 AND id_page=2 AND id_post=".$projectID." ORDER BY file_tabindex DESC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productionsParallax[] = $row;

            endwhile;

            return $productionsParallax;

        endif;

    }


    public function getHomeParallax() {

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=1 AND id_page=1 AND id_post=1 ORDER BY file_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $homeParallax[] = $row;

            endwhile;

            return $homeParallax;

        endif;

    }


    public function getProductionsMasonry() {

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=2 AND id_page=1 AND id_post=2 ORDER BY file_tabindex DESC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productionsMasonry[] = $row;

            endwhile;

            return $productionsMasonry;

        endif;

    }


    public function getProductionsVideos($projectID) {

        $sql = "SELECT * FROM media_files WHERE id_media=2 AND (id_type=5 OR id_type=6) AND id_page=2 AND id_post=".$projectID." ORDER BY file_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productionsVideos[] = $row;

            endwhile;

            return $productionsVideos;

        endif;

    }


    public function getModalPhotos($indexID) {

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=8 AND id_page=1 AND id_post=1 AND file_tabindex=".$indexID." ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $modals[] = $row;

            endwhile;

            return $modals;

        endif;

    }




}


$media = new Media();