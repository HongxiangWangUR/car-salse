
$(document).ready(function(){
	retrieve_pname();
});
$("#brand").on('change', function(){
	retrieve_pname();
});

function retrieve_pname() {
	var brand = $("#brand").val();
	$.ajax({
		url: "../php/productManager.php",

		type: "POST",

		dataType: "json",

		data: "brand=" + brand,

		success: function(data) {
			data = JSON.stringify(data)
			var pnames = JSON.parse(data);
			pnames.forEach(function(item){
				$("#pname").append("<option value=" + item.Product_name + ">" + 
								  item.Product_name + "</option>");
			});
		},

		beforeSend: function() {
			$("#pname").empty();
		},

		error: function(data) {
			alert("server error");
		}
	});
}
