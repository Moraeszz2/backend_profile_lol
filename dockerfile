FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN DEBIAN_FRONTEND='noninteractive' apt-get update -y && apt-get upgrade -y && apt-get install wget -y --fix-missing --no-install-recommends \
        net-tools \
        iputils-ping \
        openssh-client \
        git \
        default-mysql-client \
        zip \
        gcc \
        vim \
        curl \
        unzip \
        build-essential \
        libxml2-dev \
        libcurl4-openssl-dev \
        pkg-config \
        libssl-dev \
        && docker-php-ext-install -j$(nproc) pdo_mysql gettext soap

RUN cd /tmp/ && \
        git clone --depth 1 https://github.com/phalcon/cphalcon -b v5.0.1 && \
        cd cphalcon/build && \
        ./install && \
        touch /usr/local/etc/php/conf.d/phalcon.ini


RUN echo "extension = phalcon.so" > /usr/local/etc/php/conf.d/phalcon.ini

RUN rm -rf /tmp/cphalcon

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN mkdir /var/www/html/keys
WORKDIR /var/www/html/keys

RUN openssl genrsa -out private.key 2048

RUN openssl rsa -in private.key -pubout -out public.key

COPY docker-entrypoint /usr/local/bin/

RUN chmod +x /usr/local/bin/docker-entrypoint

ENTRYPOINT [ "docker-entrypoint" ]

WORKDIR /var/www/html

EXPOSE 80