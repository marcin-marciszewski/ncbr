# NCBR+ - task

### Instalation:

##### 1. Clone repository

##### 2. Start containers:

From root folder run

```
docker-compose up -d
```

##### 3. Install backend packages:

From root folder

```
cd app
composer install
```

##### 4. Run database migrations.

From root folder run

```
docker-compose run --rm php bin/console doctrine:migrations:migrate
```

or from root folder run

```
cd app
docker exec -it  php bash
bin/console doctrine:migrations:migrate
```

##### 5.

A user with username: "test" and password: "testPassword" will be created (added with a migration).

To generate JWT token send POST request to: http://localhost/api/login_check with header:

```
    Content-Type: application/json
```

and body:

```
{
"username": "test",
"password": "testPassword"
}
```

In the response you will receive a token.

Add this header to any request to the API (starting with /api):

```
   Authorization:  Bearer <token>
```
