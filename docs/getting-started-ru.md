Как установить
--------------

### Используя Composer (*recommended*)

Самый лучший способ установки будет Composer.

Запустите код в терминале:

```bash
composer create-project ovr/phalcon-module-skeleton=dev-master /path/to/install
```

### Используя Git

Склонируйте проект, обновите vendors:

```bash
git clone https://github.com/ovr/phalcon-module-skeleton.git ./project
cd project
composer update
```

## Установка vhost для вашего веб-сервера (nginx)


```bash
cp ./docs/configs/nginx.phalcony.local.conf /etc/nginx/sites-enabled/you.host.conf
```

Don`t forget to edit nginx config and restart nginx:

```bash
nano /etc/nginx/sites-enabled/you.host.conf
sudo service nginx restart
```
