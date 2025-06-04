FROM php:8.2-fpm AS php

# Set working directory
WORKDIR /var/www

# Copiando os arquivos do projeto
COPY . /var/www/

# Instalar dependências de sistema, PHP e Chromium
RUN apt-get update && apt-get install -y \
    git \
    curl \
    vim \
    zip \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    ca-certificates \
    fonts-liberation \
    nodejs \
    npm \
    --no-install-recommends \
 && docker-php-ext-configure gd --with-freetype --with-jpeg \
 && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    sockets \
    zip \
    intl \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar o composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expõe a porta do PHP-FPM (opcional)
EXPOSE 9000
