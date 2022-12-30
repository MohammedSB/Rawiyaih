<?php
    include_once "header.php";
    if (isset($_SESSION["usersID"])) {
        // header("location: http://www.rawiyaih.com/library.php");
        header("location: library.php");
        exit();
    }
?>


<script>

$(document).ready(function () {

    $(function() {
    $('.whatwd-box').hover(function() {
        if ($('.whatwd-box').hover) {
            var imgid;
            $(this).toggleClass('expand');
            imgid = $(this).attr('id') + "img";
            $("img[id=" +imgid +"]").toggleClass('expand-image')
        } else {
            $(".img").toggleClass('shrink-image')
        }
        });
    });

    });
    
</script>
<body>
<div class="row">
<div class="container">
    <div class="about-page-container">
        <div class="about-page-content">
            <p><h1 class="content"> اهلآ بك في راوية</h1></p>
            <h2 class="content" style="font-size: 3rem; color: rgba(255, 255, 255, 0.85); ">موقع لكتابة و نشر القصص و الروايات العربية</h2>
            <span class = "icon-lock"></span>
            
        </div>
    </div>

    <!-- BOX1 -->

    <div class="whatwd-container"> 
        <div class="whatwd-section-container"> 
        <a text-decoration:none; href = "register.php?ord=sr"> 
        <div class="whatwd-sections">
            <div class="whatwd-box" id ="box1">
                <div class="content-box">
                <div class="whatwd-title">
                    أنشر قصصك و رواياتك
                </div>
                    <img src="cssFiles/images/pen2.png" class="img" id ="box1img" style="height: 100px;
                                                                                        width: 100px;
                                                                                        margin-top:15px;">
                    
                     <span>
                     </span>
                <div class="whatwd-content" style="position:relative;bottom:20px;"> 
                    شاركنا احدث  رواياتك و انشرها بين القراء
                    <br>لا تبخل بإبداعاتك </br>
                </div>
                <div id="whatwd-button">
                    <button><p>ابدأ الكتابة</p></button>
                </div>
                </div>
            </div>
        </div>  
        </a>

        <!-- BOX2 -->
        <a href="register.php"> 
        <div class="whatwd-sections">
            <div class="whatwd-box" id ="box2">
                <div class="content-box">
                <div class="whatwd-title">
                    تعرف على مجتمع من القراء و الكتاب
                </div>
                <img src="cssFiles/images/comu10.png" class="img" id ="box2img" style ="width:80px;
                                                                                       height:80px;
                                                                                       margin-top:20px;

                ">
                     <span>
                     <!-- دع حب القراءة يكون سبب اجتماعنا -->
                     </span>
                <div class="whatwd-content" style="position:relative;bottom:5px;"> 
                مجتمع يضم المهتمين بكتابة القصص و الروايات
                <br>حب القراءة يجمعنا</br>
                </div>
                <div id="whatwd-button">
                    <button><p>سجل الآن</p></button>
                </div>
                </div>
            </div>
        </div>
        </a>
        
        <!-- BOX3 -->
        <a href="library.php"> 
        <div class="whatwd-sections">
            <div class="whatwd-box" id ="box3">
                <div class="content-box">
                <div class="whatwd-title">
                إقراء احدث الروايات
                </div>
                <img src="cssFiles/images/book6.png" class="img" id ="box3img" style ="width:80px;
                                                                                       height:80px;
                                                                                       margin-top:20px
                ">
                     <span>
                     </span>
                <div class="whatwd-content"class="whatwd-content" style="position:relative;bottom:5px;">
                مجموعة من احدث ما خطتة أقلام كتابّ موقع راوية
                </div>
                <div id="whatwd-button">
                    <button><p>ابدأ القراء</p></button>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </a>

</div>
</div>

</body>
</html>

