<?php
require_once 'db.inc.php'
?>

<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAW</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-yen/login_yen.css">
    <script src="https://kit.fontawesome.com/f56e5ae7a8.js" crossorigin="anonymous"></script>
    <style>
    /* 要放這邊才會執行 */

    .loginbtn_click {
        height: 300px;
        position: absolute;
        left: 120%;
        top:2%;
    }

    .loginbtn_click img {
        height: 100%;
        object-fit: cover;
        background-color: #FAFAFA;
    }

    .registerbtn_click {
        height: 400px;
        position: absolute;
        left: 120%;
        top:2%;
    }

    .registerbtn_click img {
        height: 100%;
        object-fit:cover;
        background-color: #FAFAFA;
    }
    </style>
</head>

<body>
    <?php require_once 'tpl/head.inc.php' ?>
    <!-- content -->

    <div class="tabs-container">
        <div class="tabs-pages">
            <div class="tab active">登入</div>
            <div class="tab" id="tab_right">註冊</div>
        </div>

        <div class="tabs-contents">
            <div class="tab-c active"  style="z-index:2;">
                <div class="inner-content">
                    <div class="yen-row">
                        <div class="loginbox">
                            <div class="singUp_input_box" id="singUp_input">
                                <p class="singUp_input_p">信箱</p>
                            </div>
                            <div class="passwordbox">
                                <input type="text" class="mailinputwrap" placeholder="請輸入信箱" id="email_login">
                            </div>
                        </div>

                        <div class="loginbox">
                            <div class="singUpinput_box">
                                <p class="singUp_input_p">密碼</p>
                            </div>
                            <div class="passwordbox" style="margin-bottom: 32px;">
                                <input type="password" class="codeinputwrap" id="myInput" placeholder="輸入密碼">
                                <div class="open_eye">
                                    <input type="image" onclick="myFunction()" src="./svg/eye-off.svg" id="password_open_eye_svg">
                                </div>
                            </div>
                        </div>

                        <div class="loginbox_btn">
                            <button class="login_btn" type="submit" id="btn_login">登入</button>
                            <a class="login_btn" href="./forget_password.php" id="singUp_forget_password_btn">忘記密碼</a>
                        </div>
                    </div>
                </div>

                <button type="button" class="loginbtn_click" style="border: none;">
                    <img src="./img/loginpic.png" alt="">
                </button>
                <!-- 請點包包頭女孩 -->

                <div class="showup_box_300x150" id="show_box_login" style="z-index: 10;">
                     <p>登入成功</p>
                    <button class="showup_box_button_300x150 loginsuccessbtn" data-target="#show_box_login">確定</button>
                </div>
                <div class="showup_box_300x150" id="show_box_login_fail">
                    <p>登入失敗</p>
                    <button class="showup_box_button_300x150 loginfailbtn" data-target="#show_box_login_fail">確定</button>
                </div>

            </div>

            <div class="tab-c">
                <div class="inner-content">
                    <div class="yen-row">
                        <div class="loginbox">
                            <div class="loginIn_input_box">
                                <p class="loginIn_input_p">信箱</p>
                            </div>
                            <div class="passwordbox">
                                <input type="email" class="mailinputwrap" placeholder="請輸入信箱" id="email">
                            </div>
                        </div>

                        <div class="loginbox">
                            <div class="singUpinput_box">
                                <p class="singUp_input_p">密碼</p>
                            </div>
                            <div class="passwordbox" style="margin-bottom: 32px;">
                                <input type="password" class="codeinputwrap" value="" id="myInput2" placeholder="輸入密碼">
                                <div class="open_eye">
                                    <input type="image" onclick="myFunction2()" src="./svg/eye-off.svg" id="password_open_eye_svg2">
                                </div>
                            </div>
                        </div>

                        <div class="loginbox">
                            <div class="singUpinput_box">
                                <p class="singUp_input_p">密碼</p>
                            </div>
                            <div class="passwordbox" style="margin-bottom: 32px;">
                                <input type="password" class="codeinputwrap" value="" id="myInput3" placeholder="再次輸入密碼">
                                <div class="open_eye">
                                    <input type="image" onclick="myFunction3()" src="./svg/eye-off.svg" id="password_open_eye_svg3">
                                </div>
                            </div>

                            <div class="showup_box_300x150" id="show_box_registersuccess">
                                <p>歡迎加入 RAW</p>
                                <button class="showup_box_button_300x150 registers" data-target="#show_box_registersuccess">確定</button>
                            </div>
                            <div class="showup_box_300x150" id="show_box_registerfail">
                                <p>註冊失敗</p>
                                <button class="showup_box_button_300x150 registerf" data-target="#show_box_registerfail">確定</button>
                            </div>

                        </div>

                        <div class="radiobox">
                            <input id="radio-agree" class="radio-custom" name="coupon-pay_group" type="checkbox">
                            <label for="radio" class="radio-custom-label ml_18-forRadioOfSingUP mt_32-forRadioOfSingUP">
                                <p>我同意赤著服務條款及隱私政策</p>
                            </label>

                            <input id="radio-agree" class="radio-custom" name=" coupon-pay_group" type="checkbox">
                            <label for="radio" class="radio-custom-label ml_18-forRadioOfSingUP mt_32-forRadioOfSingUP">
                                <p>訂閱赤著每月電子報</p>
                            </label>
                        </div>

                        <div class="loginbox_btn yen_justify-center">

                            <!-- <a class="login_btn" href="#">確定</a> -->

                            <button class="login_btn" type="submit" id="btn_sure">確定</button>

                        </div>
                    </div>
                </div>

                <button type="button" class="registerbtn_click" style="border: none;">
                    <img src="./img/registerpic.png" alt="">
                </button>
                <!-- 請點馬尾女孩的腳 -->

            </div>
        </div>
    </div>

    <?php require_once 'tpl/foot.inc.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/js-yen/singup_login.js"></script>

    <script>

        $('#btn_sure').click(function() {
                event.preventDefault();
                console.log('hi');


                // $.get("./register_phpmail.php", function(data) {
                //     alert("Load was performed.");
                // });


                $.get("./register_phpmail.php", {
                        name: "童小姐",
                        email: "mmmh61raw@gmail.com"
                    })
                    .done(function(data) {
                        // alert('歡迎加入RAW！');
                    });
        })

    </script>



</body>

</html>