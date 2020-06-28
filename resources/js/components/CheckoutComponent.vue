<template>
    <section v-if="cartState.onCheckout" class="section">
        <div v-if="order_placed" class="section-title-wrap section-header text-center">
            <h1 class="title">Order Placed :)</h1>
            <h4>Order#{{newOrder.id}}</h4>
            <p class="subtitle">
                {{newOrder.name}} sit tight. Food is getting ready.
            </p>
        </div>
        <div class="container" v-if="!order_placed">

            <!-- Cart Table Start -->
            <table class="ct-responsive-table">
                <thead>
                <tr>
                    <th class="remove-item"></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="pizza in cartState.items" :key="pizza.id">
                    <td class="remove">
                        <button @click="removeFromCart(pizza)" type="button" class="close-btn close-danger remove-from-cart">
                            <span></span>
                            <span></span>
                        </button>
                    </td>
                    <td data-title="Product">
                        <div class="cart-product-wrapper">
                            <img src="http://androthemes.com/themes/html/slices/assets/img/prods-sm/1.png" alt="prod1">
                            <div class="cart-product-body">
                                <h6>{{ pizza.attributes.name }}</h6>
                                <p>{{ pizza.attributes.description }}</p>
                            </div>
                        </div>
                    </td>
                    <td data-title="Price"> <strong>{{pizza.attributes.price}}$</strong> </td>
                    <td class="quantity" data-title="Quantity">
                        <input @change="updateQuantity(pizza, $event)"  type="number" class="qty form-control" :value="pizza.quantity ">
                    </td>
                    <td data-title="Total"> <strong>{{ pizza.attributes.price * pizza.quantity  | decimal }}$</strong> </td>
                </tr>

                </tbody>
            </table>
            <!-- Cart Table End -->

            <!-- Cart form Start -->
            <div class="row ct-cart-form">
                <div class="col-lg-6">

                    <!-- Buyer Info -->
                    <h4>Billing Details</h4>
                    <div class="row">
                        <div class="form-group col-xl-12">
                            <label>Name <span class="text-danger">*</span></label>
                            <input v-model="name" type="text" placeholder="First Name" name="fname" class="form-control" required="">
                        </div>
                        <div class="form-group col-xl-12">
                            <label>Phone Number <span class="text-danger">*</span></label>
                            <input v-model="phone_number" type="text" placeholder="Phone Number" name="phone" class="form-control" required="">
                        </div>
                        <div class="form-group col-xl-12 mb-0">
                            <label>Address <span class="text-danger">*</span></label>
                            <textarea v-model="address" name="name" rows="5" class="form-control" placeholder="Complete Address"></textarea>
                        </div>
                        <div class="form-group col-xl-12 mb-0">
                            <label>Order Notes</label>
                            <textarea v-model="notes" name="name" rows="5" class="form-control" placeholder="Order Notes (Optional)"></textarea>
                        </div>
                    </div>

                    <!-- /Buyer Info -->
                </div>
                <div class="col-lg-6">
                    <h4>Cart Total</h4>
                    <table>
                        <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td>{{ cartState.total | decimal }}$</td>
                        </tr>
                        <tr>
                            <th>Delivery Charges</th>
                            <td> {{ cartState.deliveryCharges }}$ </td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td> <b>{{ cartState.total + cartState.deliveryCharges | decimal }}$</b> </td>
                        </tr>
                        </tbody>
                    </table>
                    <p v-if="errors.length">
                        <b>Please correct the following error(s):</b>
                    <ul>
                        <li v-for="error in errors" :key="error">{{ error }}</li>
                    </ul>
                    </p>
                    <img v-if="is_loading" class="loader" src="/img/load.svg" />
                    <button v-if="!order_placed && !is_loading" @click="submit" class="btn-custom secondary btn-block">Submit</button>
                </div>
            </div>
            <!-- Cart form End -->

        </div>

    </section>
</template>

<script>
    import { cart } from "../cart.js";

    export default {
        data() {
            return {
                cartState: cart.state,
                name: '',
                phone_number: '',
                address: '',
                notes: '',
                order_placed: false,
                errors: [],
                newOrder: '',
                is_loading: false
            }
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

            // remove the product
            // from the cart
            removeFromCart(pizza){
                cart.removeItem(pizza)
            },

            // update the quantity of the product
            // on the cart as set by the user
            updateQuantity(pizza, event){
                cart.updateItemQuantity(pizza, event.target.value)
            },

            // validate the data
            // and send the new order
            // request to the server
            submit() {

                // validate the form data
                this.errors = []
                if(!this.name) this.errors.push("Name required.");
                if(!this.phone_number) this.errors.push("Phone number required.");
                if(!this.address) this.errors.push("Address required.");
                if(this.cartState.total < 5) this.errors.push("Total bill is too low to place an order.");
                if(this.errors.length > 0) return false;

                // send the data to the server
                // when data is validated
                let self = this
                self.is_loading = true

                axios.post('/order',{
                    order: this.cartState.items,
                    name: this.name,
                    phone_number: this.phone_number,
                    address: this.address,
                    notes: this.notes
                })
                .then(function (response) {

                    // save the new order
                    // which is placed now
                    self.newOrder = response.data.data
                    self.order_placed = true
                    self.is_loading = false

                    // reset the cart
                    // when the order
                    // is placed successfully
                    cart.resetData()
                    self.resetData()

                })
                .catch(function (error) {
                })
                .finally(function () {
                });
            },

            // reset the data to the default
            // when the order has been placed successfully
            resetData(){
                this.name = ''
                this.phone_number = ''
                this.address = ''
                this.notes = ''
            }
        }

    }
</script>

