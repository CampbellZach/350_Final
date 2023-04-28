<?php

function connectdb()
{
    $db_name = 'mysql:host=localhost:3305;dbname=cs_350';
    $username = 'student';
    $password = 'CS350';
    try {
        $conn = new PDO($db_name, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        exit();
    }
    return $conn;
}

function createNewUser($conn, $username, $password)
{
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    return $stmt->execute();
}

function getAccounts($conn)
{
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getUserByUsername($conn, $username)
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bindParam(1, $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function checkIfUsernameExists($conn, $username)
{
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt->fetchColumn() > 0;
    return $result;
}

function add_item($conn, $Title, $Pay, $Location, $Response, $Notes)
{
    $sql = "INSERT INTO `job_search`(`uid`, `Title`, `Pay`, `Location`, `Response`, `Notes`) 
        VALUES (:uid, :Title, :Pay, :Location, :Response, :Notes)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":uid", $_SESSION['id']);
    $stmt->bindParam(":Title", $Title);
    $stmt->bindParam(":Pay", $Pay);
    $stmt->bindParam(":Location", $Location);
    $stmt->bindParam(":Response", $Response);
    $stmt->bindParam(":Notes", $Notes);
    if ($stmt->execute()) {
        header('Location: index.php');
    } else {
        echo "Error adding to database, please try again.";
    }
}
function read($conn)
{
    $t1q = "SELECT * FROM `job_search` WHERE uid =".$_SESSION['id'];
    $stmt = $conn->prepare($t1q);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}
function delete($conn)
{
    //takes in the uid, and the id of what the user wants deleted
}
function update($conn,$Title,$Pay,$Location,$Response,$Notes)
{
    //takes in the uid and the id of item wanting to be updated
    $sql = "UPDATE `job_search` SET 
    `Title`=':Title',
    `Pay`=':Pay',
    `Location`=':Location',
    `Response`=':Response',
    `Notes`=':Notes' WHERE id = :id";

}

function readId($conn,$id)
{
    $t1q = "SELECT * FROM `job_search` WHERE id =".$id;
    $stmt = $conn->prepare($t1q);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}
