window.onload = function () {

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

    const imgBig = document.querySelector('.gallery__big');
    [...document.querySelectorAll(".gallery__cd__img")].forEach(el => el.addEventListener('click',function (e) {
        imgClickSrc = this.src
        imgBig.src = imgClickSrc
    }))


    // Ajouter
    function addToBasket(product) {
        let basket = getBasket();
        let foundProduct = basket.find(p => p.nom === product.nom && product.size === p.size);
        if (foundProduct != undefined) {
            foundProduct.quantity += product.quantity
        }
        else {
            basket.push(product);
        }
        localStorage.setItem("basket", JSON.stringify(basket));
    }
    $('.ajouter').click(function () {
        let compteur = 0
        const radios = document.querySelectorAll(".taille-checkbox")
        radios.forEach(radio => {
            if (radio.classList.contains("checked")) {
                compteur = compteur + 1;
            }
        })
        if (compteur === 0) {
            alert('Veuillez sélectionner une taille')
        }
        else {
            let classajout = $(this).attr('class');
            classajout = classajout.substr(8);
            let text = $('.nom' + classajout).html();
            let num = $('.prix' + classajout).html();
            let id_produit = $('.id' + classajout).html();
            let image_produit = $('.img_thumbnail' + classajout).attr('src');
            num = parseInt(num);
            id_produit = id_produit;
            let taille = ""
            let quantity = parseInt(document.getElementById("taille").value)
            const radios = document.querySelectorAll(".taille-checkbox")
            radios.forEach(radio => {
                if (radio.classList.contains("checked")) {
                    taille = radio.innerHTML
                }
            })
            taille = taille;
            id_produit = id_produit + taille;
            let product = { id: id_produit, nom: text, price: num, image: image_produit, quantity: quantity, size: taille };
            addToBasket(product);

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
        }

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

    const sizes = [
        {
            taille: 'XS',
            disponible: true,
            checked: false,
        },
        {
            taille: 'S',
            disponible: true,
            checked: false,
        },
        {
            taille: 'M',
            disponible: true,
            checked: false,
        },
        {
            taille: 'L',
            disponible: true,
            checked: false,
        },
        {
            taille: 'XL',
            disponible: true,
            checked: false,
        }, {
            taille: 'XXL',
            disponible: true,
            checked: false,
        }, {
            taille: 'XXL',
            disponible: true,
            checked: false,
        }, 
    ]

    const addToCart = (e) => {
        const radios = document.querySelectorAll(".taille-checkbox")
        radios.forEach(radio => {
            if (radio.classList.contains("checked")) {
                radio.classList.remove("checked")
            }
        })
        e.target.classList.add("checked")
    }


    const parentDiv = document.querySelector(".taille_check")
    function createSizeButtons() {
        for (const size of sizes) {
            const container = document.createElement("div");
            container.classList.add("taille-checkbox")
            if (!size.disponible) {
                container.classList.add("pas-dispo")
            }
            container.textContent = size.taille
            container.addEventListener('click', addToCart)
            parentDiv.appendChild(container)
        }
    }
    createSizeButtons()
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