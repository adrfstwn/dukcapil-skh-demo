FROM dunglas/frankenphp:latest

# Install PHP Extensions
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

# Set Working directory
WORKDIR /app

# Copy all files
COPY . /app

# Set Environment Production
ENV APP_ENV=production
ENV APP_DEBUG=false

# Install dependencies
RUN composer install --ignore-platform-reqs --no-dev -a

# Install Octane dan set servernya ke FrankenPHP
RUN echo "yes" | php artisan octane:install --server=frankenphp

# Set permission untuk Laravel storage & cache
RUN chmod -R 777 storage bootstrap/cache

# Build Tailwind jika ada
RUN npm install
RUN npm run build

# Expose port yang digunakan Laravel Octane
EXPOSE 8000

# Define run Container
ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
