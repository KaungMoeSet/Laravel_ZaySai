$(document).ready(function () {
    $('#summernote').summernote();


    $('#main_category').on('change', function () {
        var main_category_id = $(this).val();
        if (main_category_id) {
            $.ajax({
                url: '/get-subCategoires/' + main_category_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#sub-category-div').empty();
                    $('#sub-category-div').show();
                    $('#sub-category-div').append(`
                                    <div class="form-group">
                                        <label for="sub-catg">Category</label>
                                            <div>
                                              <select class="form-control" name="sub_category" id="sub-catg">
                                                <option value="" disabled>Choose your category</option>`);
                    $.each(data, function (key, value) {
                        // console.log(key, value);
                        $('#sub-catg').append(`<option value="${key}">${value}</option>`);
                    });
                    $('#sub-category-div').append(`</select>
                                                    </div>
                                                    </div>`);
                }
            });
        } else {
            $('#sub-category-div').empty();
            $('#sub-category-div').hide();
        }
    });
});

function imageDelete(event, id) {
    event.preventDefault();

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/productImage/" + id,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Handle successful deletion
                    // Remove the deleted row from the table
                    console.log("Image deleted");
                    $("#delete-form" + id).closest("tr").remove();
                    window.location.reload();
                },
                error: function (xhr) {
                    // Handle error
                    window.location.reload();
                    // console.log(xhr.responseText);
                },
            });
            // document.getElementById('delete-form' + id).submit();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your file is safe :)',
                'error'
            )
        }
    });
}
