<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>更改密碼</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-yen/login_yen.css">
    <style>
        .changebtn_click {
            height: 300px;
            position: absolute;
            right: 23%;
            top: 200px;
        }

        .changebtn_click img {
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
        <div class="change_pasword_h_box">
            <h1 class="change_pasword_h">更改密碼</h1>
        </div>

        <div class="loginbox">
            <div class="singUpinput_box">
                <p class="singUp_input_p" id="change_password_singUp_input_p">密碼</p>
            </div>
            <div class="passwordbox" style="margin-bottom: 32px;">
                <input type="password" class="codeinputwrap" value="" id="myInput" placeholder="輸入密碼">
                <div class="open_eye">
                    <input type="image" onclick="myFunction()" src="./svg/eye-off.svg" id="password_open_eye_svg">
                </div>
            </div>
        </div>

        <div class="loginbox">
            <div class="singUpinput_box">
                <p class="singUp_input_p" id="change_password_singUp_input_p">密碼</p>
            </div>
            <div class="passwordbox" style="margin-bottom: 32px;">
                <input type="password" class="codeinputwrap" value="" id="myInput2" placeholder="再次輸入密碼">
                <div class="open_eye">
                    <input type="image" onclick="myFunction2()" src="./svg/eye-off.svg" id="password_open_eye_svg2">
                </div>
            </div>
        </div>

        <div class="loginbox_btn">

            <!-- <a class="login_btn" href="./singup_login_switch.php" id="change_password_sure_btn">確定</a> -->
            <button class="login_btn" type="submit" id="change_password_btn_sure" href="./singup_login_switch.php">確定</button>
        </div>

        <button type="button" class="changebtn_click" style="border: none;">
            <img src="./img/changepic.png" alt="">
        </button>

    </div>
    <div class="showup_box_300x150" id="showup_box_change">
        <p>修改成功</p>
        <button class="showup_box_button_300x150 changebutton" data-target="#show_box_change">確定</button>
    </div>

    <?php require_once 'tpl/foot.inc.php' ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./js/main.js"></script>
    <script src="./js/js-yen/singup_login.js"></script>
    <script src="https://kit.fontawesome.com/f56e5ae7a8.js" crossorigin="anonymous"></script>


    <script>
        $('#change_password_btn_sure').click(function() {
            event.preventDefault();
            console.log('hi');


            // $.get("./phpmail.php", function(data) {
            //     alert("Load was performed.");
            // });


            $.post("./change_password_api.php", {
                    email: "mmmh61raw@gmail.com", //先寫死
                    password: $('input.codeinputwrap').val()
                })
                .done(function(data) {
                    // alert('修改成功！');
                    $('#showup_box_change').show();
                    // window.location.href="singup_login_switch.php";
                    setTimeout("window.location.href='singup_login_switch.php'", 2000);
                    // setTimeout(function() {
                    //     location.href('singup_login_switch.php');
                    // }, 1000);
                });
            // window.location.href="singup_login_switch.php";
            //     setTimeout("window.location.href='singup_login_switch.php'",9000); 
        })

        $('.changebutton').click(function() {
            console.log('id:', $(this).data('target'));
            $($(this).data('target')).hide();
        });
    </script>

</body>

</html>