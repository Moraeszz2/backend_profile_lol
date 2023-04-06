<?php

use Phalcon\Mvc\Application;

try {
    // Autoloading
    $loader = new \Phalcon\Loader();

    $loader->registerDirs(
        [
            __DIR__ . '/../app/controllers/',
            __DIR__ . '/../app/models/',
        ]
    );

    $loader->register();

    // Inicializa a aplicação
    $application = new Application();

    // Define os serviços
    require __DIR__ . '/../app/config/services.php';

    // Obtém o roteador do serviço de rotas
    $router = $application->getRouter();

    // Define as rotas
    require __DIR__ . '/../app/config/routes.php';

    // Executa a aplicação
    echo $application->handle()->getContent();
} catch (\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}
