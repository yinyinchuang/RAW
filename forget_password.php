<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>忘記密碼</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-yen/login_yen.css">
    <style>
        .forgetbtn_click {
            height: 300px;
            position: absolute;
            right: 22%;
            top: 210px;
        }

        .forgetbtn_click img {
            height: 100%;
            object-fit: cover;
            background-color: #FAFAFA;
        }
    </style>
</head>

<body>
    <?php require_once 'tpl/head.inc.php' ?>

    <!-- content -->

    <div class="tabs-container">
        <div class="forget_password_h_box">
            <h1 class="forget_password_h">忘記密碼</h1>
        </div>

        <div class="loginbox">
            <div class="forget_password_p_box">
                <p class="forget_password_p">信箱</p>
            </div>
            <div class="passwordbox" id="forget_password_input">
                <input type="text" class="mailinputwrap" placeholder="請輸入信箱" id="email">
            </div>
        </div>
        <div class="forget_password_p_box2">
            <p class="forget_password_p2">我們將發送更改密碼信件到此信箱</p>
        </div>
        <div class="loginbox_forget_password_btn">

            <a class="login_btn" href="./singup_login_switch.php" id="loginbox_forget_password_BackToLastPage_btn">返回上一頁</a>
            <a class="login_btn" href="./phpmail.php" id="loginbox_forget_password_sure_btn">確認</a>
        </div>

        <button type="button" class="forgetbtn_click" style="border: none;">
            <img src="./img/forgetpic.png" alt="">
        </button>

    </div>

    <?php require_once 'tpl/foot.inc.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script src="https://kit.fontawesome.com/f56e5ae7a8.js" crossorigin="anonymous"></script>

    <script src="./js/main.js"></script>
    <script src="./js/js-yen/singup_login.js"></script>

    <script>
        $('#loginbox_forget_password_sure_btn').click(function() {
            event.preventDefault();
            console.log('hi');


            // $.get("./phpmail.php", function(data) {
            //     alert("Load was performed.");
            // });


            $.get("./phpmail.php", {
                    email: $('input.mailinputwrap').val()
                })
                .done(function(data) {
                    // alert('已發送驗證信！');
                    $('#forget_password_send_mail_len').addClass('open');
                    $('.lightbox_background').addClass('open');
                });
        })
        $('#forget_password_send_mail_len_btn').click(function(event) {
            $('#forget_password_send_mail_len').removeClass('open');
            $('.lightbox_background').removeClass('open');
        });
        $('.lightbox_background').click(function(event) {
            $('#forget_password_send_mail_len').removeClass('open');
        });
    </script>


</body>

</html>