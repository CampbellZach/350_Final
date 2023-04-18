<?php 
    if(!isset($_SESSION['isVerified']) || $_SESSION['isVerified'] != 1){
     
        echo "<a href='index.php'>HOME</a>";
        echo "<a href='index.php?action=create'>CREATE NEW USER</a>";
        echo "<a href='index.php?action=login'>LOGIN</a>";
        
    }else{
        echo "<a href='index.php'>HOME</a>";
        echo '<a href="index.php?action=secret">SECRET</a>';
        echo '<a href="index.php?action=logout">LOGOUT</a>';
    }
?>
