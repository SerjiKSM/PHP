
/*
 * add amount product to cart
 */
$(document).ready(function(){
		$(".add-amount-cart").click(function(){
			var id = $(this).attr("data-id");
			var value = document.getElementById("amount").value;

			/*
			console.log("значение", id);
			console.log("значение", value);
			*/
				
			$.post("/cart/addAmountAjax/"+id+"/"+value, {}, function (data){
				$("#cart-count").html(data);
				/*alert(data);*/
			});

			return false;
		});
	});


/**
 * Sum count price
 */
function calculateAmount(itemId){
	var itemAmount= $('#amount_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).attr('value');
	var itemRealPrice = itemAmount * itemPrice;
		
	$.post("/cart/changeValueInCart/" + itemId + '/' + itemAmount + '/', {}, function (data){
		$("#cart-count").html(data);				
	});
	
	$('#itemRealPrice_' + itemId).html(itemRealPrice);
	
	var totalSum = 0;
	$.each($('.sum'), function(index, value) {
		/*console.log(index + ':' + $(value).text());*/
		totalSum += parseInt($(value).text());
		/*console.log(totalSum);*/
	});
	
	$('#itemtotalPrice').html(totalSum);
	
	/*
	return false;
	*/
	
}



