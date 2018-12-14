# Nginx and PHP7
An alpine linux based docker container with nginx and php7 (fpm) inside.
Also composer is already included.


## Getting started
Create your the docker-compose.yml in you project and paste these lines, or copy the content of [docker-compose.demo.yml](https://raw.githubusercontent.com/Mesa/alpine-nginx-php7/master/docker-compose.demo.yml) :
```
web:
    image: mesa/alpine-nginx-php7:1.0.1
    ports:
      - "80:80"
    volumes:
        - "./var/www:/var/www"
```

then run 

    docker-compose up
    
and you are ready to go, just visit [http://localhost](http://localhost) and you will see the output of phpinfo().


### PHP Version:

```bash
PHP 7.2.13 (cli) (built: Dec  7 2018 16:12:01) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.2.0, Copyright (c) 1998-2018 Zend Technologies
    with Zend OPcache v7.2.13, Copyright (c) 1999-2018, by Zend Technologies

```

### NginX Version:
```bash
nginx version: nginx/1.14.2
```


### PHP Extensions

This image comes with this preinstalled php extensions:

* bcmath
* Core
* ctype
* curl
* date
* dom
* filter
* gd
* hash
* iconv
* intl
* json
* libxml
* mbstring
* mcrypt
* mysqlnd
* openssl
* pcre
* PDO
* pdo_mysql
* pdo_sqlite
* Phar
* posix
* readline
* Reflection
* session
* SimpleXML
* soap
* SPL
* standard
* tokenizer
* xml
* xmlreader
* xsl
* Zend OPcache
* zip
* zlib
* Zend OPcache

### Composer 

```
Composer version 1.8.0 2018-12-03 10:31:16
```

## Extending

If you need more packages just extend this container and install all the packages you require.

Your Dockerfile could look like this. 

```Dockerfile
    FROM mesa/alpine-nginx-php7
    
    RUN apk add --no-cache \
        php7-bcmath \
        bash \
        curl \
        unzip
        
    COPY ./var /var
```


You can find the packages for alpine at [pkgs.alpinelinux.org](https://pkgs.alpinelinux.org/packages?name=php7*&branch=&repo=&arch=&maintainer=).

##### License #####
The MIT License (MIT)