FROM php:8.2-apache

COPY . /var/www/html/

RUN a2enmod rewrite \
    && a2dismod mpm_event \
    && a2enmod mpm_prefork

CMD sed -i "s/80/$PORT/g" /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf && apache2-foreground

EXPOSE 80
