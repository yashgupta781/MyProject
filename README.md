# My Docker Project
Project 1- 
My project is based on launching multiple containers because in docker sometimes it become very tideous for the developer to launch multiple and configure them seprately. My project can solve those issue i have launch mulitple containers in single go and launch them. I just use one db and server container that can be configured easily with any framework like php, joomla, drupal etc. 

Project 2-
  #SETUP PHP with MySql
By running single command  you will set up php connection with mysql and you can setup as many connections you required



#Pre Requisite
1. Redhat linux
2. Docker installed
3. Image of php
        7.3.3-apache
4. Image of Mysql
        latest
       
#Summary
  By using this you can setup php with mysql database and you can develop your website. If we do it in seprate manner e.g if we set up php and then set up mysql and then we run it take time to setup once. But if we need to setup 100 or any number then it become a headache for 
developer. By using this docker we can integrate multiple containers into single one. Just like i did integrate php with mysql.



#Instructions
  1.  first run till the mention code in (docker-compose.yml) and check whether php environment is setup successfully or not. Then go to same folder and do (ls) php folder is created there and then create one index.php  
    (docker-compose.yml)
    version: '3'
        services:
               web:
                  image: php:7.3.3-apache
                  container_name: phpweb
                  depends_on:
                          - db
                  volumes:
                        - ./php:/var/www/html/
                  ports:
                         - 8000:80
 (INDEX.php)
 <?php
   echo 'Hello World'
   ?>
   
    and run in your browser  ==>localhost:8000
   2. 
   Create a dockerfile and add this code to configure mysql and php
      (Dockerfile)
      FROM php:7.3.3-apache
      #Install git
      RUN apt-get update && apt-get install -y 
      RUN docker-php-ext-install mysqli
      EXPOSE 80
      
      and write code regarding mysql setup in (docker-compose.yml)
         version: '3'
services:
       web:
          build:
             context: ./php
             dockerfile: Dockerfile
          image: php:7.4-apache
          container_name: phpweb
          depends_on:
                  - db
          volumes:
                - ./php:/var/www/html/
          ports:
                 - 8000:80
       db:
              container_name: mysql8
              image: mysql:8.0 
              volumes:
                  - mysql_storage1:/var/lib/mysql
 
              command: --default-authentication-plugin=mysql_native_password
              restart: always
              environment:
                MYSQL_ROOT_PASSWORD: ram
                MYSQL_USER : ram
                MYSQL_PASSWORD: ram
                MYSQL_DATABASE: mydb
              ports:
                      - 6033:3306 
volumes:
        php:
        mysql_storage1:

(index.php)
Code to check whether connection successfully built or not
<?php
  $host='db';
  $user= 'ram';
  $password= 'ram';
  $db= 'mydb';

  $conn=new mysqli($host, $user,$password, $db);
  if($conn ->connect_error){
	echo 'connection failed'.$conn->connect_error;
	}
  echo 'successufully connected to mysqli';
?>



3. Run command
            docker-compose built
            docker-compose run
