
$(document).ready(function() {
    // PrettyPhoto
    $("a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'light_square',
        social_tools: false
    });
});
// jQuery CarouFredSel
var caroufredsel = function() {
    $('#caroufredsel-portfolio-container').carouFredSel({
        responsive: true,
        scroll: 1,
        circular: false,
        infinite: false,
        items: {
            visible: {
                min: 1,
                max: 3
            }
        },
        prev: '#portfolio-prev',
        next: '#portfolio-next',
        auto: {
            play: false
        }
    });
    $('#list_thumb').carouFredSel({
        responsive: true,
        scroll: 1,
        circular: false,
        infinite: false,
        items: {
            visible: {
                min: 1,
                max: 3
            }
        },
        prev: '#portfolio-prev-thumb',
        next: '#portfolio-next-thumb',
        auto: {
            play: false
        }
    });
};
$(window).load(function() {
    caroufredsel();
});
$(window).resize(function() {
    caroufredsel();
});         