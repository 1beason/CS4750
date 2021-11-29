<?php
require("dbutil.php");

if (isset($_POST['submit'])) {

    $user = $_POST['username'];
    $pass = $_POST['pass'];

    $query = "SELECT password FROM users WHERE username = :user";
    $stmt = $db->prepare($query);
    $stmt->bindParam(":user", $user);
    $stmt->execute();
    $res = $stmt->fetchAll();


    $found = empty($res) ? 0 : 1;
    

    if (!$found) {
        echo "<div class='container' style='text-align: center;'><span class='error_message' id='msg_user'><h4><b>That account doesn't exist</b></h4></span></div>";
    } else if (!password_verify($pass, $res[0]['password'])){
        echo "<div class='container' style='text-align: center;'><span class='error_message' id='msg_pass'><h4><b>You entered the wrong password, please try again.</b></h4></span></div>";
    } else {
        $_SESSION['user'] = $user;
        header("Location:addPlayer.php");
    }
    $stmt->closeCursor();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="author" content="Brooks Eason">
<title>Login</title>
<style>
    .error_message {  color: crimson; font-style:italic; }       
</style>
<body>
<div class="container">
    <div class="row">
      <div class="col-sm">
        <div>
          <h1 style="margin-top: 5vh; text-align: center;">Login</h1>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login" name="insert" method="POST">
            <div class="form-group">
              <span class="label">Username</span>
              <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="form-group">
              <span class="label">Password</span>
              <input type="password" id="pass" name="pass" class="form-control" required>
            </div>
            <div class="form-group text-center">
              <input type="submit" name="submit" value="Login" class="btn btn-primary py-3 px-3" style="width: 15vw;">
            </div>

          </form>
        </div>

        <div class="text-center">
          <h5>OR</h5>
          <a href="account_create.php" class="btn btn-primary py-3 px-5" style="margin-top: 1vh;">Create an Account </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
