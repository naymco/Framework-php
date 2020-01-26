<?php

if (!function_exists('base_path')) {
    function base_path(string $path): string
    {
        return __DIR__ . '/..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }


}

//función para hacer redirecciones:
if (!function_exists('redirect')) {
    function redirect(string $path)
    {
        header('Location: ' . $path);
    }
}

//función que devuelve la url base para acceder a archivos CSS y otros recursos:
if (!function_exists('base_url')) {
    function base_url(string $url = ''): string
    {
        $baseUrl = sprintf(
            "%s://%s:%s",
            isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
            $_SERVER['SERVER_NAME'],
            $_SERVER['SERVER_PORT']
        );
        if ($url) {
            return sprintf(
                '%s/%s',
                $baseUrl,
                $url
            );
        }
        return $baseUrl;
    }
}