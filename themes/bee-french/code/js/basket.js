
window.onload = function () {

    let productID = $('.postid').html();
    let tabproductID = { id: productID, quantity: 0 };
    function saveBasket(basket) {
        localStorage.setItem("basket", JSON.stringify(basket));
    }
    function getBasket() {
        let basket = localStorage.getItem("basket");
        if (basket == undefined) {
            return [];
        }
        else {
            console.log(JSON.parse(basket));
            return JSON.parse(basket);
        }
    }
    function addBasket(product) {
        let basket = getBasket();
        let foundProduct = basket.find(p => p.id == product.id);
        if (foundProduct != undefined) {
            foundProduct.quantity++;
        }
        else {
            product.quantity = 1;
            basket.push(product);
        }
        saveBasket(basket);
    }
    addBasket(tabproductID);
    getBasket();
};