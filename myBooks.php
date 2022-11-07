<?php 
    include_once 'header.php';
    include_once 'generate.php';


?>
    <head>
        <meta charset ="UTF-8" />
        <title> راوية </title>
        <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="cssFiles/myBooks.css">
        <link rel="stylesheet" href="cssFiles/books.css">

    </head>

<body>

    <script>
    $(function() {
    $('.book').hover(function() {
        $(this).toggleClass('expand');
        });
    });
    </script>

    <div class="container">
    <div class="title-container">
    <h1 class="title"> كتبي </h1>
    <div class="line">
    </div>
    <div class="book-container">
        <?php 
        $tempA = array();
        if (isset($myBooks)) {
            for ($x = 0; $x < $numOfMyBooks; $x++) {
                $tempA = $myBooks[$x];
                if ($tempA["6"] == 0) {
                    ECHO "<a href='write.php?book=".$tempA["0"]."' class='new-book'>
                    <div class='book'>
                    <img class='book-cover' src='cssFiles/images/cover5.jpg'> </img>
                        <div class='book-title'> ". $tempA["3"] ."
                        </div> 
                        <div class='book-status-container' style='background-color:rgb(184, 2, 2);'>
                        <div class='book-status'>
                        غير كامل
                        </div>
                        </div>
                        <div class='new-book-logo-container' style='background:url(images/plus-book3.png);'>
                        </div>
                        </div>";
                } else {
                    ECHO "<a href='reading.php?book=".$tempA["0"]."' class='new-book'>
                    <div class='book'>
                    <img class='book-cover' src='cssFiles/images/cover5.jpg'> </img>
                        <div class='book-title'> ". $tempA["3"] ."
                        </div> 
                        <div class='book-status-container'>
                        <div class='book-status'>
                        كتاب كامل
                        </div>
                        </div>
                        <div class='new-book-logo-container' style='background:url(images/plus-book3.png);'>
                        </div>
                        </div>";
                }
            }
        }
                // ECHO "<a href='writing.php?book=".$tempA["0"]."' class='new-book'>
            //     <div class='book'>
            //     <img class='book-cover' src='cssFiles/images/cover5.jpg'> </img>
            //         <div class='book-title'> ". $tempA["3"] ."
            //         </div> 
            //         <div class='book-status-container' style='background-color:rgb(184, 2, 2);'>
            //         <div class='book-status'>
            //         غير كامل
            //         </div>
            //         </div>
            //         <div class='new-book-logo-container' style='background:url(images/plus-book3.png);'>
            //         </div>
            //         </div>
            //         ";
            //         if ($tempA["6"] == 0) {
            //             echo "<div class='book-status-container' style='background-color:rgb(184, 2, 2);'>
            //             <div class='book-status'>
            //             غير كامل
            //             </div>
            //             </div>";
            //         } else {
            //             echo "<div class='book-status-container'>
            //             <div class='book-status'>
            //             كتاب كامل
            //             </div>
            //             </div>";
            //         }
            //         echo "
            //         <div class='new-book-logo-container' style='background:url(images/plus-book3.png);'>
            //         </div>
            //         </div>"; 
    
            // }
        ?>
        <a href="write.php" class="new-book">
        <div style="background-color: rgba(255, 255, 255, 0.932); box-shadow: 0 0 2px rgb(0 0 0 / 50%);" class="book">
            <div class="new-book-title">
                كتاب جديد
            </div>
            <div class="book-status-new" style='color:black;'>
            ابدأ كتاب جديد
            </div>
            <div class="new-book-logo-container" style="background:url(images/plus-book3.png);">
                <img class="new-book-logo" src='cssFiles/images/plus-book3.png'>
</img>
            </div>
        </div>
        </a>    
    </div>
    </div>
    </div>
</body>

