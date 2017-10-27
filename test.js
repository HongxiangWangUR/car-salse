$(document).ready(function(){
	//var $button=$("#button");
	var $check=$(".check");
	$("#button").click(function(){
		alert($check.eq(0).is(":checked"));
	});
});