$(document).ready(function() {
    $('#registration_form').submit(function(event) {
        event.preventDefault();

        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var passwordRepeat = $('#password-confirm').val();

        $('.alert').hide();
        $('.alert-danger').hide();

        if (email.indexOf('@') == -1 || password !== passwordRepeat) {
            $('.alert-danger').show();
            return;
        }

        $.ajax({
            url: 'registration.php',
            type: 'post',
            data: {
                'lastName': name,
                'email': email,
                'password': password
            },
            success: function(response) {
                if (response == 'success') {
                    $('#registrationForm').hide();
                    $('.alert-success').show();
                } else {
                    $('.alert-danger').show();
                }
            },
            error: function() {
                $('.alert-danger').show();
            }
        });
    });
});