# Online Pizza Store
This app is a simple online pizza store built using Laravel 7, Vue 2 and, Bootstrap.
The app lets you order pizza online and have the following features:
 
- Select multiple pizzas
- Add/Remove pizza quantity
- Add/Remove from the checkout page
- Store the state of the cart on browser local storage
- Store the Item Type, Items and the Orders on the database

 **Note:** At the moment, the app supports to place an order for the guest user. The sign up can be added later.

**Live Link Of The App:** https://protected-cliffs-88071.herokuapp.com/

**Live Link Setup Uses:**
- Heroku
- db4free.net (that is slower than others but easy to set up)

## The API's endpoint

- Get request to fetch all items: ```[site.url]/api/v1/items```
- Get request to fetch a specific item: ```[site.url]/api/v1/items/[id]```

 **Note:** At the moment, the app only have pizza type but later on further types can be added.

## Installation Instructions without Docker

- Run following commands:
```
git clone https://github.com/alpharameeztech/online-pizza-store
composer install
cp .env.example .env
npm install
php artisan migrate
php artisan db:seed --class=TypeSeeder
php artisan db:seed --class=ItemSeeder
```

## Installation Instructions with Docker Compose

Run the following command:  

```
docker-compose up -d
docker exec -t [container_name] bash
php artisan db:seed --class=TypeSeeder
php artisan db:seed --class=ItemSeeder
```
As a final step, visit http://your_server_ip in the browser

# Few screenshots of the Application

- When visiting the app for the first time
![first-visit](https://user-images.githubusercontent.com/36469012/137139047-d18b7b5b-4b5b-4d20-9510-dfc498992a62.png)

- When the cart is empty
![empty-card](https://user-images.githubusercontent.com/36469012/137139247-de5721bb-b0e9-4c54-a653-9cfe5a1785ac.png)

- When added the item in the cart
![added-item](https://user-images.githubusercontent.com/36469012/137139404-346aed36-4699-4ea3-9f1e-822643fe5176.png)

- View all the times added in the cart
![all-items-added-on-the-cart](https://user-images.githubusercontent.com/36469012/137139493-2681e14a-ed0a-4492-a5b4-62268540b99f.png)


- Checkout page where you can also update the quantity of the item
![checkout-page](https://user-images.githubusercontent.com/36469012/137139529-94c9b387-20c6-49e2-a9fb-9a2fded1ab6d.png)


- When the order is successfully placed
![order-is-placed](https://user-images.githubusercontent.com/36469012/137139559-d76cee52-bb1a-4a19-a8c8-d3675bcd38b5.png)


