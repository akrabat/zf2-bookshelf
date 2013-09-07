Booklist
========

This is a simple ZF2 application that uses a table gateway to manage a list of books.


Installation
------------

Using Composer (recommended)
----------------------------

Clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone git://github.com/akrabat/booklist.git
    cd booklist
    php composer.phar self-update
    php composer.phar install


Database
--------

Copy `data/booklist.sqlite.dist` to `data/booklist.sqlite`


Configuration
--------

Copy `config/autoload/local.php.dist` to `config/autoload/local.php`


Virtual Host
------------

Afterwards, set up a virtual host to point to the public/ directory of the
project and you should be ready to go!


