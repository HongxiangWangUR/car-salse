$(document).ready(function(){
	var $numberleft=$(".numberleft");
	var $checktag=$(".checktag");
	var length=$numberleft.length;
	var $amount=$(".amount");
	var tag=false;
	$("#submit").click(function(){
		for(var i=0;i<length;i++)
			if($checktag.eq(i).is(":checked")){
				tag=true;
				if(( $numberleft.eq(i).val() - $amount.eq(i).val() )<0||$amount.eq(i).val() <= 0){
					//alert($numberleft.eq(i).val() - $amount.eq(i).val())
					alert("Please change your order quantity to the correct number.");
					return false;
				}
			}
		if(!tag){
			alert("Please change your order quantity to the correct number.");
			return false;
		}
	});
});