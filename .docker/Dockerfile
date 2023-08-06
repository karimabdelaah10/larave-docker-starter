FROM php:8.1-fpm
# Setup working directory
WORKDIR /var/www
COPY core/ .

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    supervisor \
    zip \
    unzip
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
############################# Laravel App Config #############################
COPY scripts/entrypoint.sh /tmp/entrypoint.sh
RUN true
COPY scripts/prepare_env.sh /bin/prepare_env.sh
COPY scripts/fix_permissions.sh /bin/fix_permissions.sh

RUN chmod +x /bin/prepare_env.sh
COPY core/ /var/www
RUN true
RUN chown -R www-data:www-data /var/www
RUN chmod 777 -R /tmp && chmod o+t -R /tmp

############################# Supervisor Config #############################
COPY .docker/supervisor/app.conf /etc/supervisord.conf
RUN true
COPY .docker/php/php.ini /usr/local/etc/php/conf.d/app.ini
RUN true
############################# Start the app (final script) #############################
ENTRYPOINT ["/tmp/entrypoint.sh"]
