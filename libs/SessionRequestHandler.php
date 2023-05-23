<?php


class SessionRequestHandler {

    public static function checkLoginStatus(): array {

        $isLogged = isset($_SESSION['user_id']);

        return [
            'logged' => $isLogged,
            'userData' => $isLogged ? [
                'id' => $_SESSION['user_id'],
                'email' => $_SESSION['email'],
            ] : null
        ];

    }

    public static function login(array $credentials) {

        $connection = (new Db())->getConnection();
        
        $selectStatement = $connection->prepare("SELECT * FROM `users` WHERE `email` = ?");
        $selectStatement->execute([$credentials['email']]);
        $user = $selectStatement->fetch();

        if ($user && password_verify($credentials['password'], $user['password'])) {
            
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

        } else {
            throw new Exception('Login failed');
        }

        return [];
    }

    public static function logout() {
        session_destroy();
    }
}
