<?php

class Contact extends Dbh
{

    protected function createContact($name, $email, $subject, $message){
        $stmt = $this->connect()->prepare('INSERT INTO contact (name, email, subject, message, status) VALUES (?,?,?,?,?);');


        if(!$stmt->execute(array($name, $email, $subject, $message, 'OPEN'))) {
            $stmt = null;
            header("location: ../../contact.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }
    
}