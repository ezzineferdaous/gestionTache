<<?php
require "prossece.php";

$email = $_POST['email'];
$pass = $_POST['password'];

session_start();

if(true){

    if($_POST['email'] ==  "" or $_POST['password'] == ""){
            // if this condition true we stay here and Show message
            header("location: login.php.?error=You must fill in the email and pass field");
            exit;
    }else{
        $Existing = $bddPDO-> prepare("SELECT * FROM taches WHERE id = :id ");
        $Existing->execute([
            ':id'=>$id
        ]);
        $row = $Existing ->FETCH(PDO::FETCH_ASSOC);

        if($Existing->rowCount() == 0){
            // if this condition true we go to massage.html page 
            header("location: login.php.?error=this email is undefined!!!");

            exit;
        }else{

            echo "Hashed Password from Database:". $row["mot_de_passe"];
            echo "<br> Entered Password: ". $pass;
            echo"<br>";
            echo $email;
            $hashed_password = $row["mot_de_passe"];

            if($pass == $hashed_password) {
                // Password is correct
                echo "Password is correct";
                $_SESSION["id_utilisateur"] = $row["id_utilisateur"];
                $_SESSION["nom"] = $row["nom"];
                $_SESSION["id_role"] = $row["id_role"];
                header("location: index.php");
            } else {
                // Password is incorrect
                header("location: login.php.?error=assword is incorrect!!!");
            }
            exit;
        }
}
}?>




<!Doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <title>Login</title>
</head>
<body>
  <section class="bg-gray-50 dark:bg-gray-900" >
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 ">

        <div class=" Login w-full h-5/6 rounded-lg shadow white:border md:mt-0 sm:max-w-96 xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8  ml-5">
               
                <div class="login">
                <h1 class="text-2xl font-bold" >Login</h1>
                </div>
                <form class="space-y-4 md:space-y-6" action="log.php" method="POST">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-blue-600 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-blue-600 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            
                            <div class="ml-3 text-sm">
                              <label>Forgot Password?</label>
                            </div>
                        </div>
                        
                    </div>
                    <button class="login-button  w-full hover:bg-blue-400 bg-blue-800 text-white
                     font-bold py-2 px-4 rounded-md" id="signbUpButton" name="login-button">
                    Sign In
                    </button>
                    <button type="submit" class="w-full text-gray bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"> Don’t have an account yet? <a href="./register.php" class="btn font-medium text-primary-600 hover:underlin text-blue-700" value="Sign In" name="signIn">Sign up</a></button>
                    
                </form>
            </div>
        </div>
    </div>
  </section>
</body>
</html>
