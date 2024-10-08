<?php

/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
   'db' => [
        'driver'   => 'Pdo_Mysql',
        'dsn'      => 'mysql:dbname=my_laminas;host=127.0.0.1',
        'username' => 'alexandr',
        'password' => '12345',
        'driver_options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ],
    ],
];


// return [
//     'db' => [
//         'driver' => 'Pdo',
//         'dsn'    => sprintf('sqlite:%s/data/laminastutorial.db', realpath(getcwd())),
//     ],
// ];