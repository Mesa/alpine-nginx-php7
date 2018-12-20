# Nginx and PHP7
An alpine linux based docker container with nginx and php7 (fpm) inside.
Also composer is already included.


## Getting started
Create your the docker-compose.yml in you project and paste these lines, or copy the content of [docker-compose.demo.yml](https://raw.githubusercontent.com/Mesa/alpine-nginx-php7/master/docker-compose.demo.yml) :
```
web:
    image: mesa/alpine-nginx-php7:1.3.0
    ports:
      - "80:80"
    volumes:
        - "./var/www:/var/www"
```

then run 

    docker-compose up
    
and you are ready to go, just visit [http://localhost](http://localhost) and you will see the output of phpinfo().


### PHP Version:

```
<?php include __DIR__ . '/php.txt'; ?>
```

### NginX Version:
```
<?php include __DIR__ . '/nginx.txt'; ?>
```


### PHP Extensions

This image comes with this preinstalled php extensions:

<?php
    $lines = file(__DIR__ . '/php-packages.txt', FILE_IGNORE_NEW_LINES);
    $lines = array_filter($lines);

    foreach ($lines as $value) {

        $value = str_replace(['[',']'], ['### ', ''] ,$value);

        if (0 !== strpos($value, '#')) {
            echo '* ' ;
        }

        echo $value . "\n";

    }
?>

### Composer 

```
<?php include __DIR__ . '/composer.txt'; ?>
```

## Extending

If you need more packages just extend this container and install all the packages you require.

Your Dockerfile could look like this. 

```Dockerfile

```


You can find the packages for alpine at [pkgs.alpinelinux.org](https://pkgs.alpinelinux.org/packages?name=php7*&branch=&repo=&arch=&maintainer=).

##### License #####
The MIT License (MIT)