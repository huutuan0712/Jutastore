$(document).ready(function(){
    loadcart()
    $('.addToCart').click(function(e){
     e.preventDefault();
    var product_id =$(this).closest('.product_data').find('.prod_id').val();
    var product_qty =$(this).closest('.product_data').find('.qty-input').val();
    $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    $.ajax({
        method:"POST",
        url:"/add-to-cart",
        data:{
            'product_id':product_id, 'product_qty':product_qty,
        },
        dataType:"dataType",
     success:function(response){
         alert(response.status);
         loadcart()
     }
    })

    });
     $('.increment-btn').click(function(e){
     
         e.preventDefault();
         
     
        var inc_value =$(this).closest('.product_data').find('.qty-input').val();
         var value = parseInt(inc_value,10);
         value = isNaN(value ) ? 0: value;
         if(value < 10){
             value++;
          
            $(this).closest('.product_data').find('.qty-input').val(value);
         }
     });
     $('.decrement-btn').click(function(e){
         e.preventDefault();
         
      
         var dec_value =$(this).closest('.product_data').find('.qty-input').val();
         var value = parseInt(dec_value,10);
         value = isNaN(value ) ? 0: value;
         if(value > 1){
             value--;
         
            $(this).closest('.product_data').find('.qty-input').val(value);
         }
     });
     $('.delete').click(function(e){
        e.preventDefault();
        var prod_id =$(this).closest('.product_data').find('.prod_id').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $.ajax({
           method:"POST",
           url:"/delete-cart",
           data:{
               'prod_id':prod_id
           },
           dataType:"dataType",
        success:function(response){
           swal("",response.status,"success");
           window.location.reload();
        }
       })
     })
     $('.changeQuatity').click(function(e){
         e.preventDefault();
         var prod_id =$(this).closest('.product_data').find('.prod_id').val();
         var qty = $(this).closest('.product_data').find('.qty-input').val();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            method:"POST",
            url:"/update-cart",
            data:{
                'prod_id':prod_id,'prod_qty':qty,
            },
            dataType:"dataType",
            success:function(response){
                alert(response.status);
                window.location.reload();
            }
        })
     })
     function loadcart(){
         $.ajax({
            method:"GET",
            url:"/load-cart-data",
            success:function(response){
                // $('.cart-count').html('');
                $('.cart-count').html(response.count);
                console.log(response.count);
             
            }
         })
     }
       
 });