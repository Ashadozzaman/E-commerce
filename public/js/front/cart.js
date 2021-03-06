		// localStorage.clear();
$(function(){
	cartDetails();
	showcartDetails();
	$('.addToCart').click(function(){
		// localStorage.clear();
		let productID = $(this).attr('cus-product-id');
		let productName = $(this).attr('cus-product-name');
		let productPrice = $(this).attr('cus-product-price');
		let productImage = $(this).attr('cus-product-image');

		let product = {
			'productID' : productID,
			'productName' : productName,
			'productPrice' : productPrice,
			'productQuantity' : 1,
			'productImage' : productImage,

		};

		let cart = [];
		if (localStorage.getItem('cart')===null) {

		}else{
			cart = JSON.parse(localStorage.getItem('cart'));
		}

//multipale product add to cart
		let index = checkCart(product);
		console.log(index);
		if (index == -1) {
			addToCart (cart,product);
		}else{
			updateCart(product,index)
		}


		// cart.push(product);
		// localStorage.setItem("cart",JSON.stringify(cart));
		cartDetails();
	});

// $(document).on('click','.remove',function())

	$('.removeItem').click(function(){
		let productID = $(this).attr('cus-product-id');
		let cartNo  = $(this).attr('cart_item_no');
		let cart = JSON.parse(localStorage.getItem('cart'));
		// alert(cart.productName);
		// console.log(cart.productName);
		if (productID == cart[cartNo].productID) {
			cart.splice(cartNo,1);
		}

		localStorage.setItem("cart",JSON.stringify(cart));
		cartDetails();
	});


$('.checkout_btn').click(function(){
	// alert('yes');
	if (checkCartItem()) {
		let cartData = JSON.parse(localStorage.getItem('cart'));
		let client = {
			name : $('#input-name').val(),
			email : $('#input-email').val(),
			phone : $('#input-phone').val(),
			address : $('#input-address').val(),

		};

		if (client.name != '' && client.email != '' &&client.phone != '' &&client.address != '' ) {
			let url = $(this).attr('cus-url');
			$.ajax({
				url:url,
				data:{data:{cart:cartData,client:client,}},
				type:'get',
				success: function(responce){
					let res = JSON.parse(responce);
					if (res.order_id) {
						localStorage.clear();
						alert('success');
						cartDetails();
						showcartDetails();
						clearClientInput();
						let redirectURL = $('url').attr('val');
						window.location.replace(redirectURL+'/'+res.order_id);
					}else{
						console.log('error');
					}
				},
				failed: function(){

				},
			});

		}else{
			alert('All client feilds are required!!!');

		}
		console.log(client);
		
	}

});


function updateCart(product,index){
	let cart = JSON.parse(localStorage.getItem('cart'));
	cart[index].productQuantity += 1;
	// console.log(cart);
	localStorage.setItem("cart",JSON.stringify(cart));
}
function addToCart(cart,product){
	// cart.push(product);
	// localStorage.setItem("cart",JSON.(cart));
	cart.push(product);
	localStorage.setItem("cart",JSON.stringify(cart));
}
function checkCart(product){
	let res = -1;
	if (localStorage.getItem('cart') == null) {
		return -1;
	}else{
		let cartData = JSON.parse(localStorage.getItem('cart'));

		let i;
		for (i=0; i<cartData.length; i++) {
			if (cartData[i].productID == product.productID) {
				res = i;
				break;
			}
		}

	}

	return res;

}

function cartDetails(){

	let total_price = 0;
	
	let cartHtml = '';
	if (localStorage.getItem('cart') === null) {
		$('.number-shopoping-cart').html(0);

	}else{
		let cartData = JSON.parse(localStorage.getItem('cart'));
		$('.number-shopoping-cart').html(cartData.length);
		// console.log(cartData);
		cartData.forEach(function(data,index){
			cartHtml += '<li>'+
                    '<span class="item">'+
                        '<span class="item-left">'+
                            '<img style="width:50px;height:50px" src="'+data.productImage+'" alt="" />'+
                            '<span class="item-info">'+
                                '<span>'+data.productName+'</span>'+
                                '<span>'+data.productQuantity+'</span>'+
                                '<span>price: '+data.productPrice * data.productQuantity+'</span>'+
                            '</span>'+
                        '</span>'+
                        '<span class="item-right">'+
                            '<button class="btn btn-danger fa fa-close removeItem" cus-product-id="'+data.productID+'" cart_item_no="'+index+'" ></button>'+
                        '</span>'+
                    '</span>'+
                  '</li>';
            total_price += (data.productPrice*data.productQuantity);    

		});



		
	}
	$('#cart_table').html(cartHtml);
		$('.total_price').html('$'+total_price);
}
function showcartDetails(){
		let total_price = 0;
		
		let cartHtml = '';
	if (localStorage.getItem('cart') === null) {

	}else{
		let cartData = JSON.parse(localStorage.getItem('cart'));
		$('.number-shopoping-cart').html(cartData.length);
		// console.log(cartData);

		cartData.forEach(function(data,index){
			cartHtml += '<tr><td>'+
                  '<div class="media">'+
                    '<div class="d-flex">'+
                      '<img src="'+data.productImage+'" alt="" />'+
                    '</div>'+
                    '<div class="media-body">'+
                      '<p>'+data.productName+'</p>'+
                    '</div>'+
                  '</div>'+
                '</td>'+
                '<td>'+
                  '<h5>$'+data.productPrice+'</h5>'+
                '</td>'+
                '<td>'+
                  '<div class="product_count">'+
                    '<span class="input-number-decrement"> <i class="fa fa-minus"></i></span>'+
                    '<input class="input-number" type="text" value="'+data.productQuantity+'" min="1" >'+
                    '<span class="input-number-increment"> <i class="fa fa-plus"></i></span>'+
                  '</div>'+
                '</td>'+
                '<td>'+
                  '<h5>$'+data.productPrice * data.productQuantity+'</h5>'+
                '</td>'+
                '</tr>';
            total_price += (data.productPrice*data.productQuantity);    

		});

	}
	$('#showDetailsCart').html(cartHtml);
		$('.total').html('$'+total_price);
}


function clearClientInput(){
	$('#input-name').val('');
	$('#input-email').val('');
	$('#input-phone').val('');
	$('#input-address').val('');

}


function checkCartItem(){
	if (localStorage.getItem('cart') === null) {
		return false;
	}else{
		return true;
	}
}

});