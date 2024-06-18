function fetchProduct() {
    $('#parent').html('<center> <div class="loader"></div> </center>');
    setTimeout(()=>{
        $.ajax({
            type: 'get',
            url: '/product',
            success: function (data) {
                $('#parent').html(data);
            }
        });
    },1000);
    
    return false;
}

$('#product').on('click',function(){
    $('.active').removeClass('active')
    $('#product').addClass('active')
    fetchProduct();
})

$(document).on('click','#createProduct',function(){
    $('#Productform').trigger('reset');
    $('#_method').val('post')
    $('#form').validate().resetForm();
    return false;
});


$('#Productform').on('submit', function (e) {
    if (!$(this).valid()) {
        return false
    }
    formData = new FormData(this);
    // console.log(formData);
    urlLink = ($('._method').val() == "put") ? `/product/${$('#Prod_id').val()}` : $(this).attr('data-act');
    e.preventDefault();
    Swal.fire({
        title: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result) => {
        if (result.value) {
    $.ajax({
        type: 'post',
        url: urlLink,
        data: formData,
        dataType: 'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            if (data) {
                fetchProduct()
            }
            $('#Productform').trigger('reset');
            $('#ProductModal').modal('hide');
            Swal.fire({
                title: "Successfull!",
            });
        },
        error:function(error){
            console.log(error);
        }
    });
}
});
    return false;
});

$(document).on('click','.deleteProduct',function(){
    id = $(this).attr('id');
    Swal.fire({
        title: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result)=>{
        if(result.value){
            $.ajax({
                type: 'delete',
                url: 'http://127.0.0.1:8000/product/' + id,
                success: function (data) {
                    if (data) {
                        fetchProduct();
                        Swal.fire({
                            title: "Successfull!",
                        });
                    }
                }
            });
        }
    })
    
    return false
});

$(document).on('click', '.editProduct', function () {
    id = $(this).attr('id');
    $.ajax({
        type: 'get',
        url: '/product/' + id + '/edit',
        success: function (data) {
            $('#Prod_id').val(data.id);
            $('._method').val('put');
            $('#club_id').val(data.club_id);
            $('#title').val(data.title);
            console.log($('#title').val());
            $('#product_title').val(data.product_title);
            $('#type').val(data.type);
            $('#ProductModal').modal('show');

        }
    });
    return false
});

$('#Productform').validate({
    rules: {
        title: {
            required: true
        },
        product_title: {
            required: true
        },
        type: {
            required: true,
        },
        club_id: {
            required: true,
        }
    },
});


