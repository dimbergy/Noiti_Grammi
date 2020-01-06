<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 31/10/2018
 * Time: 08:27
 */

class ViewContacts extends Contacts
{

    public function showAllContacts(){

       $datas = $this->getAllContacts();

       foreach ($datas as $data) {

           echo $data['ID']."<br />";
           echo $data['lastname']."<br />";
           echo $data['firstname']."<br />";
           echo $data['email']."<br />";
           echo $data['country']."<br />";
           echo $data['message']."<br />";
           echo $data['date_sent']."<br />";
       }

        return $datas;
    }
}


