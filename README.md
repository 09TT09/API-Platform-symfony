# API-Platform-symfony
Projet symfony avec API plateform et Easyadmin

## Installation

### Clone the project :  
```
git clone https://github.com/09TT09/API-Platform-symfony.git
```

### Install the dependencies :  
```
composer install
npm install
npm run build
```

Now the Url "http://127.0.0.1:8000/api" should work: <br />

![image 1](https://github.com/09TT09/API-Platform-symfony/tree/main/readmeimages/image_1.png)

### Create and Fill The Database :  
Add a file ".env.local" to the project root based on the .env file
Choose the database used and add the connection informations

```
# DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
DATABASE_URL="mysql://Theo:t090992@127.0.0.1:3306/Symfony-APITest-Theo-Rossignol?serverVersion=8&charset=utf8mb4"
# DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=15&charset=utf8"
```

Create and setup the database :  
 
```
php bin/console doctrine:database:create
php bin/console make:migration
```

Add Users (based on fixtures) :  

```
php bin/console doctrine:fixtures:load
```

Add Countries:  

Here you have 2 commands to generate the countries :  

1 - Get all the Countries (Huge ammount of data)  

```
php bin/console CreateCountryCommand
```

2 - Get a small predefined part of countries (15 countries)  

```
php bin/console CreateCountrySelectiveCommand
```

### JWT authentication:  

Generate JWT keys  

```
php bin/console lexik:jwt:generate-keypair
```

Generate your token with the POST method on the url http://127.0.0.1:8000/api/login_check


Now with your token you can use the API  
You need to put "Bearer 'your-JWT-token'" in the "available authorization" value field to use the API  

Other Functionality :

- you can register a new user on the URL "http://127.0.0.1:8000/register"  
- you can access the backoffice on the URL "http://127.0.0.1:8000/admin"  
use this to connect :  
email : admin@gmail.com  
password: password  

you can make various actions from here on the users or the countries

![image 2](https://github.com/09TT09/API-Platform-symfony/tree/main/readmeimages/image_2.png)
