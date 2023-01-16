var notificationDiv = document.querySelector('.notifications-div');
var notifIcon = document.querySelector('.top-notifications button')
var mobileSearchIcon = document.querySelector('.top-search-mobile button')
var HeaderMenuIcon = document.getElementById('header-menu-btn')
var mainOverlay = document.getElementById('main-overlay')
var topHeader = document.querySelector('.top-header')
var mainHeader = document.querySelector('.main-header')

document.querySelector('meta[name= "theme-color"]').setAttribute('content','#FFC400')

window.addEventListener('load',() => {
    const preLoader = document.querySelector('.preloader')
    const body = document.querySelector('body')
    if(preLoader.classList.contains('active')){
        body.style.overflow = 'auto'
        preLoader.classList.remove('active')
        preLoader.style.display = 'none'
    }else{
        body.style.overflow = 'hidden'
    }

})

function topHeaderFixed(){
    topHeader.style.position = 'fixed'
}

window.addEventListener('scroll',() => {
    if(document.body.scrollTop > 80 || document.documentElement.scrollTop > 80){
        topHeader.style.zIndex = '1000'
        topHeader.style.position = 'fixed'
        topHeader.style.top = '0'
        mainHeader.style.marginTop = topHeader.clientHeight + 'px'
    }else{
        topHeader.style.position = ''
        topHeader.style.top = '-100%'
        mainHeader.style.marginTop = '0'
    }
})

function openNotifPanel(){
    topHeaderMenuDiv.classList.remove('active');
    mobileSearchField.classList.remove('active');
    notificationDiv.classList.toggle('active');

    if(notificationDiv.classList.contains('active')){
        HeaderMenuIcon.setAttribute('disabled','')
        mobileSearchIcon.setAttribute('disabled','')
        body.style.overflow = 'hidden'
        mainOverlay.style.visibility = 'visible'
        mainOverlay.style.opacity = '1'
        mobileSearchField.classList.remove('active');
        main.classList.remove('search-active');
    }else{
        HeaderMenuIcon.removeAttribute('disabled','')
        mobileSearchIcon.removeAttribute('disabled','')
        body.style.overflow = 'auto'
        mainOverlay.style.visibility = 'hidden'
        mainOverlay.style.opacity = '0'
    }
}

mainOverlay.addEventListener('click',() => {
    body.style.overflow = 'auto'
    mainOverlay.style.visibility = 'hidden'
    mainOverlay.style.opacity = '0'

    notificationDiv.classList.remove('active');
    mobileSearchField.classList.remove('active');
    topHeaderMenuDiv.classList.remove('active');

    HeaderMenuIcon.removeAttribute('disabled','')
    notifIcon.removeAttribute('disabled','')
    mobileSearchIcon.removeAttribute('disabled','')
})

var topHeaderMenuDiv = document.querySelector('.top-header-menu-div');
function openHeaderMenuPanel(){
    notificationDiv.classList.remove('active');
    mobileSearchField.classList.remove('active');
    topHeaderMenuDiv.classList.toggle('active');

    if(topHeaderMenuDiv.classList.contains('active')){
        notifIcon.setAttribute('disabled','')
        mobileSearchIcon.setAttribute('disabled','')
        body.style.overflow = 'hidden'
        mainOverlay.style.visibility = 'visible'
        mainOverlay.style.opacity = '1'
        mobileSearchField.classList.remove('active');
        main.classList.remove('search-active');
    }else{
        notifIcon.removeAttribute('disabled','')
        mobileSearchIcon.removeAttribute('disabled','')
        body.style.overflow = 'auto'
        mainOverlay.style.visibility = 'hidden'
        mainOverlay.style.opacity = '0'
    }
}
var mobileSearchField = document.querySelector('.mobile-search-field');
var main = document.querySelector('main');
function openMobileSearch(){
    notificationDiv.classList.remove('active');
    topHeaderMenuDiv.classList.remove('active');
    if(!mobileSearchField.classList.contains('active')){
        mobileSearchField.classList.add('active');
        main.classList.add('search-active');
    }else{
        mobileSearchField.classList.remove('active');
        main.classList.remove('search-active');
    }
}
var mobileMenuBtn = document.querySelector('.mobile-menu-toggle button');
var mobileMenu = document.querySelector('.mobile-menu');
var mobileOverlay = document.querySelector('.mobile-menu-overlay');
var body = document.querySelector('body')
function openMobileMenu(){
    mobileMenu.classList.add('active');
    mobileOverlay.classList.add('active');
    body.style.overflow = 'hidden';
}
mobileOverlay.addEventListener('click',() => {
    if(mobileOverlay.classList.contains('active')){
        mobileOverlay.classList.remove('active');
        mobileMenu.classList.remove('active');
        body.style.overflow = 'auto';
    }
})
var mobileMenuCloseBtn = document.querySelector('.mobile-menu-close')
mobileMenuCloseBtn.addEventListener('click',function(){
    mobileOverlay.classList.remove('active');
    mobileMenu.classList.remove('active');
    body.style.overflow = 'auto';
})
var mobileDropdown = document.querySelectorAll('.mobile-dropdown');
var mobileDropdownLink = document.querySelectorAll('.mobile-dropdown-link');
mobileDropdownLink.forEach(selectMenuLi => {
    var mobileDropdownMenu = selectMenuLi.parentElement.querySelector('.mobile-dropdown-menu');
    var liHeight = 46;
    var listLength = mobileDropdownMenu.getElementsByTagName('li').length
    var style = {
        'height': listLength * liHeight + "px"
    }
    selectMenuLi.addEventListener('click',function(){
        if(!selectMenuLi.classList.contains('active')){
            mobileDropdownLink.forEach(removeClass => {
                var mobileDropdownMenuRemove = removeClass.parentElement.querySelector('.mobile-dropdown-menu');
                removeClass.classList.remove('active');
                mobileDropdownMenuRemove.classList.remove('open');
                mobileDropdownMenuRemove.style = '';
            })
            selectMenuLi.classList.add('active');
            mobileDropdownMenu.classList.add('open');
            $(mobileDropdownMenu).css(style);
        }else{
            selectMenuLi.classList.remove('active');
            mobileDropdownMenu.classList.remove('open');
            mobileDropdownMenu.style = '';
        }
    })
    
})
var backToTop = document.querySelector('.back-to-top button');
window.onscroll = function(){
    if(document.body.scrollTop > 100 || document.documentElement.scrollTop > 100){
        backToTop.style.visibility = 'visible';
        backToTop.style.opacity = '1';
    }else{
        backToTop.style.visibility = 'hidden'
        backToTop.style.opacity = '0';
    }
}
backToTop.addEventListener('click',() => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
})

function getDate() {

    var headerDate = document.querySelectorAll('.header-date span')

    const dateStringOpt = {weekday: 'long'},
    dateNumOpt = {day: 'numeric'},
    monthStringOpt = {month: 'long'},
    yearNumOpt = {year: 'numeric'},
    dateData = new Date(),
    dateString = dateData.toLocaleDateString('fa-IR',dateStringOpt),
    dateNum = dateData.toLocaleDateString('fa-IR',dateNumOpt),
    monthString = dateData.toLocaleDateString('fa-IR',monthStringOpt),
    yearNum = dateData.toLocaleDateString('fa-IR',yearNumOpt)

    headerDate[0].innerHTML = dateString
    headerDate[1].innerHTML = dateNum
    headerDate[2].innerHTML = monthString
    headerDate[3].innerHTML = yearNum
}
getDate()

var singleCommentCard = document.querySelectorAll('.single-user-comments-card')
singleCommentCard.forEach(commentCard => {
    var commentLikeBtn = commentCard.querySelector('.comments-like-btn button')
    var commentLikeBtnSpan = commentLikeBtn.querySelector('span')

    var likeCount = Number(commentLikeBtnSpan.innerHTML)
    if (likeCount < 1){
            commentLikeBtnSpan.style.display = 'none'
        }else{
            commentLikeBtnSpan.style.display = 'block'
        }

    commentLikeBtn.addEventListener('click', () => {
        if(!commentLikeBtn.classList.contains('liked')){
            commentLikeBtnSpan.style.display = 'block'
            commentLikeBtn.classList.add('liked')
            likeCount++
            commentLikeBtnSpan.innerHTML = likeCount
            const tooltipDiv = commentLikeBtn.querySelector('.tooltip-div')
            tooltipDiv.style.visibility = 'hidden'
            tooltipDiv.style.opacity = '0'
        }
    })

    var commentReplyBtn = commentCard.querySelector('.comments-reply-btn button')
    var commentReplyForm = commentCard.querySelector('.comments-reply-form')
    commentReplyBtn.addEventListener('click',() => {
        commentReplyForm.classList.add('reply')
        if(commentReplyForm.classList.contains('reply')){
            commentReplyBtn.setAttribute('disabled','')            
        }
    })

    var commentReplyCancelBtn = commentCard.querySelector('.reply-cancel')
    commentReplyCancelBtn.addEventListener('click',() => {
        if(commentReplyForm.classList.contains('reply')){
            commentReplyBtn.removeAttribute('disabled','')
            commentReplyForm.classList.remove('reply')
        }
    })


})

const shareLink = document.querySelector('.share-link')
if(shareLink){
    shareLink.addEventListener('click',() => {
        let shareLinkText = shareLink.querySelector('span')
        navigator.clipboard.writeText(shareLinkText.innerText)

        let shareLinkTooltipText = shareLink.querySelector('.tooltip-div span')
        shareLinkTooltipText.innerHTML = 'کپی شد'
    })
    shareLink.addEventListener('mouseleave',() => {
        let shareLinkTooltipText = shareLink.querySelector('.tooltip-div span')
        setTimeout(() => {shareLinkTooltipText.innerHTML = 'کپی'},300)
    })
}
