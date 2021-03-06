# Hexagonal Application Skeleton using CakePHP 3.6+

**This is a pure learning project and proof of concept! NOT ready for production!**

A hexagonal architecture is using ports and adapters to communicate and separate different layers of your application.

This application skeleton is trying to implement a hexagonal architecture using the goodies of the CakePHP framework.

## Goals

* **Learning something about software architecture**
* Stay [PSR](https://www.php-fig.org/psr/) compatible with all interfaces if possible
* Follow [php-pds](https://github.com/php-pds/skeleton)
* Using [DI](https://en.wikipedia.org/wiki/Dependency_injection) container
* Use [IoC](https://en.wikipedia.org/wiki/Inversion_of_control) where it makes sense
* [Typehint](http://php.net/manual/en/functions.arguments.php#functions.arguments.type-declaration) almost everything
* Using a [command bus](https://tactician.thephpleague.com/) (but no [CQRS](https://martinfowler.com/bliki/CQRS.html))

## Installation

* Clone the repository `git@github.com:burzum/hexagonal-cake.git`
* Go into the folder `cd hexagonal-cake`
* Run composer `composer install`
* Copy `config/app.default.php` to `config/app.php`
* Configure the database connection in your `app.php`
* Point your web server config for the host you are using to the `public` folder
* Done

## Documentation

Check the [docs](https://github.com/burzum/hexagonal-cake/tree/master/docs/Index.md) folder of this repository.

## Additional Libs besides CakePHP

* [League\Container](http://container.thephpleague.com/)
* [League\Tacitician](http://tactician.thephpleague.com/)

## Useful links

* Books
  * Martin Fowler: [Patterns of Enterprise Application Architecture](https://martinfowler.com/books/eaa.html)
* Links / Articles
* Videos
  * Matthias Noback: [Hexagonal Architecture - Message-Oriented Software Design](https://www.youtube.com/watch?v=K1EJBmwg9EQ&t=2161s)

## License

Copyright Florian Krämer

Licensed under the [MIT](http://www.opensource.org/licenses/mit-license.php) License. Redistributions of the source code included in this repository must retain the copyright notice found in each file.
