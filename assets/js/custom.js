$(document).ready(function () {
    $(".hethong-items").click(function () {
        $(".info-items").fadeToggle("slow");
    });
    $(".title").click(function () {
        $(".items").fadeToggle("slow");
    });

    $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
    });
});
