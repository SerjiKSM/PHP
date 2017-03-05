
/**
 * add new categori
 */
function newCategory(){
	var postData = getData('#blockNewCategory');
	
	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/addnewcat/",
		data: postData,
		dataType: 'json',
		success: function (data){
			if(data['success']){
				alert(data['message']);					
				$('#newCategoryName').val('');
			} else {
				alert(data['message']);								
			}
		}
	});
}

/*
 * update data categori
 */
function updateCat(itemId) {
	var parentId = $('#parentId_' + itemId).val();
	var newName = $('#itemName_' + itemId).val();
	var postData = {itemId: itemId, parentId: parentId, newName: newName};
	
	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/updatecategory/",
		data: postData,
		dataType: 'json',
		success: function (data){
				alert(data['message']);					
		}
	});
}

/**
 * add product
 */
function addProduct() {
	var itemPrice = $('#newItemPrice').val();
	var itemName = $('#newItemName').val();
	var itemCatId = $('#newItemCatId').val();
	var itemDesc = $('#newItemDesc').val();
	
	var postData = {itemName: itemName, itemPrice: itemPrice, itemCatId: itemCatId, itemDesc: itemDesc};
	
	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/addproduct/",
		data: postData,
		dataType: 'json',
		success: function (data){
				alert(data['message']);	
				if(data['success']){
					$('#newItemName').val('');
					$('#newItemPrice').val('');
					$('#newItemCatId').val('');
					$('#newItemDesc').val('');					
				}
		}
	});
}

/**
 * update product
 */
function updateProduct(itemId){
	var itemName = $('#itemName_' + itemId).val();
	var itemPrice = $('#itemPrice_' + itemId).val();
	var itemCatId = $('#itemCategory_' + itemId).val();
	var itemDesc = $('#itemDesc_' + itemId).val();
	var itemStatus = $('#itemStatus_' + itemId).attr('checked');
	if (!itemStatus) {
		itemStatus = 1;
	} else {
		itemStatus = 0;
	}
	
	var postData = {itemId: itemId, itemName: itemName, itemPrice: itemPrice, itemCatId: itemCatId, itemDesc: itemDesc,
					itemStatus: itemStatus};
	
	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/updateproduct/",
		data: postData,
		dataType: 'json',
		success: function (data){
				alert(data['message']);	
		}
	});	
	
}

/**
 * update order status
 * 
 * @param $itemId
 * @returns
 */
function updateOrderStatus(itemId) {
	
	var itemStatus = $('#itemStatus_' + itemId).attr('checked');
	
	if (!itemStatus) {
		itemStatus = 0;
	} else {
		itemStatus = 1;
	}
	
	var postData = {itemId: itemId, itemStatus: itemStatus};
	
	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/setorderstatus/",
		data: postData,
		dataType: 'json',
		success: function (data){
			if(!data['success'])	
				alert(data['message']);	
			}
	});	
}

/**
 * update date payment
 * 
 * @param itemId
 * @returns
 */
function updateDatePayment(itemId) {
	
	var datePayment = $('#datePayment_' + itemId).val();
	
	var postData = {itemId: itemId, datePayment: datePayment};
	
	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/setorderdatepayment/",
		data: postData,
		dataType: 'json',
		success: function (data){
			if(!data['success'])	
				alert(data['message']);	
			}
	});	
	
}

/**
 * create XML
 * 
 * @returns
 */
function createXML() {
	$.ajax({
		type: 'POST',
		async: false,
		url: "/admin/createxml/",
		dataType: 'html',
		success: function (data){
			$('#xml-place').html(data);
			window.open('http://www.myshop.local/xml/products.xml', '_blank');
		}
	});	
}