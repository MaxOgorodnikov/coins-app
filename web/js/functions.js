$(function() {
	$('#coinsForm').submit(function(e) {
		var url = '../application/controllers/coinController.php';

		$.ajax({
			type: 'POST',
			url: url,
			data: $('#coinsForm').serialize(),
			success: function(data) {
				if (data.error) {
					console.error({'Error code':data.error.code, 'Message':data.error.msg});
				} else {
					if ($('#lightboxSwitcher').is(':checked')) {
						$('.lightbox > div > div').html(data.result);
						$('.lightbox').show();
					} else {
						$('#coinsResult > div').html(data.result);
						$('#coinsResult').show();
					}
				}
			}
		});

		e.preventDefault();	
	});
	
	$('.lightbox').click(function(){
		$('.lightbox').hide();
	});
});