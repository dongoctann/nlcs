/* Set values + misc */
var promoCode;
var promoPrice;
var fadeTime = 300;

/* Assign actions */
$(document).ready(function () {
    
    $('.quantity input').change(function() {
        updateQuantity(this);
    });
    
    $('.remove button').click(function() {
        removeItem(this);
    });
    
    $(document).ready(function() {
        updateSumItems();
    });
});


$('.promo-code-cta').click(function() {
    promoCode = $('#promo-code').val();
    if (promoCode == '10off' || promoCode == '10OFF') {
        //If promoPrice has no value, set it as 10 for the 10OFF promocode
        if (!promoPrice) {
            promoPrice = 10;
        } else if (promoCode) {
            promoPrice = promoPrice * 1;
        }
    } else if (promoCode != '') {
        alert("Invalid Promo Code");
        promoPrice = 0;
    }
    //If there is a promoPrice that has been set (it means there is a valid promoCode input) show promo
    if (promoPrice) {
        $('.summary-promo').removeClass('hide');
        $('.promo-value').text(promoPrice.toFixed(2));
        recalculateCart(true);
    }
});

/* Recalculate cart */
function recalculateCart(onlyTotal) {
    var subtotal = 0;

    /* Sum up row totals */
    $('.basket-product').each(function() {
        subtotal += parseFloat($(this).children('.subtotal').text());
    });

    /* Calculate totals */
    var total = subtotal;

    //If there is a valid promoCode, and subtotal < 10 subtract from total
    var promoPrice = parseFloat($('.promo-value').text());
    if (promoPrice) {
        if (subtotal >= 10) {
            total -= promoPrice;
        } else {
            alert('Order must be more than £10 for Promo code to apply.');
            $('.summary-promo').addClass('hide');
        }
    }

    /*If switch for update only total, update only total display*/
    if (onlyTotal) {
        /* Update total display */
        $('.total-value').fadeOut(fadeTime, function() {
        $('#basket-total').html(total.toFixed(2));
        $('.total-value').fadeIn(fadeTime);
        });
    } else {
        /* Update summary display. */
        $('.final-value').fadeOut(fadeTime, function() {
        $('#basket-subtotal').html(subtotal.toFixed(0));
        $('#basket-total').html(total.toFixed(0));
        if (total == 0) {
            $('.checkout-cta').fadeOut(fadeTime);
        } else {
            $('.checkout-cta').fadeIn(fadeTime);
        }
        $('.final-value').fadeIn(fadeTime);
        });
    }
}

/* Update quantity */
function updateQuantity(quantityInput) {
    /* Calculate line price */
    var productRow = $(quantityInput).parent().parent();
    var price = parseFloat(productRow.children('.price').text());
    var quantity = $(quantityInput).val();
    var linePrice = price * quantity;

    /* Update line price display and recalc cart totals */
    productRow.children('.subtotal').each(function() {
        $(this).fadeOut(fadeTime, function() {
            $(this).text(linePrice.toFixed(0));
            recalculateCart();
            $(this).fadeIn(fadeTime);
        });
    });

    productRow.find('.item-quantity').text(quantity);
    updateSumItems();
}

function updateSumItems() {
    var sumItems = 0;
    $('.quantity input').each(function() {
        sumItems += parseInt($(this).val());
    });
    $('.total-items').text(sumItems);
}

/* Remove item from cart */
function removeItem(removeButton) {
    /* Remove row from DOM and recalc cart total */
    var productRow = $(removeButton).parent().parent();
    productRow.slideUp(fadeTime, function() {
        productRow.remove();
        recalculateCart();
        updateSumItems();
    });
}

// These code calculate total price of a type item and put it to webpage
let itemTotalPrice=0;

for(const product in itemList) {
    
    //Calculate the total price of all products exist in cart
    itemTotalPrice+= itemList[product].price * window.localStorage.getItem(product);

    //Display added to cart products
    if(window.localStorage.getItem(product) > 0) {
        $(".basket-labels").after(
            `<div class="basket-product"> 
                <div class="item"> 
                    <div class="product-image"> 
                        <img src="${itemList[product].photo}"alt="Placholder Image 2" class="product-frame"> 
                    </div>
                    <div class="product-details"> 
                        <h1><span class="item-quantity">${window.localStorage.getItem(product)}</span> x ${itemList[product].name}</h1> 
                    </div>
                </div>
                <div class="price product-price">${itemList[product].price}</div>
                <div class="quantity"> 
                    <input type="number" value="${window.localStorage.getItem(product)}" min="1" class="quantity-field text-center" id="${product}" oninput="changeLocalStorage('${product}');"> 
                </div>
                <div class="subtotal product-subtotal">${itemList[product].price * window.localStorage.getItem(product)}</div>
                <div class="remove"> 
                    <button class="px-2" onclick="removeFromCart('${product}');">Xóa khỏi giỏ hàng</button> 
                </div>
            </div>`);
    }
}
$('#basket-total').text(itemTotalPrice);


//Remove an item from cart
function removeFromCart(code) {
    window.localStorage.setItem(code, 0);
    
    //Set badge
    countCart();
    $(".cartItems").text(cartItems);
}


//This function change local storage on input
function changeLocalStorage(code) {
    window.localStorage.setItem(code, $(`#${code}`).val());
    
    //Set badge
    countCart();
    $(".cartItems").text(cartItems);
}
