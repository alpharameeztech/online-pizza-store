# Online Pizza Store
This app is a simple online pizza store built using Laravel 7, Vue 2 and, Bootstrap.
The app lets you order pizza online and have the following features:
 
- Select multiple pizzas
- Add/Remove pizza quantity
- Add/Remove from the checkout page
- Store the state of the cart on browser local storage
 
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
![Image description](https://ecatalog.s3-ap-southeast-1.amazonaws.com/resources/Screenshot+from+2020-06-29+10-32-42.png)

- When the cart is empty
![Image description](https://ecatalog.s3-ap-southeast-1.amazonaws.com/resources/Screenshot+from+2020-06-29+10-30-44.png)

- When added the item in the cart
![Image description](https://ecatalog.s3-ap-southeast-1.amazonaws.com/resources/Screenshot+from+2020-06-29+10-29-23.png)

- View all the times added in the cart
![Image description](https://ecatalog.s3-ap-southeast-1.amazonaws.com/resources/Screenshot+from+2020-06-29+10-29-40.png)

- Checkout page where you can also update the quantity of the item
![Image description](https://ecatalog.s3-ap-southeast-1.amazonaws.com/resources/Screenshot+from+2020-06-29+10-29-53.png)

- When the order is successfully placed
![Image description](https://ecatalog.s3-ap-southeast-1.amazonaws.com/resources/Screenshot+from+2020-06-29+10-37-42.png)

