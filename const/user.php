<?php

    include_once 'dbh.php';
    include_once 'functions.php';

    session_start();
    
    if(isset($_SESSION['usersID'])) {
        $usersID = $_SESSION['usersID'];
        echo 'hi';
    } 

?>