<?php
require 'incription.php';
$con=new crud('crud_ajax','localhost','root','');
if(isset($_POST['sign-button'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $id_role=2;
    $confirmation_password=$_POST['confirmation_password'];

    if(!empty($_POST['name'])  && !empty($_POST['email']) && !empty($_POST['password']) ) {
        if($password == $confirmation_password) {
            $con->insertData($name,$email,$password,$id_role);
            echo "Register successful!";
        } else {
            echo "Passwords do not match!";
        }
    } else {
        echo "Please fill in all required fields!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            background-image: url('image/Capture.PNG');
            background-size: cover;
        }
    </style>
</head>
<body>

<section class="d-flex justify-content-center align-items-center vh-100">
    <div class="card w-75">
        <div class="card-body">
            <h1 class="text-center pb-3">Set up your account</h1>
            <form action="register.php" method="POST">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <input type="number" name="mobil" id="mobile" class="form-control" placeholder="Mobile Number" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="confirmation_password" id="confirmation_password" class="form-control" placeholder="Confirm Password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="sign-button">Submit</button>
            </form>
        </div>
    </div>
</section>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
