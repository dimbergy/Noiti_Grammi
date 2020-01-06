<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 01/11/2018
 * Time: 08:53
 */

class Pages extends Dbh
{

    public function getAllPages($lang) {

        $sql = "SELECT * FROM posts INNER JOIN posts2languages ON posts.id = posts2languages.id_post WHERE posts.id_page=1 AND posts2languages.id_lang=".$lang." AND posts.active=1 ORDER BY posts.tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $pages[] = $row;

            endwhile;

            return $pages;

        endif;

    }


    public function getIntroSection($indexID) {

        $sql = "SELECT * FROM posts INNER JOIN media_files ON posts.id = media_files.id_post WHERE posts.id=18 AND media_files.id_type=9 AND media_files.file_tabindex=".$indexID." ";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $introSection[] = $row;

            endwhile;

            return $introSection;

        endif;

    }


    public function getComingSoonSection($lang) {

        $sql = "SELECT * FROM posts INNER JOIN posts2languages ON posts.id = posts2languages.id_post WHERE posts.id_page=1 AND posts.id=1 AND posts2languages.id_lang=".$lang." AND posts.active=1 ORDER BY posts.tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $currentSection[] = $row;

            endwhile;

            return $currentSection;

        endif;

    }


    public function getProductionsSection($lang) {

        $sql = "SELECT * FROM posts INNER JOIN posts2languages ON posts.id = posts2languages.id_post WHERE posts.id_page=1 AND posts.id=2 AND posts2languages.id_lang=".$lang." AND posts.active=1";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $productionsSection[] = $row;

            endwhile;

            return $productionsSection;

        endif;

    }


    public function getAboutSection($lang) {

        $sql = "SELECT * FROM posts INNER JOIN posts2languages ON posts.id = posts2languages.id_post WHERE posts.id_page=1 AND posts.id=3 AND posts2languages.id_lang=".$lang." AND posts.active=1 ORDER BY posts.tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $aboutSection[] = $row;

            endwhile;

            return $aboutSection;

        endif;

    }


    public function getLinksSection($lang) {

        $sql = "SELECT * FROM posts INNER JOIN posts2languages ON posts.id = posts2languages.id_post WHERE posts.id_page=1 AND posts.id=4 AND posts2languages.id_lang=".$lang." AND posts.active=1 ORDER BY posts.tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $linksSection[] = $row;

            endwhile;

            return $linksSection;

        endif;

    }


    public function getContactSection($lang) {

        $sql = "SELECT * FROM posts INNER JOIN posts2languages ON posts.id = posts2languages.id_post WHERE posts.id_page=1 AND posts.id=5 AND posts2languages.id_lang=".$lang." AND posts.active=1 ORDER BY posts.tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0):

            while($row = $result->fetch_assoc()):

                $contactSection[] = $row;

            endwhile;

            return $contactSection;

        endif;

    }

}

$pages = new Pages();