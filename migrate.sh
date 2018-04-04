#!/bin/bash
# Migration script
php artisan migrate
php artisan db:seed
php artisan storage:link