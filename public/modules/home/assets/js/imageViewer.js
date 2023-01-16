const picturesSingleItems = document.querySelectorAll('.picture-single-picture-card')
const imageViewerSection = document.getElementById('image-viewer')
let imageViewerImg = imageViewerSection.querySelector('img')

picturesSingleItems.forEach(pictureItem => {
  const pictureItemImage = pictureItem.querySelector('img')
  pictureItemImage.addEventListener('click', () => {
    imageViewerImg.src = pictureItemImage.src
    imageViewerSection.style.visibility = 'visible'
    imageViewerSection.style.opacity = '1'
    body.style.overflow = 'hidden'
  })
})

const imageViewerClose = document.querySelector('.image-viewer-close')
imageViewerClose.addEventListener('click', () => {
  imageViewerSection.style.visibility = 'hidden'
  imageViewerSection.style.opacity = '0'
  body.style.overflow = 'auto'
})

imageViewerSection.addEventListener('click',(e) => {
  if(e.target === imageViewerSection){
    imageViewerSection.style.visibility = 'hidden'
    imageViewerSection.style.opacity = '0'
    body.style.overflow = 'auto'
  }
})