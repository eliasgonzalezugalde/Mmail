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
			jQuery('#cont').val(email[0].contenido);
			jQuery('#asu').val(email[0].asunto);
			jQuery('#des').val('To: ' + email[0].destinatario);
			jQuery('#cont').trigger('autoresize');
			jQuery('.btn_mail').removeClass( "active_mail" );
			var aidi = '#' + id.toString();
			//agregar al boton de editar el id
			jQuery('.edit').attr('id', id);
			jQuery('.delete').attr('id', id);
			jQuery(aidi).addClass( "active_mail" );

			if (jQuery( "#tab2" ).hasClass( "active" )) {
			//sent
			//jQuery('.more').fadeOut(250);
			jQuery('.more').fadeIn(250);
			jQuery('.no_margin').fadeOut(250);
			
		} else {
			//pending
			jQuery('.no_margin').fadeIn(250);
			jQuery('.more').fadeIn(250);
		};

	});

		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});
	},

	editMail: function(id) {
		var request = $.ajax({
			url: "http://localhost/mmail/main/editMail",
			method: "POST",
			data: { "id" : id, "cont" : jQuery('#cont').val(), "asu" : jQuery('#asu').val(), "des" : jQuery('#des').val().replace('To: ','') }
		});

		request.done(function( email ) {
			Materialize.toast('Edited successfully!', 4000)
			var aidi = '#' + id.toString();
			jQuery(aidi).html(jQuery('#asu').val());
		});

		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});
	},

	cleanMail: function() {
		jQuery('#cont').val('');
		jQuery('#des').val('');
		jQuery('#asu').val('');
		jQuery('#cont').trigger('autoresize');

		if (jQuery( "#tab2" ).hasClass( "active" )) {
			//sent
			jQuery('#cont')[0].setAttribute('disabled', true);
			jQuery('#des')[0].setAttribute('disabled', true);
			jQuery('.more').fadeOut(250);
		} else {
			//pending
			jQuery('#cont')[0].removeAttribute('disabled');
			jQuery('#des')[0].removeAttribute('disabled');
			jQuery('.more').fadeOut(250);
		};
	},

	deleteMail: function(id) {
		var request = $.ajax({
			url: "http://localhost/mmail/main/deleteMail",
			method: "POST",
			data: { "id" : id }
		});

		request.done(function( email ) {
			Materialize.toast('Delete successfully!', 4000)
		});

		request.fail(function( jqXHR, textStatus ) {
			alert( "Request failed: " + textStatus );
		});
		FUNCTIONS.cleanMail();
		//se agrega clase erased_mail que simula borrar el mail
		var aidi = '#' + id.toString();
		jQuery(aidi).addClass( "erased_mail" );
	},

	bindEvents: function() {
		jQuery('.tooltipped').tooltip({delay: 50});

		jQuery('.tabs').click(FUNCTIONS.cleanMail);

		jQuery('.btn_mail').click(function(){
			FUNCTIONS.loadMail(this.id);

		});

		jQuery('.edit').click(function(){
			FUNCTIONS.editMail(this.id);

		});

		jQuery('.delete').click(function(){
			FUNCTIONS.deleteMail(this.id);

		});

		jQuery('.register_btn').click(FUNCTIONS.switchLogin);

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
	jQuery('ul.tabs').tabs();

	jQuery('.dropdown-button, .dropdown-button2').dropdown({
		inDuration: 300,
		outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
      hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
  });

});