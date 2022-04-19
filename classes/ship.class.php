<?php 

class Ship extends Dbh {

    protected function createShip($name){
        $stmt = $this->connect()->prepare('INSERT INTO schepen (naam) VALUES (?);');


        if(!$stmt->execute(array($name))) {
            $stmt = null;
            header("location: ../../nieuwschip.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    protected function removeShip($id){
        $stmt = $this->connect()->prepare('DELETE FROM schepen WHERE id= ?;');


        if(!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../../schiplijst.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }


    protected function getShipByid($id){
        $stmt = $this->connect()->prepare('SELECT * FROM schepen WHERE id= ?;');


        if(!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: ../../schiplijst.php?error=stmtfailed");
            exit();
        } 

        $stmt = null;
    }

    protected function editShipbyID($id, $name){
        $stmt = $this->connect()->prepare('INSERT INTO schepen (naam) VALUES (?) WHERE id= '.$id.';');


        if(!$stmt->execute($name)) {
            $stmt = null;
            header("location: ../../ship.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    

}