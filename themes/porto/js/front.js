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
                targetProgress += e.deltaY * 0.002;
                targetProgress = Math.min(Math.max(targetProgress, 0), 1);

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


    document.addEventListener('DOMContentLoaded', () => {
        // tous les inputs et textarea
        const fields = document.querySelectorAll('.wpcf7-form input[type="text"], .wpcf7-form input[type="email"], .wpcf7-form textarea');

        fields.forEach(field => {
            const label = field.previousElementSibling; // prend le label juste avant

            if (!label) return;

            // au focus
            field.addEventListener('focus', () => {
                label.style.color = '#6C5BFF'; // Third Color violet spatial
                label.style.transform = 'scale(1.05)';
                label.style.transition = 'all 0.3s ease';
            });

            // au blur
            field.addEventListener('blur', () => {
                label.style.color = '#1A1F3D'; // couleur normale
                label.style.transform = 'scale(1)';
            });
        });
    });

    //MENU MOBILE
    const burger = document.getElementById("burger");
    const nav = document.querySelector(".header__nav");

    burger.addEventListener("click", () => {
        burger.classList.toggle("active");
        nav.classList.toggle("open");
        document.body.classList.toggle("menu-open");
    });
    

    //ANCHORS
    document.addEventListener('DOMContentLoaded', () => {
        const header = document.querySelector('header');
        const headerHeight = header ? header.offsetHeight : 0;

        document.querySelectorAll('a[href*="#"]').forEach(link => {
            link.addEventListener('click', e => {
                const url = new URL(link.href);
                const isSamePage = url.pathname === window.location.pathname;

                if (!isSamePage) return;
                const target = document.querySelector(url.hash);

                if (!target) return;

                e.preventDefault();

                nav.classList.remove("open");
                document.body.classList.remove('menu-open');
                burger.classList.remove("active");
                
                const y =
                    target.getBoundingClientRect().top +
                    window.pageYOffset -
                    headerHeight - 10;
                window.scrollTo({
                    top: y,
                    behavior: 'smooth'
                });
            });
        });
    });

    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('nav a[href^="#"]');

    window.addEventListener('scroll', () => {
        let current = '';

        sections.forEach(section => {
            const top = section.offsetTop - 100;
            if (scrollY >= top) {
                current = section.id;
            }
        });

        navLinks.forEach(link => {
            link.classList.toggle(
                'is-active',
                link.getAttribute('href') === `#${current}`
            );
        });
    });

})();
