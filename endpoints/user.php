<?php

require "../helpers/bootstrap.php";

$response = null;

// get single user info (select * from users where id = ?)
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $response = UserRequestHandler::getSingleUser($_GET['id']);
}

// get info for list of users (select * from users)
elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $response = UserRequestHandler::getUserEmailsList();
}

// create user (insert into users values)
elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = UserRequestHandler::create($_POST);
}

// update/edit/modify user (update users set ? where id = ?)
elseif ($_SERVER['REQUEST_METHOD'] == 'PUT' && isset($_GET['id'])) {
    // use the request body
}

// delete a single user (delete from users where id = ?)
elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id'])) {

}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
