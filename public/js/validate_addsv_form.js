$(document).ready(function () {
    $("#success-alert").fadeTo(1100, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });

    $("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });


    // Hàm xử lý thông báo và ràng buột khi nhập dữ liệu
    $("#f_addsv").validate({
        rules: {
            hoten: {
                required: true,
                maxlength: 50
            },
            mssv:{
                required: true,
                maxlength: 8
            },
            sdt: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 11
            },
            ngsinh: {
                required: true;
            }
        },

        messages: {
            hoten: {
                required: "Bạn chưa nhập tên",
                maxlength: "Họ tên tối đa là 50 kí tự"
            },
            mssv: {
                required: "Bạn chưa nhập mã số",
                maxlength: "Mã số tối đa là 8 kí tự"
            },
            sdt: {
                required: "Bạn chưa nhập số điện thoại",
                number: "Số điện thoại phải là chữ số",
                minlength: "số điện thoại tối thiểu 10 chữ số",
                maxlength: "số điện thoại tối đa 11 chữ số"
            },
            ngsinh: {
                required: "Bạn chưa nhập ngày sinh"
            }
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