How to install
--------------

### Using Composer (*recommended*)

Best way to install skeleton would be Composer, if you didn't install it

Run code in the terminal:

```bash
composer create-project ovr/phalcon-module-skeleton=dev-master /path/to/install
```

### Using Git

First you need to clone the project, update vendors:

```bash
git clone https://github.com/ovr/phalcon-module-skeleton.git ./project
cd project
composer update
```

## Install vhost for your virtual server


```bash
cp ./docs/configs/nginx.phalcony.local.conf /etc/nginx/sites-enabled/you.host.conf
```

Don`t forget to edit nginx config and restart nginx:

```bash
nano /etc/nginx/sites-enabled/you.host.conf
sudo service nginx restart
```
