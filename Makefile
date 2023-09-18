.PHONY:
	setup build up down

setup: build
	sudo chmod -R 777 ./app/storage

build:
	docker compose -f ./docker/docker-compose.yml build

up:
	docker compose -f ./docker/docker-compose.yml up -d

down:
	docker compose -f ./docker/docker-compose.yml down