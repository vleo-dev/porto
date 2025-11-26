;(function () {

    const projectsSwiper = document.querySelectorAll('.projectsSwiper .swiper-slide');

    if ( projectsSwiper.length > 1 ) {
        const projectsSwiperMain = new Swiper('.projectsSwiper', {
            effect: 'coverflow',
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            slidesPerView: 3,
            spaceBetween: 80,
            coverflowEffect: {
                rotate: 25,
                stretch: 0,
                depth: 200,
                modifier: 1,
                slideShadows: false,
            },
            breakpoints: {
                1024: { slidesPerView: 3 },
                768: { slidesPerView: 2 },
                0: { slidesPerView: 1 },
            },
            pagination: { el: '.swiper-pagination', clickable: true },
        });
    }

    document.addEventListener("DOMContentLoaded", function () {
        const sections = document.querySelectorAll(".reveal");

        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("is-visible");
                    observer.unobserve(entry.target); // animation une seule fois
                }
            });
        }, { threshold: 0.1 });

        sections.forEach(section => observer.observe(section));
    });

})();
