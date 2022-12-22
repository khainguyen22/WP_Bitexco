jQuery(document).ready(function ($) {
    function filler_posts($the_slug, $name, $company, $location, $type) {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajaxObject1.ajaxurl,
            data: {
                action: 'fillter_post_ajax',
                data_page: '1',
                data_slug: $the_slug,
                data_name: $name,
                data_company: $company,
                data_location: $location,
                data_type: $type
            },
            beforeSend: function (data) {
                // $(".lists-post .list").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');
                $('.lists-post .list').html(
                    '<div class="loader-box">' +
                    '<div class="loader"></div>'
                    + '</div>'
                )
            },
            success: function (data) {
                var $data = $(data);
                if ($data.length) {
                    $(".lists-post .list").html($data);
                }
                var results = data.split('|');
                $('.lists-post .list').html(results[0])
                $('.pagination').html(results[1])
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }
    $the_slug = $('.the_slug').val();
    $('.button-submit').on('click', function () {
        $the_slug = $('.the_slug').val();
        $name = $('.form-control.search').val();
        $company = $('select[name="company"] option:selected').val();
        $location = $('select[name="location"] option:selected').val();
        $type = $('select[name="type"] option:selected').val();
        filler_posts($the_slug, $name, $company, $location, $type);
    });
    $('.button-reset').on('click', function () {
        $name = '';
        $company = '';
        $location = '';
        $type = '';
        $('.form-control.search').val('');
        $('select').val("");
        filler_posts($the_slug, $name, $company, $location, $type);
    });

    // Pagination

    $("body").on("click", ".lists-post .page-numbers", (e) => {
        e.preventDefault();
        // const inputValue = $('.shareholder-content input').val();
        var paged = '';
        paged = e.target.innerText
        if (e.target.closest('.lists-post .page-numbers').classList.contains('prev')) {
            paged = parseInt($('.lists-post .page-numbers.current').text()) - 1;
        } else if (e.target.closest('.page-numbers').classList.contains('next')) {
            paged = parseInt($('.lists-post .page-numbers.current').text()) + 1;
        }
        $name = $('.form-control.search').val();
        $company = $('select[name="company"] option:selected').val();
        $location = $('select[name="location"] option:selected').val();
        $type = $('select[name="type"] option:selected').val();
        $.ajax({
            url: ajaxObject1.ajaxurl,
            type: "POST",
            data: {
                action: "post_nav_action",
                paged: paged,
                data_name: $name,
                data_location: $company,
                data_company: $location,
                data_type: $type,
            },
            beforeSend(data) {
                $('.lists-post .list').html(
                    '<div class="loader-box">' +
                    '<div class="loader"></div>'
                    + '</div>'
                )
            },
            success(data) {
                var results = data.split('|');
                $('.lists-post .list').html(results[0])
                $('.lists-post .pagination').html(results[1])
            },
            error(errorThrown) {
                console.log(errorThrown);
            },
        });
    });

});
