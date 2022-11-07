<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssFiles/login.css">
    <link rel="stylesheet" href="cssFiles/anim.css">
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
    <title>signup</title>
</head>

<?php
    $nameError = $emailError = $pwdError = "";

    if (isset($_GET["error"])) {
        if($_GET["error"] == "invalidname") {
            $nameError = "اسم المستخدم غير صحيح الرجاء استخدام حروف و ارقام فقط";
        }
        if($_GET["error"] == "nameexists") {
            $nameError = "اسم المستخدم او البريد الاكتروني مأخوذ";
        }
        if($_GET["error"] == "invalidemail") {
            $emailError = "البريد الاكتروني غير صحيح";
        }
        if($_GET["error"] == "invalidpassword") {
            $pwdError = "كلمة المرور غير صحيحة يجب ان تكون اربع رموز او اكثر";
        }
    }

?>

<script>

    $(document).ready(function () {

        $('#inp1, #inp2, #inp3').keypress(function() {
            if ($("#inp3").val().length != 0 && $("#inp2").val() != '' && $("#inp1").val() != '' ) {
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

<div class="popup">
    <div class="popup-signup-content">  
    <a href="index.php" style = "text-decoration: none;"> <div class="popup-mainpage"> الصفحة الرئيسية
        </div> </a>
        <div class="popup-content-title"> <p style="font-size: 40px; "> إنشاء حساب جديد </p> <p> انضم الى مجتمع من الكتاب و القراء و اطلق عنان قلمك بالابداع </p> 
        </div>
        <div class="popup-content-input-container">
        <div class="popup-content-input">
            <form action="const/signup.php" method="post" >
                <span></span>
                <!-- placeholder = "اختر اسم المستخدم" -->
                <!-- placeholder ="البريد الالكتروني" -->
                <!-- placeholder ="كلمة المرور" -->
                <div class = "error"><?php ECHO $nameError ?></div>
                <input type="text" name="nameS" id="inp1">
                <label id="inp1lbl" for="nameL" style ="position:absolute;
                                                        right:110px;
                                                        top:210px;
                                                        pointer-events:
                                                        none;
                                                        font-size:18px;" >اختر اسم المستخدم</label>
                <div class = "error" style ="bottom:340px;"><?php ECHO $emailError ?></div>
                <input type="text" name="emailS" id="inp2">
                <label id="inp2lbl" for="nameL" style ="position:absolute;
                                                        right:110px;
                                                        top:310px;
                                                        pointer-events:
                                                        none;
                                                        font-size:18px;" >البريد الالكتروني</label>
                <div class = "error" style ="bottom:240px;"><?php ECHO $pwdError ?></div>
                <input type="password" name="pwdS" id="inp3">
                <label id="inp3lbl" for="nameL" style ="position:absolute;
                                                        right:110px;
                                                        top:410px;
                                                        pointer-events:
                                                        none;
                                                        font-size:18px;" >كلمة المرور</label> 
                <button type="submit" name="submitS" id = 'subS' style="width: 80%; height: 40px; font-size: 16px;" disabled = "disabled">تسجيل</button>
            </form>
            <a href="login.php" style= "cursor: pointer; 
                                        color: rgb(109, 3, 3);
                                        font-size: 18px;
                                        text-decoration:none;"> تسجيل دخول  </a>
        </div>
        </div>
        </div> 
    </div>

</div>
    
    
</body>
</html>