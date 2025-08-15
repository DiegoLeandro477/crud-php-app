# Estágio de Build - "builder"
FROM composer:2 as builder

# Define o diretório de trabalho
WORKDIR /app

# Copia os arquivos de dependências
COPY database/ database/
COPY composer.json composer.lock ./

# Instala as dependências de produção do Composer
RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --no-dev

# Copia o restante dos arquivos da aplicação
COPY . .

# Gera o autoload de classes otimizado
RUN composer dump-autoload --optimize

# Estágio de Produção - "production"
FROM php:8.2-fpm-alpine as production

# Define o diretório de trabalho
WORKDIR /var/www/html

# Instala as extensões PHP necessárias para o Laravel582ad4de04b2
RUN apk --no-cache add \
        libzip-dev \
        zip \
        && docker-php-ext-install pdo pdo_mysql zip

# Copia as dependências do Composer do estágio de build
COPY --from=builder /app/vendor/ /var/www/html/vendor/
# Copia os arquivos da aplicação do estágio de build
COPY --from=builder /app/ /var/www/html/

# Define as permissões corretas para os diretórios do Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copia a configuração do PHP para produção
#COPY .docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Expõe a porta 9000 para o PHP-FPM
EXPOSE 8000

# Comando para iniciar o PHP-FPM
CMD ["php","artisan", "serve","--host","0.0.0.0"]