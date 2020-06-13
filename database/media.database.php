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

        $productionsPhotos = array();

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=".$typeID." AND id_page=2 AND id_post=".$projectID." ORDER BY file_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsPhotos[] = $row;

            }

            return $productionsPhotos;

        }

    }


    public function getProductionsSmall() {

        $productionsSmall = array();

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=3 AND id_page=2";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsSmall[] = $row;

            }

            return $productionsSmall;

        }

    }


    public function getProductionsParallax($projectID) {

        $productionsParallax = array();

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=1 AND id_page=2 AND id_post=".$projectID." ORDER BY file_tabindex DESC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsParallax[] = $row;

            }

            return $productionsParallax;

        }

    }


    public function getHomeParallax() {

        $homeParallax = array();

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=1 AND id_page=1 AND id_post=1 ORDER BY file_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $homeParallax[] = $row;

            }

            return $homeParallax;

        }

    }


    public function getProductionsMasonry() {

        $productionsMasonry = array();

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=2 AND id_page=1 AND id_post=2 ORDER BY file_tabindex DESC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsMasonry[] = $row;

            }

            return $productionsMasonry;

        }

    }


    public function getProductionsVideos($projectID) {

        $productionsVideos = array();

        $sql = "SELECT * FROM media_files WHERE id_media=2 AND (id_type=5 OR id_type=6) AND id_page=2 AND id_post=".$projectID." ORDER BY file_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsVideos[] = $row;

            }

            return $productionsVideos;

        }

    }


    public function getModalPhotos($indexID) {

        $modals = array();

        $sql = "SELECT * FROM media_files WHERE id_media=1 AND id_type=8 AND id_page=1 AND id_post=1 AND file_tabindex=".$indexID." ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $modals[] = $row;

            }

            return $modals;

        }

    }


}


$media = new Media();