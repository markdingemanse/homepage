## /bin/bash

install_mariadb=true;

yum update -y

if [ "$install_mariadb" = true ]; then
    yum install mariadb mariadb-server -y
    sudo service mariadb start
    mysql -e "SET PASSWORD FOR root@localhost = PASSWORD('secret');FLUSH PRIVILEGES;"
    mysql -uroot -psecret -e "CREATE USER 'homestead'@'localhost' IDENTIFIED BY 'secret';GRANT ALL PRIVILEGES ON *.* TO 'homestead'@'localhost';FLUSH PRIVILEGES;"
fi

yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm -y
yum install https://rpms.remirepo.net/enterprise/remi-release-7.rpm  -y
yum install yum-utils -y
yum-config-manager --disable 'remi-php*'
yum-config-manager --enable remi-php80
yum install php php-{cli,fpm,mysqlnd,zip,devel,gd,mbstring,curl,xml,pear,bcmath,json} -y

yum --enablerepo=remi,epel install httpd -y
yum --enablerepo=remi,epel install mysql -y
yum --enablerepo=remi,epel install php php-zip php-mysql php-mcrypt php-xml php-mbstring -y

service httpd restart

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/bin/composer
chmod +x /usr/bin/composer

cd /var/www
git clone https://github.com/markdingemanse/homepage.git
cd /var/www/homepage
git checkout master

COMPOSER_ALLOW_SUPERUSER=1 composer install

chown -R apache.apache /var/www/homepage
chmod -R 755 /var/www/homepage
chmod -R 755 /var/www/homepage/storage

chcon -R -t httpd_sys_rw_content_t /var/www/homepage/storage

cp .env.example .env
php artisan key:generate
php artisan migrate --no-interaction
touch /etc/httpd/conf.modules.d/dev.conf

echo "<VirtualHost *:80>
       ServerName homepage.example.com
       DocumentRoot /var/www/homepage/public

       <Directory /var/www/homepage>
              AllowOverride All
       </Directory>
</VirtualHost>" > /etc/httpd/conf.modules.d/dev.conf

service firewalld stop
service httpd restart
