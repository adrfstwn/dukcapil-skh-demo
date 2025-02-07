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

# Install semua dependensi tanpa dev dependencies
RUN composer install --no-dev --optimize-autoloader

# BUild Tailwind
RUN npm install
RUN npm run build

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]

