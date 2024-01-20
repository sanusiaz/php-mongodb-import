# Import BSON Colelction 

## Step1: Install php mongodb library
 ``Please Note your php version``

 [=== https://github.com/mongodb/mongo-php-driver/releases ===]

 if you are using php 8.1.17 or newer you can download mongodb driver directly [https://github.com/mongodb/mongo-php-driver/releases/download/1.16.0/php_mongodb-1.16.0-8.1-ts-x64.zip]

 ``For CGI, use NTS and for Apache Module, use TS.
 Moreso, the PHP you are using, can you confirm if it is a TS or NTS (thread safe or non-thread safe) with phpinfo.php``


## Step2: Set driver in your php.ini
Copy the php_mongodb.dll inside downloaded file in step 1
``Then``

in your php.ini file add 
```
    extension=mongodb
```
`` Newer PHP versions use <extension> unlike older versions.
``

Make Sure to check if the extension is loded `` php -m ``

## Step3: Inside project folder / clonned folder 
Run
```
    composer install 
```
to get all the mongodb dependecies and driver

## Final Step
Copy zipped collections to project folder.

``Please Note collections must be exported to BSON not JSON``

Changed ``$extractedFolder `` in index.php to correct path
