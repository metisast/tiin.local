/* Global XHR configuration */
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
            },
            type: 'post',
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
        };