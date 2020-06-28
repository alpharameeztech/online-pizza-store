<template>
    <div class="header-controls">
        <ul class="header-controls-inner">
            <li class="cart-dropdown-wrapper cart-trigger">
                <span class="cart-item-count">{{cartState.items.length}}</span>
                <i class="flaticon-shopping-bag"></i>
            </li>
        </ul>
    </div>
</template>

<script>

    import { cart } from "../cart.js";

    export default {
        data() {
            return {
                cartState: cart.state
            }
        },
    }
</script>
