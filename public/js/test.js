$(function(){
    /*Create loader*/
    var loader = function(){
        var loader = $('<i>').addClass('fa fa-cog fa-spin fa-2x fa-fw margin-bottom loader')
            .css({
                display: 'inline-block',
                textAlign: 'center',
                width: '100%',
                zIndex: '3'
            });
        return loader;
    };
    /*Global ajax config*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    /*Select request*/
    var ajaxSelect = function(path, data, response){
        $.ajax({
            url: path,
            type: 'post',
            data: data,
            success: function (data) {
                response.html(data).attr('disabled', false);
            },
            error: function (err) {
                console.log(err);
            },
            complete: function(){

            }
        });
    }

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


    /*---------- Upload images ----------*/
    var btnFile = $('.btn-file');
    var image = $('.btn-file img');

    btnFile.on('change.upload','input', function(event){
        event.preventDefault();
        event.stopPropagation();

        files = this.files;
        var self = $(event.delegateTarget);

        console.log(event.delegateTarget);
        if(files){
            var data = new FormData();
            $.each(files, function(key, value){
                data.append(key, value);
            });
            setProductImage(self, data);
        }
    });

    var setProductImage = function(self, data){
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
                showImage(self, data);
            },
            error: function(err){
                console.log(err.responseText);
            },
            complete: function(){
                self.find('.loader').remove();
            }
        });
    };

    var showImage = function(self, data){
        var img = $('<img>');
        img.attr('src', '/images/tmp/products-images/thumbs/' + data.productImage);
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

        var images = $('<input>').attr({
            type: 'hidden',
            name: 'images[]',
            form: 'publish',
            value: data.productImage
        });

        self.append(btnClose);
        self.append(images);
    };

    /*Delete image*/
    $('.btn-file').on('click','.btn-delete-image', function(){
        var src = $(this).prev().attr('src');
        var a = src.split('/');
        var imageName = a[a.length-1];
        var self = $(this).parent();
        $.ajax({
            url: '/xhr/product-images/delete',
            type: 'post',
            data: {imageName: imageName},
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

    /*Post publish*/
    var publish = $('#publish');
    publish.submit(function(e){
        e.preventDefault();
        var data = publish.serialize();
        var path = publish.data('src');
        $.ajax({
            url: path,
            type: 'post',
            data: data,
            success: function(data){
                $('.has-error').removeClass('has-error');
                $('.help-block').remove();
                $('#error-fields').remove();
                console.log(data);
            },
            error: function(err){
                errorTopMessage();
                var fields = JSON.parse(err.responseText);
                $('.has-error').removeClass('has-error');
                $('.help-block').remove();
                for(var key in fields){
                    var field = $("[name="+key+"]");
                    console.log(field);
                    field.parents('.form-group').addClass('has-error').append(errorMessage(fields[key]));
                }
            }
        });
    });

    var errorMessage = function(field){
        var span = $('<span>').addClass('help-block');
        var strong = $('<strong>').html(field);
        span.append(strong);

        return span;
    }
    var errorTopMessage = function(){
        var block = $('#product');
        var errorFields = $('#error-fields');
        $.ajax({
            url: '/xhr/messages/error',
            type: 'post',
            success: function(data){
                errorFields.remove();
                block.prepend(data);
            }
        });

        $('body, html').animate({
            scrollTop: 100
        }, 1000);
    }
});