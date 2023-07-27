# Laravel Docker Starter App



## To Run the project
- copy the `.env.example` file
```bash
cp .env.example .env
```
- edit the `.env` file and set you environment variables
- run the app
```bash
docker-compose up -d
```
- run bash in the app container
```bash
docker-compose exec -it container_name bash
```
- in the container bash run the following commands
```bash
composer install
```
```bash
cp .env.example .env
```
 - edit the `.env` file and set you environment variables
