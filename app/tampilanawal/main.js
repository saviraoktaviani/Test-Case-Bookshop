document.addEventListener('DOMContentLoaded', function () {
    var swiper1 = new Swiper('.gallery1', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: '.gallery1 .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.gallery1 .swiper-button-next',
            prevEl: '.gallery1 .swiper-button-prev',
        },
    });

    var swiper2 = new Swiper('.gallery2', {
        slidesPerView: 1,
        spaceBetween: 10,
        loop: true,
        pagination: {
            el: '.gallery2 .swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.gallery2 .swiper-button-next',
            prevEl: '.gallery2 .swiper-button-prev',
        },
    });
});