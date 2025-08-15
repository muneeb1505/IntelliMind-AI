<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
  </head>
  <body>
    <div class="container">
    <?php
              if (isset($_POST["submit"])) {
                $fullName = $_POST["fullName"];
                $email = $_POST["email"];
                $password = $_POST["signupPassword"];
                $confirmPassword = $_POST["confirmPassword"];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                
                $errors = array();

                if(empty($fullName) OR empty($email) OR empty($password) OR empty($confirmPassword)){
                    array_push($errors, "All feilds are required");
                }
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    array_push($errors, "Email is not valid");
                }
                if(strlen($password) < 8){
                    array_push($errors, "Password must be at least 8 characters long");
                }
                if($password !== $confirmPassword){
                    array_push($errors, "Password doesn't match");
                }
                if(count($errors) > 0){
                    foreach($errors as $error){
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }                
                else{
                    //insert Database
                    require_once "database.php";
                }
              }
            ?>
    <form action="signup.php" method="post">
    <h2 class="header">Sign up</h2>
  <div class="mb-3">
    <input type="text" class="form-control"  placeholder="Full Name" name="fullName">
  </div>

  <div class="mb-3">
    <input type="email" class="form-control"  placeholder="Email Address"  name="email">
  </div>

  <div class="mb-3">
    <input type="password" class="form-control"  placeholder="Password"  name="signupPassword">
  </div>

  <div class="mb-3">
    <input type="password" class="form-control"  placeholder="Confirm Password"  name="confirmPassword">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" value="Register">Submit</button>
  <div class="signup-link">Already have an account? <a href="login.php">Login</a></div>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>