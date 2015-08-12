$('.next1').click(function(){
			$('.l1').removeClass('active');
			$('.l2').addClass('active');
			$('.f1').hide("fade");
			$('.f2').show("fade");
});


$('.next2').click(function(){
	$('.l2').removeClass('active');
	$('.l3').addClass('active');
	$('.f2').hide("fade");
	$('.f3').show("fade");

});


$('#usercheck').focusout(function(){
	//console.log("shots fired");
	//console.log($(this).val());
	var usercheck = $(this).val();
	if(usercheck.length > 0){
	$.post(
		"/checkusername",
		{username : $(this).val()},
		function(data){
			console.log(data['value']);
			var val = data['value'];
			
			
			if(val == "true") {
				console.log("done");
				$('.next1').attr('disabled', true);
				$("#usernameerror").css("color","#a83334");
				$("#usernameerror").html("Username already taken!!");
			}
			if(val == "false"){
				console.log("false");
				$('.next1').attr('disabled', false);
				$("#usernameerror").css("color","green");
				$("#usernameerror").html("Username Available");
			}
			// else
			// {
			// 	$('.next1').attr('disabled', true);
			// 	$("#usernameerror").css("color","#a83334");
			// 	$("#usernameerror").html("Unexpected error has ocurred!!");
			// }
		});
}
else
{
	$("#usernameerror").html("");
}
});

$('#codecheck').keyup(function(){
	//console.log("shots fired");
	//console.log($(this).val());
	var codecheck = $(this).val();
	if(codecheck.length > 0){
	$.post(
		"/checkcode",
		{
			codecheck : $(this).val()
		},
		function(data){
			console.log(data);
			if (data == 1) {
				$('.next1').attr('disabled', true);
				$("#codeerror").css("color","#a83334");
				$("#codeerror").html("Code is already used!!");
			}
			else if(data == 2){
				$('.next1').attr('disabled', true);
				$("#codeerror").css("color","#a83334");
				$("#codeerror").html("Code is invalid!!");
			}
			else
			{
				$('.next1').attr('disabled', false);
				$("#codeerror").css("color","green");
				$("#codeerror").html("Code is Valid");
			}
		});
}
else
{
	$("#codeerror").html("");
}
});


$('#confirmpassword').keyup(function(){
	var password = $("#password").val();
	console.log(password);
	var confirmpassword = $(this).val();
	console.log(confirmpassword);
	if(password.length > 0 && confirmpassword.length > 0){
	if (password == confirmpassword) {
		//$(this).css("background-color","#A83334");
		
		$('#passworderror').css("color","green");
		$("#passworderror").html("Passwords Match!!");
		$('.next1').attr('disabled', false);

	}
	else{
		$("#passworderror").html("Passwords Dont Match!!");
		$('.next1').attr('disabled', true);
	}
}

});

