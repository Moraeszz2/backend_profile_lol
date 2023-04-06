<?php
 
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
 
$di = new FactoryDefault();
 
$di->set('db', function () {
    return new PdoMysql(
        [
            'host'     => 'localhost',
            'username' => 'nome_de_usuario',
            'password' => 'senha_do_usuario',
            'dbname'   => 'nome_do_banco_de_dados',
        ]
    );
});
