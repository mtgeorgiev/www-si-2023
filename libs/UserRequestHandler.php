<?php

class UserRequestHandler {

    public static function getSingleUser(string $userId): User {
        
        $connection = (new Db())->getConnection();

        $selectStatement = $connection->prepare("SELECT * FROM `users` WHERE id = ?");
        $selectStatement->execute([$userId]);

        $user = $selectStatement->fetch();

        if ($user) {
            return User::fromArray($user);
        }

        throw new BadRequestException('This user cannot be accessed');
    }

    public static function getUserList(): array {

        $connection = (new Db())->getConnection();

        $selectStatement = $connection->prepare("SELECT * FROM `users`");
        $selectStatement->execute();

        $users = [];
        foreach ($selectStatement->fetchAll() as $user) {
            $users[] = User::fromArray($user);
        }

        return $users;
    }

    public static function getUserEmailsList(): array {

        if (isset($_SESSION['user_id'])) {
            
            $connection = (new Db())->getConnection();

            $selectStatement = $connection->prepare("SELECT id, email FROM `users` ORDER BY `email` ASC");
            $selectStatement->execute();

            $simpleUserData = [];
            foreach ($selectStatement->fetchAll() as $user) {
                $simpleUserData[] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                ];
            }
        } else {
            $simpleUserData = [];
            // or throw exception
        }

        return $simpleUserData;
    }

    public static function create(array $userData): User {

        $filteredData = [
            'email' => $userData['email'],
            'password' => password_hash($userData['password'], PASSWORD_DEFAULT),
            'birthdate' => null,
            'gender' => $userData['gender'],
        ];

        $connection = (new Db())->getConnection();
        
        $insertStatement = $connection->prepare("
            INSERT INTO `users` (email, password, birthdate, gender)
            VALUES (:email, :password, :birthdate, :gender)
        ");

        if (!$insertStatement->execute($filteredData)) {
            var_dump($insertStatement->errorInfo());
            throw new InternalServiceException("Failed to insert user in the db");
        }

        $userId = $connection->lastInsertId();

        return new User($userId, $filteredData['email'], null, $filteredData['birthdate'], $filteredData['gender']);
    }
}
