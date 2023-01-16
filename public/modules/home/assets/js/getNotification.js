function getNotifications() {
  const getNotifYes = document.getElementById('get-notif-yes')
  const getNotifNope = document.getElementById('get-notif-nope')
  const getNotifSec = document.querySelector('.get-notifications-section')
  const getNotifOverlay = document.querySelector('.get-notifications-overlay')

  if(Notification.permission === 'default'){
      getNotifSec.classList.add('show')
      getNotifOverlay.classList.add('show')
      body.style.overflow = 'hidden'
      getNotifYes.addEventListener('click',() => {
          Notification.requestPermission()
          .then(function showNotification(){
              var showNoif = new Notification('مورن نیوز',{
                  body: 'دریافت نوتیفیکیشن برای شما فعال شد',
                  icon:  './img/sun_abstract_design copy.jpg'
              })
          })
          getNotifSec.classList.remove('show')
          getNotifOverlay.classList.remove('show')
          body.style.overflow = 'auto'
      })
      getNotifNope.addEventListener('click', () => {
          getNotifSec.classList.remove('show')
          getNotifOverlay.classList.remove('show')
          body.style.overflow = 'auto'
      }) 
  }

}

window.addEventListener('load',() => {
  setTimeout(getNotifications,1000)
})