<html>
  <?php 
    require('dbutil.php');
    include('nav.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Add Assistant Coach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Noah Tola">
    <meta name="description" content="Add Assistant Coach">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $team = $POST['team'];
    $tenure = $_POST['tenure'];
    $salary = $_POST['salary'];
    $type = $_POST['type'];


    $query = "INSERT INTO Assistant_Coach (name, team, tenure, salary, type) VALUES 
            (:name, :team, :tenure, :salary, :type)";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':team', $team);
    $statement->bindValue(':tenure', $tenure);
    $statement->bindValue(':salary', $salary);
    $statement->bindValue(':type', $type);

    $statement->execute();

    $statement->closeCursor();
}
?>
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="addForm" method="post">

    <h4>Add a Assistant Coach</h4>
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Assistant Coach Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter the assistant coach name" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Assistant Coach Team</label>
                <input type="text" class="form-control" id="team" name="team" placeholder="Enter the assistant coach's team" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Tenure of Assistant Coach </label>
                <input type="text" class="form-control" id="tenure" name="tenure" placeholder="Enter the assistant coach's tenure" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Salary of Assistant Coach</label>
                <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter the assistant coach's salary" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">City of Assistant Coach</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Enter the type of coach" required>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>             
</div>