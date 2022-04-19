<?php

class AssignCourseController extends AssignCourse
{

    private $courseid;
    private $userid;

    public function __construct($courseid, $userid)
    {

        $this->courseid = $courseid;
        $this->userid = $userid;
        
    }

    public function submitAssign(){
        $this->addToCourse($this->courseid, $this->userid);
    }
}
