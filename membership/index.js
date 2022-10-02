
// NAV MENU TOGGLE
$(document).ready(function() {
    $('#navtoggle').click(function() {
        $('#navtoggle-open').toggle();
        $('#navtoggle-close').toggle();
        $('#navmenu').slideToggle();
    })
})


 // MOVEMENT DESCRIPTION APPEARS ON HOVER ON LARGE SCREEN
if(window.screen.width >= 1024) {
    $('#movements article').hover(function() {
        $(this).find('#movement-description').slideToggle()
    })
}


// MOVEMENTS SROLL ON CLICKING LEFT AND RIGHT BUTTON
    // ON SMALL SCREEN
if(window.screen.width < 1024) {
    document.querySelector('#slide-right').addEventListener('click', function() {
        document.querySelector('#movements').scrollBy(0, 200, 'smooth');
    })
    document.querySelector('#slide-left').addEventListener('click', function() {
        document.querySelector('#movements').scrollBy({
            top: 0,
            left: -200,
            behavior: 'smooth'
          });
    })
}
    // ON LARGE SCREEN
if(window.screen.width >= 1024) {
    document.querySelector('#slide-right').addEventListener('click', function() {
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
}