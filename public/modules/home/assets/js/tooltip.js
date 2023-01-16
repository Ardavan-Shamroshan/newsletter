var btnHasTooltip = document.querySelectorAll('[btn-tooltip]')
btnHasTooltip.forEach(btnTooltip => {
  
  var createDiv = document.createElement('div')
  var createSpan = document.createElement('span')
  if(btnTooltip.hasAttribute('btn-tooltip')){
      const buttonTooltip = btnTooltip.getAttribute('btn-tooltip')
      btnTooltip.appendChild(createDiv).setAttribute('class','tooltip-div')
      const tooltipDiv = btnTooltip.querySelector('.tooltip-div')
      tooltipDiv.appendChild(createSpan)
      const tooltipSpan = tooltipDiv.querySelector('span')
      tooltipSpan.innerHTML = buttonTooltip
  }

  btnTooltip.addEventListener('mouseover',() => {
      const tooltipDiv = btnTooltip.querySelector('.tooltip-div')
      if(!btnTooltip.classList.contains('liked')){
          tooltipDiv.style.visibility = 'visible'
          tooltipDiv.style.opacity = '1'
      }
  })
  btnTooltip.addEventListener('mouseleave',() => {
      const tooltipDiv = btnTooltip.querySelector('.tooltip-div')
      tooltipDiv.style.visibility = 'hidden'
      tooltipDiv.style.opacity = '0'
  })

})