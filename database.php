<?php
    $db_name = 'mysql:host=localhost;dbname=cs_350';
    $username = 'student';
    $password = 'CS350';

    try {
    $conn = new PDO($db_name, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
    }

    function add_user($username,$password){
        global $con;
        $stmt = $con->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

    function add_item(){
        //takes items to be added and the uid of person signed in 
    }
    function read(){
        //reads the users items from data base, gets passed uid
    }
    function delete(){
        //takes in the uid, and the id of what the user wants deleted
    }
    function update(){
        //takes in the uid and the id of item wanting to be updated
    }
?>