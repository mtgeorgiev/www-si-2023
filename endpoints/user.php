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

$response = '';

// get single user info (select * from users where id = ?)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $response = UserRequestHandler::getSingleUser($_GET['id'])->toString();
}

// get info for list of users (select * from users)
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    foreach (UserRequestHandler::getUserList() as $user) {
        $response .= '; ' . $user->toString();
    }
}

// create user (insert into users values)
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = UserRequestHandler::create($_POST)->toString();
}

// update/edit/modify user (update users set ? where id = ?)
elseif ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['id'])) {
    // use the request body
}

// delete a single user (delete from users where id = ?)
elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id'])) {

}

echo $response;
