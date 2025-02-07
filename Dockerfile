FROM dunglas/frankenphp:8.2
 
RUN install-php-extensions \
    pcntl
    # Add other PHP extensions here...
 
COPY . /app
 
ENTRYPOINT ["php", "artisan", "octane:frankenphp"]