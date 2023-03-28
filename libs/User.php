<?php

class User {

    private $email;

    private $password;

    private $birthdate;

    private $gender;

    private $settings;

    public function __construct(string $email, string $password, string $birthdate, string $gender) {

        $this->email = $email;
        $this->password = $password;
        $this->settings = new Settings();
    }


    public function getEmail(): string {
        return $this->email;
    }

    /**
     * Generates a "random" password for a new user
     */
    public static function generateRandomPassword(): string {
        return "1234";
    }

}