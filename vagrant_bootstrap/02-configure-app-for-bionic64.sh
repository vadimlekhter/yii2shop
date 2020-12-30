#!/usr/bin/env bash
# Script to configure our application for the environment prepared by previous script.
# This is the bridge between machine-specific configuration and machine-independent configuration.

# Separately specified settings for database
# NOTE that the password was already specified before in previous bootstrap script!
DB_USER=root
DB_PASS=root
DB_NAME=yii2shop

# Creating database
# NOTE the absence of the space between `-p` flag and the password!
mysql -u ${DB_USER} -p${DB_PASS} -e "create database if not exists ${DB_NAME} default character set utf8 default collate utf8_unicode_ci";
mysql -u ${DB_USER} -p${DB_PASS} -e "create database if not exists ${DB_NAME}_test default character set utf8 default collate utf8_unicode_ci";

mysql -u ${DB_USER} -p${DB_PASS} -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root'";



# Copy the prepared Apache config from codebase to the Apache config folder.
sudo cp -f /yii2shop/vagrant_bootstrap/sites.conf /etc/apache2/sites-available/
#echo -e "127.0.0.1 yii2shop.frontend \n127.0.0.1 yii2shop.backend" >> /etc/hosts
sudo a2ensite sites.conf


echo -e " <Directory /yii2shop/frontend/web/>\n
              Require all granted\n
          </Directory>\n
          <Directory /yii2shop/backend/web/>\n
              Require all granted\n
          </Directory>\n" >> /etc/apache2/apache2.conf

# Restart Apache so new virtual host will be published.
#/etc/init.d/apache2 restart
sudo systemctl reload apache2