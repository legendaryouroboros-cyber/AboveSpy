FROM php:8.2-apache

COPY . /var/www/html/

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf \
    && a2enmod rewrite

ENV PORT=80
CMD sed -i "s/80/$PORT/g" /etc/apache2/ports.conf /etc/apache2/sites-enabled/000-default.conf && apache2-foreground

EXPOSE 80
