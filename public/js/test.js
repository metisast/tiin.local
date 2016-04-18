/*Regions cities show*/
$(function(){
    var cities = $('#cities select');
    var loader = $('<i>').addClass('fa fa-cog fa-spin fa-2x fa-fw margin-bottom').css('display', 'block');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#regions').on('change', '#regions', function(){
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

    /*--------------------*/
    var btnSendPhoto = $('#send-photo');
    var photoUser = $('.photo-user');
    var files;

    $('#photo-user').change(function(){
        files = this.files;
        //console.log(files[0]);
    })

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
});