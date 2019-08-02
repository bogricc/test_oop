FROM php
COPY . /app
WORKDIR /app

RUN wget https://raw.githubusercontent.com/composer/getcomposer.org/76a7060ccb93902cd7576b67264ad91c8a2700e2/web/installer -O - -q | php -- --quiet && \
    mv composer.phar /usr/local/bin/composer

RUN apt-get update && apt-get install -y git zip && \
    composer update --no-plugins --no-scripts
