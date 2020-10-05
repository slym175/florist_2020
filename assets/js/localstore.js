jQuery(document).ready(function() {
    var dvls_city = jQuery.parseJSON(localstore_array.local_address);
    var citySelect = jQuery('#country_select');
    var districtSelect = jQuery('#district_select');
    var city_id_slt = 'all';

    jQuery(dvls_city).each(function(index, value){
        citySelect.append('<option value="'+value.id+'" >'+value.name+'</option>');
    });
    
    jQuery(citySelect).on('change',function(){
        var thisval = jQuery(this).val();
        city_id_slt = thisval;
        districtSelect.html('<option value="all" selected>'+localstore_array.select_text+'</option>');
        jQuery(dvls_city).each(function(index, value){
            if(thisval == value.id){
                jQuery(value.district).each(function(index, value) {
                    districtSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                return false;
            }
        });

        //load store
        jQuery.ajax({
            type: "post",
            dataType: "html",
            url: localstore_array.ajaxurl,
            data: {
                action: 'get_store',
                city_id: thisval
            },
            beforeSend: function () {
                // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
            },
            success: function (response) {
                document.getElementById('list_store').innerHTML = response;
                load_iframe();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('The following error occured: ' + textStatus, errorThrown);
            }
        });
    });

    jQuery(districtSelect).on('change',function(){
        var district_id = jQuery(this).val();

        //load store
        jQuery.ajax({
            type: "post",
            dataType: "html",
            url: localstore_array.ajaxurl,
            data: {
                action: 'get_store',
                district_id: district_id,
                city_id: city_id_slt,
            },
            beforeSend: function () {
                // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
            },
            success: function (response) {
                document.getElementById('list_store').innerHTML = response;
                load_iframe();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('The following error occured: ' + textStatus, errorThrown);
            }
        });
    });
})
function load_iframe() {
    var iframe_active = jQuery('.iframe-location-active').data('iframe');
    if(iframe_active){
        document.getElementById('maps-newsun').innerHTML = iframe_active;
    }else{
        document.getElementById('maps-newsun').innerHTML = '';
    }
    var location_name = '';
    jQuery('.location-name').hover(function () {
        var iframe = jQuery(this).data('iframe');
        var name = jQuery(this).data('name');
        if (location_name != name) {
            location_name = name;
            document.getElementById('maps-newsun').innerHTML = iframe;
        }
    });
}