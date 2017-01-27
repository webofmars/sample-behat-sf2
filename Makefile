SYMFONY_ENV=dev

.PHONY: all create install

all: install clear

install:
	composer.phar install
	php app/console doctrine:database:create
	php app/console doctrine:schema:update --force
	php app/console server:run &

clear:
	php app/console cache:clear --no-warmup

