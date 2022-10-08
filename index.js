
// NAV MENU TOGGLE
$(document).ready(function() {
    $('#navtoggle').click(function() {
        $('#navtoggle-open').toggle();
        $('#navtoggle-close').toggle();
        $('#navmenu').slideToggle();
    })
})


 // MOVEMENTS DESCRIPTION APPEARS ON HOVER ON LARGE SCREEN
if(window.screen.width >= 1024) {
    $('#movements article').hover(function() {
        $(this).find('#movement-description').slideToggle()
    })
}


// MOVEMENTS SROLL ON CLICKING LEFT AND RIGHT BUTTON
    // ON LARGE SCREEN
document.querySelector('#slide-right').addEventListener('click', function(e) {
    document.querySelector('#movements').scrollBy({
        top: 0,
        left: 500,
        behavior: 'smooth'
        });
})
document.querySelector('#slide-left').addEventListener('click', function() {
    document.querySelector('#movements').scrollBy({
        top: 0,
        left: -500,
        behavior: 'smooth'
        });
})
