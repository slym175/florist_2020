jQuery(function () {
    if (jQuery(".wpb-date").length) {
        jQuery(".wpb-date").datepicker({
            altFormat: "yy-mm-dd",
            dateFormat: "yy-mm-dd"
        });
    }
});