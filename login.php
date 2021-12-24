<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: home.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    error_reporting(E_ERROR | E_PARSE);
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $query = mysqli_query($db, $sql);

        $num_data = mysqli_num_rows($query);
        
        if($num_data == 1) {
            $admin = mysqli_fetch_array($query);
            if($password == $admin['password']) {
                // Password is correct, so start a new session
                session_start();
                            
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $admin['id'];
                $_SESSION["username"] = $username;                            
                
                // Redirect user to welcome page
                header("location: home.php");
            } else{
                // Display an error message if password is not valid
                $password_err = "Invalid username or password.";
            }
        } else {
            $password_err = "Invalid username or password.";
        }
        
    }
    
    // Close connection
    mysqli_close($db);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Axel">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login - TSHS</title>
    <style type="text/css">
        body {
            margin: 0px;
            padding: 0px;
        }
        .login-container {
            height: 100vh;
            width: 100%;
            display: flex;
        }

        .equal-content {
            flex: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .left-side {
            background-color: #EFABA1;
        }

        .right-side {
            display: flex;
            padding: 0 8rem;
            flex-direction: column;
            align-items: center;
        }

        .school-name {
            color: #FF4B35; 
            font-size: 4rem;
        }

        .login-form-container {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .orange-button {
            background-color: #FE705F;
            width: 100%;
            text-align: center;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            text-decoration: none;
        }

        .orange-button:hover {
            background-color: #E46657;
            color: #fff;
            text-decoration: none;
        }

    </style>
</head>
<body>
<div class="login-container border border-primary">
    <div class="equal-content left-side">
        <img src="assets/login_art.png" alt="Tetsuya Senior High School" class="img-fluid">
    </div>
    <div class="equal-content right-side">
        <h1 class="school-name border-bottom border-dark pb-4 mb-5"><strong>Tetsuya Senior High School</strong><span><img src="assets/school_logo_board.svg" height="60" style="margin-right: 0.5rem;"/></span></h1>

        <a type="submit" class="orange-button mt-3 mb-3">
            <span><img src="assets/its_logo.svg" height="30" style="margin-right: 0.5rem;"/></span>
            Masuk dengan myITS</a>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="login-form-container" method="post">
            <div class="mb-3 form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label for="input-username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="input-username" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="mb-3 form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="input-password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="input-password" value="<?php echo '' ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <button type="submit" class="orange-button">Login</button>
        </form>

    </div>
</div>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>