# Import BSON Collection 

## Step1: Install php mongodb library
 ``Please Note your php version``

 [=== https://github.com/mongodb/mongo-php-driver/releases ===]

 if you are using php 8.1.17 or newer you can download mongodb driver directly [https://github.com/mongodb/mongo-php-driver/releases/download/1.16.0/php_mongodb-1.16.0-8.1-ts-x64.zip]

 ``For CGI, use NTS and for Apache Module, use TS.
 More, the PHP you are using, can you confirm if it is a TS or NTS (thread safe or non-thread safe) with phpinfo.php``


## Step2: Set driver in your php.ini
Copy the php_mongodb.dll inside downloaded file in step 1
``Then``

in your php.ini file add 
```
    extension=mongodb
```
`` Newer PHP versions use <extension> unlike older versions.
``

Make Sure to check if the extension is loaded `` php -m ``

## Step3: Inside project folder / cloned folder 
Run
```
    composer install 
```
to get all the mongodb dependencies and driver

## Step 4: Copy all extracted files to $extractedFolder 
Make sure to copy all extracted files to the $extractedFolder ( please check index.php )

``Please Note collections must be exported to BSON not JSON``

Changed ``$extractedFolder `` in index.php to correct path


## Final Step
Make sure the MongoDB Database Tools is installed and also the database specified in (index.php) $databaseName exists in MongoDB Database(s)

```
    php index.php
```
Run this code to start the process. All data will be imported to the required database.. Please make sure the database is fresh with no collection
