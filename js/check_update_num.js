$(document).ready(function(){
	var $quantity=$("#quantity");
	var $cost=$("#cost");
	var $sales=$("#sales");
	$("#update").click(function(){
		if($quantity.val()<=0||$cost.val()<=0||$sales.val()<=0)
		{
			alert("Please check your update quantity, cost, and sales price");
			return false;
		}
	});
});