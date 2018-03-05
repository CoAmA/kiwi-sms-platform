<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author CoAmA
 */
class Contact {
    public $user_id;
    public $contact_list_id;
    public function __construct($user_id, $contact_list_id){
        $this->user_id = $user_id;
        $this->contact_list_id = $contact_list_id;
        $this->createContactTable();
    }
    private function getDb(){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        return $db;
    }
    public function createContactTable(){
        $db = $this->getDb();
        $sql = "CREATE TABLE IF NOT EXISTS `contacts_for_".$this->user_id."_".$this->contact_list_id."`(
                `contact_id` INT(11) NOT NULL AUTO_INCREMENT,
                `contact_nr` VARCHAR(20) NOT NULL,
                `contact_date` TIMESTAMP NOT NULL,
                PRIMARY KEY (`contact_id`) 
        )Engine=InnoDB";
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    }
    function getContacts(){
        $db = $this->getDb();
        $sql = "SELECT * FROM `contacts_for_".$this->user_id."_".$this->contact_list_id."`";
        //echo $sql;
        $data = array();
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        //print_nice($res);
        while($row = $res->fetch_assoc()){
            array_push($data, $row);
        }
        $res->free();
        $db->close();
        return $data;
    }
    function getContactById($contact_id){
        $db = $this->getDb();
        $sql = "SELECT * FROM `contacts_for_".$this->user_id."_".$this->contact_list_id."` WHERE `contact_id` = '$contact_id'";
        //echo $sql;
        $res = $db->query($sql) or die("Syntax error:\n".$sql."\n".$db->error);
        $row = $res->fetch_assoc();
        $res->free();
        $db->close();
        return $row;
    }
    function addContact($contact_nr){
        $db = $this->getDb();
        $sql = "INSERT INTO `contacts_for_".$this->user_id."_".$this->contact_list_id."` (`contact_nr`, `contact_date`)  VALUES ('$contact_nr',  now())";
        //echo $sql;
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    } // adds a user
    function addMultipleContacts($contact_nrs){
        $db = $this->getDb();
        $contact_nrs = explode(",", $contact_nrs);
        for($i=0;$i<sizeof($contact_nrs);$i++){
            $sql = "INSERT INTO `contacts_for_".$this->user_id."_".$this->contact_list_id."` (`contact_nr`, `contact_date`)  VALUES ('$contact_nrs[$i]',  now())";
        //echo $sql;
            $db->query($sql) or die("Syntax error:\n".$sql);
        }
        
        $db->close();
    } // adds a user
    function modifyContactListById($contact_id, $contact_nr){
        $db = $this->getDb();
        $sql = "UPDATE `contacts_for_".$this->user_id."_".$this->contact_list_id."` "
                . "SET `contact_nr` = '$contact_nr' "
                . "WHERE `contact_id` = '$contact_id'";
        //echo $sql;
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    } // adds a user
    function dropContactListTable(){
        $db = $this->getDb();
        $sql = "DROP TABLE `contacts_for_".$this->user_id."_".$this->contact_list_id."`";
        $db->query($sql);
        $db->close();
    }
    function deleteContactListById($contact_id){
        $db = $this->getDb();
        $sql = "DELETE FROM `contacts_for_".$this->user_id."_".$this->contact_list_id."`"
                . "WHERE `contact_id` = '$contact_id'";
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    }
}
