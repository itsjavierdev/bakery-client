<p>   
    <img src="https://github.com/itsjavierdev/bakery-client/assets/156542069/6de7966c-8fd3-4433-92ad-551464ca5e61" alt="logo" align="left" width="80" height="auto" ></img>
</p>

# San Xavier Bakery

This project, an Online Bakery Shop, provides a robust platform for bakeries to streamline their operations and enable customers to conveniently place orders online. It features a user-friendly interface for product browsing, a secure shopping cart system, and a seamless checkout process. The application is designed to enhance the efficiency of bakery businesses by digitizing the ordering process and providing a smooth online experience for customers. Developers can explore the codebase to understand the implementation details and contribute to the project's growth.

## 💻 Technologies:

![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)  ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)  ![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white) ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)  ![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)

---

>[!IMPORTANT]
>This project complements with the admin dashboard: https://github.com/itsjavierdev/bakery-admin

---

## 👩🏻‍💻 Installation:

First you have to install: <a href="https://laragon.org/download/index.html"><img src="https://cdn.worldvectorlogo.com/logos/laragon.svg" width="20"/> Laragon </a> 
Then clone this repository in: 
> c:\laragon\www

with
```
git clone git@github.com:itsjavierdev/bakery-client.git
```
### Run all this command lines in the laragon terminal
Install composer and node module

```
composer install
npm i
```

Create .env and generate encryption key
```
cp .env.example .env
php artisan key:generate
```

Clean cache in framework
```
composer dump-autoload 
```

Create symbolic link from public folder to storage folder
```
mklink /J public\storage c:\laragon\www\bakery-admin\storage\app\public
```

Run the migrations, to set the database and seeders
```
php artisan migrate --seed
```

## 🏃🏻‍♂️ Run the aplication:

####  Run these two command line in laragon different terminal
For run the styles
```
npm run dev
```

For run the server
```
php artisan serve
```

## 📁 File Structure

#### Controllers
I use livewire so, the controllers just was used for static routes controller with and without params
```
└─  app
   └─  Http
      └─ Controllers
         ├─ Controller.php
         └─ CustomerController.php //Controller for all routes, including routes with params
```
#### Livewire components
Components where separate in folder with similar purpose
Example Address have all whe addresses components, except for the form/addresses

Form folder have all the crud form (for separate Create and Edit rule logic, and have a cleanest code)
```
└─ app
   └─ Livewire
      ├─ Addresses       //for example have the modal create-edit, show all addresses, and selected in profile
      │  ├─ FormAddresses.php   
      │  ├─ ProfileAddress.php  
      │  └─ ShowAddresses.php   
      ├─ Cart
      │  ├─ AddToCart.php    
      │  ├─ CartButton.php   
      │  └─ ShowCart.php  
      ├─ Checkout.php
      ├─ Forms         
      │  └─ Addresses
      │     ├─ CheckoutAddresses.php
      │     ├─ CreateFormAddresses.php
      │     └─ EditFormAddresses.php
      └─ Products
         ├─ ShowAllProducts.php           
         ├─ ShowRecommendedProducts.php   
         └─ ShowRelatedProducts.php        
```

#### Views

```
└─ resources
   └─ views
      ├─ api
      ├─ auth            //auth have all views for login, register and similar auth components
      ├─ components      //all components blade (jestream and custom)
      ├─ customer        //all static views
      ├─ layouts         //layout for all app
      ├─ livewire        //dinamic livewire components /used by static views)
      ├─ policy.blade.php
      └─  profile        //All profile user views functions
```

#### Components

In folders are the own custom components
And the others are the jetstream components, used in auth views

```
├─ components
  ├─ button
  |  ├─ addcart.blade.php
  │  └─ ...
  ├─ customer
  │  └─ ...
  ├─ input
  │  └─ ...
  ├─ input-error.blade.php
  ├─ switchable-team.blade.php
  └─ ...
```

#### Statics and dinamics views

In both cases the blade.php are separate in folders with similar pourpose

The customer folder (static) ir more general because it just show title and that
In other case the livewire folder (dinamic) have more folders because its minus general

Example Addresses static view, have 2 livewire components inside form (modal) and show (show all addresses)

```
├─ customer
   ├─ Cart
   │  ├─ cart.blade.php
   │  ├─ checkout.blade.php
   │  └─ thankyou.blade.php
   ├─ index.blade.php
   ├─ Layout
   ├─ Products
   │  ├─ all-products.blade.php
   │  └─ product.blade.php
   └─ User
      └─ addresses.blade.php
├─ livewire
   ├─ addresses
   │  ├─ form-addresses.blade.php
   │  ├─ profile-address.blade.php
   │  └─ show-addresses.blade.php
   ├─ cart
   │  └─ ...
   ├─ checkout.blade.php
   ├─ customer
   └─ products
      └─ ...
```
## 💻 Demo ScreenShoots
### Index View with some products
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/724a8757-afc3-455e-a101-f3f222b844a4)

---
### Product View and related products
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/42496f69-7277-49bf-81e3-b8416733da20)

---
### Shop view with all the filters
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/668d82d8-2b45-48c8-ba5a-96fdb6bba8cb)

---
### Cart shop View
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/f336d036-e6a1-4d0b-a7d7-f899df2aaef3)

---
### Sign In View
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/9034f85b-1f7d-4679-9a0f-cab7e5483e13)

---
### Sign Up View
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/3980ef12-150c-4382-9528-f07fa3061a8a)

---
### Checkout view, with payment and delivery method
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/9c09caf3-c7c6-4d98-920d-2a779b0e7491)

---
### Thankyou View
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/3683f17c-222b-4932-99c4-c177c0430c6f)

---
### All User Addresses View
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/8d71cd69-022a-44a1-90a0-0adf532497a1)

---
### Create and Edit modal
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/f85329c3-b4dc-4ef2-abb4-e8395ff9c73d)

---
### User profile edit View
![image](https://github.com/itsjavierdev/bakery-client/assets/156542069/992ea738-cf60-4e5a-8d2d-f19282cb2ff5)





