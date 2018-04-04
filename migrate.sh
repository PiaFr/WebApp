#!/bin/bash
# Migration script
docker-compose exec app php artisan optimize
docker-compose exec app php artisan migrate