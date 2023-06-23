FROM php:8.1-fpm-alpine

WORKDIR /g4f

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && sync

RUN apk update && apk add --no-cache \
      zip \
      wget \
      curl \
      unzip \
      mysql \
      bash \
    && install-php-extensions \
      bcmath \
      bz2 \
      calendar \
      exif \
      intl \
      opcache \
      pdo_mysql \
      mysqli \
      xsl \
      zip \
      sockets

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && ln -s $(composer config --global home) /root/composer
ENV PATH=$PATH:/root/composer/vendor/bin COMPOSER_ALLOW_SUPERUSER=1

# Clean repository
RUN rm -Rf /var/cache/apk/*
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 777 /var/www/html
#COPY . .