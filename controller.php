<?php 
include("database.php");
include("session.php");
include("nav_view.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hidden_new'])) {
        $new_username = $_POST['username_new'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $res = checkIfUsernameExists($new_username);
        if($res == 1){
            echo "<br>Username already exists.";

        }else{
            createNewUser($new_username, $new_password);
            echo "New user created.";
            header('Location: index.php?action=login');
        }
    }
    if(isset($_POST['hidden_login'])){
        if (isset($_POST['username'], $_POST['password']) ) {
            $user = getUserByUsername($_POST['username']);
            if($user && password_verify($_POST['password'], $user['password'])){
                session_regenerate_id();
                $_SESSION['isVerified'] = 1;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $user['id'];
                header('Location: index.php');
            } else {
                echo "<div class='error'>Incorrect username and/or password!</div>";
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (!isset($_GET['action'])) {
        $accounts = getAccounts();
        include 'views/read.php';
    }

    if($_GET['action'] == 'create'){
        include("views/create_user.html");
    }
    if($_GET['action'] == 'login'){
        include('views/login.html');
    }
    if($_GET['action'] == 'logout'){
        $_SESSION['isVerified'] = -1;
        session_unset();
        echo "<script>location.href='index.php';</script>";

    }
    if($_GET['action'] == 'create_item'){
        if(!isset($_SESSION['isVerified']) || $_SESSION['isVerified'] != 1){
            header('Location: index.php?action=login');
        }
        include('views/create_item.html');
    }
}
?>   
