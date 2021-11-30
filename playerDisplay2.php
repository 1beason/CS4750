<html>
  <?php 
    require('dbutil.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Find Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Julianne Walker">
    <meta name="description" content="Add Player">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $_SESSION['name'] = $_POST['name'];
    $name = $_SESSION['name'];
    $query = "SELECT * FROM Players WHERE name=:name";
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $player_info = $statement->fetchAll();
    $statement->closeCursor();

}
?>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Age</th> 
            <th>Number</th>
        </tr>
        <?php foreach ($player_info as $p): ?>
        <tr>
            <td><?php echo $p['name']; ?></td>
            <td><?php echo $p['age']; ?></td> 
            <td><?php echo $p['number']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>