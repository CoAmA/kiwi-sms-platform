<?php
    session_start();
    define('PATH_ROOT', dirname(__DIR__));
    error_reporting(E_ALL & ~E_NOTICE);
    require_once 'vendor/autoload.php';
    include "php/config/config.php";
    include "php/functions.php";
    require_once 'php/classes/User.php';

    $page = "";
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }
    $id = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $User = new User();
    $user=array();
    if(isset($_SESSION['id'])){
        $user = $User->getUserById($_SESSION['id']);
    }
    
    /* In case we need to create a admin from code 
    $insert_array = array('user_name'=>'poker','user_pass'=>'gentlemens','user_email'=>'inscrieri@gentlemenspokerclub.ro','user_type'=>'client');
    //print_nice($insert_array);
    $User->addUser($insert_array);
    */
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Kiwi Website Management Platform </title>
        <link rel="shortcut icon" href="/img/favicon.png">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/admin.bootstrap.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/metisMenu.min.css" />
        <link rel="stylesheet" href="css/dropzone.css" />
        <link rel="stylesheet" href="css/main.css" />

        
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/metisMenu.min.js"></script>
        <script type="text/javascript" src="js/dropzone.js"></script>
		<script type="text/javascript" src="js/ckeditor/ckeditor.js"></script>
        <!--[if lt IE 9]>
            <script type="text/javascript" src="<?='//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.js'?>"></script>
            <script type="text/javascript" src="<?='//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'?>"></script>
        <![endif]-->
    </head>
    <body>
        
        <?php if(isset($_SESSION['id'])){ ?>
            <?php include "php/header.php"; ?>
            <?php
                if($page == ''){
                    //include "php/".($user['user_type']=='client'?'forms':'clients').".php";
                    include "php/contact_lists.php";
                }else if($page != 'add_contact_list' && 
                         $page != 'edit_contact_list' && 
                         $page != 'contact_lists' && 
                         $page != 'add_contact' && 
                         $page != 'edit_contact' && 
                         $page != 'contacts' && 
                         $page != 'send_massages_to_list' && 
                         $page != 'users' && 
                         $page != 'add_user'){
                    include "php/error404.php";
                }else{
                    include "php/".$page.".php";
                }
            ?> 
            <?php include "php/footer.php"; ?>
        <?php }else{
                include "php/login.php";
        } ?>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>