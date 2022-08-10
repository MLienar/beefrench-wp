window.onload = function () {

    function saveBasket(basket) {
        localStorage.setItem("basket", JSON.stringify(basket));
    };
    function getBasket() {
        let basket = localStorage.getItem("basket")
        if (basket == undefined) {
            return [];
        }
        else {
            return JSON.parse(basket);
        }
    }
    // Ajouter
    function addBasket(product) {
        let basket = getBasket();
        let foundProduct = basket.find(p => p.nom == product.nom);
        if (foundProduct != undefined) {
            foundProduct.quantity++;
        }
        else {
            product.quantity = 1;
            basket.push(product);
        }
        saveBasket(basket);
    }
    $('.ajouter').click(function () {

        let classajout = $(this).attr('class');
        classajout = classajout.substr(8);
        let text = $('.nom' + classajout).html();
        let num = $('.prix' + classajout).html();
        let id_produit = $('.id' + classajout).html();
        let image_produit = $('.img_product_basket' + classajout).attr('src');
        num = parseInt(num);
        id_produit = parseInt(id_produit);
        let product = { id: id_produit, nom: text, price: num, image: image_produit, quantity: 0 };
        addBasket(product);

        let tl2 = gsap.timeline({ defaults: { ease: "power4.inOut" } })
        tl2.to('.p_button', { duration: 0.75, x: 500 }, "<0");
        tl2.to('.basket_icon', { duration: 0.75, x: 135 }, "<-0.1");
        tl2.to('.sneakers_basket', { duration: 0.75, y: 50 }, "<0.2");
        tl2.to('.sneakers_basket', { duration: 0.5, opacity: 0 }, "<0.8");
        tl2.to('.basket_icon', { duration: 0.5, opacity: 0 }, "<0");
        tl2.to('.addtocart', { duration: 0.5, opacity: 1 }, "<-0.1");
        tl2.to('.ajouter', { duration: 0.75, background: "#08cc0a" }, "<0");

        tl2.to('.addtocart', { duration: 0.75, opacity: 0 }, "<1");
        tl2.to('.ajouter', { duration: 0.75, background: "black" }, "<0");
        tl2.to('.basket_icon', { duration: 0, x: 0, opacity: 1 }, "<0");
        tl2.to('.sneakers_basket', { duration: 0, y: 0, opacity: 1 }, "<0");
        tl2.to('.p_button', { duration: 0, x: 0, opacity: 0 }, "<0");
        tl2.to('.p_button', { duration: 0.75, opacity: 1 }, "<0");

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

            let li_basket = document.getElementById('menu-item-177');
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