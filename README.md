# 💻 Backend Ofinetplus E-Commerce 💻

This is a project where I have used PhP and Laravel for an E-Commerce.

As a client you can register, login or delete your account and see all the products and programs for sale. 

As an administrator you can view, create and delete any product in the e-commerce.

- Links to test the demo:
  - Backend: 
  - Frontend: 

🔧Technologies🔨

- PHP
- Laravel
- MySQL
- Composer
- Passport
- Postman
- GitHub
- Heroku

## Important

### You need to have certain things installed:

  > composer update

  > php artisan migrate

  > php artisan passport:install

### Configuration

- Set up the Database config and project in the .env file.

### Run it with: 
> php artisan serve

## Endpoints 📍

### Client: 

- POST /user/register ➡ A new client is added.
- POST /user/login ➡ Client logs into his account.
- GET /user/logout ➡ Client leaves his acccount.
- GET /user/info ➡ Client can view his account information.
- DELETE /user/delete ➡ Client can delete his acccount.

- GET /category/showAll ➡ It shows all the categories there are.
- GET /category/{name} ➡ Search the category by name.

- GET /product/showAll ➡ Shows all the products.
- GET /product/{id} ➡ Search the product by his id.
- GET /product/name/{name} ➡ Searches the product by his name.
- GET /product/category/{id} ➡ Shows the products that belong to the category id.

### Administrator: 

- POST /category/add ➡ Administrator can create a category.

- POST /product/add ➡ Administrator can create a product.
- PUT /product/{id} ➡ Administrator modifies a product.
- DELETE /product/{id} ➡ Administrator deletes a product.
