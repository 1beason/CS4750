<?php 
require('dbutil.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $query = "SELECT * FROM ".$type." WHERE name LIKE :name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $player_info = $statement->fetchAll();
    $statement->closeCursor();
    $fp = fopen('php://output', 'w');
    header("Content-type: text/csv");
    header("Content-Disposition: attachment; filename=report.csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    foreach($player_info as $p) {
        fputcsv($fp, array_combine($p, $p));
    }
    fclose($fp);

}

?>