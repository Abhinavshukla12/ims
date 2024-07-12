# Use PHP Apache image
FROM php:8.2-apache

# Install PHP extensions and dependencies
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Install the PHP intl extension
RUN apt-get update && \
    apt-get install -y libicu-dev && \
    apt-get install -y git && \
    docker-php-ext-configure intl && \
    docker-php-ext-install intl

# Enable Apache mod_rewrite for URL rewriting
RUN a2enmod rewrite

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy custom Apache configuration
COPY apache-config.conf /usr/local/apache2/conf/apache-config.conf

# Copy project files to container
COPY . .

# Change permission to read write update
RUN chmod 777 /var/www/html/writable

# Expose port 80
EXPOSE 80

# Start the Apache server when the container runs
CMD ["apache2-foreground"]