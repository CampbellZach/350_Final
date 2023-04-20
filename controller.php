<?php 
include("database.php");
include("session.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $new_username = $_POST['new_username'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        
        if(checkIfUsernameExists($new_username)){
            echo "Username already exists.";
        } else {
            if(createNewUser($new_username, $new_password)){
                echo "New user created.";
                header('Location: index.php');
            }
        }
    }

    if (isset($_POST['username'], $_POST['password']) ) {
        $user = getUserByUsername($_POST['username']);
        if($user && password_verify($_POST['password'], $user['password'])){
            session_regenerate_id();
            $_SESSION['loggedin'] = 1;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $user['id'];
            echo $user['id'];
            //header('Location: index.php');
        } else {
            echo "<div class='error'>Incorrect username and/or password!</div>";
        }
    }
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
        //$users = read_data();
        include('views/read.php'); 
    }
}
?>   
