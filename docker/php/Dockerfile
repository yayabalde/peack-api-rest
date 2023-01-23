FROM php:8.1-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends debconf apt-transport-https apt-utils libssl-dev zlib1g-dev vim  curl zip git unzip netcat libxml2-dev libpq-dev libzip-dev \
        build-essential locales acl mailutils wget \
        gnupg gnupg1 gnupg2 \
        libzip-dev \
        sudo  && \
    pecl install apcu && \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-install -j$(nproc) zip opcache intl pdo_pgsql pgsql && \
    docker-php-ext-enable apcu pdo_pgsql sodium && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY php.ini /usr/local/etc/php/php.ini
COPY php-fpm-pool.conf 	/usr/local/etc/php/pool.d/www.conf

RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
	mv composer.phar /usr/local/bin/composer

RUN wget --no-check-certificate https://phar.phpunit.de/phpunit-6.5.3.phar && \
    mv phpunit*.phar phpunit.phar && \
    chmod +x phpunit.phar && \
    mv phpunit.phar /usr/local/bin/phpunit

RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m
RUN passwd -d dev

RUN rm -rf /var/lib/apt/lists/*
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

RUN echo "dev ALL=(ALL) ALL" > /etc/sudoers

# Install NodeJS
RUN set -x && curl --silent --location https://deb.nodesource.com/setup_16.x | bash -
RUN set -x && apt-get install -y nodejs
# Update npm to the latest version
RUN npm install -g npm@latest

WORKDIR /home/wwwroot/
##</romaricp>##

EXPOSE 9000
CMD ["php-fpm"]