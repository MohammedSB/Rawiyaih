<?php 
    if(isset($_POST["submit"])) {
        $username = $_POST["name"];
        $password = $_POST["pwd"];

        require_once 'dbh.php';
        require_once 'functions.php';

    

  
    loginUser($conn, $username, $password);

    } 
    else 
        header("location: ../login.php")

?>