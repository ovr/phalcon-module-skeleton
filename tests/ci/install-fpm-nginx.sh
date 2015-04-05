#!/usr/bin/env bash

sudo apt-get install -y nginx php5-fpm
sudo cp phalcon-module.local.conf /etc/nginx/sites-enabled/phalcon-module.local.conf
sudo /etc/init.d/nginx restart
