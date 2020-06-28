
export const cart = {
    state: {
        items: [],
        deliveryCharges: 4.99,
        total: 0,
        onCheckout: false
    },

    // add the product and
    // the quantity on the cart
    addItem(item,quantity) {

        item['quantity'] = quantity
        this.state.items.push(item)
        this.calculateTotal()
        this.saveStorage(this.state.items)

    },

    // update the product quantity
    // on the cart
    updateItemQuantity(item,quantity){

        this.state.items.forEach((element, index) => {
            if(element['id'] == item['id']){
                element['quantity'] = quantity
            }
        });

        this.calculateTotal()

        this.saveStorage(this.state.items)

    },

    // remove a product
    // from the cart
    removeItem(item) {

        let cartItems = this.getCartItems()

        let updatedItems = cartItems.filter(function(filteredItem) {
            return filteredItem.id !== item.id
        })

        this.state.items = updatedItems
        this.saveStorage(updatedItems)
        this.calculateTotal()

    },

    // calculate the total bill
    calculateTotal() {

        var total = 0
        this.state.items.forEach((element, index) => {
            total += element.attributes.price * element['quantity']
        });

        this.state.total = total

    },

    // reset the cart's data
    resetData(){

        this.state.items = []
        this.state.total = 0
        sessionStorage.removeItem("cartProducts");

    },
    openStorage () {
        return JSON.parse(sessionStorage.getItem('cartProducts'))
    },
    saveStorage (items) {
        sessionStorage.setItem('cartProducts', JSON.stringify(items))
        this.state.items = items
    },
    getCartItems(){
        const cartProducts = this.openStorage()
        if (cartProducts) {
            this.state.items = cartProducts
            this.calculateTotal()
            return  cartProducts
        }else{
            return  this.state.items
        }
    }
  };
