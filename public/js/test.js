/*Regions cities show*/
$(function(){

    /*---------- REGIONS AND CITIES ----------*/
    var cities = $('#cities select');

    var loader = function(){
        var loader = $('<i>').addClass('fa fa-cog fa-spin fa-2x fa-fw margin-bottom')
            .css({
                display: 'inline-block',
                textAlign: 'center',
                width: '100%',
                zIndex: '3'
            });
        return loader;
    };

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
                    photoUser.append(loader);
                },
                success: function(data){
                    photoUser.find('img').show().attr('src', '/images/users/'+data.imageName);
                },
                error: function(err){
                    console.log(err.responseText);
                },
                complete: function(){
                    loader.remove();
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
    var btnFile = $('.btn-file');
    var image = $('.btn-file img');
    var files;

    btnFile.on('change.upload','input', function(event){
        event.preventDefault();
        event.stopPropagation();

        files = this.files;
        self = $(event.delegateTarget);

        console.log(event.delegateTarget);
        if(files){
            var data = new FormData();
            $.each(files, function(key, value){
                data.append(key, value);
            });
            getAjax(self, data);
        }
    });

    var getAjax = function(self, data){
        $.ajax({
            url: '/xhr/product-images',
            type: 'post',
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            beforeSend: function(){
                console.log(self.attr('class'));
                self.empty().append(loader());
            },
            success: function(data){
                console.log(data.productImage);

                var img = $('<img>');
                img.attr('src', '/images/tmp/products-images/' + data.productImage);
                console.log(self);
                self.empty().append(img);

                var btnClose = $('<button>');
                 var btnCloseIco = $('<i>');
                 btnClose.addClass('btn btn-danger btn-delete-image').css({
                 right: '0',
                 position: 'absolute',
                 top: '0'
                 });
                 btnCloseIco.addClass('fa fa-close');
                 btnClose.append(btnCloseIco);

                 self.append(btnClose);
            },
            error: function(err){
                console.log(err.responseText);
            },
            complete: function(){
                console.log('complete');
            }
        });
    }

    $('.btn-file').on('click','.btn-delete-image', function(){
        var src = $(this).prev().attr('src');
        self = $(this).parent();
        $.ajax({
            url: '/xhr/product-images/delete',
            type: 'post',
            data: {src: src},
            success: function(data){
                var plus = $('<i>').addClass('fa fa-plus');
                var input = $('<input>').attr('type', 'file');
                self.empty().append(plus,[input]);
            },
            error: function(err){
                console.log(err);
            },
            complete: function(){

            }
        });
    });
});