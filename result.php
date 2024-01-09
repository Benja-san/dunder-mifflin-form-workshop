<?php
    require_once("sales.php");

    $errors = [];

    // $sanitizedData = array_map('htmlEntities', $_POST);
    // $cleanData = array_map('trim', $sanitizedData);
    $cleanData = [];
    foreach($_POST as $key => $value) {
        $cleanData[$key] = trim(htmlentities($value));
        if (empty($cleanData[$key])) {
            $errors[$key] = "Le champ $key est obligatoire";
        }
        if(isset($cleanData[$key]) && $key === "email" && !filter_var($cleanData[$key], FILTER_VALIDATE_EMAIL)) {
            $errors[$key] = "Le champ $key doit être un email valide";
        }
        if(isset($cleanData[$key]) && $key === "contactMessage" && strlen($cleanData[$key]) < 30) {
            $errors[$key] = "Le champ $key doit comporter plus de 30 characters";
        }
        if($key === "salesman" && !in_array( $cleanData[$key], $sales)){
            $errors[$key] = "Séléctionnez un vendeur de notre équipe";
        }
    };

    if (!empty($errors)) {
        require 'error.php';
        die();
    }

    $salesPicture = strtolower(explode(" ", $cleanData["salesman"])[0]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif - Réclamation</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <h1>Nous traitons votre retour.</h1>
        <img src="images/logo_dunder.png" alt="Logo Dunder Mifflin">
    </header>

    <main>
        <div class="summary">
            <p>
                <img src="images/<?php echo $salesPicture ?>.webp" alt="<?php echo $cleanData["salesman"] ?>">
                <span>Votre vendeur</span>
            </p>
            
            <ul>
                <li>Votre entreprise : <span><?php echo $cleanData["companyName"] ?></span></li>
                <li>Votre nom : <span><?php echo $cleanData["lastname"] ?></span></li>
                <li>Votre email : <span><?php echo $cleanData["email"] ?></span></li>
                <li>Votre message :
                    <p><?php echo $cleanData["contactMessage"] ?>
                    </p>
                </li>
            </ul>
        </div>
    </main>
</body>

</html>