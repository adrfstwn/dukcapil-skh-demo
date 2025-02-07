FROM dunglas/frankenphp
 
RUN install-php-extensions \
    pcntl
    # Add other PHP extensions here...
 
COPY . /app

RUN composer install --no-dev --optimize-autoloader
 
ENTRYPOINT ["php", "artisan", "octane:frankenphp"]