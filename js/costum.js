//navbar-------------------
$(window).on("scroll", function () {
    if ($(window).scrollTop() > 5) {
        $(".nav-navbar").addClass("active");
    } else {
        $(".nav-navbar").removeClass("active");
    }
});
//toggle switch button darkmode
$('#switch').on('click', () => {
    if ($('#switch').prop('checked')) {
        $('body').addClass('dark');
    } else {
        $('body').removeClass('dark');
    }
})
// button back to top
window.onscroll = function() {scrollFunction()};
    
function scrollFunction() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    mybutton.style.display = "block";
    } else {
    mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}