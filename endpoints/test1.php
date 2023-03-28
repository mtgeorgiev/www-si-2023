<?php

spl_autoload_register(function($className) {
    require_once "../libs/${className}.php";
});

set_exception_handler(function ($exception) {
    echo $exception->getMessage();
    http_response_code(500);
});


// $user = new User("myemail@abv.bg", "1234", "12/11/2023", "F");

var_dump($_SERVER);

var_dump($_REQUEST);


// echo $user->getEmail();

// echo User::generateRandomPassword();

// header('Content-type: application/json');

// throw new Exception("something bad happened");