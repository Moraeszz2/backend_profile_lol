<?php

use Phalcon\Config;

return new Config(
    [
        'database' => [
            'adapter'     => 'Mysql',
            'host'        => 'localhost',
            'username'    => 'seu_usuario',
            'password'    => 'sua_senha',
            'dbname'      => 'nome_do_banco',
            'charset'     => 'utf8',
        ],

        'application' => [
            'controllersDir' => __DIR__ . '/../controllers/',
            'modelsDir'      => __DIR__ . '/../models/',
            'viewsDir'       => __DIR__ . '/../views/',
            'baseUri'        => '/',
        ],
    ]
);
