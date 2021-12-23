$(document).ready(function() {
    // if(screen.width < 1024) {
        $('#nav-toggler').click(function() {
            $('#nav-menu').slideToggle();
            $('.nav-toggler-open').toggle();
            $('.nav-toggler-close').toggle();
        })
    // }   
})