window.onload = function () {

    $('.top1').css("display", "none")

    const scroll = new LocomotiveScroll({
        el: document.querySelector('.marges'),
        smooth: true
    });
    
    $('.menu_toggle').click(function(){
        $('.menu_toggle').toggleClass("menu_toggle_bis")
        $('.menu_toggle span:nth-child(1)').toggleClass("span_toggle1")
        $('.menu_toggle span:nth-child(2)').toggleClass("span_toggle2")
        $('.menu_toggle span:nth-child(3)').toggleClass("span_toggle3")
        $('.underlay_header2').toggleClass("underlay_header2_bis")
        $('.header2').toggleClass("header2_bis")
    })

    let tl1 = gsap.timeline({ ease: "power4.inOut"})
    tl1.from(".img1", { duration:1, opacity: 0, rotate: 200, x:250, y:500, scale: 0}, "<0");
    tl1.from(".img2", { duration:1, opacity: 0, rotate: 200, x:-250, y:500, width: 0}, "<0.15");
    tl1.from(".img3", { duration:1, opacity: 0, rotate: 200, x:250, y:-350, width: 0}, "<0.15");
    tl1.from(".img4", { duration:1, opacity: 0, rotate: 200, x:-350, y:-350, width: 0, onComplete : flyimg}, "<0.15");
    
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
