FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git \
    curl \
    wget \
    libicu-dev \
    imagemagick \
    && docker-php-ext-install intl mbstring pdo pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html

# Download MediaWiki
RUN wget https://releases.wikimedia.org/mediawiki/1.39/mediawiki-1.39.0.tar.gz && \
    tar -xzf mediawiki-1.39.0.tar.gz && \
    mv mediawiki-1.39.0/* . && \
    rm -rf mediawiki-1.39.0 mediawiki-1.39.0.tar.gz

COPY LocalSettings.php /var/www/html/

RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
