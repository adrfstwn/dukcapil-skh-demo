FROM dunglas/frankenphp

RUN install-php-extensions \
    pcntl \
    zip \
    bcmath \
    pdo_pgsql \
    pgsql

# Install Composer secara manual
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install NPM 
RUN curl -fsSL https://deb.nodesource.com/setup_current.x | bash - && apt-get install -y nodejs

WORKDIR /app

COPY . /app

# Install dependencies
RUN composer install --ignore-platform-reqs --no-dev -a

# Generate necessary files for Laravel Octane (move this after composer install)
RUN composer dump-autoload 
RUN composer require laravel/octane --with-all-dependencies

# Ensure 'frankenphp-worker.php' file exists before running Octane install
RUN if [ ! -f public/frankenphp-worker.php ]; then echo '<?php' > public/frankenphp-worker.php; fi

RUN php artisan octane:install

# Set Environment Production
ENV APP_ENV=production
ENV APP_DEBUG=false

# Build Tailwind
RUN npm install
RUN npm run build

RUN ls -la /app

EXPOSE 8000

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]

