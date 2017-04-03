$(document).ready(function () {

    $('#uname').focus();

    $( '#uname, #pass' ).keypress(function() {
        $('h4').remove();
    });

    $( "#f_dgnhap" ).submit(function( event ) {
        $('h4').remove();
    });

    // Hàm xử lý thông báo và ràng buột khi nhập dữ liệu
    $( "#f_dgnhap" ).validate({
        rules: {
            uname: "required",
            pass: "required"
        },

        messages: {
            uname: "Bạn chưa nhập tên tài khoản",
            pass: "Bạn chưa nhập mật khẩu"
        },

        errorPlacement: function (error, element) {
            error.attr("color", "red");
            error.addClass("help-block");
            error.insertAfter(element);
        },

        errorClass: "has-error",
        validClass: "has-success",
        highlight: function(element,errorClass,validClass){
            $(element).parent(".form-group").addClass(errorClass).removeClass(validClass);   
        },
	                
        unhighlight: function(element, errorClass, validClass) {
            $(element).parent(".form-group").removeClass(errorClass).addClass(validClass); 
        }

    });
});