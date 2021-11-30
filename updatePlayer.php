<html>
  <?php 
    require('dbutil.php');
    include('nav.php');
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
    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $query = "SELECT role FROM users WHERE username = :user";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        $res = $stmt->fetchAll();
        if(!($res[0]['role'] == 'coach')) {
            echo "<div class='container' style='text-align: center;'><span class='error_message' id='msg_user'><h4><b>Only coaches are authorized to modify players.</b></h4></span></div>";
        }
        else{
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $res[0]['role'] == 'coach') {
                $newName = $_POST['name'];
                $age = $_POST['age'];
                $number = $_POST['number'];
                $name = $_POST['nameToUpdate'];

                $query = "UPDATE Players SET name=:newName, age=:age, number=:number
                        WHERE name=:name";

                $statement = $db->prepare($query);
                $statement->bindValue(':newName', $newName);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':age', $age);
                $statement->bindValue(':number', $number);

                $statement->execute();

                $statement->closeCursor();
            } else {
                echo "<div class='container' style='text-align: center;'><span class='error_message' id='msg_user'><h4><b>Players cannot modify players.</b></h4></span></div>";
            }
        }
    } else {
        echo "<div class='container' style='text-align: center;'><span class='error_message' id='msg_user'><h4><b>You are not logged in.</b></h4></span></div>";
    }
?>
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="addForm" method="post">

    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Which player would you like to update?</label>
                <input type="text" class="form-control" id="nameToUpdate" name="nameToUpdate" placeholder="Enter player name" required>
            </div>
        </div>
    </div>
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