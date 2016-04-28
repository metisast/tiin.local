/* Select options */
    /*---------- REGIONS AND CITIES ----------*/
    var regions = $('#regions select');
    var cities = $('#cities select');

    regions.on('change', function(){
        var region_id = $(this).val();

        if(region_id != 0) ajaxSelect('/xhr/cities', {id: region_id}, cities);
        else cities.empty().attr('disabled', true);
    });

    /*---------- PRODUCTS CATEGORIES ----------*/
    var category_sub = $('#category_sub select');

    $('#category select').on('change', function(){
        var category_id = $(this).val();

        console.log(category_id);
        if(category_id != 0) ajaxSelect('/xhr/subcat', {id: category_id}, category_sub);
        else category_sub.empty().attr('disabled', true);
    });