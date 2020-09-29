# ecb-rates-reader

http://localhost:4200/ecb-rates

### Requirements

  * Git
  * Docker

### Clone project

```sh
$ git clone https://github.com/algins/ecb-rates-reader.git
```

### Start Docker containers

```sh
$ docker-compose up -d
```

### Run database migrations

```sh
$ docker-compose run server make migrate
```

### Load ECB currency rates

```sh
$ docker-compose run server make load
```
