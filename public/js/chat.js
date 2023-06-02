$(document).ready( function () {
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#inputBusca').on('input', function() {
        var busca = $(this).val().toLowerCase();

        $('.usuario').each(function() {
            var nome = $(this).find('.nome').text().toLowerCase();
            nome.includes(busca) ? $(this).slideDown() : $(this).slideUp()
        });
    });

    $(document).on('click ontouch', '.usuario', function(event) {
        let $this = $(this)
        $.ajax({
            method: 'post',
            url: $(this).data('rota'),
            data: {id : $(this).data('id')},
            success: function(data) {


                $('.active').removeClass('active')
                $this.addClass('active')
                $('#areaChat').html(data)
                $(document).on('input', '.areaInput textarea', function(e) {

                    if($(this).val() != '') {
                        $(this).parent().css('width', '80%')
                        $('.send-button').attr('disabled', false)
                    } else {
                        $(this).parent().css('width', '50%')
                        $('.send-button').attr('disabled', true)
                    }
                })
            }
        })
    })


})