// 點選顏色後，顏色的字會變、推薦的色球和字也會變、圖也會變
//目前寫死，動態的部分要問老師

// let hiddenId = $('.hiddenId').data('value');
// console.log('test my hidden id:', $(this).index());

$('.color_code').click(function () {


    // console.log($(this).index());
    // console.log($(this).data('value'));
    // 想要從隱藏的東西抓產品ＩＤ的值
    // let hiddenId = $('.hiddenId').data('value');
    // console.log($('.hiddenId').data('value'));
    // console.log('test my hidden id:', hiddenId);

    // 為何不行
    $('button#btn_set_cart').attr('data-prod-colorcode', $(this).data('value'))


    $('#match_color').attr('data-matchColor', $(this).data('value'))

    $('.nadia_carousel_goods_one').find('img').attr('src', `./img/RAW_images/001-${$(this).index() + 1}-1.jpg`);
    $('.nadia_carousel_goods_two').find('img').attr('src', `./img/RAW_images/001-${$(this).index() + 1}-2.jpg`);
    $('.nadia_carousel_goods_three').find('img').attr('src', `./img/RAW_images/001-${$(this).index() + 1}-3.jpg`);
    $('.nadia_carousel_goods_four').find('img').attr('src', `./img/RAW_images/001-${$(this).index() + 1}-4.jpg`);
    $('.nadia_carousel_goods_five').find('img').attr('src', `./img/RAW_images/001-${$(this).index() + 1}-5.jpg`);


    // console.log('colorbook:', $('.colorbook').eq($(this).index()).text().trim());

    $('#color_name').text($('.colorbook').eq($(this).index()).text().trim());

    $('#match_ball').css('background-color', `${$(this).attr('data-prod-colorcode')}`)

    // console.log('mymatchcolor:', $('#match_color').text($('.colorbook').eq($(this).index()).text().trim()));



})



// 點選size取值
$('.sizebtn').click(function () {
    // console.log($(this).data('value'));
    $('button#btn_set_cart').attr('data-prod-size', $(this).data('value'))
})







{
    /* <button type="button" id="btn_set_cart" class="addtocartbutton"
        data-prod-id="<?= $obj['prod_id'] ?>"
        data-prod-name="<?= $obj['prod_name'] ?>"
        data-prod-brand="<?= $obj['prod_brand'] ?>"
        data-prod-price="<?= $obj['prod_price'] ?>"

        data-prod-colorCode="<?= $objCode['color_code'] ?>"
        data-prod-colorCodeName="<?= $objCodeName['color_name'] ?>"
        data-prod-size="<?= $obj['size2'] ?>" data-prod-foto="<?= $objImg['foto'] ?>">
        加入購物車
    </button> */
}




