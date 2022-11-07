<?php 
    include_once 'header.php';
    include_once 'generate.php';
    // if (isset($_GET["complete"])) {
    //     ECHO "
    //     <div id='success' class='success-container' style='cursor:pointer;'>
    //     <div class='success'>
    //     <div>
    //     </div>
    //     <span class='close' style='bottom:-20px;'></span>
    //     <div class='success-content'>تم النشر بنجاح
    //     </div>
    //     </div>
    //     </div>
    //     ";
    // }
?>
    <head> 
        <meta charset ="UTF-8" />
        <title> راوية </title>
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="cssFiles/library.css">
        <link rel="stylesheet" href="cssFiles/popups.css">
        <link rel="stylesheet" href="cssFiles/books.css">
        <link rel="stylesheet" href="cssFiles/anim.css">

    </head>

<script>
$(function() {
$('.book').hover(function() {
    $(this).toggleClass('expand');
    });
});
$("#success").click(function () {
    $(".success-container").css("display", "none")
    });

</script>

<body>
    <div class="row">
    <div class="container">
    <div class="book-container">
    <div class="shelf">
        <?php 
        $tempA = array();
        if (isset($ALLBOOKS)) {
            for ($x = 0; $x < $numOfBooks; $x++) {
                $tempA = $ALLBOOKS[$x];
                ECHO "<a href='reading.php?book=".$tempA["0"]."' class='new-book'>
                <div class='book' style='margin-top:30px;'>
                <img class='book-cover' src='cssFiles/images/cover5.jpg'> </img>
                    <div class='book-title'> ". $tempA["3"] ."
                    </div>
                    <div class='book-writer'> <span>الكتاب</span> <div style='position:relative; right:45px;bottom:21px;'>". $tempA["2"] ." </div>
                    </div>
                    <div class='book-desc'> ". $tempA["5"] ."
                    </div>
                    <div class='new-book-logo-container' style='background:url(images/plus-book3.png);'>
                        <div class='new-book-logo'>
                        </div>
                    </div>
                    </div>"; 
            }
        }
        ?>
    </div>
    </div>
    </div>
</body>