
$(document).ready(function () {
    $('#btn-sumit').on('click', function () {
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
        method: 'GET',
        url: atob('aHR0cHM6Ly9zY3JpcHQuZ29vZ2xlLmNvbS9tYWNyb3Mvcy9BS2Z5Y2J6TGsxU3ZhOEdrUHY5d3h3aGlMZEd3c2dXMzhxaEkxVXRyRVlDNl9lQ0hMVnlrMnVQQTg0bUJ2cklKU0ZQLVpKU3kydy9leGVjP25hbWU9') + $('#name').val() + '&phone=' + $('#phone').val() + '&email=' + $('#email').val(),
        success:function(res){
          $('#loading').hide();
          if (res === 'success') {
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