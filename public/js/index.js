$(document).ready(function() {
    $(".add").on('click', function(e) {
        e.preventDefault();
        let cloneDiv = $(".child_div").eq(0).clone();
        $(cloneDiv).find('.city').val("");
        $(cloneDiv).find('.add').remove();

        $(cloneDiv).find('.div').after('<div class="col-md-1"><buttton type="button" class="remove btn btn-danger">Remove</buttton></div><br/>');
        $('.parent_div').append(cloneDiv);
        $(cloneDiv).find('.remove').on('click', function() {
            $(this).parent().parent().remove();
        });
    });

    $(".add_city").on('click', function(e) {
        e.preventDefault();
        let cloneDiv = $(".city").eq(0).clone();
        $(cloneDiv).find('.city').val("");
        $(cloneDiv).find('.add_city').remove();

        $(cloneDiv).find('.select_city').after('<div class="col"><buttton type="button" class="remove btn btn-danger">Remove</buttton></div><br/>');
        $('.parent').append(cloneDiv);
        $(cloneDiv).find('.remove').on('click', function() {
            $(this).parent().parent().remove();
        });
    });

    $('#city_form').on('submit', function(e) {
        var method = $(this).attr('method');
        if (method !== 'put') {
            return;
        }
        e.preventDefault();
        $.ajax({
            url: "/api/city/" + $("#city_id").val(),
            type: 'put',
            data: $(this).serialize(),
            dataType: "JSON",
            success: function(res) {
                location.reload();

            }
        });
    });

    $('.delete_city').on('click', function() {
        var id = $(this).data("id");

        $.ajax({
            url: "/api/city/" + id,
            type: 'DELETE',
            data: {
                "id": id,
            },
            success: function() {
                location.reload();
            }
        });
    });

    $('#cleaner_form').on('submit', function(e) {
        var method = $(this).attr('method');
        if (method !== 'put') {
            return;
        }
        e.preventDefault();
        $.ajax({
            url: "/api/cleaner/" + $("#cleaner_id").val(),
            type: 'put',
            data: $(this).serialize(),
            dataType: "JSON",
            success: function(res) {
                location.reload();

            }
        });
    });

    $('.delete_cleaner').on('click', function() {
        var id = $(this).data("id");

        $.ajax({
            url: "/api/cleaner/" + id,
            type: 'DELETE',
            data: {
                "id": id,
            },
            success: function() {
                location.reload();
            }
        });
    });



});

function getCity(cityId) {
    $.ajax({
        url: "/api/city/" + cityId,
        type: 'get',
        dataType: "JSON",
        success: function(res) {
            $("#city_form").attr('method', 'put');
            $("#city_id").val(res.data.id);
            $("#city").val(res.data.name);
            $("#submit_city").html('Update City');
        }
    });
}

function getCleaner(cleanerId) {
    $.ajax({
        url: "/api/cleaner/" + cleanerId,
        type: 'get',
        dataType: "JSON",
        success: function(res) {
            $("#cleaner_form").attr('method', 'put');
            $("#cleaner_id").val(res.data.id);
            $("#first_name").val(res.data.first_name);
            $("#last_name").val(res.data.last_name);
            $("#phone_no").val(res.data.phone_no);
            $("#city_name").val(res.data.cities)
            $("#add_cleaner").html('Update');
        }
    });

}