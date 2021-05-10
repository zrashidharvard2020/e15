var addRow = function(tableContainer,rowNum){
	var currentRow = $(`<tr class="bodyRow">
			<td class="slNo">${rowNum}<td>
			<td>
				<select class="invoice-product" name="product_id[]">
					<option value="">Select Product</option>
				</select>
			<td>
			<td><input type="number" step="any" class="unit_price" name="unit_price[]"><td>
			<td><input type="number" class="quantity" name="quantity[]"><td>
			<td><input type="number" step="any" class="product_amount" name="product_amount[]" readonly><td>
			<td><div class="deleted-row custom-button">Remove</div><td>
			</tr>`).appendTo(tableContainer);
	products.forEach(function(product){
		$(`<option value="${product.id}">${product.product_name}</option>`).appendTo(currentRow.find('.invoice-product'));
	})
	
	
}
var calculateInvoiceTotal = function(){
	var total= 0;
	$('.product_amount').each(function(index,element){
		if($(element).val() != ''){
			total += parseFloat($(element).val());
		}
	})
	$("#invoice_amount").val(total);
}

var makeOrder = function(){
	$('.bodyRow').each(function(i,row){
		$(this).find('.slNo').text(i+1)
	})
}
$(document).ready(function(){
	var tableContainer = '';
	if(mode!=='edit'){
		$('#item-details').empty();
		tableContainer = $(`<table></table>`).appendTo('#item-details');
		
		$(`<tr class="headerRow">
			<th>Sl#<th>
			<th>Product Name<th>
			<th>Unit Price<th>
			<th>Quantity<th>
			<th>Amount<th>
			</tr>`).appendTo(tableContainer);
		addRow(tableContainer,1);
	}else{
		tableContainer = $('#item-details table');
	}
	
	$('#add-more').on('click',function(){
		var i = $('.bodyRow').length +1
		addRow(tableContainer,i);
		
		
	});
	
	$("#item-details").on('change','.invoice-product',function(){
		var invoiceItem=$(this);
		var currentItem = $(this).val();
		products.forEach(function(product){
			if(product.id==currentItem){
				invoiceItem.parents('tr').find(".unit_price").val(product.unit_price);
				invoiceItem.parents('tr').find(".unit_price").trigger('change');
			}
		})
	});
	$("#item-details").on('click',".deleted-row",function(){
		$(this).parents("tr").remove();
		makeOrder();
		calculateInvoiceTotal();
	});
	$("#item-details").on('change',".unit_price",function(){
		var unitPrice = $(this).val();
		var quantity = $(this).parents('tr').find('.quantity').val();
		if(unitPrice && quantity){
			var amount = parseFloat(unitPrice)*parseInt(quantity);
			$(this).parents('tr').find('.product_amount').val(amount);
		}else{
			$(this).parents('tr').find('.product_amount').val(0);
		}
		calculateInvoiceTotal();
	});
	$("#item-details").on('change',".quantity",function(){
		var quantity = $(this).val();
		var unitPrice = $(this).parents('tr').find('.unit_price').val();
		if(unitPrice && quantity){
			var amount = parseFloat(unitPrice)*parseInt(quantity);
			$(this).parents('tr').find('.product_amount').val(amount);
		}else{
			$(this).parents('tr').find('.product_amount').val(0);
		}
		calculateInvoiceTotal();
	});
	

})