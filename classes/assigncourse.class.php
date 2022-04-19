<?php

class AssignCourse extends Dbh
{

    protected function addToCourse($courseid, $userid){
        $stmt = $this->connect()->prepare('INSERT INTO assignedcourses (courseID, userID) VALUES (?,?);');


        if(!$stmt->execute(array($courseid, $userid))) {
            $stmt = null;
            header("location: ../../cursussen.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() > 0){
            $result = false;
        } else {
            $result = true;
        }
        return $result;

        $stmt = null;
    }
    
}