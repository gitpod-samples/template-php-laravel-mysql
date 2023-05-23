install:
	@make build
	@make up
	composer install
	cp .env.example .env
	php artisan key:generate
	php artisan storage:link
	chmod -R 777 storage bootstrap/cache
	@make fresh
up:
	docker compose up -d
build:
	docker compose build
build-f:
	docker-compose build --no-cache --force-rm
remake:
	@make destroy
	@make install
stop:
	docker compose stop
down:
	docker compose down --remove-orphans
down-v:
	docker compose down --remove-orphans --volumes
restart:
	@make down
	@make up
destroy:
	docker compose down --rmi all --volumes --remove-orphans
ps:
	docker compose ps
logs:
	docker compose logs
logs-watch:
	docker compose logs --follow
log-web:
	docker compose logs web
log-web-watch:
	docker compose logs --follow web
log-app:
	docker compose logs app
log-app-watch:
	docker compose logs --follow app
log-db:
	docker compose logs db
log-db-watch:
	docker compose logs --follow db
web:
	docker compose exec web bash
app:
	bash
migrate:
	php artisan migrate
fresh:
	php artisan migrate:fresh --seed
seed:
	php artisan db:seed
dacapo:
	php artisan dacapo
rollback-test:
	php artisan migrate:fresh
	php artisan migrate:refresh
tinker:
	php artisan tinker
test:
	php artisan test
optimize:
	php artisan optimize
optimize-clear:
	php artisan optimize:clear
cache:
	composer dump-autoload -o
	@make optimize
	php artisan event:cache
	php artisan view:cache
cache-clear:
	composer clear-cache
	@make optimize-clear
	php artisan event:clear
    php artisan view:clear
db:
	docker compose exec db bash
sql:
	docker compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
redis:
	docker compose exec redis redis-cli
ide-helper:
	php artisan clear-compiled
	php artisan ide-helper:generate
	php artisan ide-helper:meta
	php artisan ide-helper:models --nowrite

breez:
	composer require laravel/breeze --dev

breez-install:
	php artisan breeze:install vue --dark

npm-install:
	cd src && npm install && npm run dev
npm-run-dev:
	cd src && sudo npm run dev -g --unsafe-perm=true --allow-root
sail-up:
	./vendor/bin/sail up -d
sail-stop:
	./vendor/bin/sail stop
npm:
	npm install
	npm run dev

# sail-cmd:
#     alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
