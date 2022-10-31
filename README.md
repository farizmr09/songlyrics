
## TOC
- [TOC](#toc)
- [Lirik Lagu Project](#lirik-lagu-project)
- [Architecture](#architecture)
- [Installation (part 1)](#installation-part-1)
- [Installation (part 2)](#installation-part-2)
  - [Install MySQL to Computer](#install-mysql-to-computer)
  - [Install MySQL using Docker](#install-mysql-using-docker)
- [Installation (part 3)](#installation-part-3)
- [MVC](#mvc)
- [About Laravel](#about-laravel)
- [Learning Laravel](#learning-laravel)

## Lirik Lagu Project
This project aims to demonstrate simple API service using Laravel framework. What includes in this project:
1. Simple API service using Laravel
2. Usage of docker as part of development process
3. K8S deployment as part of k8s learning

video library.

## Architecture
1. Backend : 
   - Language PHP 8.x
   - Framework Laravel
   - Database MySQL 5.7
2. API: RESTful
3. Frontend: React

## Installation (part 1)
1. Install PHP 8.x
   - If you are using Ubuntu, you can follow [this link](https://computingforgeeks.com/how-to-install-php-on-ubuntu-2/) (one of many instructions that are availabel on the internet)
   - Make sure you have installed required PHP extension, eg:
      1. MySQL
      2. XML
      3. PDO
      4. Curl
   - You can check it like following instruction:
      - Create a php file, for instance name it **check.php**
      - Fill with code like below
        ```
            <?php
            phpinfo();
            ?> 
        ```     
      - Open command prompt or terminal and execute this:
        ```
        $ php check.php
        ```     
      - It will print bunch of php information that is installed in you computer, eg:
        ```
        phpinfo()
        PHP Version => 8.0.22

        System => Darwin GDP-LTP-1314.local 18.7.0 Darwin Kernel Version 18.7.0: Tue Jun 22 19:37:08 PDT 2021; root:xnu-4903.278.70~1/RELEASE_X86_64 x86_64
        Build Date => Aug  7 2022 03:07:44
        Build System => Darwin mojave.internal.macports.net 18.7.0 Darwin Kernel Version 18.7.0: Tue Jun 22 19:37:08 PDT 2021; root:xnu-4903.278.70~1/RELEASE_X86_64 x86_64
        Configure Command =>  './configure'  '--prefix=/opt/local' '--mandir=/opt/local/share/man' '--infodir=/opt/local/share/info' '--program-suffix=80' '--includedir=/opt/local/include/php80' '--libdir=/opt/local/lib/php80' '--with-config-file-path=/opt/local/etc/php80' '--with-config-file-scan-dir=/opt/local/var/db/php80' '--disable-all' '--enable-bcmath' '--enable-ctype' '--enable-dom' '--enable-filter' '--enable-json' '--enable-pdo' '--enable-session' '--enable-simplexml' '--enable-tokenizer' '--enable-xml' '--enable-xmlreader' '--enable-xmlwriter' '--with-bz2=/opt/local' '--with-mhash=/opt/local' '--with-zlib=/opt/local' '--disable-cgi' '--enable-cli' '--with-libxml' '--with-external-pcre=/opt/local' '--enable-fileinfo' '--enable-phar' '--disable-fpm' '--with-password-argon2=/opt/local' '--without-valgrind' '--with-libedit'
        Server API => Command Line Interface
        Virtual Directory Support => disabled
        Configuration File (php.ini) Path => /opt/local/etc/php80
        Loaded Configuration File => /opt/local/etc/php80/php.ini
        Scan this dir for additional .ini files => /opt/local/var/db/php80
        Additional .ini files parsed => /opt/local/var/db/php80/curl.ini,
        /opt/local/var/db/php80/intl.ini,
        /opt/local/var/db/php80/mbstring.ini,
        /opt/local/var/db/php80/mysql.ini,
        /opt/local/var/db/php80/openssl.ini
        ...
        ...
        ...
        ```
        You can use:  

        ```
        $  php check.php | grep mysql 
        ```
        to check whether MySQL extension is there
      
2. Install Composer  
   [Composer](https://getcomposer.org) is dependency manager for PHP (just like NPM in Node.JS). If you want to know more detail about it, [check this page](https://getcomposer.org/doc/00-intro.md#dependency-management). Now in order to run Laravel application, you need composer to download all dependency library for this project. Composer stores the information inside **composer.json** file that reside at the root of this application. When you first create Laravel application, it is automatically created, however we wont discuss it here, that's is another topic.

   To install Composer, you can [follow this link](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos)

3. Clone this repository
   ```
   $ git clone git@github.com:goberduck/liriklagu.git
   ```
   
4. Tried running default page of this repository  
   ```
   $ php artisan serve
   ```

   it should show something like this
   ```
   INFO  Server running on [http://127.0.0.1:8000].  

   Press Ctrl+C to stop the server
   ```
  Try to access that address in browser, it should show default Laravel welcome page



## Installation (part 2)
If you've alrady successfull executing part 1 above, let's move to part 2. In this part we will try to install the database and integrate with the Laravel application. Our application is using MySQL ver 5.7. There are at least 2 approach to do this.
1. Install MySQL to your computer, or
2. Install MySQL using docker

### Install MySQL to Computer
Depend on your system (Linux, Mac or Windows), you can follow one of these instruction from MySQL guide:
1. Linux (https://dev.mysql.com/doc/refman/5.7/en/linux-installation.html)
2. MacOS (https://dev.mysql.com/doc/refman/5.7/en/macos-installation.html)
3. Windows (https://dev.mysql.com/doc/refman/5.7/en/windows-installation.html)

Try to run MySQL console from terminal
```
$ mysql -p
```
after you fill up root password, you should see something below

```
Enter password: 
Welcome to the MySQL monitor.  Commands end with ; or \g.
Your MySQL connection id is 4
Server version: 5.7.37 MySQL Community Server (GPL)

Copyright (c) 2000, 2022, Oracle and/or its affiliates.

Oracle is a registered trademark of Oracle Corporation and/or its
affiliates. Other names may be trademarks of their respective
owners.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql> 
```
It means MySQL is working.

After that, please create Database called **liriklagu**
```
mysql> create database liriklagu;
mysql> show databases;
```

### Install MySQL using Docker  
By Using docker, installation is more complex, but the result, you will have cleaner and consistent setup. Docker is a set of platform as a service products that use OS-level virtualization to deliver software in packages called containers. A container is a standard unit of software that packages up code and all its dependencies so the application runs quickly and reliably from one computing environment to another (https://www.docker.com/resources/what-container/). There are tons of resources to learn about docker for free in Youtube. Two of them, for isntance:
- [Docker Tutorial for Beginners [FULL COURSE in 3 Hours]](https://www.youtube.com/watch?v=3c-iBn73dDE)
- [Belajar Docker untuk Pemula](https://www.youtube.com/watch?v=KrcHmVzmFN8&list=PL-CtdCApEFH-A7jBmdertzbeACuQWvQao)

In short and easy term, Docker is a another machine inside your computer with isolated installation.

Please follow this guideline to [install Docker in your computer](https://docs.docker.com/desktop/install/mac-install/)

After you've successfully installed Docker, you can check a file called **docker-compose.yml** in root folder of this application. The content of this file is:
```
version: "3"
services:
  # redis:
  #   image: redis
  #   ports:
  #     - 6379:6379
  #   volumes:
  #     - "/usr/local/var/myapp:/data"
  #   deploy:
  #     placement:
  #       constraints: [node.role == manager]
  #   command: redis-server --appendonly yes
  mysql:
    image: mysql:5.7
    environment:
        - MYSQL_ROOT_PASSWORD=admin
        - MYSQL_DATABASE=liriklagu
    volumes:
      - "/usr/local/var/liriklagu/mysql:/var/lib/mysql"
    ports:
      - 3306:3306
  adminer:
    image: adminer
    restart: always
    ports:
      - 9090:8080
```
Notes: Redis is still commented, we are not using it yet.
Let's dig it line by line
- There are 2 services declared here:
  - mysql (the database)
  - adminer (used to be called PHP My Admin), a web interface to access mysql database
  
- Mysql:
  - image: mysql:5.7
    - instruction to download  and use mysql:5.7 image from [docker hub link](https://hub.docker.com/layers/library/mysql/5.7/images/sha256-4ff8da589a6dd1ff2323a50b409575cb5ca7d5dd1169783a911476c757ed48f5?context=explore)
  - environment
    - set environment variable when running mysql image inside docker
    - MYSQL_ROOT_PASSWORD
      - set the root password
    - MYSQL_DATABASE
      - create database according to the name specified, in this case liriklagu
  - volumes
    - map local volume to docker volume inside the container (we'll check this later)
  - ports:
    - map request from source ports (host) to target ports (container). In this case port 3306 is mapped to port 3306
- Adminer
  - image: adminer
    - instruction to download and use image from 

Try running docker compose from command prompt in which **docker-compose.yml** reside
```
$docker-compose up -d
```
Run docker compose in daemon mode (-d)
After that, try to check the status 
```
docker-compose ps
```
You should see 2 process running (mysql and adminer)
here's example from my computer
```
       Name                      Command               State                 Ports              
------------------------------------------------------------------------------------------------
liriklagu_adminer_1   entrypoint.sh docker-php-e ...   Up      0.0.0.0:9090->8080/tcp           
liriklagu_mysql_1     docker-entrypoint.sh mysqld      Up      0.0.0.0:3306->3306/tcp, 33060/tcp
```

try to open adminer from browser by invoking this url: **http://localhost:9090**
you should see adminer page.

Try to connect to mysql container like this (Using the above example)
```
$docker exec -it  liriklagu_mysql_1 /bin/bash
```
It should take you to terminal of that container. Try to open mysql
```
root@042540262d74:/# mysql -p
```
The *042540262d74* is container id generated by docker. Must be different in your machine.


## Installation (part 3)
After part 1 and part 2 has been done successfully, let's continue to wire between application (Laravel) and the databas (MySQL).




## MVC 



## About Laravel

If you want to learn more about Laravel, please checkout this information and links.
Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootAudience creationcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive 
