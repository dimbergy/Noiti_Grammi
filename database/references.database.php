<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 04/11/2018
 * Time: 04:05
 */

class References extends Dbh
{

    public function getProductionsReferences($postID, $langID) {

        $productionsRef = array();

        $sql = "SELECT * FROM references2languages WHERE id_page=2 AND id_post=".$postID." AND id_lang=".$langID." ORDER BY ref_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $productionsRef[] = $row;

            }

            return $productionsRef;

        }

    }


    public function getAboutReferences($langID) {

        $pagesRef = array();

        $sql = "SELECT * FROM references2languages WHERE id_page=1 AND id_post=3 AND id_subpost=4 AND id_lang=".$langID." ORDER BY ref_tabindex ASC";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {

            while ($row = $result->fetch_assoc()) {

                $pagesRef[] = $row;

            }

            return $pagesRef;

        }

    }

    public function insertShowReferencesGr($showID, $refTitleGr, $refUrlGr, $refOrder) {

        $sql = "INSERT INTO references2languages (id, id_lang, ref_title, ref_url, ref_tabindex, id_page, id_post, id_subpost)
     VALUES (DEFAULT, 1, '$refTitleGr', '$refUrlGr', '$refOrder', 2, '$showID', NULL)";

        if($this->connect()->query($sql)) {
            $result = 'Η αναφορά προστέθηκε με επιτυχία';
        } else {
            $result = 'Η εισαγωγή της αναφοράς απέτυχε.';
        }

        return $result;
    }

    public function insertShowReferencesEn($showID, $refTitleEn, $refUrlEn, $refOrder) {

        $sql ="INSERT INTO references2languages (id, id_lang, ref_title, ref_url, ref_tabindex, id_page, id_post, id_subpost)
     VALUES (DEFAULT, 2, '$refTitleEn', '$refUrlEn', '$refOrder', 2, '$showID', NULL);";

        if($this->connect()->query($sql)) {
            $result = 'Reference has been successfully added.';
        } else {
            $result = 'Reference import failed.';
        }

        return $result;
    }

}


$references = new References();