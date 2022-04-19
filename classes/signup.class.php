<?php 

class Signup extends Dbh {

    protected function checkUser($email){
        $stmt = $this->connect()->prepare('SELECT email FROM users WHERE email = ?;');

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../../register.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    protected function createUser($name, $surname, $email, $password){
        $stmt = $this->connect()->prepare('INSERT INTO users (name, surname, email, password) VALUES (?,?,?,?);');

        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $surname, $email, $hashedPass))) {
            $stmt = null;
            header("location: ../../register.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


}