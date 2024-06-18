function fetchData() {
    $('.active').removeClass('active')
    $('#club').addClass('active')
    $('#parent').html('<center> <div class="loader"></div> </center>');
    setTimeout(()=>{
        $.ajax({
            type: 'get',
            url: 'http://127.0.0.1:8000/club',
            success: function (data) {
                $('#parent').html(data);
            }
        })
    },1000)
    
    return false;
}


$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    fetchData()
    
    $('#club').on('click', function () {
        fetchData();
    });

    // $('#form').validate()
    $('#form').on('submit', function (e) {
        if (!$(this).valid()) {
            return false
        }
        formData = new FormData(this);
        urlLink = ($('#_method').val() == "put") ? `/club/${$('#id').val()}` : $(this).attr('data-act');
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
                            fetchData()
                        }
                        $('#form').trigger('reset');
                        $('#exampleModal').modal('hide');
                        Swal.fire({
                            title: "Successfull!",
                        });
                    }
                });
            }
        });
        return false;
    })
})

$(document).on('click','#createClub',function(){
    $('#form').trigger('reset');
    $('#_method').val('post')
    $('#form').validate().resetForm();
    return false;
});

$(document).on('click', '.delete', function () {
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
                url: 'http://127.0.0.1:8000/club/' + id,
                success: function (data) {
                    if (data) {
                        fetchData();
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

$(document).on('click', '.edit', function () {
    id = $(this).attr('id');
    $.ajax({
        type: 'get',
        url: 'http://127.0.0.1:8000/club/' + id + '/edit',
        success: function (data) {
            $('#id').val(data.id);
            $('#_method').val('put');
            $('#group_id').val(data.group_id);
            $('#business_name').val(data.business_name);
            $('#club_number').val(data.club_number);
            $('#club_name').val(data.club_name);
            $('#club_state').val(data.club_state);
            $('#club_slug').val(data.club_slug);
            $('#club_description').text(data.club_description);
            $('#website_title').val(data.website_title);
            $('#website_link').val(data.website_link);
            $('#exampleModal').modal('show');
        }
    });
    return false
});

$('#form').validate({
    rules: {
        group_id: {
            required: true
        },
        business_name: {
            required: true,
        },
        club_number: {
            required: true,
        },
        club_name: {
            required: true
        },
        club_state: {
            required: true
        },
        club_description: {
            required: true
        },
        club_slug: {
            required: true
        },
        website_title: {
            required: true
        },
        website_link: {
            required: true,
            url: true
        },
        club_logo: {

            extension: 'png|jpg|jpeg'
        },
        club_banner: {

            extension: 'png|jpg|jpeg'
        },
    },
});


















//     $('#parent').append(`<table class="table">
//         <thead>
//           <tr>
//             <th scope="col">group_id</th>
//             <th scope="col">business_name</th>
//             <th scope="col">club_number</th>
//             <th scope="col">club_name</th>
//             <th scope="col">club_state</th>
//             <th scope="col">club_description</th>
//             <th scope="col">club_slug</th>
//             <th scope="col">website_title</th>
//             <th scope="col">website_link</th>
//             <th scope="col">club_logo</th>
//             <th scope="col">club_banner</th>
//           </tr>
//         </thead>
//         <tbody>
//         </tbody>
//       </table>`)
//     data.forEach(item => {
//         $('tbody').append(`<tr>
//   <td scope="col">${item.group_id}</td>
//   <td scope="col">${item.business_name}</td>
//   <td scope="col">${item.club_number}</td>
//   <td scope="col">${item.club_name}</td>
//   <td scope="col">${item.club_state}</td>
//   <td scope="col">${item.club_description}</td>
//   <td scope="col">${item.club_slug}</td>
//   <td scope="col">${item.website_title}</td>
//   <td scope="col">${item.website_link}</td>
//   <td scope="col"><img src="upload/category/club_logo/${item.club_logo}" alt="" class="img_control"> </td>
//   <td scope="col"><img src="upload/category/club_banner/${item.club_banner}" alt="" class="img_control"> </td>
// </tr>`)
//     });
