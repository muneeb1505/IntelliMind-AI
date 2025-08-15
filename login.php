<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="container">
     <?php
      // if(isset($_POST["login"])){
      //    $email = $_POST["email"];
      //    $pass = $_POST["password"];
      //    require_once "database.php";
      //    $sql = "SELECT * FROM users WHERE email = '$email'";
      //    $result = mysqli_query($conn, $sql);
      //    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //    if($user){
      //       if(password_verify($pass, $user["password"])){
      //           header("Location: index.php");
      //           die();
      //       }else{
      //           echo "<div class='alert alert-danger'>Password doesn't match</div>";
      //       }
      //    }else{
      //       echo "<div class='alert alert-danger'>Email doesn't match</div>";
      //    }
      // }
session_start();
require_once "database.php";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($pass, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: index.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Invalid Email or Password</div>";
    }
}
     ?>
    <form action="login.php" method="post">
    <h2 class="wlc">Login</h2>
  <div class="mb-3">
    <input type="email" class="form-control"  placeholder="Email Address"  name="email">
  </div>

  <div class="mb-3">
    <input type="password" class="form-control"  placeholder="Password"  name="password">
  </div>

  <button type="submit" class="btn btn-primary" name="login" value="Login">Submit</button>
  <div class="login-link">Don't have an account? <a href="signup.php">Sign Up</a></div>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>