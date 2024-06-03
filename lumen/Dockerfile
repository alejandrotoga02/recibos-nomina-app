FROM php:8.2-apache
# Enable Apache modules
RUN a2enmod rewrite

# Install PostgreSQL client and its PHP extensions
RUN apt-get update \
    && apt-get install -y libpq-dev git  zip \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the PHP code file in /app into the container at /var/www/html
COPY . .

