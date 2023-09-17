.PHONY:
	build up down

build:
	docker compose -f ./docker/docker-compose.yml build

up:
	docker compose -f ./docker/docker-compose.yml up

down:
	docker compose -f ./docker/docker-compose.yml down