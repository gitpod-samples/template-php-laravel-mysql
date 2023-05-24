# install:
# 	@make build
# 	@make up
# 	composer install
# 	cp .env.example .env
# 	php artisan key:generate
# 	php artisan storage:link
# 	chmod -R 777 storage bootstrap/cache
# 	@make fresh
up:
	./vendor/bin/sail up -d
build:
	./vendor/bin/sail build
build-f:
	./vendor/bin/sail build --no-cache --force-rm
npm:
	./vendor/bin/sail npm install
	./vendor/bin/sail npm run dev
npm-dev:
	./vendor/bin/sail npm run dev
# remake:
# 	@make destroy
# 	@make install
stop:
	./vendor/bin/sail stop
down:
	./vendor/bin/sail down --remove-orphans
down-v:
	./vendor/bin/sail down --remove-orphans --volumes
restart:
	@make down
	@make up
destroy:
	./vendor/bin/sail down --rmi all --volumes --remove-orphans
ps:
	./vendor/bin/sail ps
logs:
	./vendor/bin/sail logs
logs-watch:
	./vendor/bin/sail logs --follow
log-web:
	./vendor/bin/sail logs web
log-web-watch:
	./vendor/bin/sail logs --follow web
log-app:
	./vendor/bin/sail logs app
log-app-watch:
	./vendor/bin/sail logs --follow app
log-db:
	./vendor/bin/sail logs db
log-db-watch:
	./vendor/bin/sail logs --follow db
# web:
# 	./vendor/bin/sail exec web bash
# app:
# 	bash
migrate:
	./vendor/bin/sail php artisan migrate
fresh:
	./vendor/bin/sail php artisan migrate:fresh --seed
seed:
	./vendor/bin/sail php artisan db:seed
dacapo:
	./vendor/bin/sail php artisan dacapo
rollback-test:
	./vendor/bin/sail php artisan migrate:fresh
	./vendor/bin/sail php artisan migrate:refresh
tinker:
	./vendor/bin/sail php artisan tinker
test:
	./vendor/bin/sail php artisan test
optimize:
	./vendor/bin/sail php artisan optimize
optimize-clear:
	./vendor/bin/sail php artisan optimize:clear
cache:
	./vendor/bin/sail composer dump-autoload -o
	@make optimize
	./vendor/bin/sail php artisan event:cache
	./vendor/bin/sail php artisan view:cache
cache-clear:
	./vendor/bin/sail composer clear-cache
	@make optimize-clear
	./vendor/bin/sail php artisan event:clear
    ./vendor/bin/sail php artisan view:clear
# db:
# 	docker compose exec db bash
# sql:
# 	docker compose exec db bash -c 'mysql -u $$MYSQL_USER -p$$MYSQL_PASSWORD $$MYSQL_DATABASE'
# redis:
# 	docker compose exec redis redis-cli
ide-helper:
	./vendor/bin/sail php artisan clear-compiled
	./vendor/bin/sail php artisan ide-helper:generate
	./vendor/bin/sail php artisan ide-helper:meta
	./vendor/bin/sail php artisan ide-helper:models --nowrite

# breez:
# 	./vendor/bin/sail composer require laravel/breeze --dev
# breez-install:
# 	php artisan breeze:install vue --dark

# sail-up:
# 	./vendor/bin/sail up -d
# sail-stop:
# 	./vendor/bin/sail stop

# sail-cmd:
#     alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
