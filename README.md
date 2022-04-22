# 安裝方式

## 切換開發環境分支

  - master
  - production : 正式環境
  - develop : 開發環境
```
  git checkout develop
```

## db 設定
```
mkdir DB
```

## docker 設定檔

```
cp docker-compose-sample.yml docker-compose.yml
cp env-sample .env
```

## 啟動 docker

```
docker-compose up -d --build
```

## 安裝 php library

```
docker exec -ti mylaravel_php_1 composer install
```

## 設定 Laravel
1. 權限
```
sudo chmod -R 777 ./web/bootstrap/cache/ ./web/storage/
```

2. 設定 config
```
vi ./web/config/app.php
vi ./web/config/database.php
```

## 開啟瀏覽器

    網站
    http://localhost:9810

    phpMyAdmin
    http://localhost:9811

