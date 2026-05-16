FROM php:8.3-apache

# Copy website files
COPY public_html/ /var/www/html/
COPY private/ /var/www/private/

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html /var/www/private \
    && chmod -R 755 /var/www/html

# Enable Apache rewrite module (good practice)
RUN a2enmod rewrite

EXPOSE 80
