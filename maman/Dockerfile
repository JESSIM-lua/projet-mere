# Étape 1 : Image de base PHP avec Apache
FROM php:8.3-apache

# Étape 2 : Définir le répertoire de travail
WORKDIR /var/www/html

# Étape 3 : Installer les dépendances
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    mariadb-client \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    curl

# Étape 4 : Installer les extensions PHP
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Étape 5 : Installer Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Étape 6 : Activer le module Apache mod_rewrite et redémarrer Apache
RUN a2enmod rewrite && service apache2 restart

# Étape 7 : Copier les fichiers Laravel
COPY . .

# Étape 8 : Définir les permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Étape 9 : Définir les variables d'environnement
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Étape 10 : Nettoyage des paquets inutiles
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Étape 11 : Démarrage
EXPOSE 80
CMD ["apache2-foreground"]
