$(function() {
	//JS enabled
	$('#js_disabled').val(0);
	$('#coinsResult').hide();

	$('#testsSwitcher').change(
		function(){
			if ($(this).is(':checked')) {
				$('#testsResults').show();
			} else {
				$('#testsResults').hide();
			}
		});

	$('#coinsForm').submit(function(e) {
		var url = '../application/controllers/coinController.php';

		$.ajax({
			type: 'POST',
			url: url,
			timeout: 2000,
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
			},
			error: function(jqXHR, textStatus, errorThrown){
				if (textStatus == 'timeout') {
					console.error('Timeout');
				} else {
					console.error([textStatus, errorThrown]);
				}
			}
		});

		e.preventDefault();	
	});
	
	$('.lightbox').click(function(){
		$('.lightbox').hide();
	});
});