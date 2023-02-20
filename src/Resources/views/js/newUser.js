// Add an event listener to all input elements
$('input').on('click', function() {
    $('.alert-danger').css('display', 'none');
    $(this).val('');
});

// Add a click event listener to the submit button
$('#submit_b').click(function() {
    // Get the user input values from the form
    let name = $('#surname').val();
    let email = $('#email').val();
    let password = $('#password').val();

    $('.alert').hide(); // Hide all alerts

    // Validate the email input
    if ($('#email').val().trim() === '') {
        $('.alert-danger').text('Email field is required.').show();
        return;
    } else if ($('#email').val().indexOf('@') === -1) {
        $('.alert-danger').text('Please enter a valid email address.').show();
        return;
    }

    // Validate the password input
    if ($('#password').val().trim() === '') {
        $('.alert-danger').text('Password field is required.').show();
        return;
    }
    if ($('#password').val().length < 6) {
        $('.alert-danger').text('Password should be at least 6 characters long.').show();
        return;
    }

    // Validate the password confirmation input
    if ($('#password').val() !== $('#password-confirm').val()) {
        $('.alert-danger').text('Passwords do not match.').show();
    } else {
        $('.alert-danger').hide();
    }

    // Send an AJAX request to the server to create a new user
    $.ajax({
        url: 'src/Controller/NewUserController.php',
        type: 'post',
        data: {
            'userName': name,
            'email': email,
            'password': password
        },
        success: function(response) {
            let res = JSON.parse(response);
            if (res.success == true) {
                $('.container').css('display', 'none');
                $('.alert-success').text(res.message).show();
            } else {
                $('.alert-danger').text(res.message).show();
            }
        },
        error: function() {
            $('.alert-danger').text('I don\'t know what happened, don\'t worry, everything will be fine. Take care of yourself and Ukraine!').show();
        }
    });
});
