<?php 

    if(isset($_POST["submit"])) {
        
        session_start();

        unset($_SESSION["bookContent"]);
        unset($_SESSION["bookTitle"]);

        $public = 1;
        $bookDesc = $_POST["bookDesc"];
        $bookContent = $_POST["bookContent"];
        $bookTitle = $_POST["bookTitle"];

        require_once 'dbh.php';
        require_once 'functions.php';

        if (isset($_SESSION["bookID"])) {
            $bookID = $_SESSION["bookID"];
            save($conn, $bookID, $bookContent, $bookTitle, $bookDesc, $public);
            exit();
        } else {
            publish($conn, $bookContent, $bookTitle, $bookDesc, $public);
            exit();
        }

    }
?>