### How to run

```
    cd laradock
    docker-compose up -d nginx postgres redis
    cp .env.example .env
    docker-compose exec workspace bash
    composer install
```
Don't forget to add your YouTube API key (variable is in the bottom of .env)

