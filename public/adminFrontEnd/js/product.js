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
