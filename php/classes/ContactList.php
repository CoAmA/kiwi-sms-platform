<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To 7change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author CoAmA
 */
class ContactList {
    public $user_id;
    public function __construct($user_id){
        $this->user_id = $user_id;
        $this->createContactListTable();
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
    public function createContactListTable(){
        $db = $this->getDb();
        $sql = "CREATE TABLE IF NOT EXISTS `contact_list_for_".$this->user_id."`(
                `contact_list_id` INT(11) NOT NULL AUTO_INCREMENT,
                `contact_list_name` VARCHAR(255) NOT NULL,
                `contact_list_date` TIMESTAMP NOT NULL,
                PRIMARY KEY (`contact_list_id`) 
        )Engine=InnoDB";
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    }
    function getContactLists(){
        $db = $this->getDb();
        $sql = "SELECT * FROM `contact_list_for_".$this->user_id."`";
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
    function getContactListById($contact_list_id){
        $db = $this->getDb();
        $sql = "SELECT * FROM `contact_list_for_".$this->user_id."` WHERE `contact_list_id` = '$contact_list_id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql."\n".$db->error);
        $row = $res->fetch_assoc();
        $res->free();
        $db->close();
        return $row;
    }
    function addContactList($contact_list_name){
        $db = $this->getDb();
        $sql = "INSERT INTO `contact_list_for_".$this->user_id."` (`contact_list_name`, `contact_list_date`)  VALUES ('$contact_list_name',  now())";
        //echo $sql;
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    } // adds a user
    function modifyContactListById($contact_list_id, $contact_list_name){
        $db = $this->getDb();
        $sql = "UPDATE `contact_list_for_".$this->user_id."` "
                . "SET `contact_list_name` = '$contact_list_name' "
                . "WHERE `contact_list_id` = '$contact_list_id'";
        //echo $sql;
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    } // adds a user
    function dropContactListTable(){
        $db = $this->getDb();
        $sql = "DROP TABLE `contact_list_for_".$this->user_id."`";
        $db->query($sql);
        $db->close();
    }
    function deleteContactListById($contact_list_id){
        $db = $this->getDb();
        $sql = "DELETE FROM `contact_list_for_".$this->user_id."`"
                . "WHERE `contact_list_id` = '$contact_list_id'";
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    }
}
