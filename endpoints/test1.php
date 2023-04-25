<?php

require "../helpers/bootstrap.php";


$connection  = (new Db())->getConnection();

$insertStatement = $connection->prepare("
  INSERT INTO `users` (email, password, birthdate, gender)
  VALUES (:email, :password, :birthdate, :gender)
");

$insertResult = $insertStatement->execute(
    [
        'email' => "otheremail@gmail.bg",
        'password' => '0000',
        'birthdate' => '2000-03-05 09:47:59',
        'gender' => 'F'
    ]
);

$userId = $connection->lastInsertId();

// $user = new User($userId, "otheremail@gmail.bg", ....);


if (!$insertResult) {
    var_dump($insertStatement->errorInfo());
} else {
    echo $connection->lastInsertId();
}
