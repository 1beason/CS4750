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
    <meta name="author" content="Noah Tola">
    <meta name="description" content="Add Coach">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $tenure = $_POST['tenure'];
    $salary = $_POST['salary'];
    $team_city = $_POST['team_city'];


    $query = "INSERT INTO Coaches (name, tenure, salary, team_city) VALUES 
            (:name, :tenure, :salary, :team_city)";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':tenure', $tenure);
    $statement->bindValue(':salary', $salary);
    $statement->bindValue(':team_city', $team_city);

    $statement->execute();

    $statement->closeCursor();
}
?>
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="addForm" method="post">

    <h4>Add a Coach</h4>
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Coach Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter the coach name" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Tenure of Coach </label>
                <input type="text" class="form-control" id="tenure" name="tenure" placeholder="Enter the coach's tenure" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Salary of Coach</label>
                <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter the coach's salary" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">City of Coach</label>
                <input type="text" class="form-control" id="team_city" name="team_city" placeholder="Enter coach's city" required>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>             
</div>