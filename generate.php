<?php 
    include_once "const/dbh.php";
    include_once "const/functions.php";
    $ALLBOOKS = generateBooks($conn);
    if ($ALLBOOKS != 0) {
        $numOfBooks = count($ALLBOOKS);
    }

    if (isset($_SESSION["usersID"])) {
        $myBooks = selectBooks($conn, $_SESSION["usersID"]);
        if (!$myBooks == false) {
            $numOfMyBooks = count($myBooks);
        } else {
            $numOfMyBooks = "";
        }
    }
?>