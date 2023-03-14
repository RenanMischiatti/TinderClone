$('#foto').on('change', function(event) {
    let imageArray = []
    let file = this.files
    console.log('entrou')
    imagesArray.push(file[0])
    displayImages()
})

function displayImages() {
    let images = ""
    imagesArray.forEach((image, index) => {
        images += `<div class="image">
                <img src="${URL.createObjectURL(image)}" alt="image">
                <span onclick="deleteImage(${index})">&times;</span>
              </div>`
    })
    $('#area-foto').html(images)
}

function deleteImage(index) {
    imagesArray.splice(index, 1)
    displayImages()
  }