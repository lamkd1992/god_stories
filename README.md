### Development Environment

-   Docker
-   Laravel 10
-   PostgreSQL

### Docker

-   Build docker image

```
$ docker-compose --build
```

-   Start docker:

```
$ .docker/start
```

-   Stop docker:

```
$ .docker/stop
```

-   Access Docker container:

```
$ .docker/bash
```

-    Run migrate database

```
$ composer install                   # Install composer
$ php artisan migrate:refresh --seed # Migrate DB
```

-   Check web is live at: `http://localhost:8000`

### Create repository
```
php artisan make:repository modelName
```

### Coding convention

-   Access docker container:

```
$ .docker/bash
```

-   Run laravel coding convention (for PHP):

```
$ ./vendor/bin/pint
```
