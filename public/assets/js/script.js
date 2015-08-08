$('.next1').click(function(){
	$('.l1').removeClass('active');
	$('.l2').addClass('active');
	$('#warlock-loader').show();
	//$('#warlock-loader').hide();
	
	$('.f1').hide("fade");
	$('.f2').show("fade");

});
$('.next2').click(function(){
	$('.l2').removeClass('active');
	$('.l3').addClass('active');
	$('.f2').hide("fade");
	$('.f3').show("fade");

});