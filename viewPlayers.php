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
        $query = "SELECT * FROM users WHERE username = :user";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":user", $user);
        $stmt->execute();
        $res = $stmt->fetchAll();
        $username = $res[0]['username'];
        $statement->closeCursor();

        $query = "SELECT * FROM Players WHERE creator = :user";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":user", $username);
        $stmt->execute();
        $player_info = $stmt->fetchAll();
        $statement->closeCursor();
    }

?>
<body>
        <div class="table-responsive">
            <table id="playerTable" class="table table-striped table-bordered" style="width:100%">
                <tr>
                    <th>Name</th>
                    <th>Age</th> 
                    <th>Number</th>
                </tr>
                <?php foreach ($player_info as $p): ?>
                <tr>
                    <td><?php echo $p['name']; ?></td>
                    <td><?php echo $p['age']; ?></td> 
                    <td><?php echo $p['number']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </body>
</html>
