Phalcon Module Skeleton
========
[![Build Status](https://travis-ci.org/ovr/phalcon-module-skeleton.png?branch=master)](https://travis-ci.org/ovr/phalcon-module-skeleton)
[![License](https://poser.pugx.org/ovr/phalcon-module-skeleton/license.svg)](https://packagist.org/packages/ovr/phalcon-module-skeleton/)

This is a skeleton application written on [phalcon framework](https://github.com/phalcon/cphalcon) with performance boost.
This project can be used to develop projects with phalcon framework by easy way.
 
For current time project in under development, have fun :)

Features
--------

* Easy application bootstrapping
* Console task support (by symfony/console)
* Bootstrap themes
* Full develop stuck composer/npm/bower/gulp
* Modules structure
* Pre-installed modules
 * Admin
    * Dashboard
    * GRUD for Users and Products
    * Settings
 * Catalog
    * Index page
    * Category page
    * Product page
        * Comments
        * Buy
 * Cart
    * Index cart page
    * Models/Service
 * Oauth
 * User
    * View user page
    * Models/Service
* Bootstrap file

How to install
--------------

First you need to clone the project, update vendors:

```
git clone https://github.com/ovr/phalcon-module-skeleton.git ./project
cd project
composer update
```

Install vhost for your virtual server:

```
cp ./docs/example-configs/nginx.phalcony.local.conf /etc/nginx/sites-enabled/you.host.conf
```

Don`t forget to edit nginx config and restart nginx:

```
nano /etc/nginx/sites-enabled/you.host.conf
sudo service nginx restart
```

Requirements
------------

* PHP 5.3 and up
* Phalcon **1.3.2** (maybe it works on phalcon 2.0.0)
* Phalcony (latest)
* PhalconEye/Framework (latest)

Online Demo
-----------

You can see online demo on [phalcon-module.dmtry.me](http://phalcon-module.dmtry.me/).

License
-------
This project is open-sourced software licensed under the MIT License. See the LICENSE file for more information.