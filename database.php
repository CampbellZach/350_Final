<?php
    $db_name = 'mysql:host=localhost:3305;dbname=cs_350';
    $username = 'student';
    $password = 'CS350';

    try {
    $conn = new PDO($db_name, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
    }

    function createNewUser($username,$password){
        global $con;
        $stmt = $con->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();
    }

    function getAccounts() {
        global $con;
        $stmt = $con->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    
    function getUserByUsername($username) {
        global $con;
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bindParam(1, $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    
    function checkIfUsernameExists($username) {
        global $con;
        $stmt = $con->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetchColumn() > 0;
    }

    function add_item(){
        //takes items to be added and the uid of person signed in 
    }
    function read(){
        
    }
    function delete(){
        //takes in the uid, and the id of what the user wants deleted
    }
    function update(){
        //takes in the uid and the id of item wanting to be updated
    }
?>