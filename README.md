#### FacebookSimpleApp is a Complete Build of Laravel 5.4 Social Authentication.


### About
Facebook Simple App with the following features:

   Using PHP and MySQL as database. With followed SOLID design pattern, clean architecture, well-structured and high-performance database schema.
    The user connect/login with Facebook (logout accordingly) The user data saved in the MySQL database.
    The Facebook app simply provide the following output: the name and profile picture of the logged-in user.
    The token, which will be stored for the user in the database, should be a long living access token
    If the user removes the Facebook app, the user shall be marked as "is_active = false" in the database (Note: Facebook deauth callback)

Links

    https://developers.facebook.com/docs/facebook-login/access-tokens

    https://developers.facebook.com/docs/facebook-login/manually-build-a-login-flow/v2.4

    https://developers.facebook.com/docs/facebook-login/manually-build-a-login-flow/v2.1#deauth-callback


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

ACTIVATION=true
ACTIVATION_LIMIT_TIME_PERIOD=24
ACTIVATION_LIMIT_MAX_ATTEMPTS=3

NULL_IP_ADDRESS=0.0.0.0

DEBUG_BAR_ENVIRONMENT=local

USER_RESTORE_CUTOFF_DAYS=31
USER_RESTORE_ENCRYPTION_KEY=

DEFAULT_GRAVATAR_SIZE=80
DEFAULT_GRAVATAR_FALLBACK=http://c1940652.r52.cf0.rackcdn.com/51ce28d0fb4f442061000000/Screen-Shot-2013-06-28-at-5.22.23-PM.png
DEFAULT_GRAVATAR_SECURE=false
DEFAULT_GRAVATAR_MAX_RATING=g
DEFAULT_GRAVATAR_FORCE_DEFAULT=false
DEFAULT_GRAVATAR_FORCE_EXTENSION=jpg

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=

// NOTE: YOU CAN REMOVE THE KEY CALL IN app.blade.php IF YOU GET A POP UP AND DO NOT WANT TO SETUP A KEY FOR DEV
# Google Maps API v3 Key - https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key
GOOGLEMAPS_API_KEY=YOURGOOGLEMAPSkeyHERE

# https://console.developers.google.com/ - NEED OAUTH CREDS
GOOGLE_ID=YOURGOOGLEPLUSidHERE
GOOGLE_SECRET=YOURGOOGLEPLUSsecretHERE
GOOGLE_REDIRECT=http://yourwebsiteURLhere.com/social/handle/google

# https://www.google.com/recaptcha/admin#list
ENABLE_RECAPTCHA=false
RE_CAP_SITE=YOURGOOGLECAPTCHAsitekeyHERE
RE_CAP_SECRET=YOURGOOGLECAPTCHAsecretHERE

# https://developers.facebook.com/
FB_ID=YOURFACEBOOKidHERE
FB_SECRET=YOURFACEBOOKsecretHERE
FB_REDIRECT=http://yourwebsiteURLhere.com/social/handle/facebook

```

###### ~ **Dhiraj Patra**
