## Staff Manager built in Laravel

# How to install

1. Clone this repository.

2. Make sure you have `composer` and `gulp` installed.

3. Install dependencies by running the following commands from within the working directory

	```
	composer install
	```

	```
	npm install
	```

4. Create a `.env` file inside the working directory.

5. Create the database tables by running migrations with the following command from within the working directory

	```
	php artisan migrate
	```

5. Run `gulp watch` if you want to make changes to the `scss` or `js` files in `resources/assets/sass` and `resorces/assets/js`.

6. Create a new host in MAMP and point it to the `public` directory.

7. Visit the installation from the browser and create an account.