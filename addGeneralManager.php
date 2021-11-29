<html>
  <?php 
    require('dbutil.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Add General Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Noah Tola">
    <meta name="description" content="Add General Manager">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $team = $_POST['team'];
    $tenure = $_POST['tenure'];
    $salary = $_POST['salary'];
    $owner = $_POST['owner'];


    $query = "INSERT INTO General_Managers (name, team, tenure, salary, owner) VALUES 
            (:name, :team, :tenure, :salary, :owner)";

    $statement = $db->prepare($query);

    $statement->bindValue(':name', $name);
    $statement->bindValue(':team', $team);
    $statement->bindValue(':tenure', $tenure);
    $statement->bindValue(':salary', $salary);
    $statement->bindValue(':owner', $owner);


    $statement->execute();

    $statement->closeCursor();
}
?>
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="addForm" method="post">

    <h4>Add a General Manager</h4>
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Manager Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter the manager's name" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Team of Coach</label>
                <input type="text" class="form-control" id="team" name="team" placeholder="Enter manager's city" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Tenure of Manager </label>
                <input type="text" class="form-control" id="tenure" name="tenure" placeholder="Enter the manager's tenure" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Salary of Manager</label>
                <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter the manager's salary" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Owner</label>
                <input type="text" class="form-control" id="owner" name="owner" placeholder="Enter owner's name" required>
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>             
</div>