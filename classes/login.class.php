<?php

class Login extends Dbh
{

    protected function getUser($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT password FROM users WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../../register.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../login.php?error=usernotfound");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password, $passHashed[0]["password"]);

        if ($checkPass == false) {
            $stmt = null;
            header("Location: ../login.php?error=wrongpass");
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?;');

            if (!$stmt->execute(array($email, $passHashed[0]["password"]))) {
                $stmt = null;
                header("Location: ../login.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //die($user[0]);

            session_start();
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['name'];
            $_SESSION['usersurname'] = $user[0]['surname'];
            $_SESSION['useremail'] = $user[0]['email'];

            $stmt = null;
        }

        $stmt = null;
    }

    protected function getMedewerker($email, $password)
    {
        $stmt = $this->connect()->prepare('SELECT password FROM medewerkers WHERE email = ?;');

        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../../login.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("Location: ../login.php?error=usernotfound");
            exit();
        }

        $passHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPass = password_verify($password, $passHashed[0]["password"]);

        if ($checkPass == false) {
            $stmt = null;
            header("Location: ../login.php?error=wrongpass");
            exit();
        } elseif ($checkPass == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM medewerkers WHERE email = ? AND password = ?;');

            if (!$stmt->execute(array($email, $passHashed[0]["password"]))) {
                $stmt = null;
                header("Location: ../login.php?error=stmtfailed");
                exit();
            }
            if ($stmt->rowCount() == 0) {
                $stmt = null;
                header("Location: ../login.php?error=usernotfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //die($user[0]);

            session_start();
            $_SESSION['userid'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['name'];
            $_SESSION['usersurname'] = $user[0]['surname'];
            $_SESSION['useremail'] = $user[0]['email'];
            $_SESSION['admin'] = $user[0]['admin'];
            $stmt = null;
        }

        $stmt = null;
    }
}
