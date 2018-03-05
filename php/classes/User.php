<?php
/**
 * This class is for manageing all things related to the user
 *
 * @author Alexandru-Bogdan IATAN
 */
class User {
    
    function addUser($arr){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        extract($arr);
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $sql = "INSERT INTO `users` (`user_name`, `user_pass`, `user_email`, `user_type`, `user_date`)  VALUES ('$user_name', '$user_pass', '$user_email', '$user_type', now())";
        //echo $sql;
        $db->query($sql) or die("Syntax error:\n".$sql);
        $db->close();
    } // adds a user
    function getUserById($id){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $sql = "SELECT * FROM `users` WHERE `user_id`='$id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        $row = $res->fetch_assoc();
        $res->free();
        $db->close();
        return  $row;
    } // selects a user from the data base
    function loginUser($arr){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        extract($arr);
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $sql = "SELECT * FROM `users` WHERE (`user_name`='$user_name' OR `user_email`='$user_name') AND `user_pass`='$user_pass'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        if($res->num_rows == 1){
            $row = $res->fetch_assoc();
            if(!isset($_SESSION['id'])){
                session_start();
            }
            $_SESSION['id'] = $row['user_id'];
            $res->free();
            $db->close();
            error_log('User: '.$row['user_name']." Logged in at ".$_SERVER['REQUEST_TIME_FLOAT']);
            echo "<script type='text/javascript'>window.location.href='".ROOT_NAME."';</script>";
        }else{
            $sql_nopass = "SELECT * FROM `users` WHERE `user_name`='$user_name' OR `user_email`='$user_name'";
            $res_nopass = $db->query($sql_nopass);
            if ($res_nopass->num_rows == 1) {
                error_log('Login attempt failed from '.$_SERVER['REMOTE_ADDR'].' at '.$_SERVER['REQUEST_TIME_FLOAT'].' Error: Password Failed!');
                return "pass_failed";
            }else{
                error_log('Login attempt failed from '.$_SERVER['REMOTE_ADDR'].' at '.$_SERVER['REQUEST_TIME_FLOAT'].' Error: Credentials Failed!');
                return "credentials_failed";
            }
            $res_nopass->free();
            $db->close();
        }
    }
    
    function getUsers(){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $data = array();
        $sql = "SELECT * FROM `users`";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        if($res->num_rows>0){
            while($row = $res->fetch_assoc()){
                array_push($data, $row);
            }
            $res->free();
            $db->close();
            return $data;
        }else{
            $res->free();
            $db->close();
            return "no_users";
        }
    }
    function getClients(){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $data = array();
        $sql = "SELECT * FROM `users` WHERE `user_type`='client'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        if($res->num_rows>0){
            while($row = $res->fetch_assoc()){
                array_push($data, $row);
            }
            $res->free();
            $db->close();
            return $data;
        }else{
            $res->free();
            $db->close();
            return "no_users";
        }
    }
    function getAdmins(){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $data = array();
        $sql = "SELECT * FROM `users` WHERE `user_type`='admin'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        if($res->num_rows>0){
            while($row = $res->fetch_assoc()){
                array_push($data, $row);
            }
            $res->free();
            $db->close();
            return $data;
        }else{
            $res->free();
            $db->close();
            return "no_users";
        }
    }
    function modifyUserById($id, $arr){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        extract($arr);
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $sql = "UPDATE `users` SET `user_email`='$user_email',`user_name`='$user_name',`user_pass`='$user_pass',`user_type`='$user_type' WHERE `user_id`='$id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        $res->free();
        $db->close();
    }
    function isAdmin($user_type){
        if($user_type == 'admin'){
            return true;
        }else{
            return false;
        }
    }
    function modifyUserEmailById($id, $user_email){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $sql = "UPDATE `users` SET `user_email`='$user_email' WHERE `user_id`='$id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        $res->free();
        $db->close();
    }
    function modifyUserPasswordById($id, $user_pass){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = md5($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $user_pass = sha1($user_pass);
        $sql = "UPDATE `users` SET `user_pass`='$user_pass' WHERE `user_id`='$id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        $res->free();
        $db->close();
    }
    function resetUserPasswordById($id){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $user_pass = generateRandomPassword();
        
        
        $user_pass_crypted = md5($user_pass);
        $user_pass_crypted = md5($user_pass_crypted);
        $user_pass_crypted = sha1($user_pass_crypted);
        $user_pass_crypted = md5($user_pass_crypted);
        $user_pass_crypted = md5($user_pass_crypted);
        $user_pass_crypted = sha1($user_pass_crypted);
        $user_pass_crypted = sha1($user_pass_crypted);
        $user_pass_crypted = sha1($user_pass_crypted);
        $sql = "UPDATE `users` SET `user_pass`='$user_pass_crypted' WHERE `user_id`='$id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        $res->free();
        $db->close();
        $user = $this->getUserById($id);
        $to = getReceiverForMail($user['user_email'], $user['user_name']);
        $subject = "Cerere de resetare a parolei";
        $message = "Bună ziua,\n"
                . "Ați solicitat o resetare a parolei.\n"
                . "Noua dumneavoastră parolă este:\n"
                . $user_pass
                ."\n\n\n O zi bună vă dorim!";
        sendMail($to, $subject, $message);
    }
    function modifyUserTypeById($id, $type){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        }
        $sql = "UPDATE `users` SET `user_type`='$type' WHERE `user_id`='$id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        $res->free();
        $db->close();
    }
    function deleteCreatedTables($id){
        require_once '/php/classes/Form.php';
        $Form = new Form($id);
        $Form->deleteFormTable();
    }
    function deleteUserById($id){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        } 
        $this->deleteCreatedTables($id);
        $sql = "DELETE FROM `users` WHERE `user_id`='$id'";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        $res->free();
        $db->close();
    }
    public function tryal($arr){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        } 
        $db->insert("testing_table",$arr);
        $db->close();
    }
    
    public function tryaget(){
        $db = new mysqli(HOST_NAME, USERNAME, PASSWORD, DATABASE_NAME);
        /* check connection */
        if ($db->connect_errno) {
            printf("Connect failed: %s\n", $db->connect_error);
            exit();
        } 
        $data = array();
        $sql = "SELECT * FROM `testing_table`";
        $res = $db->query($sql) or die("Syntax error:\n".$sql);
        if($res->num_rows>0){
            while($row = $res->fetch_assoc()){
                array_push($data, $row);
            }
            $res->free();
            $db->close();
            return $data;
        }else{
            $res->free();
            $db->close();
            return "no_testing";
        }
    }
}
