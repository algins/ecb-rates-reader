env-prepare:
	cp -n .env.example .env || true

install:
	composer install

key:
	php artisan key:generate

lint:
	composer phpcs

migrate:
	php artisan migrate

setup: install env-prepare key migrate

start:
	php artisan serve --host 0.0.0.0

test:
	composer phpunit

load:
	php artisan ecb-rates:load
