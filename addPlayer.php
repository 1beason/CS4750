<html>
  <?php 
    require('dbutil.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Add Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Julianne Walker">
    <meta name="description" content="Add Player">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $number = $_POST['number'];

    $query = "INSERT INTO players (name, age, number) VALUES 
            (:name, :age, :number)";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':number', $number);

    $statement->execute();

    $statement->closeCursor();
}
?>
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="addForm" method="post">

    <h4>Add a player</h4>
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Player Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter player name" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Player Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Enter the age" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Player Number</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Enter the number" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>             
</div>