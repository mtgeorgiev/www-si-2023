<?php

spl_autoload_register(function($className) {
    require_once "../libs/${className}.php";
});

set_exception_handler(function ($exception) {

    if ($exception instanceof BadRequestException) {
        echo "Bad request: " . $exception->getMessage();
    } else {
        echo "Unexpected error occured" . $exception->getMessage();
    }

    $responseCode = $exception->getCode() ?: 500;

    http_response_code($responseCode);
});