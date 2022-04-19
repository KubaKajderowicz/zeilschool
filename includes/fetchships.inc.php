<?php

class FetchShips extends Dbh
{

    public function getShips()
    {

        $stmt = $this->connect()->query('SELECT * FROM schepen;');


        while($row = $stmt->fetch()) {
            echo '<tr>
            <th scope="row">'.$row["id"].'</th>
            <td>'.$row["naam"].'</td>
            <td><form action="includes/2.inc.php" method="POST"><button type="submit" name="submit" value="'.$row["id"].'" class="btn btn-warning">🗸</button></form></td>
            <td><form action="includes/deleteship.inc.php" method="POST"><button type="submit" name="submit" value="'.$row["id"].'" class="btn btn-warning">🗸</button></form></td>
          </tr>';
        }
    }
}
