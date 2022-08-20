$(document).ready(function () {

    function get_html(res) {
        $("#categorized_products").html(res.categorized_products);
        $("footer").html(res.pagination);
        $("h1").html(`${res.type} (page ${res.page_no})`); 
        $("title").html(`Core | ${res.type} (page ${res.page_no})`); 
        $("header nav").html(res.pagination_nav);
        $("form").attr("data-get_data", `&id=${res.id}`)
        $(".container a").attr("data-get_data", `name=${res.name}&order=${res.order}`)
    }

    $.get("/products/get_products", $(this).serialize(), function (res) {
           get_html(res);
    }, "json");

    $(document).on("click", ".link", function () {
        $.get($(this).attr("href"),  $(this).serialize() + $(this).attr("data-get_data"), function (res) {
            get_html(res);
        }, "json");
        return false;
    });

    $('form').submit(function(){
        $.get("/products/get_products", $(this).serialize() + $("form").attr("data-get_data"), function (res) {
            get_html(res);
    }, "json");
    return false
    });

    $("input").keyup(function() {
        $("#search-form").submit();
    })

    $("select").change(function() {
        $("#search-form").submit();
    })

});