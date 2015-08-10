$('.next').click(function(){
	$('.l1').addClass('active');
	$('.l2').removeClass('active');
	$('.l3').removeClass('active');
	$('.l4').removeClass('active');
	$('.f1').addClass('showcls');
	$('.f2').addClass('addcls');
	$('.f3').addClass('addcls');
	$('.f4').addClass('addcls');
	$('.f2').removeClass('showcls');
	$('.f3').removeClass('showcls');
	$('.f4').removeClass('showcls');

	
});

$('.next1').click(function(){
	$('.l2').addClass('active');
	$('.l1').removeClass('active');
	$('.l3').removeClass('active');
	$('.l4').removeClass('active');
	$('.f1').addClass('addcls');
	$('.f2').addClass('showcls');
	$('.f3').addClass('addcls');
	$('.f4').addClass('addcls');
	$('.f1').removeClass('showcls');
	$('.f3').removeClass('showcls');
	$('.f4').removeClass('showcls');
});


$('.next2').click(function(){
	$('.l3').addClass('active');
	$('.l1').removeClass('active');
	$('.l2').removeClass('active');
	$('.l4').removeClass('active');
	$('.f1').addClass('addcls');
	$('.f2').addClass('addcls');
	$('.f3').addClass('showcls');
	$('.f4').addClass('addcls');
	$('.f1').removeClass('showcls');
	$('.f2').removeClass('showcls');
	$('.f4').removeClass('showcls');

});

$('.next3').click(function(){
	$('.l4').addClass('active');
	$('.l1').removeClass('active');
	$('.l2').removeClass('active');
	$('.l3').removeClass('active');
	$('.f1').addClass('addcls');
	$('.f2').addClass('addcls');
	$('.f3').addClass('addcls');
	$('.f4').addClass('showcls');
	$('.f1').removeClass('showcls');
	$('.f2').removeClass('showcls');
	$('.f3').removeClass('showcls');

});
