<?php 
session_start();

try {
    $bddPDO = new PDO('mysql:host=localhost;dbname=crud_ajax','root','');
} catch (PDOException $e) {
    echo "<p>Erreur:".$e->getMessage();
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    if ($email == "" or $pass == "") {
        // if this condition true we stay here and Show message
        header("location: login.php?error=You must fill in the email and pass field");
        exit;
    } else {
        $Existing = $bddPDO->prepare("SELECT * FROM utilisateur WHERE email = :email ");
        $Existing->execute([
            ':email' => $email
        ]);
        $row = $Existing->fetch(PDO::FETCH_ASSOC);

        if ($Existing->rowCount() == 0) {
            // Insert user data into the database
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT); // Hash the password
            $insertQuery = $bddPDO->prepare("INSERT INTO utilisateur (email, mot_de_passe) VALUES (:email, :password)");
            $insertQuery->execute([
                ':email' => $email,
                ':password' => $hashed_password
            ]);

            // Redirect to the login page
            header("location: login.php");
            exit;
        } else {
            // User already exists
            header("location: login.php?error=User already exists");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <section class="bg-light" >
    <div class="container-fluid">
      <div class="row justify-content-center align-items-center vh-100">
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h1 class="text-center mb-4">Login</h1>
              <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_GET['error']; ?>
                </div>
              <?php } ?>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                  <label for="email">Your email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="name@company.com" required="">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required="">
                </div>
                <div class="form-group">
                  <div class="d-flex justify-content-between align-items-start">
                    <div>
                      <label>Forgot Password?</label>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mb-3">Sign In</button>
              </form>
              <button class="btn btn-secondary btn-block">Don’t have an account yet? <a href="./register.php">Sign up</a></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
