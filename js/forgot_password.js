// forgot_password.js
$(document).ready(function() {
    $('#forgotPasswordForm').on('submit', function(e) {
        e.preventDefault();
        
        var email = $('input[name="email"]').val();
        
        $.ajax({
            type: 'POST',
            url: 'forgot_password.php',
            data: { email: email },
            success: function(response) {
                $('#responseMessage').html(response);
            }
        });
    });
});
