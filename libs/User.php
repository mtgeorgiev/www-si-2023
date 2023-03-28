<?php

class User {

    private $id;

    private $email;

    private $password;

    private $birthdate;

    private $gender;

    private $settings;

    public function __construct(string $id, string $email, string $password, string $birthdate, string $gender) {

        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->settings = new Settings();
    }


    public function getEmail(): string {
        return $this->email;
    }

    public function toString(): string {
        return "User with id {$this->id} and email {$this->email}";
    }

    /**
     * Generates a "random" password for a new user
     */
    public static function generateRandomPassword(): string {
        return "1234";
    }

}