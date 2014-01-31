$(document).ready(function() {
	
	var $screenHeight = $(window).height();

	$('.grid').css('height', $screenHeight);

	$('#create').click(function() {
		$('body, html').animate({scrollTop: $screenHeight}, 1200);
		$('body').css('overflow', 'auto');
	});

	$('#join').click(function() {
		$('.grid form').css({
			opacity: 1,
			pointerEvents: 'auto'
		});
	});

	var validate = function() {
		var $errors = [];
		
		if ($('#name').val() == '') {
			$errors.push('<p>Please enter your name</p>');
		}

		if ($('#grid').val() == '') {
			$errors.push('<p>Please name your grid</p>');
		}

		if ($('#bet').val() == '') {
			$errors.push('<p>Please set the bet per box</p>');
		}

		return $errors;
	}

	$('#customButton').click(function(e) {
		e.preventDefault();

		var $errors = validate();

		if ($errors.length > 0) {
			$('#errors').html($errors);
		}

		else {
			var handler = StripeCheckout.configure({
				key: 'pk_test_yTRK4MGIlrEMzR5As0wo8Uxk',
				image: 'http://dm2lmglugmay7.cloudfront.net/images/logo.png',
				currency: 'CAD',
				token: function(token, args) {

					$('#token').val(token.id);
					$('#email').val(token.email);
					$('#signupForm').submit();

				}
			});

			handler.open({
				name: 'Gridpools',
				description: 'Purchase your Grid',
				amount: 299
			});
		}

	});

});





























