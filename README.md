# Laravel Docker Starter App



## To Run the project
- copy the `.env.example` file
```bash
cp .env.example .env
```
- edit the `.env` file and set you environment variables
- run the app
```bash
docker-compose up --build -d
```
- run bash in the app container
```bash
docker exec -it container_name bash
```
- in the container bash run the following commands
```bash
/bin/prepare_env.sh
```
 - edit the `core/.env` file and set you environment variables
