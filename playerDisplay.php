<html>
  <?php 
    require('dbutil.php');
    include('nav.php');
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
<div class="container" style="text-align: center;">
    <!-- a form -->
    <form action="playerDisplay2.php" name="displayForm" method="post">

    <h4>Find a player</h4>
    <div class="form-group">
        <div class="form-row">
            <div class = "col">
                <label for="first_name">Player Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter player name" required>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" id="submit">Search</button>
    </form>          
</div>
