<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$name = $phone = $password = $confirm_password = "";
$name_error = $phone_error = $password_error = $confirm_password_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["name"]))){
        $name_error = "Entrez un prénom valide.";
    } else{
            $name = trim($_POST["name"]);
    }

      // Validate phone number
    if(empty(trim($_POST['phone']))){
        $phone_error = "Entrez un numéro de téléphone.";     
    } elseif(strlen(trim($_POST['phone'])) > 10 OR !preg_match('#^0[0-9]([ .-]?[0-9]{2}){4}$#', $_POST['phone'])){
        $phone_error = "Le numéro de téléphone n'est pas valide .";
    } else {
        $_POST['phone'] = htmlspecialchars($_POST['phone']);

            if(preg_match('#^0[0-9]([ .-]?[0-9]{2}){4}$#', $_POST['phone']) && strlen(trim($_POST['phone'])) == 10 ) {
                    $phone = trim($_POST['phone']);
            }
            }

    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_error = "Entrez un mot de passe.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_error = "Le mot de passe doit comporter au moins 6 caractères.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_error = 'Confirmez le mot de passe.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_error = 'Le mot de passe ne correspond pas.';
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_error) && empty($phone_error) && empty($password_error) && empty($confirm_password_error)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO utilisateur (name, phone, password) VALUES (:name, :phone, :password)";
         
        if($state = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $state->bindParam(':name', $param_name, PDO::PARAM_STR);
            $state->bindParam(':phone', $param_phone, PDO::PARAM_STR);
            $state->bindParam(':password', $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_name = $name;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if($state->execute()){
                // Redirect to login page
                header("location: login.php");
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
<html>
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Inscription</h2>
        <p>Remplissez ce formulaire pour créer un compte.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($name_error)) ? 'has-error' : ''; ?>">
                <label>Votre prénom et nom :<sup>*</sup></label>
                <input type="text" name="name"class="form-control" value="<?php echo $name; ?>">
                <span class="help-block"><?php echo $name_error; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($phone_error)) ? 'has-error' : ''; ?>">
                <label>Numéro de téléphone :<sup>*</sup></label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_error; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                <label>Mot de passe :<sup>*</sup></label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_error; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_error)) ? 'has-error' : ''; ?>">
                <label>Confirmer le mot de passe:<sup>*</sup></label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_error; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Vous avez déjà un compte? <a href="login.php">Connectez-vous ici</a>.</p>
        </form>
    </div>    
</body>
</html>