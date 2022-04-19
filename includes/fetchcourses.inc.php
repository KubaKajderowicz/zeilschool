<?php

class FetchCourses extends Dbh
{

    public function getCourses()
    {

        $stmt = $this->connect()->query('SELECT * FROM cursussen;');


        while($row = $stmt->fetch()) {
            echo '<tr>
            <th scope="row">'.$row["id"].'</th>
            <td>'.$row["name"].'</td>
            <td>'.$row["date"].'</td>
            <td><form action="includes/assigncourse.inc.php" method="POST"><button type="submit" name="submit" value="'.$row["id"].'" class="btn btn-success">🗸</button></form></td>
          </tr>';
        }
    }
}
