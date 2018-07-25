$(function(){
	$("#userMessage").click(function(){
		
		var name    = $("#name").val();
		var email   = $("#email").val();
		var subject = $("#subject").val();
		var message = $("#message").val();
	 var dataString = 'name='+name+'&email='+email+'&subject='+subject+'&message='+message;

	 $.ajax({
	 	type:"POST",
	 	url:"ajax/getcontactmess.php",
	 	data:dataString,
	 	success:function(data){
	 		$("#state").html(data);
	 		setTimeout(function(){
                window.location.href='contact.php';
               }, 2000)
	 	}

	 });

	 return false;

	});
});