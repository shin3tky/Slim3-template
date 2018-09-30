# Slim3-template
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A template for Slim3 PHP framework.

## Precondition

- [Slim](https://www.slimframework.com)
- [Idiorm](http://j4mie.github.io/idiormandparis/)
- [monolog](https://seldaek.github.io/monolog/)


## My goal

- I make a simpler and practical footing than a [skelton project](https://github.com/slimphp/Slim-Skeleton).


## First step

~~~
$ git clone https://github.com/shin3tky/Slim3-template.git
$ cd Slim3-template
$ composer install
$ ./start.sh
~~~

Execute on another screen.

~~~
$ curl 'http://localhost:8080/hello/version'
~~~

You get a JSON response.

~~~
{"version":"0.0.1"}
~~~


## Configuration

1. Modify `database` and `logger` sections in settings.php.
2. Set the environment variable name described in conf.d/nginx_vhost.conf and settings.php to the same value. (default value is `APP_ENV`.)


## Code formatting

- Using php-cs-fixer.
- You can change the setting in file `.php_cs.dist`.
