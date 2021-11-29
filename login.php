<?php
require("dbutil.php");

$found = 0;
$query = "Select * From users";
$q = $db->prepare($query);
if ($q) {

    if ($q) {
        $found = 5;
        $_SESSION["login"] = true;

        $q->execute();
        $all = $q->fetchAll();
        foreach($all[0] as $key => $value){
            echo "<h1>$value</h1><br>";
        }
    }


}
$q->closeCursor();
?>
