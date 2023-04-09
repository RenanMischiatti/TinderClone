jQuery(document).ready(function(){

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

    $(document).on('change', '#inputFoto' , function(e) {

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







})