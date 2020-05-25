$(document).ready(function(){
	$('.mes').on('keyup input', function() { 
		$(this).css('height', 'auto').css('height', this.scrollHeight + (this.offsetHeight - this.clientHeight));
	});

})