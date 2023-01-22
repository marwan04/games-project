<?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 

    $db_name="gamesdb"; 

    // Create connection
    $conn=mysqli_connect($servername,$username,$password,$db_name) or die("Connection Error");
?>