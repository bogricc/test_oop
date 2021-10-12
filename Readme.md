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
`<user x coordinate> <user y coordinate> <shop data url>`

Notice that the data file will be read from an network location (ex: https://raw.githubusercontent.com/Agilefreaks/test_oop/master/coffee_shops.csv)

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

### With PHP and Composer locally installed
In order to run this application you need to have PHP7 and Composer installed on your system.
Installing process depends on platform. Please see this external links for [Windows](https://www.jeffgeerling.com/blog/2018/installing-php-7-and-composer-on-windows-10) and [Linux](https://linuxconfig.org/how-to-install-php-composer-on-debian-linux).
Update dependencies running
```composer update```
Once PHP is installed test the project
```php -f index.php```
You should see the usage.
Now run the project with a command like this
```php -f index.php -- <user x coordinate> <user y coordinate> <shop data filename>```

To run all tests, please use this command:
```php -f vendor/bin/phpunit -- --bootstrap ./vendor/autoload.php --testdox tests```
Where `tests` is folder where tests are defined.
If you need to test only one test then you need to append the desired class.
Example:
```php -f vendor/bin/phpunit -- --bootstrap ./vendor/autoload.php --testdox tests/CoffeeShopTests/CoffeeShopWithDistanceToUserTest```


### Within a Docker container
If you have [Docker](https://docs.docker.com/docker-for-windows/release-notes/ "Docker Release Page") installed on your system
you can run this project after a few setup steps
1. Create a file named Dockerfile and paste this content inside it
```
FROM php
COPY . /app
WORKDIR /app

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php && \
    php -r "unlink('composer-setup.php');" && \
    mv composer.phar /usr/local/bin/composer

RUN apt-get update && apt-get install -y git zip && \
    composer update --no-plugins --no-scripts
```
2. Build the image
```
docker build -t coffeeshop .
```
3. Run the image
Now its ready to run the project inside a container based on already built image 
```
docker run --rm -ti coffeeshop \
    bash -c "php -f index.php -- <user x coordinate> <user y coordinate> <shop data filename>"
```
Example:
```
docker run --rm -ti coffeeshop \
    bash -c "php -f index.php -- 47.6 -122.4 coffee_shops.csv"
```

Running tests is similar:
```
docker run --rm -ti coffeeshop \
    bash -c "php -f vendor/phpunit/phpunit/phpunit -- \
    --bootstrap vendor/autoload.php tests" 
```
or test a specified class
```
docker run --rm -ti coffeeshop \
    bash -c "php -f vendor/phpunit/phpunit/phpunit -- \
    --bootstrap vendor/autoload.php tests/CoffeeShopTests/CoffeeShopWithDistanceToUserTest" 
```

Using `--testdox` option PHPUnit framework will generate a test documentation based on 
test naming convention. Please see more [here](https://phpunit.readthedocs.io/en/8.2/textui.html#testdox).
Example:
```
docker run --rm -ti coffeeshop \
    bash -c "php -f vendor/phpunit/phpunit/phpunit -- \
    --bootstrap vendor/autoload.php --testdox tests/CoffeeShopTests/CoffeeShopWithDistanceToUserTest" 
```
