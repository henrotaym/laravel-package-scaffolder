FROM oven/bun:1 as bun

WORKDIR /opt/apps/app

COPY package.json bun.lockb* ./

RUN bun install

# ----------------------------------
 
FROM php:8.2-cli-alpine3.19 as cli

RUN apk add --update --no-cache --virtual .build-phpize $PHPIZE_DEPS linux-headers && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug && \
    apk del .build-phpize && \
    docker-php-source delete

# Install composer
COPY --from=composer:2.7.2 /usr/bin/composer /usr/bin/composer

ARG UID=1000
ARG GID=1000

RUN apk add --no-cache shadow && \
    usermod  --uid ${UID} --non-unique www-data && \
    groupmod --gid ${GID} --non-unique www-data

USER www-data:www-data

WORKDIR /opt/apps/app

COPY --chown=www-data:www-data --from=bun /opt/apps/app/node_modules ./node_modules
COPY --chown=www-data:www-data . .

# ----------------------------------

FROM cli