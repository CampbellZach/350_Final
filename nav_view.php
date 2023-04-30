<head>
    <link rel="stylesheet" href="styles/nav.css">
</head>
<nav>
<?php 
    if(!isset($_SESSION['isVerified']) || $_SESSION['isVerified'] != 1){
     
        echo "<a href='index.php'>HOME</a>";
        echo "<a href='index.php?action=create'>CREATE NEW USER</a>";
        echo "<a href='index.php?action=login'>LOGIN</a>";
        
    }else{
        echo "<a href='index.php'>HOME</a> ";
        echo ' <a href="index.php?action=create_item">CREATE</a> ';
        echo ' <a href="index.php?action=logout">LOGOUT</a>';
    }
?>
</nav>