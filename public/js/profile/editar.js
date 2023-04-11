jQuery(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    //Adicionar Foto

    $image_crop = $('#area-foto').croppie({
        enableExif: true,
        viewPort: {
            width: 600,
            height: 600,
        },
        boundary: {
            width: 500,
            height:500
        },
    });

    $(document).on('change', '#inputFoto' , function() {

        

        let extPermitidas = ['jpg', 'png', 'svg'];
        var extArquivo = $(this).val().split('.').pop();

        if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) != 'undefined') {
            
            let thisJs = this
            $('#modalFoto').on('shown.bs.modal', function() {
                var reader = new FileReader();
                reader.onload = function (evento) {
                    $image_crop.croppie('bind', {
                        url: evento.target.result   
                    })
                }
                reader.readAsDataURL(thisJs.files[0])
            })
            
            $('#modalFoto').modal('show')

        } else {
            alert('Arquivo não permitido.')
            $(this).val("")
        }

        
    })

    $(document).on('submit', '#adicionarFoto', function(e) {
        e.preventDefault();

        var $this = this
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            $.ajax({
                url: $this.action,
                type: $this.method,
                data: {foto: response}, 
                success:function(data)
                {
                    window.location.href = data
                },
                error: function(data)
                {
                    alert(data.responseJSON.message)
                }
            })
        })



    })





})