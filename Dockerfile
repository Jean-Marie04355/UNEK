# Image PHP officielle avec Apache
FROM php:8.2-apache

# Installation des extensions système et PHP nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libsqlite3-dev \
    && docker-php-ext-configure graphics --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_sqlite pdo_mysql gd

# Activation du module rewrite d'Apache
RUN a2enmod rewrite

# Configuration du VirtualHost Apache pointant vers public/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.doc.conf

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie du projet dans le conteneur
WORKDIR /var/www/html
COPY . .

# Installation des dépendances PHP et compilation
RUN composer install --no-dev --optimize-autoloader

# Permissions pour storage et bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Création de la base de données SQLite si elle n'existe pas
RUN touch /var/www/html/database/database.sqlite \
    && chown www-data:www-data /var/www/html/database/database.sqlite \
    && chmod 775 /var/www/html/database/database.sqlite

# Migration et Seeding lors du démarrage
EXPOSE 80

CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --class=CandidatureSeeder --force && apache2-foreground"]
