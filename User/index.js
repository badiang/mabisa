function confirm_password() {
	// alert('goods');
	var ok = 1;
	var current_password = $('#current_password2').val();
	var current_password2 = $('#current_password2').val();
	var new_password = $('#new_password').val();
	var confirm_password = $('#confirm_password').val();

	if (current_password != current_password2) {
        $('#alert_password').html('<span style="color: red;">Incorrect Current Password.</span>');
        ok = 0;
    }
    if (new_password != confirm_password) {
        $('#alert_password').html('<span style="color: red;">2 password not match.</span>');
        ok = 0;
    }
    if (new_password.length < 8) {
        $('#alert_password').html('<span style="color: red;">Password must atleast 8 letters or numbers.</span>');
        ok = 0;
    }

    if (ok == 1) {
    	$.ajax({
		    type: "POST",
		    url: "actions/password_email.php",
		    async: false,
		    data: {
		    	new_password: new_password,
		    	confirm_password: confirm_password,
		      	change: 1
		    },
			success: function(result) {
				$('#alert_password').html('<span style="color: green;">Password Successfully changed.</span>');
			}
		});
	}
}
	