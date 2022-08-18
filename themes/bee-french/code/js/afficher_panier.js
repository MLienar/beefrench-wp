class CartItem {
    constructor (item) {
        this.nom = item.nom
        this.price = item.price
        this.id = item.id
        this.quantity = item.quantity
        this.image = item.image
        this.size = item.size
    }

    renderCartItem () {
        return (
            `<div class="cd_product">
                <img src=${this.image} class="img_product">
                <div class="wrap_info">
                    <div class="cd_info_1">
                        <h3 class="panier_prix32">${this.price} €</h3>
                        <p class="panier_nom32">${this.nom}</p>
                    </div>
                    <div class="cd_info_2">
                        <input class="input_qty" id=${this.id} value=${this.quantity} min="1" name="quantity[]" type="number" max="9"">
                        <input value=${this.id} name="id_product[]" type="hidden">
                        <input value="${this.nom}" name="nom_produit[]" type="hidden">
                        <input value=${this.image} name="image[]" type="hidden">
                    </div>
                </div>
                <div class="enlever_div"><p class="enlever 32" id=${this.id}>X</p>
                </div>
            </div>`
        )
    }
}

class Cart {
    constructor (items) {
        this.items = items
        this.totalPrice = ""
    }

    updateLocalStorage () {
        const cookie = localStorage.getItem("basket")
        if(cookie) {
            localStorage.removeItem("basket")
        }
        const cartCookie = JSON.stringify(this.items)
        localStorage.setItem("basket", cartCookie)
    }

    createItemCardsContainer () {
        const itemCards = document.createElement("div")
        itemCards.className = "container"
        itemCards.innerHTML = this.items.map(item => item.renderCartItem())
        const inputQty = itemCards.querySelectorAll('.input_qty')
        inputQty.forEach(input => input.addEventListener('input', (e) => this.updateQuantity(e)))
        const deleteItem = itemCards.querySelectorAll('.enlever_div p')
        deleteItem.forEach(input => input.addEventListener('click', (e) => this.deleteItem(e)))
        cartContainer.appendChild(itemCards)
        this.updatePriceDisplay()
        this.updateLocalStorage()
    }

    clearCart() {
        cartContainer.childNodes.forEach(node => {if (node.className === "container") {
            cartContainer.removeChild(node)
        }})
    }

    deleteItem(e) {
        const correspondingItems = this.items.filter(item => item.id !== e.target.id)
        this.items = correspondingItems
        this.clearCart()
        this.createItemCardsContainer()
    }

    updateQuantity(e) {
        const correspondingItem = this.items.find(item => item.id === e.target.id)
        correspondingItem.quantity = e.target.value
        this.updatePriceDisplay()
    }

    updatePriceDisplay () {
        const priceDisplay = document.querySelector(".cd_prix_total")
        let price = 0
        for (const item of this.items) {
            const totalPrice = item.price * item.quantity
            price += totalPrice
        }   
        priceDisplay.innerText = "Total: " +  price + " €"
    }

}

function getBasketFromLocalStorage() {
    let basket = localStorage.getItem("basket")
    if (basket == undefined) {
        return [];
    }
    else {
        return JSON.parse(basket);
    }
}

let cart = null

function initCart () {
    cartContainer = document.querySelector("form")
    const items = getBasketFromLocalStorage()
    const itemObjects = []
    for (const item of items) {
        itemObjects.push(new CartItem(item))
    }
    const tempCart = new Cart(itemObjects)
    cart = tempCart
    cart.createItemCardsContainer()
}

function updateQuantity () {
    
}

window.addEventListener("load", initCart)


