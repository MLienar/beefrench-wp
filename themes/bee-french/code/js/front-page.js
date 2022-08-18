window.onload = function () {

    $('.top1').css("display", "none")

    const scroll = new LocomotiveScroll({
        el: document.querySelector('.marges'),
        smooth: true
    });
    
    // Joues avec les valeurs que j'ai mis entre guillemets
    // Je voyais un truc qui fasse un peu plus comme un fleur qui s'ouvre pour les photo si tu vois ce que je veux dire

    let tl1 = gsap.timeline({ ease: "power4.inOut"})
    tl1.from(".img1", { duration:1, opacity: 0, rotate: 200, x:250, y:500, scale: 0}, "<0");
    tl1.from(".img2", { duration:1, opacity: 0, rotate: 200, x:-250, y:500, width: 0}, "<0.15");
    tl1.from(".img3", { duration:1, opacity: 0, rotate: 200, x:250, y:-350, width: 0}, "<0.15");
    tl1.from(".img4", { duration:1, opacity: 0, rotate: 200, x:-350, y:-350, width: 0, onComplete : flyimg}, "<0.15");
    

    // Essaie de mettre moins de délai entre les animations du texte et des images
    function flyimg() {
        gsap.to(".hero_img", {
            duration: 2,
            y: -15,
            x: 5,
            repeat: -1,
            yoyo: true,
            stagger: 0.5,
            ease: "sine.inOut"
        });
    }

        let tl2 = gsap.timeline({ defaults: { ease: "power4.inOut"} })
        tl2.to('h1', { 'clip-path': 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)', opacity: 1, y: 0, duration: 1, stagger: 0.5
        });

};
