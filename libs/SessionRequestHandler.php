<?php


class SessionRequestHandler {

    public static function checkLoginStatus(): array {

        return [
            'logged' => isset($_SESSION['user_id'])
        ];

    }

    public static function login(array $credentials) {

        // check if user and password are correct
        // password_verify

        $_SESSION['user_id'] = 1;

        return [];
    }

    public static function logout() {
        session_destroy();
    }
}
