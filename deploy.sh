#!/bin/bash

# Laravel Docker Deployment Script
# Usage: ./deploy.sh [production|staging]

set -e

ENVIRONMENT="${1:-production}"
PROJECT_NAME="laravel-app"

echo "🚀 Starting deployment for $ENVIRONMENT environment..."

# Create necessary directories
echo "📁 Creating directory structure..."
mkdir -p docker/apache
mkdir -p docker/mysql
mkdir -p docker/nginx
mkdir -p docker/nginx/ssl
mkdir -p storage/logs
mkdir -p storage/app

# Stop existing containers
echo "🛑 Stopping existing containers..."
docker-compose down --remove-orphans

# Remove old images (optional - uncomment if you want to rebuild from scratch)
# echo "🗑️ Removing old images..."
# docker rmi $(docker images -q $PROJECT_NAME* 2>/dev/null) || true

# Build and start containers
echo "🔨 Building and starting containers..."
docker-compose up -d --build

# Wait for database to be ready
echo "⏳ Waiting for database to be ready..."
sleep 30

# Run Laravel setup commands
echo "⚙️ Setting up Laravel application..."

# Generate application key if needed
docker-compose exec app php artisan key:generate --force

# Run database migrations
echo "🗄️ Running database migrations..."
docker-compose exec app php artisan migrate --force

# Seed database (uncomment if you have seeders)
# docker-compose exec app php artisan db:seed --force

# Clear and cache configurations
echo "🧹 Clearing and caching configurations..."
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan config:cache
docker-compose exec app php artisan route:cache
docker-compose exec app php artisan view:cache

# Create symbolic link for storage
docker-compose exec app php artisan storage:link

# Set proper permissions
echo "🔐 Setting proper permissions..."
docker-compose exec app chown -R www-data:www-data /var/www/html/storage
docker-compose exec app chown -R www-data:www-data /var/www/html/bootstrap/cache

# Show running containers
echo "📊 Container status:"
docker-compose ps

# Show application logs
echo "📋 Recent application logs:"
docker-compose logs --tail=20 app

echo "✅ Deployment completed successfully!"
echo "🌐 Application should be available at: http://localhost"
echo ""
echo "Useful commands:"
echo "  View logs: docker-compose logs -f"
echo "  Stop services: docker-compose down"
echo "  Restart services: docker-compose restart"
echo "  Access app container: docker-compose exec app bash"