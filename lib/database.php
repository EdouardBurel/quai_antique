<?php

echo '<h1>Database</h1>';

try{
    require_once('pdo.php');
    $query = "SELECT * FROM hours";
}catch(Exception $e) {
    echo $e->getMessage();

}

foreach($pdo->query($query) as $row) {
    print_r($row);
    echo"<br>";
}

?>