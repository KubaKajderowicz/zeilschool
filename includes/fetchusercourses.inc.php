<?php
session_start();
class FetchUserCourses extends Dbh
{

    public function getUserCourses()
    {

        $stmt = $this->connect()->query('SELECT A.id, B.name, B.date FROM assignedcourses A LEFT JOIN cursussen B ON A.courseID = B.id WHERE A.userID ='.$_SESSION['userid'].';');

        while ($row = $stmt->fetch()) {

            echo '<tr>
            <th scope="row">' . $row["id"] . '</th>
            <td>' . $row["name"] . '</td>
            <td>' . $row["date"] . '</td>
            <td><form action="includes/assign-course.inc.php" method="POST"><button type="submit" name="submit" value="' . $row["id"] . '" class="btn btn-success">🗸</button></form></td>
          </tr>';
        }
    }
}
