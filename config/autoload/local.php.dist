<?php
/**
 * Local Configuration Override
 *
 * This configuration override file is for overriding environment-specific and
 * security-sensitive configuration information. Copy this file without the
 * .dist extension at the end and populate values as needed.
 *
 * @NOTE: This file is ignored from Git by default with the .gitignore.
 * This is a good practice, as it prevents sensitive credentials from 
 * accidentally being committed into version control.
 */

return array(
    'db' => array(
        'driver'   => 'Pdo',
        'dsn'      => 'sqlite:' . getcwd() . '/data/booklist.sqlite',

        // or: MYSQL:
        // 'driver'         => 'Pdo',
        // 'dsn'            => 'mysql:dbname=booklist;hostname=lbooklistocalhost',
        // 'username'       => 'rob',
        // 'password'       => '123456',
        // 'driver_options' => array(
        //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        // ),
    ),
);
