/* Render auction price form */
var auctionTypeId = $('#type_id select');

auctionTypeId.on('click', function(){
    var id = $(this).val();
    $('#auction-price').empty();
    getAuctionForm(id);
});

var getAuctionForm = function(id){
    $.ajax({
        url: '/xhr/auction-price-form',
        data: {type_id: id},
        success: function(data){
            $('#type_id').parent().after(data);
        }
    });

}