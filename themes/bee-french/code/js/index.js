
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
        menu.reversed() ? menu.play() : menu.reverse();  
    });

};

