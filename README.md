INSTALLATION
------------

**Init**
-
- clone project from repository `git clone https://github.com/faraabdullaev/gfg_tt.git`
- navigate into project `cd gfg_tt`
- navigate into common configs folder `cd config`
- update DB component in `db.php`

*to use docker copy:*
```$xslt
return [
   'class' => 'yii\db\Connection',
   'dsn' => 'mysql:host=mysql;dbname=gfg_tt',
   'username' => 'root',
   'password' => 'MY_PASSWORD',
   'charset' => 'utf8',
],
```

**Using Docker**
-

*Build:*
- navigate into `cd docker`
- open a DOCKER terminal 
- `sudo vi /etc/hosts`
- add or replace IP with your docker IP: `127.0.0.1	gfg.tt`
- in docker terminal, type: `docker-compose build`
- in docker terminal, type: `docker-compose up -d`

*Run:*
- browse into `cd docker`
- in docker terminal, type: `docker-compose up`
- open your browser and go to: `http://gfg.tt/`

*Run Tests:*

`codecept run`
 
 or, on docker machine
 
`docker-compose run php7 vendor/bin/codecept run`
