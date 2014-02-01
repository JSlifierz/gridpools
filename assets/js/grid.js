$(document).ready(function() {
	
	$('.free').each(function() {

		$(this).click(function() {

			$('.friend').css('display', 'block');
			$('#overlay').css('display', 'block');

			var $id = $(this).find('.boxID').html();

			$('#box').val($id);

			$('#overlay').click(function() {
				$('.friend').css('display', 'none');
				$('#overlay').css('display', 'none');
			});

		});

	});

	$('#no').click(function() {

		$('.friend').css('display', 'none');
		$('#overlay').css('display', 'none');

	});

	setInterval(function() {

		var $gridID = $('#thisID').html();

		$.get('http://' + document.domain + '/gridpools/grid/potTotal/' + $gridID, function() {

				}).done(function(data) {
					
					$('#potTotal').html(data);

				});

	}, 30000);

});