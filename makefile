
build: .env
	docker-compose build

.env:
	cp .env.dist .env

run:
	docker-compose up

doku: README.md LICENSE

README.md:
	docker-compose exec web php -v > doku/php.txt
	docker-compose exec web php -m > doku/php-packages.txt
	docker-compose exec web nginx -v > doku/nginx.txt
	docker-compose exec web composer --no-ansi --version | tail -n +2 > doku/composer.txt
	docker-compose exec web cat /etc/alpine-release > doku/alpine.txt
	php doku/README.md.php > README.md

LICENSE:
	php doku/LICENSE.php > LICENSE

clean:
	rm -f doku/alpine.txt
	rm -f doku/composer.txt
	rm -f doku/nginx.txt
	rm -f doku/php-packages.txt
	rm -f doku/php.txt
