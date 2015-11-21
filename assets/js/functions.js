var FUNCTIONS = FUNCTIONS || {
	switchLogin: function() {
		var loginDiv = jQuery('#login');
		var registrerDiv = jQuery('#register');
		//slideDown("slow");
		//loginDiv.fadeOut(1000);
		//registrerDiv.fadeIn(1000);

		loginDiv.fadeToggle( 500, "linear" );
		registrerDiv.fadeToggle( 500, "linear" );
	},

	validatePassword: function() {
		var password_register = jQuery('#password_register');
		var password_register_2 = jQuery('#password_register_2');
		if (password_register.val() == password_register_2.val()) {
			password_register_2.css({
				"border-bottom": "1px solid #9e9e9e",
				"box-shadow": "0 1px 0 0 #fff"

			})
			jQuery('#btn_register')[0].removeAttribute('disabled');
		} else {
			password_register_2.css({
				"border-bottom": "1px solid red",
				"box-shadow": "0 1px 0 0 #fff"
			})
			jQuery('#btn_register')[0].setAttribute('disabled', true);
		};
	},

	loadMail: function(id) {
		var request = $.ajax({
			url: "http://localhost/mmail/main/showMails",
			method: "POST",
			data: { "id" : id }
		});

		request.done(function( email ) {
			jQuery('div#mailInside').html(email[0].contenido);
		});

		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});
	},

	bindEvents: function() {
		jQuery('#btn_login').click(FUNCTIONS.switchLogin);

		jQuery('.btn_mail').click(function(){
			FUNCTIONS.loadMail(this.id);
			jQuery('.btn_mail').addClass( "active" );
		});

		jQuery('#back_login').click(FUNCTIONS.switchLogin);
		jQuery( "#password_register_2" ).keyup(function() {
			FUNCTIONS.validatePassword();
		});
	},
};

jQuery(document).ready( function() {
	FUNCTIONS.bindEvents();
	if (document.getElementById('register')) {												
		jQuery('#btn_register')[0].setAttribute('disabled', true);
	};
});