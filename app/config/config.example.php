<?php

use Phalcon\Config;

return new Config(
    [
        'database'      => [
            'adapter'   => 'Mysql',
            'host'      => 'localhost',
            'port'      => 3306,
            'dbname'    => '',
            'username'  => 'root',
            'password'  => '',
        ],
        'application'   => [
            'appDir'        => '/',
            'controllerDir' => '/controllers/',
            'modelsDir'     => '/models/',
            'pluginsDir'    => '/plugins/',
            'librariesDir'  => '/libraries/',
        ],
        'lol'           => [
            'debugMode'     => true,
		    'development'   => true,
		    'url'           => "http://localhost/lol/",
        ]
    ]
);
