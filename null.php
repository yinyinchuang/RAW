<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>null</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">
    <style>
        .fake_content {
            height: 100vh;
        }
    </style>
</head>
<?php require_once 'tpl/head.inc.php' ?>

<!-- content -->

<div class="fake_content container">
    \大專加油/

</div>
<div class="container">
    \大專加油/
</div>

<?php require_once 'tpl/foot.inc.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- len -->
<script src="./js/js-len/main.js"></script>
<script>
    $('.fake_content').click(function(event) {
        $('#showup_box_delete_wish_list').addClass('open');
    });
    $('#showup_box_delete_wish_list_btn').click(function(event) {
        $('#showup_box_delete_wish_list').removeClass('open');
    });
</script>
</body>

</html>