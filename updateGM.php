<html>
  <?php 
    require('dbutil.php');
    include('nav.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Update General Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Julianne Walker">
    <meta name="description" content="Update General Manager">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
    //if(isset($_SESSION['user'])) {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newName = $_POST['name'];
            $tenure = $_POST['tenure'];
            $salary = $_POST['salary'];
            $name = $_POST['gmToUpdate'];
            $team = $POST['team'];
            $owner = $POST['owner'];

            $query = "UPDATE General_Managers SET name=:newName, tenure=:tenure, salary=:salary, team=:team, owner=:owner
                    WHERE name=:name";

            $statement = $db->prepare($query);
            $statement->bindValue(':newName', $newName);
            $statement->bindValue(':name', $name);
            $statement->bindValue(':team', $team);
            $statement->bindValue(':tenure', $tenure);
            $statement->bindValue(':salary', $salary);
            $statement->bindValue(':owner', $owner);


            $statement->execute();

            $statement->closeCursor();
        }
        
    //} 
    /*
    else {
        echo "<div class='container' style='text-align: center;'><span class='error_message' id='msg_user'><h4><b>You are not logged in.</b></h4></span></div>";
    }
    */
?>
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="addForm" method="post">

    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="gmToUpdate">Which GM would you like to update?</label>
                <input type="text" class="form-control" id= "gmToUpdate" name="gmToUpdate" placeholder="Enter coach name" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="name">New Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter new name" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="tenure">New Tenure</label>
                <input type="text" class="form-control" id="tenure" name="tenure" placeholder="Enter new tenure" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="salary">New Salary</label>
                <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter new salary" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="team">New Team</label>
                <input type="text" class="form-control" id="team" name="team_city" placeholder="Enter new team" required>
            </div>
        </div>
        <div class="form-row">
            <div class = "col">
                <label for="owner">New Owner</label>
                <input type="text" class="form-control" id="owner" name="owner" placeholder="Enter new owner" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
    <a class="btn btn-primary" href="playerDisplay.php">Back to Browse</a>            
</div>