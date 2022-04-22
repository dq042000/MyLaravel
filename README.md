# 安裝方式

## 切換開發環境分支

  - master
  - production : 正式環境
  - develop : 開發環境
```
  git checkout develop
```

## docker 設定檔

```
cp env-sample .env
```

## 啟動 docker

```
docker-compose up -d --build
```

## 安裝 php library

```
docker exec -ti selection-exam_php_1 composer install
```

## php 設定檔更改

```
  cp web/config/autoload/local.php.dist web/config/autoload/local.php
  cp web/config/autoload/module.doctrine-mongo-odm.local.php.dist web/config/autoload/module.doctrine-mongo-odm.local.php
  cp web/config/autoload/doctrine.local.php.dist web/config/autoload/doctrine.local.php
  cp web/config/autoload/openid.local.php.dist web/config/autoload/openid.local.php
  cp web/config/autoload/pay.local.php.dist web/config/autoload/pay.local.php
  cp web/config/autoload/sms.local.php.dist web/config/autoload/sms.local.php
  cp web/config/autoload/smtp.local.php.dist web/config/autoload/smtp.local.php
  cp web/config/autoload/api.local.php.dist web/config/autoload/api.local.php
```

## 設定資料庫連線

  - 設定資料庫名稱、帳號及密碼

```
  web/config/autoload/doctrine.local.php
  web/config/autoload/module.doctrine-mongo-odm.local.php
```

## 創建資料庫

 - 連線登入 phpMyAdmin 後， 創建一個新的資料庫

```
http://localhost:9911
```

## 設定 data 資料夾權限

```
  sudo chown -R $USER:www-data ./web/data
  sudo chmod -R 775 ./web/data
```

## 初始化資料庫

```
docker exec -ti selection-exam_php_1 bin/cli.sh install
docker exec -ti selection-exam_php_1 bin/cli.sh edu-school-sync
```

## 設定開發者模式

```
docker exec -ti selection-exam_php_1 composer development-enable
```
## migration 及 資料庫重建

#### migration
```
sh ./web/bin/m.sh
選 1
按 y
```
#### 資料庫重建
```
docker exec -ti selection-exam_php_1 sh bin/cli.sh install re-create-database
docker exec -ti selection-exam_php_1 sh bin/cli.sh edu-school-sync
```

## 開啟瀏覽器

    網站
    http://localhost:9910

    phpMyAdmin
    http://localhost:9911

## composer update
```
docker exec selection-exam_php_1 composer update
```
