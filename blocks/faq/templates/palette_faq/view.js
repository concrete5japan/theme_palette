
$(function() {

	$('.palette-faq-contents > dt').click(function(){
		$(this).nextUntil('.palette-faq-contents dt').slideToggle('fast');
	});

});
