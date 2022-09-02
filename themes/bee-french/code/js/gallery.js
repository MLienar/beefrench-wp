window.onload = function () {
    $('.cd_img_gallerie:nth-child(15n+2)').addClass('vertical')
    $('.cd_img_gallerie:nth-child(15n+8)').addClass('vertical')
    $('.cd_img_gallerie:nth-child(15n+3)').addClass('horizontal')
    $('.cd_img_gallerie:nth-child(15n+9)').addClass('horizontal')
    $('.cd_img_gallerie:nth-child(15n+13)').addClass('horizontal')
    $('.cd_img_gallerie:nth-child(15n+6)').addClass('big')
    $('.cd_img_gallerie:nth-child(15n+11)').addClass('big')

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
            let li_basket = nav.lastElementChild;
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
