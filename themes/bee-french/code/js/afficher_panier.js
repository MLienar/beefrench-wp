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

        let tl2 = gsap.timeline({ defaults: { ease: "power4.inOut" } })
        tl2.to('.p_button', { duration: 0.75, x: 500 }, "<0");
        tl2.to('.basket_icon', { duration: 0.75, x: 135 }, "<0");
        tl2.to('.sneakers_basket', { duration: 0.75, y: 50 }, "<0.8");
        tl2.to('.sneakers_basket', { duration: 0.75, opacity: 0 }, "<0.5");
        tl2.to('.basket_icon', { duration: 0.75, x: 335 }, "<0.8");
        tl2.to('.addtocart', { duration: 0.75, opacity: 1 }, "<0.1");
        tl2.to('.ajouter', { duration: 0.75, background: "#08cc0a" }, "<0");

        tl2.to('.addtocart', { duration: 0.75, opacity: 0 }, "<1");
        tl2.to('.ajouter', { duration: 0.75, background: "black" }, "<0");
        tl2.to('.basket_icon', { duration: 0, x: 0 }, "<0");
        tl2.to('.sneakers_basket', { duration: 0, y: 0, opacity: 1 }, "<0");
        tl2.to('.p_button', { duration: 0, x: 0, opacity: 0 }, "<0");
        tl2.to('.p_button', { duration: 0.75, opacity: 1 }, "<0");

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

    // Supprimer
    function removeBasket(product) {
        let basket = getBasket();
        basket = basket.filter(p => p.id != product.id);
        saveBasket(basket);
    }
    function removeQuantity(product) {
        let basket = getBasket();
        let foundProduct = basket.find(p => p.id === product.id);
        if (foundProduct != 0) {
            foundProduct.quantity -= 1;
        }
        else {
            removeBasket(product);
        }
        saveBasket(basket);
    }
    $('.enlever').click(function () {
        let classajout = $(this).attr('class');
        classajout = classajout.substr(8);
        let text = $('.panier_nom' + classajout).html();
        let num = $('.panier_prix' + classajout).html();
        let quantite = $('.quantite_produit' + classajout).html();
        let id_produit = $('.id' + classajout).html();
        let image_produit = $('.img_product_basket' + classajout).attr('src');
        num = parseInt(num);
        quantite = parseInt(quantite);
        classajout = parseInt(classajout);
        let product = { id: classajout, nom: text, price: num, image: image_produit, quantity: quantite };
        removeQuantity(product);
        document.location.reload();
    });
    // Afficher le panier
    function afficherPanier() {
        let basket = getBasket();
        console.log(basket);
        let total = 0;
        for (let product of basket) {
            total += product.quantity * product.price;
        }
        let quantite = 0;
        for (let product of basket) {
            quantite += product.quantity;
        }
        if (basket == [] || quantite === 0 || basket.length === 0){

            $('.btn_payer').attr("disabled", "true");
            $('.btn_payer').css({"background-color": "#d0d0d0", "color": "black"});

            let panier = document.getElementById("vrai_panier");

            let cd_product = document.createElement("div");
            panier.appendChild(cd_product);
            cd_product.className = "cd_product";

            let no_product = document.createElement("h3");
            cd_product.appendChild(no_product);
            no_product.className = "no_product";
            no_product.innerHTML = "Vous n'avez aucun produit dans votre panier";

            let link_no_product = document.createElement("a");
            cd_product.appendChild(link_no_product);
            link_no_product.className = "link_no_product";
            link_no_product.innerHTML = "Voir nos sneakers";
            link_no_product.href = "http://beefrench.local/produits/"

            $('.cd_product').css({"flex-direction": "column"});
    }
        if (quantite !== 0) {
            for (let product of basket) {
                if (product.quantity !== 0) {

                    let panier = document.getElementById("vrai_panier");

                    let cd_product = document.createElement("div");
                    let image = document.createElement("img");
                    let wrap_info = document.createElement("div");
                    let cd_info_1 = document.createElement("div");
                    let cd_info_2 = document.createElement("div");
                    let enlever_div = document.createElement("div");
                    let enlever = document.createElement("button");

                    let p_nom = document.createElement("p");
                    let h3_prix = document.createElement("h3");
                    let p_quantite = document.createElement("h5");

                    panier.appendChild(cd_product);
                    cd_product.appendChild(image);
                    image.src = product.image;
                    cd_product.appendChild(wrap_info);
                    wrap_info.appendChild(cd_info_1);

                    cd_info_1.appendChild(h3_prix);
                    cd_info_1.appendChild(p_nom);

                    wrap_info.appendChild(cd_info_2);

                    cd_info_2.appendChild(p_quantite);

                    cd_product.appendChild(enlever_div);
                    enlever_div.appendChild(enlever);

                    enlever.innerHTML = "X";

                    p_nom.innerHTML = product.nom;
                    h3_prix.innerHTML = product.price + " €";
                    p_quantite.innerHTML = "x" + product.quantity;

                    cd_product.className = "cd_product";
                    image.className = "img_product";
                    wrap_info.className = "wrap_info";
                    cd_info_1.className = "cd_info_1";
                    cd_info_2.className = "cd_info_2";
                    enlever_div.className = "enlever_div";
                    enlever.className = "enlever " + product.id;

                    p_nom.className = "panier_nom" + product.id;
                    h3_prix.className = "panier_prix" + product.id;
                    p_quantite.className = "quantite_produit" + product.id;
                }
            }
            
        }
        $('.prix_total').html(total);
        total = 0
    }
    afficherPanier();

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