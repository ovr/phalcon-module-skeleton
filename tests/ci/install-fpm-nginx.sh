#!/usr/bin/env bash

apt-get install nginx
apt-get install php5-fpm
cp .travis_nginx.conf /etc/nginx/nginx.conf
/etc/init.d/nginx restart