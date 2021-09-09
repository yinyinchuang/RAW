<?php require_once "db.inc.php" ?>
<?php session_start() ?>

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
    <link rel="stylesheet" href="./css/css-p/iamRAW.css">

    <!-- 進度條 -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

</head>

<?php require_once 'tpl/head.inc.php' ?>
<!-- content -->
<div class="container" style="display: flex;">
    <!-- 會員中心目錄 -->
    <div class="memberCenter">

        <a href="./member_account.php">
            <div class="list">我的資料</div>
        </a>
        <a href="./member_order.php">
            <div class="list">我的訂單</div>
        </a>
        <a href="./member_iamraw.php">
            <div class="list" style="background-color: rgba(188, 170, 154, .25)">我在赤著</div>
        </a>
        <a href="./member_upload.php">
            <div class="list">我的穿搭</div>
        </a>
        <!-- <a href="./member_search.php">
            <div class="list">我的搜尋</div>
        </a> -->
    </div>

    <?php
    $sql = "SELECT `members`.`name`, `create_at`, `member_level`,`color_code`, `prod_5pic`, `orders`.`order_id` , `members`.`email`,
    (SELECT SUM(`total_final`) FROM `orders` WHERE `orders`.`email` = '{$_SESSION['email']}') as totalFinal
    FROM `members`
    LEFT JOIN `orders` ON `orders`.`email` = `members`.`email`
    LEFT JOIN  orders_detail ON orders_detail.order_id = orders.order_id
    LEFT JOIN  products ON orders_detail.prod_id = products.prod_id
    WHERE `members`.`email` = '{$_SESSION['email']}'";



    //執行 SQL 語法
    $stmt = $pdo->query($sql);

    //判斷是否寫入資料
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $obj) {
        }
    }
    ?>

    <!-- 主要資料區 -->
    <div class="mainCorner" style="flex-direction: column;">
        <div class="bookmark">會員等級</div>
        <div class="memberCard">

            <p>會員姓名： <?= $obj['name'] ?> </p>
            <p>加入日期： <?= $obj['create_at'] ?> </p>


            <div style="display:flex;flex-direction: column;">
                <div class="progress-bar" style="--width: 10;margin: 30px auto;" data-label=""></div>
                <div style="margin: 30px auto;"> </div>
                <p style="text-align:center">目前消費累積金額：NT. <?= number_format($obj['totalFinal']) ?> </p>
            </div>

        </div>






        <div class="bookmark">色票集章</div>
        <div class="memberCard">

            <div style="display: flex;justify-content: center;">

                <div class="colorRoundGroup">

                    <div style="display: flex; flex-wrap:wrap; width:250px;">

                        <?php
                        $sql = "SELECT `members`.`name`, `create_at`, `sum`, `member_level`,`color_code`, `prod_5pic`,  `prod_1pic`,`orders`.`order_id` , `members`.`email`
                        FROM `members`
                        INNER JOIN `orders` ON `orders`.`email` = `members`.`email`
                        INNER JOIN  orders_detail ON orders_detail.order_id = orders.order_id
                        INNER JOIN  products ON orders_detail.prod_id = products.prod_id
                        WHERE `members`.`email` = '{$_SESSION['email']}'
                        ";

                        //執行 SQL 語法
                        $stmt = $pdo->query($sql);

                        //判斷是否寫入資料
                        if ($stmt->rowCount() > 0) {
                            foreach ($stmt->fetchAll() as $obj1) {

                        ?>

                                <div class="colorBall" id="colorball1" style="background-color:<?= $obj1['color_code'] ?>;"></div>
                        <?php
                            }
                        }

                        ?>
                        <div class="colorBall" id="7D7463" style="background-color:"></div>
                        <div class="colorBall" id="C29779" style="background-color:"></div>
                        <div class="colorBall" id="A76350" style="background-color:"></div>
                    </div>
                    <!-- <div style="display: flex;">
                        <div class="colorBall" id="ACA394"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                    </div>
                    <div style="display: flex;">
                        <div class="colorBall" id="ACA394"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                    </div>
                    <div style="display: flex;padding-bottom: 15px;">
                        <div class="colorBall" id="ACA394"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                        <div class="colorBall"></div>
                    </div> -->


                </div>
                <div class="colorClothGroup" style="display: flex;">

                    <div id="colorCloth1" class="colorCloth" style="display: flex;">
                        <img src="RAW_images/" alt="" style="width: 145px;margin:0 auto;align-items:center">
                    </div>
                    <div id="colorCloth2" class="colorCloth" style="display: flex;">
                        <img src="RAW_images/" alt="" style="width: 145px;margin:0 auto;align-items:center">
                    </div>

                </div>
            </div>
            <div class="couponButton">努力集滿20個顏色吧</div>
        </div>



        <div class="bookmark">消費折抵</div>
        <div class="memberCard">
            <div class="coupon">
                <div class="couponTop">
                    <div style="margin: 15px;">
                        <h3>NT.100</h3>
                        <h4>有效期限:2021.12.31</h4>
                    </div>
                </div>
                <div class="couponBottom">
                    <div style="padding: 15px;">
                        <h3>新會員優惠</h3>[已使用]
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>

<!-- RWD -->
<div class="mainCornerRWD" style="flex-direction: column;">

    <!-- <div class="container title_box">
            <a href="./account.html" class="title_box4"></a>
            <a href="./order.html" class="title_box4 title_box_active"></a>
            <a href="./iamRAW.html" class="title_box4"></a>
            <a href="./member.html" class="title_box4"></a>
            <a href="./earch.html" class="title_box4"></a>
        </div> -->
    <div class="pc_dn_select">
        <select id="myselect" class="container select_title_box">
            <option value="member_iamraw">我在赤著</option>
            <option value="member_account">我的資料</option>
            <option value="member_order">我的訂單</option>
            <option value="member_upload">我的穿搭</option>
            <!-- <option value="member_search">我的搜尋</option> -->
        </select>
    </div>
    <div class="bookmarkRWD">會員等級</div>
    <div class="memberCardRWD">

        <div id="donut" data-donut="70" style="margin-top: 30px;text-align: center;">
        </div>

        <div style="margin-top: 15px;text-align: center">
            <p>下一個會員等級： 白金</p>
            <p>會員姓名： <?= $obj1['name'] ?> </p>
            <p>加入日期： <?= $obj1['create_at'] ?> </p>
        </div>
    </div>

    <div class="bookmarkRWD">色票集章</div>
    <div class="memberCardRWD">
        <div style="display: flex;justify-content: center;">
            <div class="colorRoundGroupRWD">
                <div style="display: flex;">
                    <div class="colorBallRWD" id="ACA394" style="background-color: #ACA394;"></div>
                    <div class="colorBallRWD" id="7D7463" style="background-color: #7D7463;"></div>
                    <div class="colorBallRWD" id="C29779" style="background-color:"></div>
                    <div class="colorBallRWD" id="A76350" style="background-color:"></div>
                    <div class="colorBallRWD" id="C19280" style="background-color:"></div>
                </div>
                <div style="display: flex;">
                    <div class="colorBallRWD" id="ACA394"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                </div>
                <div style="display: flex;">
                    <div class="colorBallRWD" id="ACA394"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                </div>
                <div style="display: flex;padding-bottom: 15px;">
                    <div class="colorBallRWD" id="ACA394"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                    <div class="colorBallRWD"></div>
                </div>
                <div class="couponButtonRWD">努力集滿20個顏色吧</div>
            </div>

        </div>

    </div>


    <div class="bookmarkRWD">消費折抵</div>
    <div class="memberCardRWD">
        <div class="couponRWD">
            <div class="couponTopRWD">
                <div style="margin: 12px;">
                    <h3 style="font-size: 14px">NT.100</h3>
                    <h4 style="font-size: 10px">有效期限:2021.12.31</h4>
                </div>
            </div>
            <div class="couponBottomRWD">
                <div style="padding: 15px;">
                    <h3 style="font-size: 10px;">新會員優惠 [已使用]</h3>
                </div>
            </div>
        </div>
    </div>


</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://d3js.org/d3.v3.min.js"></script>


<!-- 點選color -->
<script>
    $(".colorBall").click(function(event) {

        console.log($(this).css('background-color'));
        var str = [];
        var rgb = $(this).css('background-color').split('(');
        for (var k = 0; k < 3; k++) {
            str[k] = parseInt(rgb[1].split(',')[k]).toString(16);
            console.log(str[k]);
        }
        str1 = '#' + str[0] + str[1] + str[2];


        let objUser = {
            email: "{$_SEESION['email']}",
            colorCode: str1,
        };
        // 傳入後端儲存
        $.ajax({
            url: "queryProd.php",
            type: "POST",

            data: {
                email: "{$_SEESION['email']}",
                colorCode: str1
            },
            dataType: "json",
            success: function(obj) {
                var prodImgs = obj['aryImgs'];
                // alert("arryImsg:" + prodImgs);
                var prodImgs2 = obj['aryImgs2'];
                var arrImg = $('#colorCloth1');
                //alert("img.length" + arrImg.length);
                for (var i = 0; i < arrImg.length; i++) {
                    //arrImg[i].src = prodImgs[i];
                    // alert("arrImg[i].src" + arrImg[i].innerHTML);
                    arrImg[i].innerHTML = "<img src='img/RAW_images/" + prodImgs[i] + "' alt='' style='width: 145px;margin:0 auto;align-items:center'>";
                }
                var arrImg2 = $('#colorCloth2');
                //alert("img.length" + arrImg.length);
                for (var i = 0; i < arrImg2.length; i++) {
                    //arrImg[i].src = prodImgs[i];
                    // alert("arrImg[i].src" + arrImg[i].innerHTML);
                    arrImg2[i].innerHTML = "<img src='img/RAW_images/" + prodImgs2[i] + "' alt='' style='width: 145px;margin:0 auto;align-items:center'>";
                }

            },
            error: function() {
                alert('error');
            }
        });



        // $.post("queryProd.php", objUser, function(obj) {
        //     if (obj['success']) {
        //         var prodImgs = obj['aryImgs'];
        //         //alert("eee" + prodImgs);

        //         var arrImg = $('.colorCloth');
        //         //alert("img.length" + arrImg.length);
        //         for (var i = 0; i < arrImg.length; i++) {
        //             //arrImg[i].src = prodImgs[i];
        //             alert("arrImg[i].src" + arrImg[i].innerHTML);
        //             arrImg[i].innerHTML = "<img src='RAW_images/002-1-5.jpg' alt='' style='width: 145px;margin:0 auto;align-items:center'>";
        //         }




        //         //關閉 modal
        //         // $('div#exampleModal').hide();

        //         //成功訊息
        //         // alert('註冊成功');

        //         //當成功訊息執行同時，等數秒後，執行自訂程式
        //         setTimeout(function() {
        //             location.reload();
        //         }, 1000);
        //     } else {
        //         alert(`${obj['info']}`);
        //     }
        //     console.log(obj);
        // }, 'json')



    })

    function getDefaultStyle(obj, attribute) {
        return obj.currentStyle ? obj.currentStyle[attribute] : document.defaultView.getComputedStyle(obj, false)[attribute];

    }
</script>








<script>
    var duration = 500,
        transition = 200;

    drawDonutChart(
        '#donut',
        $('#donut').data('donut'),
        100,
        100,
        ".35em"
    );

    function drawDonutChart(element, percent, width, height, text_y) {
        width = typeof width !== 'undefined' ? width : 100;
        height = typeof height !== 'undefined' ? height : 100;
        text_y = typeof text_y !== 'undefined' ? text_y : "-.10em";

        var dataset = {
                lower: calcPercent(0),
                upper: calcPercent(percent)
            },
            radius = Math.min(width, height) / 2,
            pie = d3.layout.pie().sort(null),
            format = d3.format(".0%");

        var arc = d3.svg.arc()
            .innerRadius(radius - 20)
            .outerRadius(radius);

        var svg = d3.select(element).append("svg")
            .attr("width", width)
            .attr("height", height)
            .append("g")
            .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")");

        var path = svg.selectAll("path")
            .data(pie(dataset.lower))
            .enter().append("path")
            .attr("class", function(d, i) {
                return "color" + i
            })
            .attr("d", arc)
            .each(function(d) {
                this._current = d;
            }); // store the initial values

        var text = svg.append("text")
            .attr("text-anchor", "middle")
            .attr("dy", text_y);

        if (typeof(percent) === "string") {
            text.text(percent);
        } else {
            var progress = 0;
            var timeout = setTimeout(function() {
                clearTimeout(timeout);
                path = path.data(pie(dataset.upper)); // update the data
                path.transition().duration(duration).attrTween("d", function(a) {
                    // Store the displayed angles in _current.
                    // Then, interpolate from _current to the new angles.
                    // During the transition, _current is updated in-place by d3.interpolate.
                    var i = d3.interpolate(this._current, a);
                    var i2 = d3.interpolate(progress, percent)
                    this._current = i(0);
                    return function(t) {
                        text.text(format(i2(t) / 100));
                        return arc(i(t));
                    };
                }); // redraw the arcs
            }, 200);
        }
    };

    function calcPercent(percent) {
        return [percent, 100 - percent];
    };


    const progressBar = document.getElementsByClassName('progress-bar')[0]
    setInterval(() => {
        const computedStyle = getComputedStyle(progressBar)
        const width = parseFloat(computedStyle.getPropertyValue('--width')) || 0
        progressBar.style.setProperty('--width', width + .1)
    }, 5)
</script>




<?php require_once 'tpl/foot.inc.php' ?>



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

    //select_title_box
    // Iterate over each select element
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

</body>

</html>