jQuery(document).ready(function() {
    console.log(':D');
    // load_iframe();
    var dvls_city = jQuery.parseJSON(localcheckout_array.local_address_checkout);
    var citySelect = jQuery('#billing_city');
    var districtSelect = jQuery('#billing_state');
    var city_id_slt = '';

    citySelect.append('<option value="" >Chọn tỉnh/thành phố</option>');
    jQuery(dvls_city).each(function(index, value){
        citySelect.append('<option value="'+value.id+'" >'+value.name+'</option>');
    });

    jQuery(citySelect).on('change',function(){
        var thisval = jQuery(this).val();
        city_id_slt = thisval;
        districtSelect.html('<option value="" selected>'+localcheckout_array.select_text+'</option>');
        jQuery(dvls_city).each(function(index, value){
            if(thisval == value.id){
                jQuery(value.district).each(function(index, value) {
                    districtSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                return false;
            }
        });
    });

})