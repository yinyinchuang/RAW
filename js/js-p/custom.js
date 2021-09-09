//更改會員資訊
$('button#memberSend').click(function () {
    //避免元素的預設事件被觸發
    // event.preventDefault();
    console.log("hi3");
    //各自將 input 帶入變數中
    let input_email = $('input#emailBox');
    // let input_pwd = $('input#nameBox');
    let input_name = $('input#nameBox');
    let input_phone = $('input#phoneNumberBox');
    let input_birthdate = $('input#birthdayBox');
    let select_city = $('select#city');
    let select_dist = $('select#dist');
    let input_address = $('input#addressBox');
    let input_convenienceStore = $('input#convenienceStore');

    // let input_address = $('input#addressBox');
    console.log(input_email.val() + "," + input_name.val()
        + "," + input_phone.val() + "," + input_birthdate.val() + "," + select_city.val() + "," + select_dist.val() + "," + input_convenienceStore.val());


    //送出 post 請求，註冊帳號
    let objUser = {
        email: input_email.val(),
        // pwd: input_pwd.val(),
        name: input_name.val(),
        birthdate: input_birthdate.val(),
        address: input_address.val(),
        phone: input_phone.val(),
        city: select_city.val(),
        dist: select_dist.val(),
        store: input_convenienceStore.val()
    };
    $.post("updateUser.php", objUser, function (obj) {
        if (obj['success']) {
            //關閉 modal
            // $('div#exampleModal').hide();

            //成功訊息
            // alert('註冊成功');

            //當成功訊息執行同時，等數秒後，執行自訂程式
            setTimeout(function () {
                location.reload();
            }, 1000);
        } else {
            alert(`${obj['info']}`);
        }
        console.log(obj);
    }, 'json')
});

// //更改會員資訊RWD
$('button#memberSendRWD').click(function () {
    //避免元素的預設事件被觸發
    // event.preventDefault();
    console.log("hi2");
    //各自將 input 帶入變數中
    let input_email = $('input#emailBoxRWD');
    // let input_pwd = $('input#nameBox');
    let input_name = $('input#nameBoxRWD');
    let input_phone = $('input#phoneNumberBoxRWD');
    let input_birthdate = $('input#birthdayBoxRWD');
    let select_city = $('select#city1');
    let select_dist = $('select#dist1');
    let input_address = $('input#addressBoxRWD');
    let input_convenienceStore = $('input#convenienceStoreBoxRWD');

    // let input_address = $('input#addressBox');
    console.log(input_email.val() + "," + input_name.val()
        + "," + input_phone.val() + "," + input_birthdate.val() + "," + select_city.val() + "," + select_dist.val() + "," + input_convenienceStore.val());


    //送出 post 請求，註冊帳號
    let objUser = {
        email: input_email.val(),
        // pwd: input_pwd.val(),
        name: input_name.val(),
        birthdate: input_birthdate.val(),
        address: input_address.val(),
        phone: input_phone.val(),
        city: select_city.val(),
        dist: select_dist.val(),
        store: input_convenienceStore.val()
    };
    $.post("updateUser.php", objUser, function (obj) {
        if (obj['success']) {
            //關閉 modal
            // $('div#exampleModal').hide();

            //成功訊息
            // alert('註冊成功');

            //當成功訊息執行同時，等數秒後，執行自訂程式
            setTimeout(function () {
                location.reload();
            }, 1000);
        } else {
            alert(`${obj['info']}`);
        }
        console.log(obj);
    }, 'json')
});

// 變更密碼
