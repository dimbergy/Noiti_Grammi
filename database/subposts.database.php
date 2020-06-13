<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 03/11/2018
 * Time: 21:35
 */

class Subposts extends Dbh
{

    public function getAllSubposts($postID, $langID) {

        $subposts = array();

        $sql = "SELECT * FROM subposts INNER JOIN subposts2languages ON subposts.id = subposts2languages.id_subpost INNER JOIN posts ON posts.id = subposts.id_post LEFT JOIN media_files ON subposts.id = media_files.id_subpost WHERE posts.id=".$postID." AND subposts2languages.id_lang=".$langID." AND subposts.active=1 ORDER BY subposts.subpost_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $subposts[] = $row;

            }

            return $subposts;

        }

    }


    public function getProductionsSubposts($langID) {

        $productionsSubsections = array();

        $sql = "SELECT * FROM subposts INNER JOIN subposts2languages ON subposts.id = subposts2languages.id_subpost INNER JOIN posts ON posts.id = subposts.id_post LEFT JOIN media_files ON subposts.id = media_files.id_subpost WHERE posts.id=2 AND subposts2languages.id_lang=".$langID." AND subposts.active=1 ORDER BY subposts.subpost_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsSubsections[] = $row;

            }

            return $productionsSubsections;

        }

    }


    public function getAboutSubposts($langID) {

        $aboutSubsections = array();

        $sql = "SELECT * FROM subposts INNER JOIN subposts2languages ON subposts.id = subposts2languages.id_subpost INNER JOIN posts ON posts.id = subposts.id_post LEFT JOIN media_files ON subposts.id = media_files.id_subpost WHERE posts.id=3 AND subposts2languages.id_lang=".$langID." AND subposts.active=1 ORDER BY subposts.subpost_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $aboutSubsections[] = $row;

            }

            return $aboutSubsections;

        }

    }

}


$subposts = new Subposts();