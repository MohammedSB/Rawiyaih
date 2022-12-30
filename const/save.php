<?php
    if(isset($_POST["save"])) {
        session_start();
        $bookDesc = ""; 
        $public = false;
        $bookContent = $_POST["bookContent"];
        $bookTitle = $_POST["bookTitle"];

        require_once 'dbh.php';
        require_once 'functions.php';  

        if (isset($_SESSION["bookID"])) {
            $bookID = $_SESSION["bookID"];
            save($conn, $bookID, $bookContent, $bookTitle, $bookDesc, $public);
        } else {
            publish($conn, $bookContent, $bookTitle, $bookDesc, $public);
        }


    } else {
        echo '<script type="text/javascript">';
        echo ' alert("JavaScript Alert Box by PHP")';  //not showing an alert box.
        echo '</script>';
    }

?>