$(document).ready(function(){
	var $password1=$("#password1");
	var $password2=$("#password2");
	$("#submit").click(function(){
		if($password1.val()!=$password2.val()){
		alert("Two password input must be the same");
		return false;
	}
	});
});