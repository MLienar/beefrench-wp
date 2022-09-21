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
}