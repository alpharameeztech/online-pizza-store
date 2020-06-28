<template>
    <div v-if="!cartState.onCheckout" class="container">
        <div class="banner-item">
            <div class="banner-inner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-6">
                            <h1 class="title">{{pizza.attributes.name}}</h1>
                            <h4 class="customize-title">{{pizza.attributes.description}} </h4>
                            <div v-if="!cartState.items.some(item => item.id == pizza.id)" class="form-group">
                                <label>Quantity</label>
                                <div class="qty">
                                    <span @click="decrementQuantity" class="qty-subtract"><i class="fas fa-minus"></i></span>
                                    <input type="text" readonly name="qty" :value="quantity">
                                    <span @click="incrementQuantity" class="qty-add"><i class="fas fa-plus"></i></span>
                                </div>
                            </div>
                            <div  class="banner-controls">
                                <a v-if="!cartState.items.some(item => item.id == pizza.id)" @click="addToCart(pizza)" class="btn-custom secondary">Order <i class="flaticon-shopping-bag"></i> </a>
                                <a v-else @click="removeFromCart(pizza)" class="btn-custom primary">Remove <i class="flaticon-shopping-bag"></i> </a>
                                <h4>${{pizza.attributes.price * quantity | decimal}} / {{pizza.attributes.euro_price * quantity | decimal}}€</h4>
                            </div>
                        </div>
                        <div class="banner-nav-item-inner col-xl-6 col-lg-6">
                            <img :src="pizza.attributes.image" alt="pizza">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import { cart } from "../cart.js";

    export default {
        props: ['pizza'],
        data() {
            return {
                cartState: cart.state,
                quantity: 1
            }
        },
        created() {
            this.getCartItems()
        },
        filters: {

            // show two digits
            // after the decimal point
            decimal(value) {
                if (!value) return ''
                return value.toFixed(2)
            }
        },
        methods: {
            getCartItems () {
                this.cartState.items = cart.getCartItems()
            },

            // add the product and
            // its quantity on the cart
            addToCart(pizza) {
                cart.addItem(pizza,this.quantity)
            },

            // remove the product from
            // the cart and set its quantity
            // back to default
            removeFromCart(pizza){
                cart.removeItem(pizza)
                this.quantity = 1
            },

            // increment the quantity
            // of the product
            incrementQuantity(){
                ++this.quantity
            },

            // decrement the quantity
            // of the product
            decrementQuantity(){
                if(this.quantity > 1){
                    --this.quantity
                }
            }
        }

    }
</script>
