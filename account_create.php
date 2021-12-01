<html>
  <?php 
    require('dbutil.php');
    include('nav.php');
  ?>

  <style>
    .error_message {  color: crimson; font-style:italic; }       
  </style>

    <head>
    
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="author" content="Brooks Eason">
    <meta name="description" content="Account Creation">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['uname'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $role = $_POST['role'];

    $query = "select * from users where username = :uname";

    $stmt = $db->prepare($query);
    $stmt->bindParam(":uname", $uname);
    $stmt->execute();
    $res = $stmt->fetchAll();

    $exists = sizeof($res);
    $stmt->closeCursor();

    if(!$exists) {
        $query = "INSERT INTO users (username, password, role) VALUES (:uname, :pass1, :role)";

        $stmt = $db->prepare($query);
        $stmt->bindValue(':uname', $uname);
        $stmt->bindValue(':role', $role);

        //hash pws
        $hashed = password_hash($pass1, PASSWORD_BCRYPT);

        $stmt->bindValue(':pass1', $hashed);
        $stmt->execute();
        $stmt->closeCursor();

        echo "<script>location.href='login.php'</script>";
    }
}
?>
 <div class="container" style="text-align: center;">

      <h3>
          Sign Up
      </h3>
      <!-- registration form -->
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="RegisterForm" method="post" onsubmit="return validate()">

          <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter username" >
            <span class="error_message" id="msg_user"><?php if(!empty($res)) echo "Username already taken, please 
              enter another"?></span>
          </div>
          <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="pass1" id="pass1" placeholder="Password" >
                        <span class="error_message" id="msg_pass"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Re-enter Password</label>
                        <input type="password" class="form-control" name="pass2" id="pass2" placeholder="Password" >
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="role" class="form-control" name="role" id="role" placeholder="Role" >
                    </div>
                    <!--
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="coach">
                            <label class="form-check-label" for="coach">
                                Coach
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="player">
                            <label class="form-check-label" for="player">
                                Player
                            </label>
                        </div>
                    </div> -->
                    
                    <button type="submit" class="btn btn-secondary">Submit</button>
                    <div>
                      <span class="error_message" id="overall"></span>
                    </div>
    </form>
</div>
</div>

<!-- AJAX for validating input -->
<script>
    function validate() {
        var uname = document.getElementById("uname").value;
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        console.log(pass1);
        var fail = 0;

        // number of checks incoming
        if (pass1 == "" || pass2 == "") {
            fail++;
            document.getElementById("msg_pass").innerHTML = "Your passwords must not be empty";
        } else if (pass1 != pass2) {
            fail++;
            document.getElementById("msg_pass").innerHTML = "Your passwords must match";
        } else {
            document.getElementById("msg_pass").innerHTML = "";
        }

        if (fail) {
            document.getElementById("overall").innerHTML = "Please fix the errors and then resubmit";
            return false;
        } else {
            document.getElementById("overall").innerHTML = "";
            return true;
        }
    }
</script>
</html>
