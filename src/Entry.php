<?php

$input = file_get_contents('php://stdin');
spl_autoload_register(function ($class) {
    if (is_file($file = __DIR__ . '/' . substr(strtr($class, '\\', '/'), 10) . '.php')) {
        require $file;
    }
});
$configs = unserialize($input);

$server = new Laravoole\Server($configs['wrapper'], $configs['wrapper_file']);
$server->start(
    $configs['host'],
    $configs['port'],
    $configs['pid_file'],
    $configs['root_dir'],
    $configs['handler_config'],
    $configs['wrapper_config']
);
