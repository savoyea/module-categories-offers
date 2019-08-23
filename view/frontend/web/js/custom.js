require(['jquery'], function ($) {
    var slideIndex = 0;
    showSlides(slideIndex);

    $(".slideshow-container .change_slide").click(function() {
        changeSlide($(this).attr('data-index'));
    });

    function changeSlide(n) {
        showSlides(parseInt(n));
    }
    function showSlides(n) {
        var slides = $(".slide");
        if (slideIndex == (slides.length - 1) && n == 1) {
            slideIndex = 0;
        }else{
            slideIndex = slideIndex + parseInt(n);
        }
        if (slideIndex == -1) {
            slideIndex = slides.length - 1;
        }
        slides.each(function( index, element ) {
            $(element).css("display","none");
        });
        $(slides[slideIndex]).css("display","flex");
    }
});
