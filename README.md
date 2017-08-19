#### FacebookSimpleApp is a Complete Build of Laravel 5.4 Social Authentication.


### About
Facebook Simple App with the following features:

   Using PHP and MySQL as database. With followed SOLID design pattern, clean architecture, well-structured and high-performance database schema.
    The user connect/login with Facebook (logout accordingly) The user data saved in the MySQL database.
    The Facebook app simply provide the following output: the name and profile picture of the logged-in user.
    The token, which will be stored for the user in the database, should be a long living access token
    If the user removes the Facebook app, the user shall be marked as "is_active = false" in the database (Note: Facebook deauth callback)


### Installation Instructions
1. Run `sudo git clone https://github.com/dhirajpatra/facebooksimpleapp.git`
2. Create a MySQL database for the project
    * ```mysql -u root -p```, if using Vagrant: ```mysql -u homestead -psecret```
    * ```create database fbsimpleapp;```
    * ```\q```
3. Configure your `.env` file // NOTE: Google API Key will prevent maps error
4. Run `sudo composer update` from the projects root folder
5. From the projects root folder run `sudo chmod -R 755 ../facebooksimpleapp`
6. From the projects root folder run `php artisan key:generate`
7. From the projects root folder run `php artisan migrate`
8. From the projects root folder run `composer dump-autoload`
9. From the projects root folder run `php artisan db:seed`

#### Optionally Build Cache
1. From the projects root folder run `sudo php artisan config:cache`


#### Authentication Routes
* ```/login```
* ```/logout```
* ```/register```
### Socialite

#### De-Authentication Routes
* ```/delete```
### Socialite

#### Get Socialite Login API Keys:

* [Facebook API](https://developers.facebook.com/)


### Environment File

Example `.env` file:

```

APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelAuth
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=''

EMAIL_EXCEPTION_ENABLED=false
EMAIL_EXCEPTION_FROM=email#email.com
EMAIL_EXCEPTION_TO='email1@gmail.com, email2@rubicon.com'
EMAIL_EXCEPTION_CC=''
EMAIL_EXCEPTION_BCC=''
EMAIL_EXCEPTION_SUBJECT=''

# https://developers.facebook.com/
FB_ID=YOURFACEBOOKidHERE
FB_SECRET=YOURFACEBOOKsecretHERE
FB_REDIRECT=http://yourwebsiteURLhere.com/social/handle/facebook

```

###### ~ **Dhiraj Patra**
