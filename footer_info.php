<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAW</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/css-yin/corp.css">
</head>

<?php require_once 'tpl/head.inc.php' ?>

<div class="container twosides_container">
    <div class="corp_sidebar">
        <div class="corp_menu">
            <h2><a href="./footer_aboutus.php">ABOUT US</a></h2>
        </div>
        <div class="corp_menu current">
            <h2><a href="./footer_info.php">INFO</a></h2>
        </div>
        <div class="corp_menu">
            <h2><a href="./footer_faq.php">FAQ</a></h2>
        </div>
    </div>

    <div class="corp_body">
        <div class="corp_content">
            <h2>赤著會員</h2>
            <p>
                如何加入</br>
                購買即自動成為一般會員，亦可至註冊頁面完成加入會員。</br>
                </br>
                會員使用功能</br>
                ·我的資料：儲存您的基本資料、修改密碼，亦可選填您想儲存的資料。</br>
                ·我的訂單：您可以在此隨時查看您的訂單狀態。</br>
                ·我的追蹤：赤著提供您最私人的搜尋區域，您可以在此設定相對應的搜尋條件來儲存您想要看的單品。</br>
                ·我的穿搭：您可以在此上傳您的穿搭照片，並搭配相關的資訊，我們也會同時「上傳至赤著的Loodbook」，讓您的穿搭想法成為會員們的靈感。</br>
                ·我在赤著：包含會員身份的消費金額累積以及赤著提供會員色彩集章的活動，買任何色系的衣服即可累積相對應的色彩章，集滿可獲得赤著優惠。亦包含您在赤著現有的優惠券。</br>
                ·收藏功能：凡在赤著網站點選收藏的單品、穿搭照、文章都會收藏在此區，您隨時可查看您的收藏。
            </p>
        </div>

        <div class="corp_content">
            <h2>購買流程</h2>
            <p>選購商品→註冊/登入會員→將商品加入購物車→選擇配送方式→選擇支付方式→確認訂單資訊→結帳完成→（出貨通知）→等待到貨</p>
        </div>

        <div class="corp_content">
            <h2>退換貨政策</h2>
            <p>RAW 提供 7 天鑑賞期，若需辦理退換貨，請注意下列事項：</br>
                </br>
                ·鑑賞期非試用期，若您收到商品經檢視後有任何不合意之處請勿拆開使用，並立即辦理退換貨，商品退換貨需在收到商品後 7 天內告知並寄回，逾期恕不受理。</br>
                ·請務必先來信聯絡我們service@raw.com.tw，提供訂購人姓名 / 訂單編號 / 聯絡電話 / 退換商品名，並註明欲「退貨」或「換貨」及退換原因。</br>
                ·退換貨請保持商品的原始狀態（無異味髒污、磨損毀壞、加工改造等）與包裝完整 （內外包裝、封膜、封口、隨貨文件、保固卡、贈品等）。</br>
                ·除了商品瑕疵以外，若商品已非全新狀態與完整包裝，可能需負擔部分費用或影響退貨權力之行使。</br>
                ·因個人因素（商品和您的預期有出入）換貨請自行寄回，另將酌收 80
                元物流處理費（此為換貨商品重新配送所需的處理費，國外寄送將另行報價），請於換貨包裹內附上處理費一併寄回，以便我們為您處理。更換商品以一次為限，如遇商品缺貨或其他因素無法出貨的情況則退款處理。</br>
                ·因個人因素（商品和您的預期有出入）退貨，若為整筆訂單退貨且自行寄回，將退款原消費總額。</br>
                ·承上，若為部分退貨，假使退貨後未滿優惠資格（例如：滿額免運、多件折扣），將從退款直接扣除其中差價。
                ·欲退貨之商品，若為組合出售的促銷商品，不可單品退貨，需將整個商品組合一起退回。</br>
                ·請勿使用商品包裝作為退貨包裝（例如：防塵袋、夾鏈袋），如造成商品包裝損毀，將視為商品已使用無法退貨，恕無法受理退貨。</br>
                ·若商品完整性不齊全或是因包裝不妥導致寄回有破損或損壞，恕不退換或退款，敬請見諒。</br>
                ·特殊活動之商品（如 POP-UP 快閃店、預購活動等），訂單一旦成立，則不提供因顧客個人因素退換貨，訂購前請確認顏色、尺寸、數量。</br>
                </br>
                若需進一步了解商品狀況或對商品有任何疑問，請來信 service@raw.com.tw 與我們聯絡，謝謝！</p>
        </div>
    </div>
</div>


<?php require_once 'tpl/foot.inc.php' ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="./js/main.js"></script>

<script>
    $(document).ready(function() {

        $(".corp_content h2").click(function(event) {
            $(this).toggleClass("active");
            $(this).siblings("p").slideToggle();
            $(this).toggleClass("corp_close");
        });




        // $(".corp_content h2").click(function (event) {
        //     $(this).toggleClass("corp_close");
        //     $(this).parent().find("p").toggleClass("corp_open");
        // });

        // 側欄收合
        // $(".corp_menu h2").click(function (e) {
        //     e.preventDefault();
        //     $(this).toggleClass("active");
        //     $(this).parent().find("p").slideToggle();
        //     $(this).parent().siblings().find("p").slideUp();
        //     $(this).parent().siblings().find("h2").removeClass("active");
        //     $(this).addClass("current").parent().siblings().find("h2").removeClass("current");
        // });


        // 內文收合 圖片改成-之後改不回來
        // $(".corp_content h2").click(function (e) {
        //     e.preventDefault();
        //     $(this).toggleClass("active");
        //     $(this).addClass("close");
        //     $(this).parent().find("p").slideToggle();
        //     $(this).parent().siblings().find("h2").removeClass("active")
        // });



        // 內文收合 toggle() 舊版jQuery
        // $(".corp_content h2").toggle(
        //     function () {
        //         $(this).parent().find("p").slideDown();
        //         $(this).addClass("close");
        //     },
        //     function () {
        //         $(this).parent().find("p").slideUp();
        //         $(this).removeClass("close");
        //     }
        // );

    });
</script>
</body>

</html>