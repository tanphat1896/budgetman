/**
 * Created by tanphat on 24/07/2017.
 */
var home = 0;
var jum = 0;
var detail = 0;
var item = 0;
var budget = 0;
$(function() {
    updateDivHeight();
    $('.navbar a, a[href="#home"]').on('click', function(e) {
        var hash = this.hash;

        if (hash !== '') {
            e.preventDefault();

            $('html, body').animate({
                    scrollTop: $(hash).offset().top
                },
                500,
                function() {
                    window.location.hash = hash;
                    window.history.pushState({path:baseUrl}, 0, baseUrl);
                });
        }
    });

    $(window).scroll(function(){
        if ($(window).scrollTop() < (home + jum)){
            addActiveClass($('a[href="#home"]'));
        }
        if ($(window).scrollTop() > (home + jum)){
            addActiveClass($('a[href="#detail"]'));
        }
        if ($(window).scrollTop() > (home + jum + detail)){
            addActiveClass($('a[href="#item"]'));
        }
        if ($(window).scrollTop() > (home + jum + detail + item)){
            addActiveClass($('a[href="#budget"]'));
        }
    });

    function addActiveClass(aTag) {
        $('.navbar a').parent().removeClass('active');
        $(aTag).parent().addClass('active');
        // $('.navbar a').parent().removeClass('active');
        // $(this).parent().addClass('active');
    }


    $('[data-toggle="tooltip"]').tooltip();
});

function updateDivHeight() {
    home = $('#home').height();
    jum = $('[class*=jumbotron]').height();
    detail = $('#detail').height();
    item = $('#item').height();
    budget = $('#budget').height();
}