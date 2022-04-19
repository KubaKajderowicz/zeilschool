<?php

class FetchShipByID extends Dbh
{

    public function getShipByID($id)
    {

        $stmt = $this->connect()->query('SELECT * FROM schepen WHERE id = '.$id.';');


        while($row = $stmt->fetch()) {
            echo '<form action="includes/editship.inc.php" method="POST">
            <div class="mb-3">
             <label for="shipname" class="form-label">Naam:</label>
            <input type="text" id="shipname" class="form-control" name="edited" value="'.$row['naam'].'">
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value="'.$row['id'].'">Bevestig bewerking</button>
        </form>';
        }
    }
}
