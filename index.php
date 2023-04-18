<?php 
include("database.php");
include("session.php");
include("controller.php");

?>
<html>
    <head>
    <link rel="stylesheet" href="style.css">

    </head>
    <?php include("nav_view.php"); ?>

    <?php
    if($_GET['action'] == 'create'){
        include("create_user.html");
    }
    if($_GET['action'] == 'login'){
        include('login.html');
    }
    if($_GET['action'] == 'logout'){
        $_SESSION['isVerified'] = -1;
        echo "<script>location.href='index.php';</script>";

    }
    if($_GET['action'] == 'create_item'){
        include('create_item.html');
    }else{
        if(!isset($_SESSION['isVerified']) || $_SESSION['isVerified'] != 1){
            
        }else{
            $users = read_data();
            include('read.php'); 
        }

    }
    ?>   
</html>
