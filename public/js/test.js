/*Regions cities show*/
$(function(){

    /*---------- REGIONS AND CITIES ----------*/
    var cities = $('#cities select');
    var loader = $('<i>').addClass('fa fa-cog fa-spin fa-2x fa-fw margin-bottom').css('display', 'block');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#regions select').on('change', function(){
        var region_id = $(this).val();

        if(region_id != 0){
            $.ajax({
                url: '/xhr/cities',
                type: 'post',
                data: {id: region_id},
                beforeSend: function(){
                    cities.hide();
                    $('#cities').append(loader);
                },
                success: function (data) {
                    cities.show().html(data).attr('disabled', false);
                },
                error: function (err) {
                    console.log(err);
                },
                complete: function(){
                    loader.remove();
                }
            });
        }else{
            cities.empty().attr('disabled', true);
        }

    });

    /*---------- UPLOAD USER PHOTO ----------*/
    var btnSendPhoto = $('#send-photo');
    var photoUser = $('.photo-user');
    var files;

    $('#photo-user').change(function(){
        files = this.files;
        //console.log(files[0]);
    });

    btnSendPhoto.click(function(){
        event.stopPropagation();
        event.preventDefault();

        if(files){
            var data = new FormData();
            $.each(files, function(key, value){
                data.append(key, value);
            });

            //console.log(data);

            $.ajax({
                url: '/xhr/photo',
                type: 'post',
                contentType: false,
                //dataType: 'json',
                processData: false,
                data: data,
                success: function(data){
                    //console.log(data);
                    $('.photo-user').attr('src', '/images/users/'+data.imageName);
                },
                error: function(err){
                    console.log(err.responseText);
                }
            });
        }
    });

    /*---------- PRODUCTS CATEGORIES ----------*/
    $('#category select').on('change', function(){
        var category_id = $(this).val();
        console.log(category_id);
        var category_sub = $('#category_sub select');

        if(category_id != 0){
            $.ajax({
                url: '/xhr/subcat',
                type: 'post',
                data: {id: category_id},
                beforeSend: function(){
                    category_sub.hide();
                    $('#category_sub').append(loader);
                },
                success: function (data) {
                    category_sub.show().html(data).attr('disabled', false);
                },
                error: function (err) {
                    console.log(err);
                },
                complete: function(){
                    loader.remove();
                }
            });
        }else{
            category_sub.empty().attr('disabled', true);
        }
    });

    /*---------- Upload images ----------*/

});