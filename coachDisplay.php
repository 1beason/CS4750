<html>
  <?php 
    require('dbutil.php');
    include('nav.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Find Coach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Brooks Eason">
    <meta name="description" content="Add Player">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="coachResults.php" name="displayForm" method="post">

    <h4>Find a coach</h4>
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Coach Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter coach name" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Search</button>
    </form>          
</div>
