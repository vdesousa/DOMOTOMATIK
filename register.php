<?php
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$name = $address = $postcode = $email = $phone = $password = $confirm_password = "";
$name_error = $address_error = $postcode_error = $email_error = $phone_error = $password_error = $confirm_password_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["name"]))){
        $name_error = "Entrez un prénom valide.";
    } else{
        $_POST['name'] = htmlspecialchars($_POST['name']);
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

        // Validate address
    if(empty(trim($_POST['address']))){
        $address_error = "Entrez une adresse postale.";     
    } elseif(strlen(trim($_POST['address'])) < 5){
        $address_error = "L'adresse postale n'est pas valide .";
    } else {
        $_POST['address'] = htmlspecialchars($_POST['address']);
        $address = trim($_POST['address']);
     }

        // Validate post code
    if(empty(trim($_POST['postcode']))){
        $postcode_error = "Entrez un code postale.";     
    } elseif(strlen(trim($_POST['postcode'])) < 5 OR strlen(trim($_POST['postcode'])) > 5){
        $postcode_error = "L'adresse postale n'est pas valide .";
    } else {
        $_POST['postcode'] = htmlspecialchars($_POST['postcode']);
        $postcode = trim($_POST['postcode']);
     }


        // Validate mail address
    if(empty(trim($_POST['email']))){
        $email_error = "Entrez une adresse email.";     
    } elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])){
        $email_error = "L'adresse email n'est pas valide .";
    } else {
        $_POST['email'] = htmlspecialchars($_POST['email']);
        $email = trim($_POST['email']);
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
    if(empty($name_error) && empty($address_error) && empty($postcode_error) && empty($email_error) && empty($phone_error) && empty($password_error) && empty($confirm_password_error)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO utilisateur (name, address, postcode, email, phone, password) VALUES (:name, :address, :postcode, :email, :phone, :password)";
         
        if($state = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $state->bindParam(':name', $param_name, PDO::PARAM_STR);
            $state->bindParam(':address', $param_address, PDO::PARAM_STR);
            $state->bindParam(':postcode', $param_postcode, PDO::PARAM_STR);
            $state->bindParam(':email', $param_email, PDO::PARAM_STR);
            $state->bindParam(':phone', $param_phone, PDO::PARAM_STR);
            $state->bindParam(':password', $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_postcode = $postcode;
            $param_email = $email;
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
            <div class="form-group <?php echo (!empty($address_error)) ? 'has-error' : ''; ?>">
                <label>Adresse postale :<sup>*</sup></label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
                <span class="help-block"><?php echo $address_error; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($postcode_error)) ? 'has-error' : ''; ?>">
                <label>Code postale :<sup>*</sup></label>
                <input type="text" name="postcode"class="form-control" value="<?php echo $postcode; ?>">
                <span class="help-block"><?php echo $postcode_error; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($phone_error)) ? 'has-error' : ''; ?>">
                <label>Numéro de téléphone :<sup>*</sup></label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
                <span class="help-block"><?php echo $phone_error; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                <label>Votre adresse email :<sup>*</sup></label>
                <input type="text" name="email"class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_error; ?></span>
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
                <input type="submit" class="btn btn-primary" value="Envoyer">
                <input type="reset" class="btn btn-default" value="Réinitialiser">
            </div>
            <p>Vous avez déjà un compte? <a href="login.php">Connectez-vous ici</a>.</p>
            <p>Vous êtes administrateur? <a href="login_admin.php">Connectez-vous ici</a>.</p>
        </form>
    </div>    
</body>
</html>