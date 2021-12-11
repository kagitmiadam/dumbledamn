# Dumbledamn
Üç Büyücü Turnuvası - Açık Kaynak Hackathon yarışması

## Kurulum

### Docker Installation

docker-compose build app
docker-compose up -d
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
docker-compose exec app php artisan config:cache

### .env Settings

docker kurulumu sonrası `docker-compose ps` sonucunda mysqlin namei kopyalanır.

```bash
/var/www/dumledamn$ docker-compose ps
      Name                    Command               State                  Ports                
------------------------------------------------------------------------------------------------
dumbledamn-app     docker-php-entrypoint php-fpm    Up      9000/tcp                            
dumbledamn-db      docker-entrypoint.sh mysqld      Up      3306/tcp, 33060/tcp                 
dumbledamn-nginx   /docker-entrypoint.sh ngin ...   Up      0.0.0.0:8000->80/tcp,:::8000->80/tcp
```

yukarıdaki örnekteki `dumbledamn-db` yazan yerdeki string ifade. Bu string `.env` içerisinde `DB_HOST` alanına yazılmalı.