## Deploy with docker (recommended):
1.Clone this repo
```
git clone --recursive https://github.com/rikipm/dustcrm.git
```

2.Rename file `sample.env` to `.env`

3.In file`.env` change `password` and `root_password` to your own

4.Run commands
```
docker-compose up -d
docker-compose exec app yii migrate --interactive=0
```
## Deploy without docker:
1.Install LAMP/LEMP stack and redis

2.Clone this repo
```
git clone --recursive https://github.com/rikipm/dustcrm.git
```

3.Rename file `sample.env` to `.env`

4.In `.env` file configure database and redis connection

5.Configure your web-server to `/web` folder

6.Apply migrations
```
yii migrate
```