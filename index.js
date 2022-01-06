$(document).ready(function() {
    $('#navtoggle').click(function() {
        $('#navtoggle-open').toggle();
        $('#navtoggle-close').toggle();
        $('#navmenu').slideToggle();
    })
})