$(document).ready( function () {
    
    $(document).on('click ontouch', '.usuario', function(event) {
        $.ajax({
            method: 'post',
            url: $(this).data('rota'),
            data: {id : $(this).data('id')},
            success: function(data) {
                
            }
        })
    })

})