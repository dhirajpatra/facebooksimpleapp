#### FacebookSimpleApp is a Complete Build of Laravel 5.4 Social Authentication.


### About
Facebook Simple App with the following features:
   User can register and login usual way by directly entering details. But also you can do the same thing by FaceBook social login.

   Using functional PHP and MySQL as database with ORM. With followed SOLID design pattern, clean architecture, well-structured and high-performance database schema.
    The user connect/login with Facebook (logout accordingly) The user data saved in the MySQL database.
    The Facebook app simply provide the following output: the name and profile picture of the logged-in user.
    The token, which will be stored for the user in the database, should be a long living access token
    If the user removes the Facebook app, the user shall be marked as "is_active = false" in the database (Note: Facebook deauth callback)
    It will update is_active = 1 again when they relogin with app again. Then no new entry will be inserted only it will update all data realted to same user.


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
10. From the projects root folder run `composer require laravel/dusk`
11. From the projects root folder run `php artisan dusk:install`

12. Create a FaceBook app from https://developers.facebook.com/docs/apps/register [read the help]

Main settings part is in Dashboard to get App Id and App Secret.
In Settings you have to input WebSite address eg. fbsimpleapp.dev [for my localhost site].
De authorization url need https:// domain.

[Documents for this project](documents/)


####  To run Test ####
 From the project root folder run `php artisan dusk`
 [Do not run above command as root. If it stucked you need to check the option for your operating system with DUSK. Some test cases couldnt test due to lack of time].
 From the project root folder run `./vendor/bin/phpunit`
 [to test the unit and integration test cases]

#### See the video and images in /documents folder for details. ####


#### Optionally Build Cache
1. From the projects root folder run `sudo php artisan config:cache`


#### Authentication Routes
* ```/login```
* ```/logout```
* ```/register```
### Socialite

#### De-Authentication Routes
* ```/delete```

It need to update De Authorization URL call back set up at Face Book Developer panel of the APP. It accepts only https url eg. https:// DOMAIN_NAME OR PROJECT PATH/delete [/delete route will process the FB call back value and update the DB to is_active = 0]

### Socialite

https://github.com/laravel/socialite

#### Get Socialite Login API Keys:

* [Facebook API](https://developers.facebook.com/)


### Environment File

You have to add/update env values as per your FB app, DB connection details etc.
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
