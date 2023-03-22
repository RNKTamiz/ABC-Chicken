$(document).ready(function(){
    $('.increment-btn').click(function (e){
        e.preventDefault();

        var qty = $(this).closest('.product-data').find('.input-qty').val();

        var value = parseInt(qty, 10);

        value = isNaN(value) ? 0: value;

        if(value < 100){
            value++;
           
            $(this).closest('.product-data').find('.input-qty').val(value);

        }
    });

    $('.decrement-btn').click(function (e){
        e.preventDefault();

        var qty = $(this).closest('.product-data').find('.input-qty').val();

        var value = parseInt(qty, 10);

        value = isNaN(value) ? 0: value;

        if(value > 1){
            value--;
           
            $(this).closest('.product-data').find('.input-qty').val(value);

        }
        alert("no");
    });

    $('.addToCartBtn').click(function (e) { 
        e.preventDefault();

        var qty = $(this).closest('.product-data').find('.input-qty').val();
        var prod_id = $(this).val();
        
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id":prod_id,
                "prod_qty":qty,
                "scope":"add"
            },
            success: function (response) {
                if(response==401)
                {
                    alert("Login to continue");
                }
            }
        });
        
    });
});