## Overview

You have been hired by a company that builds a mobile app for coffee addicts.  You are 
responsible for taking the user’s location and returning a list of the three closest coffee shops.

## Input

The coffee shop list is a comma separated file with rows of the following form:
`Name,Y Coordinate,X Coordinate`

The quality of data in this list of coffee shops may vary.  Malformed entries should cause the 
program to exit appropriately. 

Your program will be executed directly from the command line and will be provided three 
arguments in the following order:
`<user x coordinate> <user y coordinate> <shop data filename>`

## Output

Write a program that takes the user’s coordinates encoded as listed above and prints out a 
newline­separated list of the three closest coffee shops (including distance from the user) in 
order of closest to farthest.  These distances should be rounded to four decimal places. 

Assume all coordinates lie on a plane.

## Example

Using the [coffee_shops.csv](coffee_shops.csv)

__Input__

`47.6 -122.4 coffee_shops.csv`

__Expected output__

```
Starbucks Seattle2,0.0645
Starbucks Seattle,0.0861
Starbucks SF,10.0793
```
## Run the project

First clone this git or download the zip.
All next commands are needed to run in a coomand-line or a terminal shell
opened inside the git clone or downloaded archive unzipped.


### With PHP locally installed
In order to run this application you need to have PHP7 installed on your system.
Once PHP is installed test the project
`php -f index.php`
You should see the usage.
Now run the project with a command like this
```php -f index.php -- <user x coordinate> <user y coordinate> <shop data filename>```

To run all tests, please use this command:
```php -f vendor/bin/phpunit -- --bootstrap ./vendor/autoload.php --testdox tests```
Where `tests` is folder where tests are defined.
If you need to test only one test then you need to append the desired class.
Example:
```php -f vendor/bin/phpunit -- --bootstrap ./vendor/autoload.php --testdox tests/CoffeeShopDistanceTest```


### Within a Docker container
If you have [Docker](https://docs.docker.com/docker-for-windows/release-notes/ "Docker Release Page") installed on your system
you can run this project simply running
```
docker run --rm -ti -v "$PWD"/:/app php \
    bash -c "cd /app && \
    php -f index.php -- <user x coordinate> <user y coordinate> <shop data filename>"
```
Example:
```
docker run --rm -ti -v "$PWD"/:/app php \
    bash -c "cd /app && \
    php -f index.php -- 47.6 -122.4 coffee_shops.csv"
```

Running tests is similar:
```
docker run --rm -ti -v "$PWD"/:/app php \
    bash -c "cd /app && \
    php -f vendor/phpunit/phpunit/phpunit -- \
    --bootstrap vendor/autoload.php tests" 
```
or test a specified class
```
docker run --rm -ti -v "$PWD"/:/app php \
    bash -c "cd /app && \
    php -f vendor/phpunit/phpunit/phpunit -- \
    --bootstrap vendor/autoload.php tests/CoffeeShopDistanceTest" 
```
If tests are not working correctly or you see no output, please make sure you are placed inside of the 
project folder.