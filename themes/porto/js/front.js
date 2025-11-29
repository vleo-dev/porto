;(function () {

    const projectsSwiper = document.querySelectorAll('.projectsSwiper .swiper-slide');

    if (projectsSwiper.length > 1) {
        const projectsSwiperMain = new Swiper('.projectsSwiper', {
            loop: true,
            spaceBetween: 30,
            slidesPerView: 1, // mobile par défaut

            // breakpoints
            breakpoints: {
                768: {  // tablette
                    slidesPerView: 2
                },
                1024: { // desktop
                    slidesPerView: 3
                }
            },

            // pagination désactivée
            pagination: false,

            // flèches
            navigation: {
                nextEl: '.projects__nav-next',
                prevEl: '.projects__nav-prev',
            },
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

    document.addEventListener("DOMContentLoaded", () => {
        const moon = document.querySelector(".moon");
        const moonSection = document.querySelector(".main-pres");
        let progress = 0.05; // légèrement hors écran au départ
        let targetProgress = 0;
        const maxScale = 10;
        const minY = -150;
        const maxY = window.innerHeight * 0.35;
        const lerp = (a, b, t) => a + (b - a) * t;

        window.addEventListener("wheel", (e) => {
            const rect = moonSection.getBoundingClientRect();
            const sectionVisible = rect.top < window.innerHeight && rect.bottom > 0;

            if (sectionVisible) {
                // Scroll → progress
                targetProgress += e.deltaY * 0.002;
                targetProgress = Math.min(Math.max(targetProgress, 0), 1);

                // Empêche scroll normal uniquement si la lune n'est pas encore presque finie
                if (targetProgress > 0 && targetProgress < 0.95) {
                    e.preventDefault();
                }
            }
        }, { passive: false });

        function animate() {
            progress = lerp(progress, targetProgress, 0.08);
            const minY = 20;
            const y = lerp(minY, maxY, progress);
            const scale = lerp(1, maxScale, progress);
            moon.style.transform = `translate(0px, ${y}px) scale(${scale})`;

            requestAnimationFrame(animate);
        }

        animate();
    });



})();
