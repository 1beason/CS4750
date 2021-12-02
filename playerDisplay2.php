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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['name'] = $_POST['name'];
        $name = $_SESSION['name'];
        $name_like = '%'.$name.'%';
        $query = "SELECT * FROM Players WHERE name LIKE :name";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name_like);
        $statement->execute();
        $player_info = $statement->fetchAll();
        $query2 = "SELECT * FROM Players WHERE name = :name";
        $statement = $db->prepare($query2);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $player = $statement->fetchAll();
        $enabled = (empty($player) and count($player_info) > 1) ? 'Disabled' : '';
        
}
?>
    <body>
      <form action="downloadPlayer.php" name="downloadForm" method="post" id="submitDelete"> 
          <input type="hidden" name="name" value="<?php echo $name_like; ?>">
          <input type="hidden" name="type" value="Players">
                <button type="submit" class="btn btn-primary">Download CSV</button>
      </form> 
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
        <div class="container" style="text-align: center;">
            <form action="deletePlayer.php" name="deleteForm" method="post" id="submitDelete">  
                <button type="submit" class="btn btn-primary" <?php echo $enabled ?> onclick="return confirm('Are you sure you want to delete <?php echo $player_info[0]['name']; ?>?')">Delete Player</button>
            </form> 
            <form action="updatePlayer.php" name="updateForm">  
                <button type="submit" class="btn btn-primary" id="submitUpdate" <?php echo $enabled ?>>Update Player</button>
            </form>
            <a class="btn btn-primary" href="playerDisplay.php">Back to Browse</a>
        </div>
    </body>
</html>

