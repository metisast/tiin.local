/*Post publish*/
    var publish = $('#publish');
    publish.submit(function(e){
        e.preventDefault();
        var data = publish.serialize();
        var path = publish.data('src');
        $.ajax({
            url: path,
            data: data,
            success: function(data){
                $('.has-error').removeClass('has-error');
                $('.help-block').remove();
                $('#error-fields').remove();
                console.log(data);
                successModal();
                publish[0].reset();
                clearImages();
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

    /* Show inputs error */
    var errorMessage = function(field){
        var span = $('<span>').addClass('help-block');
        var strong = $('<strong>').html(field);
        span.append(strong);

        return span;
    };

    /* Show top message */
    var errorTopMessage = function(){
        var block = $('#product');
        var errorFields = $('#error-fields');
        $.ajax({
            url: '/xhr/messages/error',
            success: function(data){
                errorFields.remove();
                block.prepend(data);
            }
        });

        $('body, html').animate({
            scrollTop: 100
        }, 1000);
    };

    /* Show modal */
    var successModal = function(){
        $.ajax({
            url: '/xhr/messages/success',
            success: function(data){
                publish.append(data);
                $('#myModal').modal({
                    keyboard: false
                });
            }
        });
    };

    /* Clear images */
    var clearImages = function(){
        var btnFile = $('.btn-file');
        var plus = $('<i>').addClass('fa fa-plus');
        var input = $('<input>').attr('type', 'file');

        btnFile.empty().append(plus,[input]);
    };

    /* Close modal */
    $('#publish').on('click','.btn-close',function(){
        $('#myModal').on('hidden.bs.modal', function(){
            publish.empty();
            document.location.href='/profile';
        })
    });

    /* Publish  continued */
    $('#publish').on('click','.btn-add',function(){
        $('#myModal').on('hidden.bs.modal', function(){
            publish.empty();
        })
    });