FROM php:7.1.20-cli-alpine

COPY ./composer.json ./composer.lock /app/

WORKDIR /app

RUN sh -c 'curl -s https://getcomposer.org/installer | php && php composer.phar install --no-plugins --no-scripts --prefer-dist --no-dev --optimize-autoloader --no-interaction'

COPY ./ /app

ENTRYPOINT ["php", "code/worker.php"]