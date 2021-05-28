#!/bin/sh
set -e

echo "Deploying application ..."

# Enter maintenance mode
(php artisan down --message 'The app is being (quickly!) updated. Please try again in a minute.') || true
    # Update codebase
    git pull

    # Install dependencies based on lock file
    composer install --no-interaction --prefer-dist --optimize-autoloader

    # Clear cache
    php artisan optimize

    # Config
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache

# Exit maintenance mode
php artisan up

echo "Application deployed!"
