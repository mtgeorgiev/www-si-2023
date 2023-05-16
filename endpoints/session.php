<?php

require "../helpers/bootstrap.php";

$response = null;

// check login status
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = SessionRequestHandler::checkLoginStatus();
}

// login
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = SessionRequestHandler::login($_POST);
}

// logout
elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    SessionRequestHandler::logout();
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
