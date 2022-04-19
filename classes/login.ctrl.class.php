<?php

class LoginController extends Login
{

    private $email;
    private $password;

    public function __construct($email, $password)
    {

        $this->email = $email;
        $this->password = $password;
    }

    public function loginMedewerker() {
        if($this->emptyInput() == false) {
            // Notify that input is empty
            header("Location: ../login.php?error=emptyinput");
            exit();
        }

        $this->getMedewerker($this->email, $this->password);
    }

    public function loginUser() {
        if($this->emptyInput() == false) {
            // Notify that input is empty
            header("Location: ../login.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->email, $this->password);
    }

    // Check for empty inputs
    private function emptyInput()
    {
        if (empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
