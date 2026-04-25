FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    wget \
    libicu-dev \
    imagemagick \
    libonig-dev \
    libzip-dev \
    libpq-dev \
    && docker-php-ext-install intl mbstring pdo pdo_mysql pdo_pgsql zip

RUN a2enmod rewrite

WORKDIR /var/www/html

# Download MediaWiki
RUN wget https://releases.wikimedia.org/mediawiki/1.39/mediawiki-1.39.0.tar.gz && \
    tar -xzf mediawiki-1.39.0.tar.gz && \
    mv mediawiki-1.39.0/* . && \
    rm -rf mediawiki-1.39.0 mediawiki-1.39.0.tar.gz

COPY LocalSettings.php /var/www/html/
COPY setup.sh /usr/local/bin/setup.sh

RUN chmod +x /usr/local/bin/setup.sh && \
    chown -R www-data:www-data /var/www/html && \
    mkdir -p /var/www/html/images && \
    chown -R www-data:www-data /var/www/html/images

EXPOSE 80

CMD ["/usr/local/bin/setup.sh"]
