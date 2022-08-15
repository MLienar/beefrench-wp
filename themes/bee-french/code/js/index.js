const stripe = Stripe('pk_test_51LN3pjIHDK7tuN34yuWA75fiVVDjcwgStR76mRzc6GWRDXdVPC7JePrJ2QpJu9O7hJGtzOWamS6dvUvgIhz1k9wb00decLWXbb')
var elements = stripe.elements({
//   clientSecret: 'sk_test_51LN3pjIHDK7tuN34bMwilSdLCssg4fRq5koDGAVfCa4kzoArnFXOdoOt7LR7FtxY0uL7COpaGdHzMNbPzoXTQvg700dtKsUGFR',
});

const paymentEl = elements.create('payment')

console.log(paymentEl);

window.onload = function () {
    let menu = gsap.timeline({ ease: "power4.inOut", paused: true, reversed: true });
    menu.to(".header2", { duration: 0.5, opacity: 1, y: 0, delay: -1 });
    menu.to(".dark_overlay_header", { duration: 0.5, opacity: 1, y: 0, delay: -1 });
    menu.from(".li_toggle", { duration: 0.5, opacity: 1, x: -1000, delay: -0.5, stagger: 0.3 });
    $('.toggle_menu').click(function () {
        $('.arm_menu_1').toggleClass("arm_menu_1_bis");
        $('.arm_menu_2').toggleClass("arm_menu_2_bis");
        $('.arm_menu_3').toggleClass("arm_menu_3_bis");
        $('.arrow-up').toggleClass("destroy");
        menu.reversed() ? menu.play() : menu.reverse();
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
            let panier = document.getElementById("vrai_panier");
            let li_basket = document.getElementById('menu-item-27');
            if (!li_basket) return
            let check_basket = document.createElement("div");
            li_basket.appendChild(check_basket);
            check_basket.className = "check_basket";
            let p_check = document.createElement("p");
            check_basket.appendChild(p_check);
            p_check.innerHTML = quantite;
            p_check.className = "p_check";
        }
    }

    getQuantity();

};

