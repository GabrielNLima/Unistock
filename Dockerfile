FROM php:8.2-fpm

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    nginx \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    nodejs \
    npm

# Instalar extensões do PHP necessárias para o Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir o diretório de trabalho para o Laravel
WORKDIR /var/www

# Copiar o arquivo de configuração do Nginx
COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

# Copiar arquivos do Laravel
COPY . .

# Instalar dependências do Laravel
RUN composer install --no-dev --optimize-autoloader

# Instalar dependências do Node.js (Vue.js, Tailwind, etc.)
RUN npm install && npm run build

# Ajustar permissões para o Laravel
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Expor as portas do Nginx e do PHP-FPM
EXPOSE 80

# Iniciar o Nginx e o PHP-FPM
CMD service nginx start && php-fpm
