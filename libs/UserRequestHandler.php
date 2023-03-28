<?php

class UserRequestHandler {

    public static function getSingleUser(string $userId): User {

        if ($userId == '4') {
            throw new BadRequestException('This user cannot be accessed');
        }


        return new User($userId, "myemail@abv.bg", "1234", "12/11/2023", "F");
    }

    public static function getUserList(): array {
        return [
            new User("1", "myemail@abv.bg", "1234", "12/11/1980", "M"),
            new User("2", "otheremail@gmail.bg", "1234", "05/03/2000", "F"),
        ];
    }

    public static function create(array $userData): User {
        return new User("3", $userData['email'], $userData['password'], $userData['birthday'], $userData['gender']);
    }
}
