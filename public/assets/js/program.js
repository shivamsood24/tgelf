$('.next').click(function(){
	$('.l1').addClass('active');
	$('.f1').show("fade");
	$('.f2').hide("fade");
	$('.f3').hide("fade");
	$('.f4').hide("fade");
	$('.f2').addClass('addcls');
	$('.f3').addClass('addcls');
	$('.f4').addClass('addcls');
	
});

$('.next1').click(function(){
			$('.l1').removeClass('active');
			$('.l3').removeClass('active');
			$('.l4').removeClass('active');
			$('.l2').addClass('active');
			$('.f1').addClass('addcls');
			$('.f2').show("fade");
			$('.f3').addClass('addcls');
			$('.f4').addClass('addcls');
});


$('.next2').click(function(){
	$('.l2').removeClass('active');
	$('.l3').addClass('active');
	$('.f1').hide("fade");
	$('.f2').hide("fade");
	$('.f3').show("fade");

});

$('.next3').click(function(){
	$('.l2').removeClass('active');
	$('.l3').addClass('active');
	$('.f1').hide("fade");
	$('.f2').hide("fade");
	$('.f3').show("fade");

});
