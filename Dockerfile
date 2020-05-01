FROM php:7.3.3-apache
#Install git
RUN apt-get update && apt-get install -y 
RUN docker-php-ext-install mysqli
EXPOSE 80
