<?php 


function invalidName($name) {
    $result;
    if (!preg_match("/^[0-9a-zA-Zأ-ي\s]*$/u", $name))  {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidPwd($pwd) {
    $result;
    if (strlen($pwd) < 4) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function nameExists($conn, $name, $email) {
    $sql = "SELECT * FROM users WHERE usersName = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=nameexists");
    }

    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
 
    mysqli_stmt_close($stmt);
}


function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersPWD) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=cannotmakeuser");
    }

    $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPWD);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");


}


function loginUser($conn, $username, $pwd) {
    $nameExists = nameExists($conn, $username, $username);

    if ($nameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $nameExists["usersPWD"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();

        $_SESSION["usersID"] = $nameExists["usersID"];
        $_SESSION["usersName"] = $nameExists["usersName"];
         
        $selectBooks = selectBooks($conn, $_SESSION["usersID"]);
        if (!$selectBooks == false) {
            
            $_SESSION["numOfBooks"] = count($selectBooks);
            $_SESSION["myBooks"] = $selectBooks;
        }

        header("location: ../library.php");

        exit();
    }
    

}


function publish($conn, $bookContent, $bookTitle, $bookDesc, $public) {
    session_start();
    $sql = "INSERT INTO books (usersID, usersName, bookTitle, bookContent, bookDesc, bookStatus) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../library.php?error=cannotuploadbook");
    }
    $usersID = $_SESSION["usersID"];
    $usersName = $_SESSION["usersName"];
    mysqli_stmt_bind_param($stmt, "issssi", $usersID, $usersName, $bookTitle, $bookContent, $bookDesc, $public);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    // $bookTitle = $_SESSION["bookTitle"];
    $selectBooks = selectBooks($conn, $_SESSION["usersID"]);
    if (!$selectBooks == false) {
        $_SESSION["numOfBooks"] = count($selectBooks);
        $_SESSION["myBooks"] = $selectBooks;
    }

    header("location: ../myBooks.php");
    exit();
    echo "pub";
}

function save($conn, $bookID, $bookContent, $bookTitle, $bookDesc, $public) {
    session_start();
    if ($public == 0) {
    $sql = "UPDATE books SET bookTitle=?, bookContent=? WHERE bookID=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../library.php?error=cannotuploadbook");
    }
    mysqli_stmt_bind_param($stmt, "ssi", $bookTitle, $bookContent, $bookID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $selectBooks = selectBooks($conn, $_SESSION["usersID"]);
    if (!$selectBooks == false) {
        $_SESSION["numOfBooks"] = count($selectBooks);
        $_SESSION["myBooks"] = $selectBooks;
        }
    header("location: ../write.php?book=".$_SESSION['bookID']."");
    exit();

    } else {
        $sql = "UPDATE books SET bookTitle=?, bookContent=?, bookDesc=?, bookStatus=? WHERE bookID=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../library.php?error=cannotuploadbook");
        }
        mysqli_stmt_bind_param($stmt, "sssii", $bookTitle, $bookContent, $bookDesc, $public, $bookID);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $selectBooks = selectBooks($conn, $_SESSION["usersID"]);
        if (!$selectBooks == false) {
            $_SESSION["numOfBooks"] = count($selectBooks);
            $_SESSION["myBooks"] = $selectBooks;
            }
        header("location: ../myBooks.php");
        echo "save2";
        exit();
    }
}


function selectBooks($conn, $usersID) {
    $array = array();
    $sql = "SELECT * FROM books WHERE usersID = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=cannotconnect");
        die();
    }

    mysqli_stmt_bind_param($stmt, "s", $usersID);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($array = mysqli_fetch_all($resultData)) {
        return $array;
    } else {
        $result = false;
        return $result;
    }
 
    mysqli_stmt_close($stmt);
}


function generateBooks($conn) {
    $array = array();
    $sql = "SELECT * FROM books WHERE bookStatus = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // header("location: ../register.php?error=cannotconnect");
    }
    $public = 1;
    mysqli_stmt_bind_param($stmt, "i", $public);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if ($array = mysqli_fetch_all($resultData)) {
        return $array;
    }
    mysqli_stmt_close($stmt);
}

?>