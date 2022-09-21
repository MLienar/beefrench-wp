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
        $('.logo').toggleClass('logo_bis')
        $('.baskethead').toggleClass('logo_bis')
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

        function getBasket() {
            let basket = localStorage.getItem("basket")
            if (basket == undefined) {
                return [];
            }
            else {
                return JSON.parse(basket);
            }
        }
        function getQuantity() {
        
            let basket = getBasket();
            let quantite = 0;
            for (let product of basket) {
                quantite += product.quantity;
            }
            if (quantite !== 0) {
                const nav = document.getElementById('menu-navigation');
                const nav2 = document.getElementById('menu-navigation-1')
                const li_basket = nav.lastElementChild;
                const li_basket2 = nav2.lastElementChild
                const logoPanier = document.querySelector('.baskethead')
                if (li_basket){
                let check_basket = document.createElement("div");
                li_basket.appendChild(check_basket);
                check_basket.className = "check_basket";
                let p_check = document.createElement("p");
                check_basket.appendChild(p_check);
                p_check.innerHTML = quantite;
                p_check.className = "p_check";
                }
                if (li_basket2){
                    let check_basket = document.createElement("div");
                    li_basket2.appendChild(check_basket);
                    check_basket.className = "check_basket";
                    let p_check = document.createElement("p");
                    check_basket.appendChild(p_check);
                    p_check.innerHTML = quantite;
                    p_check.className = "p_check";
                    }
                if(logoPanier){
                let check_basket = document.createElement("div");
                logoPanier.appendChild(check_basket);
                check_basket.className = "check_basket";
                let p_check = document.createElement("p");
                check_basket.appendChild(p_check);
                p_check.innerHTML = quantite;
                p_check.className = "p_check";
                }
                
            }
        }
        
        getQuantity();
};
