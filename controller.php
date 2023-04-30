<?php 
include("database.php");
include("session.php");
include("nav_view.php");
$conn = connectdb();

$action = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['hidden_new'])) {
        $new_username = $_POST['username_new'];
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $res = checkIfUsernameExists($conn,$new_username);
        if($res == 1){
            echo "<br>Username already exists.";

        }else{
            createNewUser($conn,$new_username, $new_password);
            echo "New user created.";
            header('Location: index.php?action=login');
        }
    }
    if(isset($_POST['hidden_login'])){
        if (isset($_POST['username'], $_POST['password']) ) {
            $user = getUserByUsername($conn,$_POST['username']);
            if($user && password_verify($_POST['password'], $user['password'])){
                session_regenerate_id();
                $_SESSION['isVerified'] = 1;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $user['id'];
                header('Location: index.php');
            } else {
                header('Location: index.php?action=login');
            }
        }
    }
    if(isset($_POST['hidden_create'])){
        $Title = $_POST['Title'];
        $Pay = $_POST['Pay'];
        $Location = $_POST['Location'];
        $Response = $_POST['Response'];
        $Notes = $_POST['Notes'];
        add_item($conn,$Title,$Pay,$Location,$Response,$Notes);
    }
    if(isset($_POST['hidden_update'])){
        if($_POST['hidden_update'] == 'done'){
            $Title = $_POST['Title'];
            $Pay = $_POST['Pay'];
            $Location = $_POST['Location'];
            $Response = $_POST['Response'];
            $Notes = $_POST['Notes'];
            $id = $_POST['id'];
            update($conn,$Title,$Pay,$Location,$Response,$Notes,$id);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    if($action == 'create'){
        include("views/create_user.html");
    }
    if($action == 'login'){
        include('views/login.html');
    }
    if($action == 'logout'){
        $_SESSION['isVerified'] = -1;
        session_unset();
        echo "<script>location.href='index.php';</script>";

    }
    if($action == 'create_item'){
        if(!isset($_SESSION['isVerified']) || $_SESSION['isVerified'] != 1){
            header('Location: index.php?action=login');
        }
        include('views/create_item.html');
    }
    if($action == 'update'){
        $id = $_GET['id'];
        $data_id = readId($conn,$id);
        include('views/update.php');
       
    }
    if($action == 'delete'){
        $id = $_GET['id'];
        checkId($conn,$id);
        delete($conn,$id);
    }
    if($action == NULL){
        if(!isset($_SESSION['isVerified']) || $_SESSION['isVerified'] != 1){
            include('views/home.html');
        }else{
            $data = read($conn);
            include('views/read.php');
        } 
    }


}
?>   
