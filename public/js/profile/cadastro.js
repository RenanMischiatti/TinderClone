jQuery(document).ready(function(){

var images = ""
var imagens = []

$('#foto').on('change', function() {
    let file = this.files
    imagens.push(file[0])
    displayImages()
    $('#area-foto').css('display', 'flex')
})

function displayImages() {
    
    imagens.forEach((image, index) => {
        images += 
        `
        <div class="image" style="background: url('${URL.createObjectURL(image)}')">
            <span onclick="deleteImage(${index})">&times;</span>
        </div>
        
        `
    })
    $('#area-foto').html(images)
}

function deleteImage(index) {
    imagens.splice(index, 1)
    displayImages()
}


})