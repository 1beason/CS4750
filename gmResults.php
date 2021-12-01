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
        <meta name="author" content="Brooks Eason">
        <meta name="description" content="GM Search Results">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Font Awesome -->
    </head>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION['name'] = $_POST['name'];
        $name = $_SESSION['name'];
        $name_like = '%'.$name.'%';
        $query = "SELECT * FROM General_Managers WHERE name LIKE :name";
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name_like);
        $statement->execute();
        $coach_info = $statement->fetchAll();
        $query2 = "SELECT * FROM General_Managers WHERE name = :name";
        $statement = $db->prepare($query2);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $gm = $statement->fetchAll();
        $enabled = (empty($gm) and count($coach_info) > 1) ? 'Disabled' : '';
        $statement->closeCursor();



}
?>
    <body>
    <form action="downloadPlayer.php" name="downloadForm" method="post" id="submitDelete"> 
          <input type="hidden" name="name" value="<?php echo $name_like; ?>">
          <input type="hidden" name="type" value="General_Managers">
                <button type="submit" class="btn btn-primary">Download CSV</button>
      </form> 
        <div class="table-responsive">
            <table id="coachTable" class="table table-striped table-bordered" style="width:100%">
                <tr>
                    <th>Name</th> 
                    <th>Team</th>
                    <th>Salary</th>
                    <th>Tenure</th>
                    <th>Owner</th>
                </tr>
                <?php foreach ($coach_info as $g): ?>
                <tr>
                    <td><?php echo $g['name']; ?></td>
                    <td><?php echo $g['team']; ?></td> 
                    <td><?php echo '$'.$g['salary']; ?></td>
                    <td><?php echo $g['tenure']; ?></td>
                    <td><?php echo $g['owner_name']; ?></td>
                </tr>
            </table>
        </div>
        <div class="container" style="text-align: center;">
            <form action="deleteGM.php" name="deleteForm" method="post">  
                <button type="submit" class="btn btn-primary" id="submit" <?php echo $enabled ?> onclick="return confirm('Are you sure you want to delete <?php echo $g['name']; endforeach; ?>?')">Delete GM</button>
            </form> 
            <form action="updateGM.php" name="updateForm">  
                <button type="submit" class="btn btn-primary" id="submit" <?php echo $enabled ?>>Update GM</button>
            </form>
            <a class="btn btn-primary" href="gmDisplay.php">Back to Browse</a>
        </div>
    </body>
</html>

