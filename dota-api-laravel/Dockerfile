# Learn more about the Server Side Up PHP Docker Images at:
# https://serversideup.net/open-source/docker-php/

FROM serversideup/php:beta-8.3-fpm-nginx as base

# Fix permission issues in development by setting the "www-data"
# user to the same user and group that is running docker.
FROM base as development
ARG USER_ID
ARG GROUP_ID
RUN docker-php-serversideup-set-id www-data ${USER_ID} ${GROUP_ID}

FROM base as deploy
COPY --chown=www-data:www-data . /var/www/html

WORKDIR /var/www/html

RUN composer install
