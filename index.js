$(document).ready(function() {
    $('#navtoggle').click(function() {
        $('#navtoggle-open').toggle();
        $('#navtoggle-close').toggle();
        $('#navmenu').slideToggle();
    })
})

console.log(window.screen.width)

if(window.screen.width >= 1024) {
    $('#movements article').hover(function() {
        $(this).find('#movement-description').slideToggle()
    })
}