<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$email = $password = "";
$email_error = $password_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_error = 'Entrez votre adresse email.';
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_error = 'Entrez votre mot de passe.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($email_error) && empty($password_error)){
        // Prepare a select statement
        $sql = "SELECT email, password FROM utilisateur WHERE email = :email";
        
        if($state = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $state->bindParam(':email', $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($state->execute()){
                // Check if username exists, if yes then verify password
                if($state->rowCount() == 1){
                    if($row = $state->fetch()){
                        $hashed_password = $row['password'];
                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                            $_SESSION['email'] = $email;      
                            header("location: tableaudebord.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_error = 'Le mot de passe entré n\'est pas valide.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_error = 'Il n\'y a pas de compte associé à cette adresse email.';
                }
            } else{
                echo "Oops! Une erreur s'est produite. Réessayez plus tard.";
            }
        }
        
        // Close statement
        unset($state);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Connexion utilisateur</h2>
        <p>Entrez dans les champs pour se connecter.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Votre email :<sup>*</sup></label>
                <input type="text" name="email"class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_error; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                <label>Mot de passe :<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </div>
            <p>
        </form>
    </div>
</body>
</html>