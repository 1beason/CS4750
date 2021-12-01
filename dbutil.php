<?php

$user = 'root';
$pass = 'b2GgMcH8DMcFcJBE';
$dsn = 'mysql:host=34.145.175.3;dbname=NFL_Stats';

try {
	$db = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
	$msg = $e->getMessage();
	echo "<p> Error while connecting to db: $msg</p>";
} catch (Exception $e) {
	$msg = $e->getMessage();
	echo "<p> Error: $msg";
}
?>