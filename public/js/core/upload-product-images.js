    /*---------- Upload images ----------*/
    var btnFile = $('.btn-file');
    var image = $('.btn-file img');
    var files;

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
                deleteImage();
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
    var deleteImage = function(){
        $('.btn-file').on('click.delete.image','.btn-delete-image', function(){
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
    };