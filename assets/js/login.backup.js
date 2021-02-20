jQuery(function($) {
        $.validator.setDefaults({
            submitHandler: function () {
                login();
            }
        });

        $().ready(function () {
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
                    Username: "Mohon isi Username anda",
                    password: "Mohon isi Password anda"
                },
                highlight: function (e) {
                    $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
                },
                success: function (e) {
                    $(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
                    $(e).remove();
                }

            })
        });

function login() {
	$.post('login.php', $("form").serialize(), function (hasil) {
		$('form input[type="text"],form input[type="password"]').val('');
		if (hasil=='login_sukses') {
		setTimeout(function() {window.location.href = '/index.php';}, 2000);
		}
	});
};
});