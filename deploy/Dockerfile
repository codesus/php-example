FROM php:8.2-apache

# Instalar extensiones PDO para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Habilitar mod_rewrite para URLs limpias (útil para futuro)
RUN a2enmod rewrite

# Cambiar DocumentRoot a /var/www/public
RUN sed -i 's|/var/www/html|/var/www/public|g' /etc/apache2/sites-available/000-default.conf
RUN sed -i 's|/var/www/html|/var/www/public|g' /etc/apache2/apache2.conf

# Configurar permisos para desarrollo
RUN chown -R www-data:www-data /var/www

# Directorio de trabajo
WORKDIR /var/www

# Exponer puerto 80
EXPOSE 80
