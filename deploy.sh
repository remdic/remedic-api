#!/bin/bash

# Vai alla directory del progetto
cd /var/www/tuo-progetto

# Recupera l'ultima versione del codice
git pull origin main

# Aggiorna le dipendenze di Laravel
composer install --no-dev --optimize-autoloader

# Esegui le migrazioni del database (opzionale)
php artisan migrate --force

# Pulisci la cache di Laravel (opzionale ma utile)
php artisan config:cache
php artisan route:cache
php artisan view:clear
php artisan cache:clear
