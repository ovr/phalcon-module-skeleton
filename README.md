Phalcon Module Skeleton
========

[![Author](http://img.shields.io/badge/author-@ovr-blue.svg?style=flat-square)](https://twitter.com/ovrweb)
[![Build Status](https://img.shields.io/travis/ovr/phalcon-module-skeleton/master.svg?style=flat-square)](https://travis-ci.org/ovr/phalcon-module-skeleton)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This is a skeleton application written on [phalcon framework](https://github.com/phalcon/cphalcon) with performance boost.
This project created to develop applications in an easy way.
 
For current time project is under development, have fun :)

Features
--------

* Easy application bootstrapping
* Console task support (provided by symfony/console)
* Bootstrap theme
* Full frontend developer stack composer/npm/bower/gulp
* Modules structure
* Error handling (not found router, dispatcher exceptions)
* Shared layouts
* Pre-installed modules
 * Api ([Source code](./application/modules/api))
    * Index
    * Users
        * [List](http://phalcon-module.dmtry.me/api/users/) :: [Source code](./application/modules/api/controllers/UsersController.php)
        * [Get](http://phalcon-module.dmtry.me/api/users/get/2/) :: [Source code](./application/modules/api/controllers/UsersController.php)
 * Admin
    * Dashboard
    * GRUD for Users and Products (future)
    * Settings (future)
 * Catalog
    * Index page
    * Category page (future)
    * Product page (future)
        * Comments
        * Buy
 * Cart (future)
    * Index cart page
    * Models/Service
 * OAuth
 * User
    * View [[@ovr](http://phalcon-module.dmtry.me/user/1/), [@xboston](http://phalcon-module.dmtry.me/user/2/)]
    * Models/Service

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
cp ./docs/example-configs/nginx.phalcony.local.conf /etc/nginx/sites-enabled/you.host.conf
```

Don`t forget to edit nginx config and restart nginx:

```bash
nano /etc/nginx/sites-enabled/you.host.conf
sudo service nginx restart
```

Requirements
------------

* PHP 5.4 and up
* Phalcon **2.0.0**
* Phalcony (latest)
* PhalconEye/Framework (latest)

Online Demo
-----------

You can see online demo on [http://phalcon-module.dmtry.me/](http://phalcon-module.dmtry.me/).

License
-------

This project is open-sourced software licensed under the MIT License. See the LICENSE file for more information.
