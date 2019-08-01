## Deploy with docker (recommended):
1.Clone this repo
```
git clone --recursive https://github.com/rikipm/dustcrm.git
```

2.Rename file `sample.env` to `.env`

3.In file`.env` change `DB_PASSWORD`, `DB_ROOT_PASSWORD` and `COOKIE_VALIDATION_KEY` to your own

4.Run commands
```
docker-compose up -d
docker-compose exec app composer update
docker-compose exec app yii migrate --interactive=0
```

5.Enter as admin by credentials `admin/admin` and change admin password

## Deploy without docker:
1.Install LAMP/LEMP stack and redis

2.Clone this repo
```
git clone --recursive https://github.com/rikipm/dustcrm.git
```

3.Update composer dependincies
```
composer update
```

4.Rename file `sample.env` to `.env`

5.In `.env` file configure database and redis connection

6.Configure your web-server to `/web` folder

7.Apply migrations
```
yii migrate
```

8.Enter as admin by credentials `admin/admin` and change admin password

## Tests:
### Database
By default database for tests will run together with app (`test_db` in `docker-compose.yml`).
If you dont need tests you can remove this service.

Before testing run migrations for test database
```
docker-compose exec app tests/bin/yii migrate --interactive=0
```
### Running tests
Run tests with
```
docker-compose exec app vendor/bin/codecept run
```
for more options see [official codeception documentation](https://codeception.com/docs/modules/Yii2)