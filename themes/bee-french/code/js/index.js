window.onload = function () {

    let menu = gsap.timeline({ ease: "power4.inOut", paused:true, reversed: true});
        menu.to(".header2", { duration: 0.5, opacity: 1, y: 0, delay: -1});
        menu.to(".dark_overlay_header", { duration: 0.5, opacity: 1, y: 0, delay: -1});
        menu.from(".li_toggle", { duration: 0.5, opacity: 1, x: -1000, delay: -0.5, stagger: 0.3});
    $('.toggle_menu').click(function () {
        $('.arm_menu_1').toggleClass( "arm_menu_1_bis" );
        $('.arm_menu_2').toggleClass( "arm_menu_2_bis" );
        $('.arm_menu_3').toggleClass( "arm_menu_3_bis" );  
        $('.arrow-up').toggleClass( "destroy" ); 
        $('header>nav').toggleClass( "padding_toogle" );
        $('header').toggleClass( "header_1_bis" );
        menu.reversed() ? menu.play() : menu.reverse();  
    }); 

    // Joues avec les valeurs que j'ai mis entre guillemets
    // Je voyais un truc qui fasse un peu plus comme un fleur qui s'ouvre pour les photo si tu vois ce que je veux dire

    let tl1 = gsap.timeline({ ease: "power4.inOut"})
    tl1.from(".img1", { duration:0.5, opacity: 0, rotate: 100, scale: 0.2, width: 0, x: 200, y: 400});
    tl1.from(".img2", { duration:0.5, opacity: 0, rotate: 100, scale: 0.2, width: 0, x: -200, y: 400}, "<0.15");
    tl1.from(".img3", { duration:0.5, opacity: 0, rotate: 100, scale: 0.2, width: 0, x: 200, y: -400}, "<0.2");
    tl1.from(".img4", { duration:0.5, opacity: 0, rotate: 100, scale: 0.2, width: 0, x: -200, y: -400, onComplete : flyimg}, "<0.25");
    
    function flyimg() {
        gsap.to(".hero_img", {
            duration: 2,
            y: -15,
            x: 5,
            repeat: -1,
            yoyo: true,
            stagger: 1,
            ease: "sine.inOut"
        });
    }

        let tl2 = gsap.timeline({ defaults: { ease: "power4.inOut"} })
        tl2.to('h1', { 'clip-path': 'polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)', opacity: 1, y: 0, duration: 1.25, stagger: 0.25
        });
   

};

