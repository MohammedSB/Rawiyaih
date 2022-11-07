<?php
    session_start();
        if (isset($_POST["submit"])) {
        $bookContent = $_POST["bookContent"];
        $bookTitle = $_POST["bookTitle"];   
    } else if (isset($_POST["save"])) {
        echo "<script></script>";
    }
    $_SESSION["bookContent"] = $bookContent; 
    $_SESSION["bookTitle"] = $bookTitle; 
?>


<html lang="ar" class="droid-arabic-kufi">
    <head>
        <meta charset ="UTF-8" />
        <title> راوية </title>
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="cssFiles/prePublish.css">

    </head>
<body>
<a href="write.php <?php  if(isset($_GET['book'])) {
                                    echo "?book= ". $_SESSION["bookID"];
                                } ?>" style = "text-decoration:none;">
    <div class="back">
    صفحة الكتابة
    </div>
    </a>
    
    <div class="row">
    <div class="container">
        <div class="title-container" >
            اكتب وصف لكتابك
            <form action="const/publish.php" method="post">
                <div contenteditable="true" class="desc" dir="rtl" id="bookDesc" autocomplete="on"> </div>
                <script>
                    $('#bookDesc').keypress(function() {
                    document.getElementById("Desc").value = document.getElementById("bookDesc").innerHTML;
                    });
                </script>
                <button id="button" name="submit" class="button">انشر كتابك</button>
                <span class ="note">ملاحظة بعد النشر لا يمكنك التعديل على الكتاب </span>
                <input  type="hidden" name="bookContent" value="<?php echo $bookContent; ?>">
                <input  type="hidden" name="bookTitle" value="<?php echo $bookTitle; ?>">
                <input  type ="hidden"id="Desc" name="bookDesc" value="">
            </form>
        </div>
    </div>
    </div>
</body>