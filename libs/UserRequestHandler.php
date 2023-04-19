<?php

class UserRequestHandler {

    public static function getSingleUser(string $userId): User {

        if ($userId == '4') {
            throw new BadRequestException('This user cannot be accessed');
        }


        return new User($userId, "моят_имейл@abv.bg", "1234", "12/11/2023", "F");
    }

    public static function getUserList(): array {
        return [
            new User("1", "моят_имейл@abv.bg", "1234", "1980-11-12", "M"),
            new User("2", "otheremail@gmail.bg", "1234", "2000-03-05", "F"),
        ];
    }

    public static function create(array $userData): User {
        return new User("3", $userData['email'], $userData['password'], $userData['birthday'], $userData['gender']);
    }
}
