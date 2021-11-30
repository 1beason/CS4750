<html>
  <?php 
    require('dbutil.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Update Player</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Julianne Walker">
    <meta name="description" content="Update Player">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        session_start();
        $newName = $_POST['name'];
        $age = $_POST['age'];
        $number = $_POST['number'];
        $name = $_SESSION['name'];

        $query = "UPDATE Players SET name=:newName, age=:age, number=:number
                WHERE name=:name";

        $statement = $db->prepare($query);
        $statement->bindValue(':newName', $newName);
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

    <?php echo "Update "; echo $name;?>
    <!--
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Which player would you like to update?</label>
                <input type="text" class="form-control" id="nameToUpdate" name="nameToUpdate" placeholder="Enter player name" required>
            </div>
        </div>
    </div>
    -->
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">New Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter new name" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">New Age</label>
                <input type="text" class="form-control" id="age" name="age" placeholder="Enter new age" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">New Number</label>
                <input type="text" class="form-control" id="number" name="number" placeholder="Enter new number" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>             
</div>