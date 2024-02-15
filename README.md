# Simple E-commerce App

A simple e-commerce app that features users and admin inside of the program.

## Checklists

- [x] As guest, I want to be able to register an account
- [x] As guest, I want to be able to login using registered account
- [x] As user, I want to see list of products after login
- [x] As user, I want to be able to add product to cart
- [ ] As user, I want to be able to place order for added products in cart
- [ ] As user, I want to see my order history
- [x] As user, I want to be able to logout

## Bonus Task
- [ ] Verify email after registration
- [ ] User activity log e.g. login, logout, add to cart, place order etc
- [ ] Product attributes and filtering e.g brand, category
- [ ] Different user can see different price for products
- [ ] Add unit tests
- [ ] Deploy app to a server

Features:

# User Features:
- View all available products
- Add products to the cart for purchase

# Admin Features:
- Add new categories
- Add new products
- View all products

To run this program: 
1. You need to have a table called supplycart_interview inside of the database schema. Which is inside of the phpmyadmin.
2. get the files
3. Run the code inside of the root directory
```
php artisan serve
```

# Limitations of this project
1. No usage of tailwind css and vue.js for this project
2. There is no payment method for users to see their paid items
3. Users are unable to buy more than 1 quantity
4. Did not host this project to any website as there is confilct using vue.js and tailwind.css

Regards,
Muhammad Amir Hamzah
