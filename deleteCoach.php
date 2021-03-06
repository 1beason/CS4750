<html>
  <?php 
    require('dbutil.php');
    include('nav.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Delete Coach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Julianne Walker">
    <meta name="description" content="Delete Coach">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_SESSION['name'];
        $query = "DELETE FROM Coaches WHERE name=:name";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $player_info = $statement->fetchAll();
        $statement->closeCursor();
}
?>
</html>
<body>
    <h2 style="margin-top: 5vh; text-align: center;">
        <?php echo $name; echo " deleted"; ?>
    </h2>
    <div class="container" style="text-align: center;">
      <a class="btn btn-primary" href="coachDisplay.php">Back to Browse</a>
    </div>
</body>