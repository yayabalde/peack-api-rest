## A - General information

- Symfony 6.2
- Apache 2.4
- PHP 8.1
- Mysql 8.0
- Composer 2
- Apiplatform 3.0

## B - Installation with docker

    Prerequis 
    ----------

    - Docker
    - Docker compose

### Install :

Clone project

```shell
git clone <repo-url>
cd repo
```

Start docker services

```shell
docker-compose up -d --build
```
access php container

```shell
docker-compose exec php /bin/bash
```

Install project

```shell
cd htdocs
make install
```

## Urls
- Home page: [http://localhost:8080](http://localhost:8080)
- Admin: [http://localhost:8080/admin](http://localhost:8080/admin)
- Swagger: [http://localhost:8080/swagger](http://localhost:8080/swagger)
- Api Endpoint: [http://localhost:8080/api](http://localhost:8080/api)