import querystring from "querystring";

$(document).ready(function () {
    $('input[name="url"]').val(document.referrer);

    $('[data-js="post-form"]').submit(function (e) {
        e.preventDefault();

        let form = $(this);
        let url = form.attr('action');

        if ($('#name').val() === '') {
            showErrorMsg('請輸入姓名', '姓名不可為空');
            return;
        }

        const phoneReg = /^[0-9\-()]*$/;
        if (!(phoneReg.test($('#phone').val()))) {
            showErrorMsg('聯絡電話錯誤', '電話號碼只能是數字或-');
            return;
        }

        const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if (!(re.test($('#email').val()))) {
            showErrorMsg('電子信箱錯誤', '請輸入正確電子信箱');
            return;
        }

        $('#loading').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: url,
            data: form.serialize(),
            dataType: "JSON",
            success:function(res){
                $('#loading').hide();
                if (res.type === '1') {
                    Swal.fire({
                        icon: 'success',
                        title: '已收到您的聯絡資訊!',
                        text: '感謝您, 服務顧問將會盡快與您聯繫!'
                    });
                    $('#name').val('');
                    $('#phone').val('');
                    $('#email').val('');
                }
            },
            error:function(err){
                console.log(err);
                $('#loading').hide();
                showErrorMsg('聯絡資訊建立失敗', '請稍後再試');
            },
        });

    });
});

let showErrorMsg = function (title, message) {
    Swal.fire({
        icon: 'error',
        title: title,
        text: message
    })
}