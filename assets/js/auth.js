$(document).ready(function() {
    $("#login").validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: true,
        rules: {

            Username: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            Username: "Wajib di Isi",
            password: "Wajib di Isi"
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: 'auth.php',
                processData: false,
                contentType: false,
                data: formData,
                success: function(result) {
                    var string = result.trim();
                    if (string == 'sukses') {
                        setTimeout(function() { window.location.href = '/index.php'; }, 2000);
                    }
                }
            });
        }
    });

    $("#register").validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: true,
        messages: {
            Nama: "Wajib di Isi",
            Email: "Wajib di Isi",
            Username: "Wajib di Isi",
            Password: "Wajib di Isi",
            NoTelp: "Wajib di Isi"
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: 'auth.php',
                processData: false,
                contentType: false,
                data: formData,
                success: function(result) {
                    var string = result.trim();
                    if (string == 'sukses') {
                        window.location = "/register.php?status=sukses";
                    } else if (string == 'user_tidak_tersedia') {
                        alert('Username tidak tersedia');
                        $('#UsernameID').focus();
                    }
                }
            });
        }
    });

});