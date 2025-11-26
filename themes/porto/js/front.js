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

    document.addEventListener("DOMContentLoaded", () => {
        const moon = document.querySelector(".moon");
        let progress = 0;
        let targetProgress = 0;
        let introLocked = true; // true = intro en cours (scroll bloqué)
        const lerp = (a, b, t) => a + (b - a) * t;

        const blockScroll = (e) => e.preventDefault();

        // lock au départ
        document.body.style.overflow = "hidden";
        window.addEventListener("wheel", blockScroll, { passive: false });

        // écouteur principal pour détecter direction (toujours actif)
        window.addEventListener("wheel", (e) => {
            const dir = e.deltaY > 0 ? 1 : -1;

            // si introLocked, on ne laisse que la touche direction pour targetProgress
            if (introLocked) {
                targetProgress = dir > 0 ? 1 : 0;
                // preventDefault car on bloque pendant l'animation
                e.preventDefault();
                return;
            }

            // === CAS CLÉ : intro débloquée, on est en bas (intro finie) et on remonte ===
            // Quand on est au TOP de la page (scrollY === 0) et que l'utilisateur scroll vers le haut (dir < 0)
            // on reverrouille l'intro et on met targetProgress = 0 (animation inverse)
            if (!introLocked && window.scrollY === 0 && dir < 0) {
                introLocked = true;
                document.body.style.overflow = "hidden";       // re-lock page scroll
                window.addEventListener("wheel", blockScroll, { passive: false }); // block native wheel
                targetProgress = 0;
                e.preventDefault(); // empêche le jump instantané
                return;
            }

            // sinon, si intro débloquée, on laisse le scroll normal (ne rien faire)
        }, { passive: false });


        function animate() {
            progress = lerp(progress, targetProgress, 0.06);

            // Nouveau scale : de 1 → 8 (au lieu de 1 → 4)
            // 8 recouvre largement tout un écran, même 4K.
            const scale = lerp(1, 8, progress);

            // On ajuste aussi la descente : la lune part de plus haut
            const y = lerp(-150, window.innerHeight * 0.40, progress);

            moon.style.transform = `translate(0px, ${y}px) scale(${scale})`;


            /** 
             * DEBLOCAGE du scroll lorsque la lune a ENTIÈREMENT recouvert l'écran.
             * On utilise un seuil de 0.995 (plus de précision).
             */
            if (progress >= 0.995 && targetProgress === 1 && introLocked) {
                introLocked = false;
                document.body.style.overflow = "";
                window.removeEventListener("wheel", blockScroll);
            }

            /**
             * LOCK automatique quand la lune est revenue à son état initial.
             */
            if (progress <= 0.005 && targetProgress === 0 && introLocked) {
                // Intro déjà verrouillée → rien à faire
            }

            requestAnimationFrame(animate);
        }

        animate();
    });



})();
