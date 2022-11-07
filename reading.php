
<?php 
    session_start();
    include_once 'generate.php';
    if (isset($_GET['book'])) {
        $thisbookID = $_GET['book'];
    } else {
        header("location: library.php");
    }
    for ($x = 0; $x < $numOfBooks; $x++) {
        $tempA = $ALLBOOKS[$x];
        if ($tempA["0"] == $thisbookID) {
            $title = $tempA["3"];
            $writer = $tempA["2"];
            $content = $tempA["4"];
        }
    }
?>


<!DOCTYPE html>
<html lang="ar" class="droid-arabic-kufi">
    <head>
        <meta charset ="UTF-8" />
        <title> راوية </title>
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="cssFiles/reading.css">
        <link rel="stylesheet" href="cssFiles/writing.css">
        
    </head>
<body>
<a href="library.php" style = "text-decoration:none;">
    <div class="back">
    الصفحة الرئيسية
    </div>
    </a>
    <div class="container">
        <div class="title-container">
            <div class="title">
            <?php
            echo $title; 
            ?>
            </div>
        </div>
        <div class="writer-container">
            <div class="writer" style="clear:both;">
                <?php
                echo $writer; 
                ?>
            </div>
        </div>
        <div class="line">
        </div>
        <div class="content-container">
            <div class="content">
            <?php
            echo $content; 
            ?>
            </div>
        </div>
    </div> 
</body>

    