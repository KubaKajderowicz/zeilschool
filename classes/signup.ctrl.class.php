<?php

class SignupController extends Signup
{

    private $name;
    private $surname;
    private $email;
    private $password;
    private $passwordconfirm;

    public function __construct($name, $surname, $email, $password, $passwordconfirm)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->passwordconfirm = $passwordconfirm;
    }

    public function signupUser() {
        if ($this->emptyInput() == false) {
            header("location: ../register.php?error=emptyinput");
            exit();
        }
        if ($this->invalidEmail() == false) {
            header("location: ../register.php?error=invalidemail");
            exit();
        }
        if ($this->passwordMatch() == false) {
            header("location: ../register.php?error=passwordmissmatch");
            exit();
        }
        if ($this->userExists() == false) {
            header("location: ../register.php?error=emailtaken");
            exit();
        }

        $this->createUser($this->name, $this->surname, $this->email, $this->password);
    }

    // Check for empty inputs
    private function emptyInput()
    {
        if (empty($this->name) || empty($this->surname) || empty($this->email) || empty($this->password) || empty($this->passwordconfirm)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Check for invalid email
    private function invalidEmail()
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // check if inputted passwords match
    private function passwordMatch()
    {
        if ($this->password !== $this->passwordconfirm) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function userExists()
    {
        if (!$this->checkUser($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
