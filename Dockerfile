FROM php:7-apache

RUN apt update
RUN apt install nano -y
RUN apt install wget -y
RUN apt install git -y
RUN apt install redis -y

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www/html

RUN git clone https://github.com/AdnaProject/adna .
RUN git pull
RUN composer require predis/predis