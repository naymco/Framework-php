<?php

return \FastRoute\simpleDispatcher(
    function (\FastRoute\RouteCollector $route) {
        //Podemos añadir cualquier nueva ruta a la variable $route:
        // Método Http, URL, array (nombre controlador, nombre del método)
        $route->addRoute('GET', '/', ['Application\Controllers\HomeController', 'index']);
        $route->addRoute(['GET', 'POST'], '/contacto', ['Application\Controllers\ContactController', 'contact']);
        $route->addRoute(['GET', 'POST'], '/contacto2', ['Application\Controllers\ContactController', 'contact2']);
        $route->addRoute('GET', '/hola/{nombre}', ['Application\Controllers\HomeController', 'hola']);
        $route->addRoute('GET', '/usuarios', ['Application\Controllers\UserController', 'usuarios']);
    }
);