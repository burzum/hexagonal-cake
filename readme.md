# Hexagonal Application Skeleton using CakePHP 3.6+

**This is a pure learning project and proof of concept! NOT ready for production!**

This application skeleton is trying to implement a hexagonal architecture using the goodies of the CakePHP framework.

If this is done right it should be easy to replace the whole ORM or view rendering with another implementation.

## Goals

* Trying to stay [PSR](https://www.php-fig.org/psr/) compatible with all interfaces
* Trying to follow [php-pds](https://github.com/php-pds/skeleton)
* Trying to use a DIC (League/Container)
* Trying to use more [IoC](https://en.wikipedia.org/wiki/Inversion_of_control)
* Trying to typehint almost everything
* Learning something about architecture

## Installation

* Clone the repository `git@github.com:burzum/hexagonal-cake.git`
* Run composer `composer install`
* Copy `config/app.default.php` to `confg/app.php`
* Point your web server config for the host you are using to the `public` folder
* Done

## License

Copyright Florian Krämer

Licensed under the [MIT](http://www.opensource.org/licenses/mit-license.php) License. Redistributions of the source code included in this repository must retain the copyright notice found in each file.
