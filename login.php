<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFiles/login.css">
    <link rel="stylesheet" href="cssFiles/anim.css">
    <link rel="stylesheet" href="cssFiles/popups.css">

    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<?php
    $loginError= "";

    if (isset($_GET["error"])) {
        if($_GET["error"] == "wronglogin") {
            $loginError = "اسم المستخدم او الرمز السري غير صحيح";
        }
        if($_GET["error"] == "none") {
            ECHO "
            <div id='success' class='success-container' style='cursor:pointer;width:490px;height:210px;'>
            <div class='success' style='width:480px;height:200px;font-size:48px;'>
            <div>
            </div>
            <span class = 'close' style='bottom:-20px;'></span>
            <div class='success-content'>تم إنشاء الحساب بنجاح
            </div>
            </div>
            </div>
            ";
        }
    }

?>



<script>

    $(document).ready(function () {
        
        $('#inp1, #inp2').keypress(function() {
            if($("#inp2").val().length != 0 && $("#inp1").val() != '') {
                $('#sub').prop('disabled', false);
                $('#sub').addClass('buttonColor')
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
    $("#success").click(function () {
        $(".success-container").css("display", "none")
        });


    });

</script>
<body>
<div class="popup">
    <div class="popup-content">
    <a href="index.php" style = "text-decoration: none;"> <div class="popup-mainpage"> الصفحة الرئيسية
        </div> </a>
        <div class="popup-content-title"> <p style="font-size:40px; "> تسجيل الدخول </p> <p> &nbsp; </P>
        </div>
        <div style="bottom:420px;" class = "error"><?php ECHO $loginError ?></div>
        <div class="popup-content-input-container">
        <div class="popup-content-input">
            <form action="const/login.php" method="post" class = "login">
                <span></span>
                <!-- placeholder = "اسم المستخدم او البريد الاكتروني" -->
                <!-- placeholder ="كلمة المرور" -->
                <input type="text" name="name" id="inp1" class="name" >
                <label id="inp1lbl" for="nameL" style ="position:absolute; right:110px; top:197px; pointer-events: none; font-size:18px;" > اسم المستخدم او البريد الالكتروني</label>
                <input type="password" name="pwd" id="inp2" class="password" >
                <label id="inp2lbl" for="nameL" style ="position:absolute; right:110px; top:297px; pointer-events: none; font-size:18px;"> كلمة المرور</label>
                <button type="submit" name="submit" id = 'sub' style="width: 80%; height: 40px; font-size: 16px;" disabled = "true">تسجيل دخول</button>
            </form>
        </div>
        </div>
        <div class="popup-content-footer-container">
            <span>ليس لديك حساب ؟ <a href="register.php" style="cursor: pointer;
                                                                 color: rgb(109, 3, 3);
                                                                 text-decoration:none;">إنشاء حساب جديد </a></span>
        </div>
    </div>

</div>
    
    
</body>
</html>