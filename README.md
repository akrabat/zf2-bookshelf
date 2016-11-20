# ZF-Booklist

This is a simple Zend Framework application that uses a table gateway to manage
a list of books.


## Installation

    git clone git://github.com/akrabat/zf-booklist.git
    cd zf-booklist
    composer install

Next, copy `data/booklist.sqlite.dist` to `data/booklist.sqlite`


## Running using PHP's built-in web server:


```bash
$ cd zf-booklist
$ php -S 0.0.0.0:8080 -t public/ public/index.php
```

This will start the cli-server on port 8080, and bind it to all network
interfaces. You can then visit the site at http://localhost:8080/
- which will bring up Zend Framework welcome page.

Alternatively, there are Vagrant and Docker configurations provided.

## Development mode

This application ships with [zf-development-mode](https://github.com/zfcampus/zf-development-mode)
and provides three aliases for consuming the script it ships with:

```bash
$ composer development-enable  # enable development mode
$ composer development-disable # disable development mode
$ composer development-status  # whether or not development mode is enabled
```

This allows for development-only modules and bootstrap-level configuration in
`config/development.config.php.dist`, and development-only application
configuration in `config/autoload/development.local.php.dist`. Enabling
development mode will copy these files to versions removing the `.dist` suffix,
while disabling development mode will remove those copies.
