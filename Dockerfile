# Image PHP 8.4 Apache officielle pour Laravel 13
FROM php:8.4-apache

# Installation des paquets système nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libsqlite3-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_sqlite pdo_mysql

# Activation du mod_rewrite Apache
RUN a2enmod rewrite

# Point d'entrée Apache vers public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf || true

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie du projet
WORKDIR /var/www/html
COPY . .

# Fichier .env pour la production avec clé générée
RUN cp .env.example .env

# Installation des dépendances Composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# Création des dossiers de cache & storage avec permissions totales
RUN mkdir -p /var/www/html/storage/framework/views /var/www/html/storage/framework/sessions /var/www/html/storage/framework/cache /var/www/html/bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/database

# Création de la BDD SQLite
RUN touch /var/www/html/database/database.sqlite \
    && chown www-data:www-data /var/www/html/database/database.sqlite \
    && chmod 777 /var/www/html/database/database.sqlite

# Génération de la clé Laravel
RUN php artisan key:generate --force

EXPOSE 80

CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --class=CandidatureSeeder --force && apache2-foreground"]
