jQuery(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $image_crop = $('#area-foto').croppie({
        enableExif: true,
        viewPort: {
            width: 200,
            height: 200,
        },
        boundary: {
            width:300,
            height:300
        }
    });

    $('#foto').on('change', function() {

        let extPermitidas = ['jpg', 'png', 'svg'];
        var extArquivo = $(this).val().split('.').pop();

        if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) != 'undefined') {
            $('#area-foto').show()
            $('.botaoSubmit').show()

            var reader = new FileReader();
            reader.onload = function (evento) {
                $image_crop.croppie('bind', {
                    url: evento.target.result
                })
            }
            reader.readAsDataURL(this.files[0])
        } else {
            alert('Arquivo não permitido.')
            $(this).val("")
            $('#area-foto').hide()
            $('.botaoSubmit').hide()
        }
    })

    $('#formCadastro').on('submit', function(event) {
        event.preventDefault();
        var $this = this
        var $thisJquery = $(this)
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response){
            var formDados = $thisJquery.serializeArray();
            formDados.push({name: 'imagem', value: response})
            console.log(formDados)
            $.ajax({
                url: $this.action,
                type: $this.method,
                data: formDados, 
                success:function(data)
                {
                    console.log(data)
                }

            })
        })
        
    })



})