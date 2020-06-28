<template>
    <div v-if="!cartState.onCheckout" class="cart-sidebar-wrapper">
        <aside class="cart-sidebar">
            <div class="cart-sidebar-header">
                <h3>Your Cart</h3>
                <div class="close-btn cart-trigger close-dark">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div v-if="cartState.items.length" class="cart-sidebar-body">
                <div class="cart-sidebar-scroll">
                    <div v-for="pizza in cartState.items" :key="pizza.id" class="cart-sidebar-item">
                        <div class="media">
                            <a href="menu-item-v1.html"><img src="http://androthemes.com/themes/html/slices/assets/img/prods-sm/1.png" alt="product"></a>
                            <div class="media-body">
                                <h5> <a href="menu-item-v1.html" title="Pepperoni">{{pizza.attributes.name}}</a> </h5>
                                <span>{{pizza.quantity}}x {{pizza.attributes.price}}$</span>
                            </div>
                        </div>
                        <div class="cart-sidebar-item-meta">
                            <span>x{{pizza.quantity}}</span>
                        </div>
                        <div class="cart-sidebar-price">
                            {{pizza.attributes.price * pizza.quantity  | totalPizzaPrice}}$
                        </div>
                        <div class="close-btn" @click="removeFromCart(pizza)">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="cart-sidebar-body">
                <img src="/img/empty_cart.png" class="emptyCart"/>
            </div>
            <div class="cart-sidebar-footer">
                <h4>Total: <span>{{ cartState.total | totalPizzaPrice }}$</span> </h4>
                <a @click="checkout" v-if="cartState.items.length" class="btn-custom secondary">Checkout</a>
            </div>
        </aside>
        <div class="cart-sidebar-overlay cart-trigger">
        </div>
    </div>
</template>

<script>
    import { cart } from "../cart.js";

    export default {
        data() {
            return {
                cartState: cart.state,
            }
        },
        filters: {
            totalPizzaPrice(value) {
                if (!value) return ''
                return value.toFixed(2)
            }
        },
        methods: {
            removeFromCart(pizza){
                cart.removeItem(pizza)
            },
            checkout(){
                this.cartState.onCheckout = true
            }
        }
    }
</script>

<style>
    .emptyCart{
        width: 100%;
    }
</style>
