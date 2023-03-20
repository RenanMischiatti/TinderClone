jQuery(document).ready(function(){

var imgHTML = ""
var arrayImagens = []

$('#foto').on('change', function() {
    let file = this.files
    arrayImagens.push(file[0])
    displayImages()
    $('#area-foto').css('display', 'block')
    
})

function displayImages() {
    $('#foto').val('')
    
    arrayImagens.forEach((image, index) => {
        imgHTML += 
        `
        <div class="col-md-2">
            <span class="excluir text-danger" data-valor="${index}">&times;</span>
            <img src="${URL.createObjectURL(image)}" class="img-fluid images"> 
        </div>
        
        `
    })  

    
    $('#area-foto').html(imgHTML)
    imgHTML = ''


}

$(document).on('click', '.excluir', function() {
    arrayImagens.splice($(this).attr('data-valor'), 1)
    displayImages()
})


})