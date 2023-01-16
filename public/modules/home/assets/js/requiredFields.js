const contactUsForm = document.querySelector('.contact-us-form-section form')
const contactUsFormInputs = contactUsForm.querySelectorAll('input')
const contactUsFormTextareaAll = contactUsForm.querySelectorAll('textarea')
const contactSubmit = document.getElementById('contact-submit')


contactUsFormInputs.forEach(contactUsInput => {
  const contactInputError = document.querySelector(`.contact-us-form-section form span[error-for="${contactUsInput.id}"]`)
  contactUsInput.addEventListener('invalid',() => {
    contactUsInput.setCustomValidity('این مورد را به درستی وارد نمایید')
  })
  contactUsInput.addEventListener('focusout',() => {
    if(contactInputError){
      contactInputError.style.display = 'block'
      if(!contactUsInput.checkValidity()){
        contactUsInput.style.borderColor = 'var(--red2)'
      }else{
        contactUsInput.style.borderColor = 'var(--border)'
        contactInputError.style.display = 'none'
      }
    }
  })
})
contactUsFormTextareaAll.forEach(contactUsTextarea => {
  contactUsTextarea.addEventListener('invalid',() => {
    contactUsTextarea.setCustomValidity('این مورد را به درستی وارد نمایید')
  })
  const contactTextareaError = document.querySelector(`.contact-us-form-section form span[error-for="${contactUsTextarea.id}"]`)
  contactUsTextarea.addEventListener('focusout',() => {
    if(contactTextareaError){
      contactTextareaError.style.display = 'block'
      if(!contactUsTextarea.checkValidity()){
        contactUsTextarea.style.borderColor = 'var(--red2)'
      }else{
        contactUsTextarea.style.borderColor = 'var(--border)'
        contactTextareaError.style.display = 'none'
      }
    }
  })
})

