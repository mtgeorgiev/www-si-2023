
<?php

class UserBuilder {

    private $id;

    private $email;

    private $password;

    private $birthdate;

    private $gender;

    public function withId(string $id): UserBuilder {
        $this->id = $id;
        return $this;
    }

    public function withEmail(string $email): UserBuilder {
        $this->email = $email;
        return $this;
    }

    public function build(): User {

        if (!$this->email) {
            throw new Exception("email is mandatory");
        }

        // ....
        // return new User($this->id, $this->email, ...);

        // $user = new UserBuilder()
        //     .withId($id)
        //     .withEmail($email)
        //     ...
        //     .build();
    }

}
