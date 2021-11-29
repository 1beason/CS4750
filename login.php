<?php
require("dbutil.php");
$db = DbUtil::loginConnection();
session_start();

$found = 0;
$query = "select * from Players";
$q = $db->prepare($query);
if ($q) {
    $q->execute();
    $all = $q->get_result();
    $iter = $all->fetch_all();
    var_dump($iter);

    if ($q) {
        $found = 5;
        $_SESSION["login"] = true;
    }
}
echo $found;
$db->close();
?>
