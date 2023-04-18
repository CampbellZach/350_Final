<?php 
include("database.php");
include("session.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if($_GET['action'] == 'create'){
        include("views/create_user.html");
    }
    if($_GET['action'] == 'login'){
        include('views/login.html');
    }
    if($_GET['action'] == 'logout'){
        $_SESSION['isVerified'] = -1;
        echo "<script>location.href='index.php';</script>";

    }
    if($_GET['action'] == 'create_item'){
        include('views/create_item.html');
    }
}else{
    if(!isset($_SESSION['isVerified']) || $_SESSION['isVerified'] != 1){
        
    }else{
        $users = read_data();
        include('views/read.php'); 
    }
}
?>   
