<?php

if (isset($_POST["submitS"])) {

    $name = $_POST["nameS"];
    $email = $_POST["emailS"];
    $pwd = $_POST["pwdS"];

    require_once 'dbh.php';
    require_once 'functions.php';

    if (invalidName($name) !== false) {
        header("location: ../register.php?error=invalidname");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if (invalidPwd($pwd) !== false) {
        header("location: ../register.php?error=invalidpassword");
        exit();
    }
    
    if (nameExists($conn, $name, $email) !== false) {
        header("location: ../register.php?error=nameexists");
        exit();
    }

    createUser($conn, $name, $email, $pwd);
}

else {
    header("location: ../index.php");
    exit(); 
}

?>