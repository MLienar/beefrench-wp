window.onload = function(){

    function saveBasket(basket){
        localStorage.setItem("basket", JSON.stringify(basket));
    };
    function getBasket(){
        let basket = localStorage.getItem("basket")
        if (basket == undefined){
            return [];
        }
        else{
            return JSON.parse(basket);
        }
    }
    // Ajouter
    function addBasket(product){
        let basket = getBasket();
        let foundProduct = basket.find(p => p.nom == product.nom);
        if (foundProduct != undefined){
            foundProduct.quantity++;
        }
        else{
            product.quantity = 1;
            basket.push(product);
        }
        saveBasket(basket);
    }
    $('.ajouter').click(function() {
        let classajout = $(this).attr('class');
        classajout = classajout.substr(8);
        let text = $('.nom'+classajout).html();
        let num = $('.prix'+classajout).html();
        num = parseInt(num);
        let product = {nom: text, price: num, quantity: 0};
        addBasket(product);
        document.location.reload();
    });

    // Supprimer
    function removeBasket(product) {
        let basket = getBasket();
        basket = basket.filter(p => p.nom != product.nom);
        saveBasket(basket);
    }
    function removeQuantity(product) {
        let basket = getBasket();
        let foundProduct = basket.find(p => p.nom === product.nom);
        console.log(foundProduct);
        if (foundProduct != 0){
            foundProduct.quantity -= 1;
        }
        else{
           removeBasket(product);
        }
        saveBasket(basket);
    }
    $('.enlever').click(function() {
        let classajout = $(this).attr('class');
        classajout = classajout.substr(8);
        let text = $('.nom'+classajout).html();
        let num = $('.prix'+classajout).html();
        num = parseInt(num);
        let product = {nom: text, price: num, quantity: 0};
        removeQuantity(product);
        document.location.reload();
    });

    
    // Afficher le panier
    function afficherPanier(){
        let basket = getBasket(); 
        let total = 0;
        console.log(basket); 
        for (let product of basket){
            total += product.quantity * product.price;
        } 
        for (let product of basket){
            if (product.quantity !== 0){

                let panier = document.getElementById("vrai_panier");

                let cd_product = document.createElement("div");
                let image = document.createElement("img");
                let wrap_info = document.createElement("div");
                let cd_info_1 = document.createElement("div");
                let cd_info_2 = document.createElement("div");

                let p_nom = document.createElement("p");
                let h3_prix = document.createElement("h3");
                let p_quantite = document.createElement("h5");
                
                panier.appendChild(cd_product);
                cd_product.appendChild(image);
                image.src = "shikamaru.jpg";
                cd_product.appendChild(wrap_info);
                wrap_info.appendChild(cd_info_1);
                
                cd_info_1.appendChild(h3_prix);
                cd_info_1.appendChild(p_nom);  

                wrap_info.appendChild(cd_info_2);
              
                cd_info_2.appendChild(p_quantite);
                
                p_nom.innerHTML = product.nom;
                h3_prix.innerHTML = product.price;
                p_quantite.innerHTML = product.quantity;

                cd_product.className = "cd_product";
                image.className = "img_product";
                wrap_info.className = "wrap_info";
                cd_info_1.className = "cd_info_1";
                cd_info_2.className = "cd_info_2";

                p_nom.className = "panier_nom";
                h3_prix.className = "panier_prix";
                p_quantite.className = "quantite_produit";
            }  
        }
        console.log(total);
        $('.prix_total').html(total);
        total = 0
    }
afficherPanier();
    
};      