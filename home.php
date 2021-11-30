<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Home Page">
<meta name="author" content="Brooks Eason">
</head>

<?php include('nav.php'); ?>

<style>
    #players:hover a {
        color: grey;
    }
    #coaches:hover a {
        color: grey;
    }
    #GMs:hover a {
        color: grey;
    }
    #loginText {
        color: grey;
    }

</style>

<body>
    <div>
      <div class="container">
        <center>
          <h1 class="display-4" style="margin-bottom: 1vh;">NFL Stats</h1>
          <span id=players>
          <a class="btn btn-lg" href="playerDisplay.php" role="button">Browse Players</a>
</span>
<span id=coaches>
          <a class="btn btn-lg" href="#" role="button">Browse Coaches</a>
</span>
<span id=GMs>
          <a class="btn btn-lg" href="#" role="button">Browse GMs</a>
</span>
        </center>
      </div>
    </div>
    <div class="container" style="justify:center;">
        <center>
        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/a/a2/National_Football_League_logo.svg/1200px-National_Football_League_logo.svg.png" style="max-height: 375px; max-width: 375px;" />
        </center>
</div>
<div class="container">
    <center>
        <button onclick="location.href='account_create.php'" class="btn btn-primary" type="button">Create Account</button>
</center>
</div>
<div class="container">
    <center>
        <small id="loginText">Already have an account?</small>
        <a href="login.php" style="color:#35a8f0">Login</a>
</center>
</body>