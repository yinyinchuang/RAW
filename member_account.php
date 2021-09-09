<?php require_once "db.inc.php"; ?>
<?php session_start() ?>
<?php if (!isset($_SESSION['email'])) {
    header("Location: singup_login_switch.php");
    exit();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-p/main-p.css">
    <link rel="stylesheet" href="./css/css-p/account.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!--地址  -->
    <!-- <script src="https://demeter.5fpro.com/tw/zipcode-selector.js"></script> -->

    <!-- birthdate -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<?php require_once 'tpl/head.inc.php' ?>

<div class="container a" style="display: flex;">
    <!-- 會員中心目錄 -->
    <div class="memberCenter">

        <a href="./member_account.php">
            <div class="list" style="background-color: rgba(188, 170, 154, .25)">我的資料</div>
        </a>
        <a href="./member_order.php">
            <div class="list">我的訂單</div>
        </a>
        <a href="./member_iamraw.php">
            <div class="list">我在赤著</div>
        </a>
        <a href="./member_upload.php">
            <div class="list">我的穿搭</div>
        </a>
        <!-- <a href="./member_search.php">
            <div class="list">我的搜尋</div>
        </a> -->
    </div>

    <!-- 主要資料區 -->
    <div class="" style="display: flex;flex-direction: column;">
        <div class="mainCorner " style="display: flex;">
            <?php

            // $account = 'haha@raw.com';
            $path = './img/RAW_images/member_' . $_SESSION['email'] . '.jpg';

            if (!file_exists($path)) {
                $path = './img/memberpic.png';
            }

            // if (!isset($_SESSION['email'])) { //確認登入與否
            //     $obj['info'] = '請先登入';
            // } else { //確認前端請求資料是否完整
            //新增商品追蹤的 SQL 語法
            $sql = "SELECT `email`, `name`, `address`, `phone`,  `birthdate`, `city`, `district`, `store`
            FROM `members`             
            WHERE `email` = '{$_SESSION['email']}'";

            //執行 SQL 語法
            $stmt = $pdo->query($sql);

            //判斷是否寫入資料
            if ($stmt->rowCount() > 0) {

                foreach ($stmt->fetchAll() as $obj1) {
                }
            }
            ?>

            <!-- 會員照片 -->
            <form id="uploadCustPic" class="avatar-upload" action="upload.php" method="post" enctype="multipart/form-data" onSubmit="return InputCheck(this)">
                <!-- <input type="file" name="my_file"> -->

                <div class="avatar-edit">

                    <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" class="imageUpload" name="my_file">
                    <!-- <input type="submit" value="upload"> -->
                    <label for="imageUpload"></label>
                </div>
                <!-- <input type="submit" value="Upload"> -->
                <div class="avatar-preview">
                    <div id="imagePreview" class="imagePreview" style="background-image:url(<?= $path ?>);">
                    </div>
                </div>
            </form>

            <div class="content" style="flex-direction: column;">

                <div class="name">姓名</div>
                <div class="phoneNumber">連絡電話</div>
                <div class="email">Email</div>
                <div class="birthday">生日</div>
                <div class="epaper">訂閱電子報</div>
            </div>






            <form class="memberInput" style="flex-direction: column;">
                <div class="nameBox"><input style="font-size: 20px; width:200px;height: 30px;" name="name" type="text" placeholder="請填寫姓名" autocomplete="off" id="nameBox" value=<?= $obj1['name'] ?>></div>
                <div class="phoneNumberBox"><input name="phone" type="text" placeholder="請填寫連絡電話" autocomplete="off" style="font-size: 20px; width:200px;height: 30px;" id="phoneNumberBox" value=<?= $obj1['phone'] ?>></div>
                <div class="emailBox"><input id="emailBox" type="text" value=<?= $obj1['email'] ?> style="font-size: 20px; width:200px;height: 30px;"> </div>
                <div class="birthdayBox"><input class="birthdate" type="text" placeholder="請選填生日" autocomplete="off" style="font-size: 20px; width:200px;height: 30px;" id="birthdayBox" value=<?= $obj1['birthdate'] ?>>
                </div>

                <div class="epaperBox" style="display: flex;">
                    <input id="radio-711pay" class="radio-custom" name="coupon-pay_group" type="checkbox" value="sub">
                    <label for="radio-711pay" class="radio-custom-label m_16">
                        <p>我要訂閱</p>
                    </label>
                    <input id="" class="radio-custom" name="coupon-pay_group" type="checkbox" value="unsub">
                    <label for="radio-711pay" class="radio-custom-label m_16">
                        <p>取消訂閱</p>
                    </label>
                </div>
            </form>

        </div>
        <div class="mainCorner">
            <div style="display: flex;">
                <div class="" style="width: 299px;height: 120px;border-left:1px solid #BCAA9A;text-align: center;line-height: 120px;font-size: 20px;">
                    收件地址
                </div>
                <div style="display: flex;flex-direction: column;">

                    <div style="display: flex;">
                        <div>
                            <div style="display: flex;">

                                <select id="city" placeholder="請選擇縣市" style="width: 297px;height: 60px;background-color:#FAFAFA;text-align-last:center;font-size: 20px;outline: none;border-color: #BCAA9A;" data-default="<?= $obj1['city'] ?>">

                                </select>
                                <select id="dist" placeholder="請選擇鄉鎮區" style="width: 297px;height: 60px;background-color:#FAFAFA;text-align-last:center;font-size: 20px;outline: none;border-color: #BCAA9A;" data-default="<?= $obj1['district'] ?>"></select>
                            </div>
                        </div>

                    </div>
                    <div class="addressBox" style="width: 594px;height: 60px;border-left: 1px solid #BCAA9A;"><input value="<?= $obj1['address'] ?>" type="text" name="address" placeholder="請填寫地址" autocomplete="off" id="addressBox">
                    </div>


                </div>
            </div>
            <div style="display: flex;">
                <div class="" style="width: 300px;height: 60px;border:1px solid #BCAA9A;text-align: center;line-height: 60px;font-size: 20px;">
                    常用超商門市
                </div>
                <div class="convenienceStore" style="width: 593px;height: 60px;">
                    <input value="<?= $obj1['store'] ?>" type=" text" name="convenienceStore" placeholder="請填寫常用超商門市" autocomplete="off" id="convenienceStore">
                </div>
            </div>

            <div style="display: flex;">
                <div class="pastCode" style="margin-top: 30px;">
                    舊密碼</div>
                <div class="pastCodeBox" style="margin-top: 30px"><input id="pastCodeBox" type="text" style="border:none"> </div>
            </div>

            <div style="display: flex;">
                <div class="newCode"> 新密碼</div>
                <div class="newCodeBox"><input id="newCodeBox1" type="text" style="border:none"></div>
            </div>

            <div style="display: flex;">
                <div class="checkCode">再次確認新密碼</div>
                <div class="checkCodeBox"><input id="newCodeBox2" type="text" style="border:none"></div>
            </div>

        </div>

        <div class=" mainCorner changeCodeButton1">
            <div class="changeCodeButton1" style="display: flex;justify-content: flex-end;">

                <div class="changeCode" style="margin-right: 30px;cursor:pointer">變更密碼</div>


                <button id="memberSend" class="send" style="background-color: #BCAA9A;color: #FAFAFA;cursor:pointer">送出</button>

            </div>
        </div>
        <div class="maincorner changeCodeButton2">
            <div class="changeCodeButton2" style="display: flex;justify-content: flex-end;">

                <div class="cancelChangeCode" style="margin-right: 30px;cursor:pointer">取消變更密碼</div>


                <button id="pwdSend" class="send" style="background-color: #BCAA9A;color: #FAFAFA;cursor:pointer">送出</button>

            </div>
        </div>
    </div>
</div>

<div class="showup_box_300x150" id="showup_box_300x150p" style="z-index: 999;">
    <p>已更新</p>
    <button class="showup_box_button_300x150">確定</button>
</div>
<script>
    $("#showup_box_300x150p").click(function() {
        $("#showup_box_300x150p").hide();
    })
</script>



<!-- RWD -->
<div class="mainCornerRWD">
    <div class="mainCornerRWD">
        <div class="pc_dn_select">
            <select id="myselect" class="container select_title_box">
                <option value="member_account">我的資料</option>
                <option value="member_order">我的訂單</option>
                <option value="member_iamRAW">我在赤著</option>
                <option value="member_upload">我的穿搭</option>
                <!-- <option value="member_search">我的搜尋</option> -->
            </select>
        </div>

        <!-- 會員照片 -->
        <div class="avatar-uploadRWD">
            <div class="avatar-editRWD">
                <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" class="imageUpload" />
                <label for="imageUpload"></label>
            </div>
            <div class="avatar-previewRWD">
                <div id="imagePreview" class="imagePreview" style="background-image:url(<?= $path ?>);">
                </div>
            </div>
        </div>

        <div class="" style="display: flex;">
            <div class="contentRWD" style="flex-direction: column;">
                <div class="nameRWD">姓名</div>
                <div class="phoneNumberRWD">連絡電話</div>
                <div class="emailRWD">Email</div>
                <div class="birthdayRWD">生日</div>
                <div class="epaperRWD">訂閱電子報</div>
            </div>


            <form class="memberInputRWD" style="flex-direction: column;">
                <div class="nameBoxRWD"><input class="inputRWD" type="text" style="font-size: 14px;" name="name" placeholder="請填寫姓名" autocomplete="off" id="nameBoxRWD" value=<?= $obj1['name'] ?>></div>
                <div class="phoneNumberBoxRWD"><input name="phone" type="text" placeholder="請填寫連絡電話" autocomplete="off" class="inputRWD" style="font-size: 14px;" id="phoneNumberBoxRWD" value=<?= $obj1['phone'] ?>></div>
                <div class="emailBoxRWD"><input id="emailBoxRWD" type="text" value=<?= $obj1['email'] ?> style="font-size: 14px;"></div>
                <div class="birthdayBoxRWD"><input id="birthdate" placeholder="請選填生日" autocomplete="off" class="inputRWD birthdate" type="text" style="font-size: 14px;" id="birthdayBoxRWD" value=<?= $obj1['birthdate'] ?>></div>

                <div class="epaperBoxRWD" style="display: flex;">

                    <input id="radio-711pay" class="radio-custom" name="coupon-pay_group" type="checkbox" value="sub" checked="checked">
                    <label for="radio-711pay" class="radio-custom-label m_16">
                        <p style="margin-left:-10px">我要訂閱</p>
                    </label>
                    <input id="" class="radio-custom" name="coupon-pay_group" type="checkbox" value="unsub">
                    <label for="radio-711pay" class="radio-custom-label" style="margin-left:12px">
                        <p style="margin-left:-10px">取消訂閱</p>
                    </label>

                </div>
            </form>

        </div>
    </div>
    <div class="mainCornerRWD">
        <div style="display: flex;">
            <div class="" style="width: 125px;height: 78px;border-left:1px solid #BCAA9A;border-top: 1px solid #BCAA9A;text-align: center;line-height: 77px;font-size: 14px;margin-left: 15px;">
                收件地址
            </div>
            <div style="display: flex;flex-direction: column;">

                <div>
                    <div class="js-demeter-tw-zipcode-selector" data-city="#city" data-dist="#dist" style="display:flex;height: 37px;background-color:#FAFAFA;text-align-last:center">

                        <select id="city1" placeholder="請選擇縣市" style="width: 110px;height: 37px;background-color:#FAFAFA;text-align-last:center;outline: none;border-color: #BCAA9A;" data-default="<?= $obj1['city'] ?>"></select>

                        <select id="dist1" placeholder="請選擇鄉鎮區" style="width: 110px;height: 37px;background-color:#FAFAFA;text-align-last:center;outline: none;border-color: #BCAA9A;" data-default="<?= $obj1['district'] ?>"></select>
                    </div>
                </div>

                <div class="addressBoxRWD" style="width: 220px;height: 40px;"><input value="<?= $obj1['address'] ?>" type=" text" name="address" placeholder="請填寫地址" autocomplete="off" style="font-size: 8px;width:200px;margin-left:-10px;" id="addressBoxRWD">

                </div>
            </div>
        </div>
        <div style="display: flex;">
            <div class="convenienceStoreRWD" style="width: 126px;height: 60px;border:1px solid #BCAA9A;text-align: center;line-height: 60px;font-size: 14px;margin-left: 15px;">
                <p> 常用超商門市 </p>
            </div>
            <div class="convenienceStoreBoxRWD" style="width: 219px;height: 60px;border-bottom:1px solid #BCAA9A;border-top:1px solid #BCAA9A;line-height: 60px;">
                <input value="<?= $obj1['store'] ?>" type="text" name="convenienceStore" placeholder="請填寫常用超商門市" autocomplete="off" id="convenienceStoreBoxRWD" style="font-size: 8px;width:200px;margin-left:-10px;">
            </div>
        </div>

        <div style="display: flex;">
            <div class="pastCodeRWD" style="margin-top: 15px;">
                舊密碼</div>
            <div class="pastCodeBoxRWD" style="margin-top: 15px"><input type="text" style="border:none;font-size: 14px;"></div>
        </div>

        <div style="display: flex;">
            <div class="newCodeRWD"> 新密碼</div>
            <div class="newCodeBoxRWD"><input type="text" style="border:none;font-size: 14px;"></div>
        </div>

        <div style="display: flex;">
            <div class="checkCodeRWD">再次確認新密碼</div>
            <div class="checkCodeBoxRWD"><input type="text" style="border:none;font-size: 14px;"></div>
        </div>

    </div>

    <div class="mainCornerRWD changeCodeButton1RWD">
        <div class="changeCodeButton1RWD" style="display: flex;">

            <div class="changeCodeRWD" style="margin: 15px;cursor:pointer;color:#BCAA9A">變更密碼</div>

            <button id="memberSendRWD" class="sendRWD" style="background-color: #BCAA9A;cursor:pointer;color:#FAFAFA">送出

            </button>

        </div>
    </div>
    <div class="mainCornerRWD changeCodeButton2RWD">
        <div class="changeCodeButton2RWD" style="display: flex;justify-content: flex-end;">

            <div class="cancelChangeCodeRWD" style="margin-right: 15px;cursor:pointer">
                <p class="cancelChangeCodeRWDp" style="font-size: 14px;"> 取消變更密碼 </p>
            </div>

            <button class="sendRWD membersend" style="background-color: #BCAA9A;color: #FAFAFA;margin-right: 15px;cursor:pointer">
                <p style="font-size: 14px;color: #FAFAFA;">送出</p>
            </button>
        </div>
    </div>
</div>
<?php require_once 'tpl/foot.inc.php' ?>
<!-- 自動填入資料 -->
<script>
    $("#nameBox").click(function() {
        console.log("hi")
        $("#nameBox").val("小童童");
        $("#phoneNumberBox").val("0999888666");
        $("#birthdayBox").val("2021-08-21");
        $("#addressBox").val("復興南路一段390號2樓");
        $("#convenienceStore").val("大安門市");
    })
</script>
<script>
    $("#nameBoxRWD").click(function() {
        console.log("hi")
        $("#nameBoxRWD").val("小童童");
        $("#phoneNumberBoxRWD").val("0999888666");
        $("#birthdate").val("2021-08-21");
        $("#addressBoxRWD").val("復興南路一段390號2樓");
        $("#convenienceStoreBoxRWD").val("大安門市");
    })
</script>





<script>
    //選擇生日

    $(".birthdate").datepicker({
        dateFormat: "yy-mm-dd"
    })
</script>



<script>
    // 照片上傳
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {

                $('.imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('.imagePreview').hide();
                $('.imagePreview').fadeIn(650);


            }
            reader.readAsDataURL(input.files[0]);
            // alert("here:" + input.files[0]);
            var form_data = new FormData();
            form_data.append('my_file', input.files[0]);

            // 傳入後端儲存
            $.ajax({
                url: "upload.php",
                cache: false,
                contentType: false,
                processData: false,
                data: form_data, //data只能指定單一物件                 
                type: 'post',
                success: function(obj) {
                    var prodImgs = obj['aryImgs'];
                    // alert("arryImsg:" + prodImgs);

                    var arrImg = $('.colorCloth');
                    //alert("img.length" + arrImg.length);
                    for (var i = 0; i < arrImg.length; i++) {
                        //arrImg[i].src = prodImgs[i];
                        // alert("arrImg[i].src" + arrImg[i].innerHTML);
                        arrImg[i].innerHTML = "<img src='RAW_images/" + prodImgs[i] + "' alt='' style='width: 145px;margin:0 auto;align-items:center'>";
                    }

                },
                error: function() {
                    alert('error');
                }
            });


        }
    }
    $(".imageUpload").change(function() {
        readURL(this);

    });

    // 更改密碼收合
    $(".changeCode").click(function() {
        $(".pastCode").show();
        $(".newCode").show();
        $(".checkCode").show();
        $(".pastCodeBox").show();
        $(".newCodeBox").show();
        $(".checkCodeBox").show();
        $(".changeCodeButton1").hide();
        $(".changeCodeButton2").show();
    });

    $(".cancelChangeCode").click(function() {
        $(".changeCodeButton2").hide();
        $(".changeCodeButton1").show();
        $(".pastCode").hide();
        $(".newCode").hide();
        $(".checkCode").hide();
        $(".pastCodeBox").hide();
        $(".newCodeBox").hide();
        $(".checkCodeBox").hide();

    })

    $(".changeCodeRWD").click(function() {
        $(".pastCodeRWD").show();
        $(".newCodeRWD").show();
        $(".checkCodeRWD").show();
        $(".pastCodeBoxRWD").show();
        $(".newCodeBoxRWD").show();
        $(".checkCodeBoxRWD").show();
        $(".changeCodeButton1RWD").hide();
        $(".changeCodeButton2RWD").show();
    });

    $(".cancelChangeCodeRWD").click(function() {
        $(".changeCodeButton2RWD").hide();
        $(".changeCodeButton1RWD").show();
        $(".pastCodeRWD").hide();
        $(".newCodeRWD").hide();
        $(".checkCodeRWD").hide();
        $(".pastCodeBoxRWD").hide();
        $(".newCodeBoxRWD").hide();
        $(".checkCodeBoxRWD").hide();

    })
</script>
<script>
    $('#myselect').each(function() {

        // Cache the number of options
        var $this = $(this),
            numberOfOptions = $(this).children('option').length;

        // Hides the select element
        $this.addClass('s-hidden');

        // Wrap the select element in a div
        $this.wrap('<div class="select"></div>');

        // Insert a styled div to sit over the top of the hidden select element
        $this.after('<div class="styledSelect"</div>');

        // Cache the styled div
        var $styledSelect = $this.next('div.styledSelect');

        // Show the first select option in the styled div
        $styledSelect.text($this.children('option').eq(0).text());

        // Insert an unordered list after the styled div and also cache the list
        var $list = $('<ul/>', {
            'class': 'options'
        }).insertAfter($styledSelect);

        // Insert a list item into the unordered list for each select option
        for (var i = 0; i < numberOfOptions; i++) {
            // $('<li />', {
            //     text: $this.children('option').eq(i).text(),
            //     rel: $this.children('option').eq(i).val()
            // }).appendTo($list);
            $('<a />', {
                text: $this.children('option').eq(i).text(),
                href: $this.children('option').eq(i).val().toLowerCase() + '.php'
            }).appendTo($list);
        }

        // Cache the list items
        var $listItems = $list.children('li');

        // Show the unordered list when the styled div is clicked (also hides it if the div is clicked again)
        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.styledSelect.active').each(function() {
                $(this).removeClass('active').next('ul.options').hide();
            });
            $(this).toggleClass('active').next('ul.options').toggle();
        });

        // Hides the unordered list when a list item is clicked and updates the styled div to show the selected list item
        // Updates the select element to have the value of the equivalent option
        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            /* alert($this.val()); Uncomment this for demonstration! */
        });

        // Hides the unordered list when clicking outside of it
        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });
</script>
<script>
    // member-member add_new_card
    $('#add_my_new_card').click(function(event) {
        $('.add_new_card').toggleClass('open');
        $('#add_my_new_card').toggleClass('open');
    });
    $('#add_new_card_close').click(function(event) {
        $('.add_new_card').toggleClass('open');
        $('#add_my_new_card').toggleClass('open');
    });
    $('#add_new_card_save').click(function(event) {
        $('.add_new_card').toggleClass('open');
        $('#add_my_new_card').toggleClass('open');
    });

    // member-member change_myheight
    $('#change_my_height').click(function(event) {
        $('.change_myheight').toggleClass('open');
        $('#change_my_height').toggleClass('open');
    });
    $('#change_my_height_close').click(function(event) {
        $('.change_myheight').toggleClass('open');
        $('#change_my_height').toggleClass('open');
    });
    $('#change_my_height_save').click(function(event) {
        $('.change_myheight').toggleClass('open');
        $('#change_my_height').toggleClass('open');
    });


    // member-member lightbox open and close
    $('.add_new_card_prod').click(function(event) {
        $('.add_new_card_lightbox_container').toggleClass('open');
        $('.lightbox_background').toggleClass('open');
    });
    $('#add_new_lightbox_close').click(function(event) {
        $('.add_new_card_lightbox_container').toggleClass('open');
        $('.lightbox_background').toggleClass('open');
    });
    $('#add_new_lightbox_save').click(function(event) {
        $('.add_new_card_lightbox_container').toggleClass('open');
        $('.lightbox_background').toggleClass('open');
    });
    $('.lightbox_background').click(function(event) {
        $('.add_new_card_lightbox_container').toggleClass('open');
        $('.lightbox_background').toggleClass('open');
    });

    // lookbook_lightbox
    $('.lookbook_photo_card').click(function(event) {
        $('.lookbook_lightbox_container').toggleClass('open');
        $('.lightbox_background').toggleClass('open');
    });
    $('.lookbook_lightbox_close').click(function(event) {
        $('.lookbook_lightbox_container').toggleClass('open');
        $('.lightbox_background').toggleClass('open');
    });
    $('.lightbox_background').click(function(event) {
        $('.lookbook_lightbox_container').toggleClass('open');
        // .lightbox_background沒加上消失 是因上面有寫過了 重複寫會有問題
    });

    // member_photo
    $('.member_photo_card').click(function(event) {
        $('.lookbook_lightbox_container').toggleClass('open');
        $('.lightbox_background').toggleClass('open');
    });


    // rwd 側拉nav
    const navMenu = document.getElementById('nav-menu'),
        navToggle = document.getElementById('nav-toggle')
    // navClose = document.getElementById('nav-close'),
    // hamburger = document.getElementsByClassName('hamburger_box')
    // hamburger.onclick = function() {
    //     hamburger.classList.toggle('active');
    // }
    if (navToggle) {
        navToggle.addEventListener('click', () => {
            navMenu.classList.toggle('show-menu'),
                navToggle.classList.toggle('active');
        })
    }

    // if (navClose) {
    //     navClose.addEventListener('click', () => {
    //         navMenu.classList.remove('show-menu')
    //     })
    // }

    // footer plus show and hide
    $("#footer-aboutus").click(function() {
        $(".footer_aboutus").slideToggle("footer_show");
        $(".footer_info").slideUp("footer_show");
        $(".footer_faq").slideUp("footer_show");
        $("#footer-aboutus").slideUp("footer_plus_none");
        $("#footer-aboutus-close").slideDown("footer_show");
        $("#footer-info").slideDown("footer_plus_none");
        $("#footer-info-close").slideUp("footer_show");
        $("#footer-faq").slideDown("footer_plus_none");
        $("#footer-faq-close").slideUp("footer_show");
    });
    $("#footer-aboutus-close").click(function() {
        $(".footer_aboutus").slideUp("footer_show");
        $("#footer-aboutus").slideDown("footer_plus_none");
        $("#footer-aboutus-close").slideUp("footer_show");
    });
    $("#footer-info").click(function() {
        $(".footer_aboutus").slideUp("footer_show");
        $(".footer_info").slideDown("footer_show");
        $(".footer_faq").slideUp("footer_show");
        $("#footer-aboutus").slideDown("footer_plus_none");
        $("#footer-aboutus-close").slideUp("footer_show");
        $("#footer-info").slideUp("footer_plus_none");
        $("#footer-info-close").slideDown("footer_show");
        $("#footer-faq").slideDown("footer_plus_none");
        $("#footer-faq-close").slideUp("footer_show");
    });
    $("#footer-info-close").click(function() {
        $(".footer_info").slideUp("footer_show");
        $("#footer-info").slideDown("footer_plus_none");
        $("#footer-info-close").slideUp("footer_show");
    });
    $("#footer-faq").click(function() {
        $(".footer_aboutus").slideUp("footer_show");
        $(".footer_info").slideUp("footer_show");
        $(".footer_faq").slideDown("footer_show");
        $("#footer-aboutus").slideDown("footer_plus_none");
        $("#footer-aboutus-close").slideUp("footer_show");
        $("#footer-info").slideDown("footer_plus_none");
        $("#footer-info-close").slideUp("footer_show");
        $("#footer-faq").slideUp("footer_plus_none");
        $("#footer-faq-close").slideDown("footer_show");
    });
    $("#footer-faq-close").click(function() {
        $(".footer_faq").slideUp("footer_show");
        $("#footer-faq").slideDown("footer_plus_none");
        $("#footer-faq-close").slideUp("footer_show");
    });

    $("#open-cart-at-right").click(function() {
        $(".cart_at_right").addClass("show-cart");
        $('.lightbox_background').addClass('open');
    });

    $("#close-cart-at-right").click(function() {
        $(".cart_at_right").removeClass("show-cart");
        $('.lightbox_background').removeClass('open');
    });
    $("#open-cart-at-right-rwd").click(function() {
        $(".cart_at_right").addClass("show-cart");
        $('.lightbox_background').addClass('open');
    });
</script>





<!-- <script src="https://demeter.5fpro.com/tw/zipcode-selector.js"></script> -->

<!-- birthdate -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- fontawesome -->

<script src="https://kit.fontawesome.com/f56e5ae7a8.js" crossorigin="anonymous"></script>
<script src="./js/js-p/custom.js"></script>


<script>
    $.ajax({
        url: "https://demeter.5fpro.com/tw/zipcode/cities.json",
        async: !1,
        success: function(e) {
            // console.log('e', e);
            e.forEach(element => {
                // console.log('name', element.name);
                console.log('city', $('#city').data('default'));
                $('#city').append(`<option value="${element.name}" ${(element.name == $('#city').data('default'))?'selected="selected"':''}>${element.name}</option>`);

                if (element.name == $('#city').data('default')) {
                    $.ajax({
                        url: element.zipcodes_endpoint,
                        async: !1,
                        success: function(e) {
                            // console.log('e', e);


                            e.forEach(element => {
                                // console.log('name', element.name);
                                $('#dist').append(`<option value="${element.name}" ${(element.name == $('#dist').data('default'))?'selected="selected"':''}>${element.name}</option>`);
                            });
                        }
                    })
                }


            });
        }
    })

    $('#city').change(function() {
        console.log('hi', $('#city').val());

        $.ajax({
            url: "https://demeter.5fpro.com/tw/zipcode/cities.json",
            async: !1,
            success: function(e) {
                e.forEach(element => {
                    if (element.name == $('#city').val()) {
                        $.ajax({
                            url: element.zipcodes_endpoint,
                            async: !1,
                            success: function(e) {

                                $('#dist').html('');
                                e.forEach(element => {
                                    // console.log('name', element.name);
                                    $('#dist').append(`<option value="${element.name}" ${(element.name == $('#dist').data('default'))?'selected="selected"':''}>${element.name}</option>`);
                                });
                            }
                        })
                    }
                });
            }
        })
    })
</script>



<!-- RWD地址選項 -->
<script>
    $.ajax({
        url: "https://demeter.5fpro.com/tw/zipcode/cities.json",
        async: !1,
        success: function(e) {
            // console.log('e', e);
            e.forEach(element => {
                // console.log('name', element.name);
                console.log('city1', $('#city1').data('default'));
                $('#city1').append(`<option value="${element.name}" ${(element.name == $('#city1').data('default'))?'selected="selected"':''}>${element.name}</option>`);

                if (element.name == $('#city1').data('default')) {
                    $.ajax({
                        url: element.zipcodes_endpoint,
                        async: !1,
                        success: function(e) {
                            // console.log('e', e);

                            e.forEach(element => {
                                // console.log('name', element.name);
                                $('#dist1').append(`<option value="${element.name}" ${(element.name == $('#dist1').data('default'))?'selected="selected"':''}>${element.name}</option>`);
                            });
                        }
                    })
                }
            });
        }
    })

    $('#city1').change(function() {
        console.log('hi', $('#city1').val());

        $.ajax({
            url: "https://demeter.5fpro.com/tw/zipcode/cities.json",
            async: !1,
            success: function(e) {
                e.forEach(element => {
                    if (element.name == $('#city1').val()) {
                        $.ajax({
                            url: element.zipcodes_endpoint,
                            async: !1,
                            success: function(e) {

                                $('#dist1').html('');
                                e.forEach(element => {
                                    // console.log('name', element.name);
                                    $('#dist1').append(`<option value="${element.name}" ${(element.name == $('#dist1').data('default'))?'selected="selected"':''}>${element.name}</option>`);
                                });
                            }
                        })
                    }
                });
            }
        })
    })
</script>
<script>
    //更改會員密碼
    $('button#pwdSend').click(function() {
        //避免元素的預設事件被觸發
        // event.preventDefault();

        console.log("change pwd");
        //各自將 input 帶入變數中    
        let input_email = $('input#emailBox');
        let input_pastCode = $('input#pastCodeBox');
        let input_newCode1 = $('input#newCodeBox1');
        let input_newCode2 = $('input#newCodeBox2');

        // let input_address = $('input#addressBox');
        console.log(input_email.val() + "," + input_pastCode.val() + "," + input_newCode1.val() + "," + input_newCode2.val());

        if (input_newCode1.val() != input_newCode2.val()) {
            alert('輸入的新密碼不一致, 請重新輸人!');
            return false;
        }

        //送出 post 請求，註冊帳號
        let objUser = {
            email: input_email.val(),
            pastPWD: input_pastCode.val(),
            newPWD: input_newCode1.val()
        };
        $.post("updatePWD.php", objUser, function(obj) {
            if (obj['success']) {
                //關閉 modal
                // $('div#exampleModal').hide();

                //成功訊息
                // alert('密碼修改成功');


                //當成功訊息執行同時，等數秒後，執行自訂程式

                setTimeout(function() {

                    location.reload();
                }, 2000);
            } else {
                alert(`${obj['info']}`);
            }
            console.log(obj);
        }, 'json')

        $("#showup_box_300x150p").show();
    });
</script>



</body>

</html>