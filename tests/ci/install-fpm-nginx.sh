#!/usr/bin/env bash

sudo apt-get update -y
sudo apt-get install -y nginx php5-fpm
sudo cp $TRAVIS_BUILD_DIR/tests/ci/phalcon-module.local.conf /etc/nginx/sites-enabled/phalcon-module.local.conf
sudo service nginx restart
