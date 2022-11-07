<?php 
    session_start();
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
        <link rel="stylesheet" href="cssFiles/header.css">
        <link rel="stylesheet" href="cssFiles/index.css">
        <link rel="stylesheet" href="cssFiles/anim.css">
        <link rel="stylesheet" href="cssFiles/popups.css">
        <link rel="stylesheet" href="cssFiles/fonts.css">
        <link type="text/javascript" href="const/javaFun.js">

    </head>
    
<body>


<script>

    $(document).ready(function () {

        $("#community").click(function () {
            $(".popup-community").css("display", 'block')
        });

        $(".close").click(function () {
            $(".popup-community").css("display", "none")
        });

        // Popup Functions

        $("#log-button").click(function () {
            $(".popup").css("display", 'flex')
            $(".popup-content").animate({opacity: '1'})
            $(".popup-content").css("display", 'block')
        });

        $(".close").click(function () {
            $(".popup").css("display", "none")
            $(".popup-content").css("opacity", "0")
            $(".popup-signup-content").css("display", "none")
        });

        $("#popup-signup").click(function () {
            $(".popup-content").css("display","none");
            $(".popup-signup-content").css("display", "block")
        });

        $("#popup-login").click(function () {
            $(".popup-signup-content").css("display","none");
            $(".popup-content").css("display", "block")
        })

        $('#inp1, #inp2').keypress(function() {
        if($("#inp2").val().length != 0 && $("#inp1").val() != '') {
            $('#sub').prop('disabled', false);
            $('#sub').addClass('buttonColor')
            }
        });

        $('#inp1S, #inp2S, #inp3S').keypress(function() {
            if ($("#inp3S").val().length != 0 && $("#inp2S").val() != '' && $("#inp1S").val() != '' ) {
                $('#subS').prop('disabled', false);
                $('#subS').addClass('buttonColor')
                }
        });

        $('input').click(function() {
                    lblId = $(this).attr('id') + "lbl";
                    $("label[id=" +lblId +"]").css("font-size", "14px");
                    $("label[id=" +lblId +"]").removeClass("lower");
                    $("label[id=" +lblId +"]").addClass("raise");
                });
                $('input').blur(function() {
                if ($(this).val().length == 0 || $(this).val() == '' ) {
                    lblId = $(this).attr('id') + "lbl";
                    $("label[id=" +lblId +"]").css("font-size", "18px");
                    $("label[id=" +lblId +"]").removeClass("raise");
                    $("label[id=" +lblId +"]").addClass("lower");
                    }
                });

    });

</script>



<nav class="nav-container">
    <div class="nav-items-container"> 
        <ul id ="right-items">
        <?php
        if(isset($_SESSION["usersID"])) {
            ECHO '<a href="myBooks.php"><li style="color:#DAA520;">ابدا الكتابة</li></a>';
        } else {
            ECHO '<a href="index.php"><li>الصفحة الرئيسية</li></a>';
        }
        ?>
            <a href="library.php"><li>المكتبة</li></a>
            <a id="community"><li>المجتمع</li></a>
        </ul>
        <?php 
            if(isset($_SESSION["usersID"])) {
                ECHO "<div> <p style='float:left;'> <a href='const/logout.php' id='logout'>تسجيل خروج</a> <p id='line'>|</p >
                <a href = 'library.php' style = 'color: white;cursor: pointer;font-size: 18px; text-decoration:none; margin-left: 5px;'>" . $_SESSION["usersName"] . "</a>
                </div>";
            } else {
                ECHO "<div id = 'log-button'>تسجيل الدخول </div>";
            }
        ?>
    </div>
</nav>

<div class="popup-community">
    <div>
<span class="close" style="bottom:-20px;"></span> </div>
<div class="popup-community-content">قريبا...

</div>
</div>

<div class="popup">
    <div class="popup-content">
        <div class="popup-content-title"> <p style="font-size:28px; "> تسجيل الدخول </p> <p> &nbsp; </P>
            <span class = "close"></span> </div>
        <div class="popup-content-input-container">
        <div class="popup-content-input">
            <form action="const/login.php" method="post" class = "login">
                <span></span>
                <!-- placeholder = "اسم المستخدم او البريد الاكتروني" -->
                <!-- placeholder ="كلمة المرور" -->
                <input type="text" name="name" id="inp1" class="name">
                <label id="inp1lbl" for="name" style ="position:absolute; right:90px; top:140px; pointer-events: none; font-size: 18px;" > أسم المستخدم او البريد الالكتروني</label>
                <input type="password" name="pwd" id="inp2" class="password">
                <label id="inp2lbl" for="nameL" style ="position:absolute; right:90px; top:215px; pointer-events: none; font-size: 18px;"> كلمة المرور</label>
                <button type="submit" name="submit" id = 'sub' style="width: 80%; height: 40px; font-size: 16px;" disabled = "true">تسجيل دخول</button>

                <script>

  

                </script>
            </form>
        </div>
        </div>
        <div class="popup-content-footer-container">
            <span>ليس لديك حساب ؟ <a id="popup-signup" style="cursor: pointer; color: rgb(109, 3, 3);"> إنشاء حساب جديد  </a></span>
        </div>
    </div>

    <!-- sign-up -->

    <div class="popup-signup-content">
        <div class="popup-content-title"> <p style="font-size:30px; "> إنشاء حساب جديد </p> <p> انضم الى مجتمع من الكتاب و القراء و ابدأ الكتابة لأن </p> 
            <span class = "close"></span> </div>
        <div class="popup-content-input-container">
        <div class="popup-content-input">
            <form action="const/signup.php" method="post" >
                <span></span>
                <!-- placeholder ="البريد الالكتروني" -->
                <!-- placeholder = "اختر اسم المستخدم" -->
                <!-- placeholder ="كلمة المرور" -->
                <input type="text" name="nameS" id="inp1S" >
                <label id="inp1Slbl" for="name" style ="position:absolute; right:90px; top:145px; pointer-events: none; font-size: 18px;" >اسم المستخدم</label>
                <input type="text" name="emailS" id="inp2S" >
                <label id="inp2Slbl" for="name" style ="position:absolute; right:90px; top:220px; pointer-events: none; font-size: 18px;" >البريد الالكتروني</label>
                <input type="password" name="pwdS" id="inp3S"> 
                <label id="inp3Slbl" for="name" style ="position:absolute; right:90px; top:295px; pointer-events: none; font-size: 18px;" >كلمة المرور</label>
                <button type="submit" name="submitS" id = 'subS' style="width: 80%; height: 40px; font-size: 16px;" disabled = "disabled">تسجيل</button>
                <script>



                </script>
            </form>
            <a id="popup-login" style= "cursor: pointer; color: rgb(109, 3, 3); font-size: 18px;"> تسجيل دخول  </a>
        </div>
        </div>
        </div> 
    </div>
</body>
</div>