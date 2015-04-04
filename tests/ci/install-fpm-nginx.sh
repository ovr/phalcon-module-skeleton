#!/usr/bin/env bash

apt-get install nginx
apt-get install php5-fpm
cp phalcon-module.local.conf /etc/nginx/sites-enabled/phalcon-module.local.conf
/etc/init.d/nginx restart