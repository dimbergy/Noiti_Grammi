<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 03/11/2018
 * Time: 09:34
 */

class ViewLanguages extends Languages
{

    public function getGreek() {

        $languages = $this->getLanguages();

        $languagesGR = $languages[0]['id']."</br>";

        return $languagesGR;

    }


    public function getEnglish() {

        $languages = $this->getLanguages();

        $languagesEN = $languages[1]['id']."</br>";


        return $languagesEN;

    }

}