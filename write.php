<?php 
    session_start();
    if (isset($_GET["book"])) {
        $thisBookID = $_GET["book"];
        $myBooks = $_SESSION["myBooks"];
        $_SESSION["bookID"] = $_GET["book"];
        for ($x = 0; $x < $_SESSION["numOfBooks"]; $x++) {
            $tempA = $myBooks[$x];
            if ($tempA["0"] == $thisBookID) {
                $content = $tempA["4"];
                $title = $tempA["3"];
                if ($tempA["6"] ==  1) {
                    header("location: library.php");
                }
            }

        }
    } else {
        unset($_SESSION["bookID"]);
    }

    if (isset($_SESSION['bookContent'])) {
        $content = $_SESSION['bookContent'];
        $title = $_SESSION['bookTitle'];
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
        <link rel="stylesheet" href="cssFiles/writing.css">
        
    </head>
<script>
    $(document).ready(function () {
        jQuery(function($){
    $("[contenteditable]").focusout(function(){
        var element = $(this);        
        if (!element.text().trim().length) {
            element.empty();
            }
        });
    });
});

</script>
<body>
    <a href="myBooks.php" style = "text-decoration:none;">
    <div class="back">
    الصفحة الرئيسية
    </div>
    </a>
    <div class="container">
    <!-- <div class="chapters-container">
        
        </div> -->

    <div class="writers-container">
        <?php

        if (isset($_GET["book"])) {
            echo "
            <div class='writers-container-title' id='bookTitle' contenteditable='true' dir='rtl'>
                ". $title  .  "
            </div> ";
        }
        else {
            echo "
                <div class='writers-container-title' id='bookTitle' contenteditable='true' dir='rtl'>
                العنوان
            </div>";
                    }
        ?>
        <div class="line">
        </div>

        <!-- CONTENT -->

        <?php
        
            if (isset($_GET["book"])) {
                echo"
                    <div class='writers-container-box' id='bookContent' contenteditable='true' dir='rtl'>
                    ". $content ."
                    </div>";
            }
            else {
                echo "
                    <div class='writers-container-box' id='bookContent' contenteditable='true' dir='rtl'>
                    ابدأ الكتابة هنا
                    </div>";
            }
        
        ?>
        <!-- <div class="writers-container-box" id='bookContent' contenteditable="true" dir="rtl">
        ابدأ الكتابة هنا
        </div> -->
    </div>

    <div class="right-container">
    
    </div>
    <!-- <div class="desc-container-box" contenteditable="true" dir="rtl"> الوصف <h2 class="desc-title">اكتب وصف لكتابك </h2>  </div> -->
    <?php

    if(isset($_GET['book'])) {
        echo "<form action='metaBook.php?book= ".$thisBookID."' method='post' onsubmit='javascript: return process();'>";
    } else {
        echo "<form action='metaBook.php' method='post' onsubmit='javascript: return process();'>";
    }

    ?>
    <button id="button" name="submit" class="button" style="border:none;">نشر</button>
    <!-- <div class="cover">
        <div class="cover-title"></div> 
    </div> -->
    <input type="hidden" id="Content" name="bookContent" value="">
    <input type="hidden" id="Title" name="bookTitle" value="">
    </form>
    <form id="save" action="const/save.php" method="post" onsubmit="javascript: return processS();">
    <button name="save" class="button" style="bottom: 140px;
                                            position:relative;
                                            background-color: rgb(240, 240, 240);
                                            border-color:rgb(109, 3, 3);
                                            color:rgb(109, 3, 3);
                                            border-width: 1px;
                                            ">حفظ</button>
    <input type="hidden" form="save" id="ContentS" name="bookContent" value="">
    <input type="hidden" form="save" id="TitleS" name="bookTitle" value="">
    </form>
    </div>
    <script>
        function process() {
        document.getElementById("Content").value = document.getElementById("bookContent").innerHTML;
        document.getElementById("Title").value = document.getElementById("bookTitle").innerHTML;
        document.getElementById("Desc").value = document.getElementById("bookDesc").innerHTML;
        return true;
        }
        function processS() {
        document.getElementById("ContentS").value = document.getElementById("bookContent").innerHTML;
        document.getElementById("TitleS").value = document.getElementById("bookTitle").innerHTML;
        return true;
        }
</script>

<?php
    unset($_SESSION["bookContent"]);
    unset($_SESSION["bookTitle"]);
?>
</body>