
//step2控制表單









// 購物車的分頁

$(".tab").each(function (index) {
    $(this).click(function (e) {
        triggletab();
        triigletabcontent();
        $(this).toggleClass("active");
        $(".tab-c")
            .eq(index)
            .toggleClass("active");
    });
});
// to remove all tab headers
function triggletab() {
    $(".tab").each(function () {
        $(this).removeClass("active");
    });
}

// triggle the tab content
function triigletabcontent() {
    $(".tab-c").each(function () {
        $(this).removeClass("active");
    });
}



//增加商品數量
// $('.btn_plus').click(function (event) {
//     console.log('btnplus');
//     let btn = $(this);
//     let index = btn.attr('data-index');
//     let prod_price = btn.attr('data-prod-price');
//     // let input_qty = $(`input.qty[data-index="${index}"]`);
//     let input_qty = $(this).prev();
//     console.log('input_qty', input_qty.val());
//     console.log('parseInt(input_qty.val()', parseInt(input_qty.val()));
//     input_qty.val(parseInt(input_qty.val()) + 1);



//     //修改商品金額
//     $(`span.s[data-index="${index}"]`).text(input_qty.val() * prod_price);

//     //更新總計
//     let total = 0;
//     $(`input.qty`).each(function (index, element) {
//         total += (parseInt($(element).val()) * parseInt($(element).attr('data-prod-price')));
//     });
//     $('span#total').text(total);
// });

//減少商品數量
// $('.btn_minus').click(function (event) {
//     let btn = $(this);
//     let index = btn.attr('data-index');
//     let prod_price = btn.attr('data-prod-price');
//     let input_qty = $(`input.qty[data-index="${index}"]`);
//     if (parseInt(input_qty.val()) - 1 < 1) return false;
//     input_qty.val(parseInt(input_qty.val()) - 1);

//     //修改商品金額
//     $(`span.s[data-index="${index}"]`).text(input_qty.val() * prod_price);

//     //更新總計
//     let total = 0;
//     $(`input.qty`).each(function (index, element) {
//         total += (parseInt($(element).val()) * parseInt($(element).attr('data-prod-price')));
//     });
//     $('span#total').text(total);
// });


//信用卡


$('.input-cart-number').on('keyup change', function () {
    $t = $(this);

    if ($t.val().length > 3) {
        $t.next().focus();
    }

    var card_number = '';
    $('.input-cart-number').each(function () {
        card_number += $(this).val() + ' ';
        if ($(this).val().length == 4) {
            $(this).next().focus();
        }
    })

    $('.credit-card-box .number').html(card_number);
});

$('#card-holder').on('keyup change', function () {
    $t = $(this);
    $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-holder').on('keyup change', function () {
    $t = $(this);
    $('.credit-card-box .card-holder div').html($t.val());
});

$('#card-expiration-month, #card-expiration-year').change(function () {
    m = $('#card-expiration-month option').index($('#card-expiration-month option:selected'));
    m = (m < 10) ? '0' + m : m;
    y = $('#card-expiration-year').val().substr(2, 2);
    $('.card-expiration-date div').html(m + '/' + y);
})

$('#card-ccv').on('focus', function () {
    $('.credit-card-box').addClass('hover');
}).on('blur', function () {
    $('.credit-card-box').removeClass('hover');
}).on('keyup change', function () {
    $('.ccv div').html($(this).val());
});


/*--------------------
CodePen Tile Preview
--------------------*/
setTimeout(function () {
    $('#card-ccv').focus().delay(1000).queue(function () {
        $(this).blur().dequeue();
    });
}, 500);

/*function getCreditCardType(accountNumber) {
  if (/^5[1-5]/.test(accountNumber)) {
    result = 'mastercard';
  } else if (/^4/.test(accountNumber)) {
    result = 'visa';
  } else if ( /^(5018|5020|5038|6304|6759|676[1-3])/.test(accountNumber)) {
    result = 'maestro';
  } else {
    result = 'unknown'
  }
  return result;
}
 
$('#card-number').change(function(){
  console.log(getCreditCardType($(this).val()));
})*/








$('input[type="radio"]').on("mousedown", function () {
    if (this.checked) {
        $(this).one("click", function () {
            this.checked = false;
        });
    }
});






















