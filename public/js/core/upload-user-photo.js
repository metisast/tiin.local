/*---------- UPLOAD USER PHOTO ----------*/
    var btnSendPhoto = $('#send-photo');
    var photoUser = $('.photo-user');
    var files;

    $('#photo-user').change(function(){
        files = this.files;
    });

    btnSendPhoto.click(function(){
        if(files){
            var data = new FormData();
            $.each(files, function(key, value){
                data.append(key, value);
            });
            $.ajax({
                url: '/xhr/photo',
                type: 'post',
                contentType: false,
                //dataType: 'json',
                processData: false,
                data: data,
                beforeSend: function(){
                    photoUser.find('img').hide();
                    photoUser.append(loader());
                },
                success: function(data){
                    photoUser.find('img').show().attr('src', '/images/users/'+data.imageName);
                },
                error: function(err){
                    console.log(err.responseText);
                },
                complete: function(){
                    $('.loader').remove();
                }
            });
        }
    });