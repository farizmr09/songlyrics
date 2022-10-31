FROM webdevops/php-nginx:8.0-alpine as base

# Install Laravel framework system requirements (https://laravel.com/docs/9.x/deployment#optimizing-configuration-loading)
RUN apk add oniguruma-dev libxml2-dev

#no need to run this because everything has been installed
# RUN docker-php-ext-install \
#         bcmath \
#         ctype \
#         curl
        # fileinfo \
        # json \
        # mbstring \
        # pdo_mysql \
        # tokenizer \
        # xml

# Copy Composer binary from the Composer official Docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV WEB_DOCUMENT_ROOT /app/public
ENV APP_ENV local
WORKDIR /app
COPY . .

#RUN composer install --no-interaction --optimize-autoloader --no-dev
RUN composer install --no-interaction --optimize-autoloader 

# Optimizing Configuration loading
#RUN php artisan config:cache

# Optimizing Route loading
RUN php artisan route:cache
# Optimizing View loading
RUN php artisan view:cache

RUN chown -R application:application .