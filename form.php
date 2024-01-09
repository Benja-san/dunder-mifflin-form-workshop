<?php 
  require_once("sales.php");
    require_once("class/Input.php");

    $firstnameInput = new Input();
    $companyNameInput = new Input(
        label: "Your company name",
        name : "companyName",
        required : true
    );
    var_dump($firstnameInput);
    var_dump($companyNameInput);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulaire de réclamation</title>

    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <header>
      <h1>Formulaire de réclamation</h1>
      <img src="images/logo_dunder.png" alt="Logo Dunder Mifflin" />
    </header>

    <main>
      <p>
        Pour toute plainte concernant votre commande de papier, veuillez s'il
        vous plait remplir le formulaire suivant.
      </p>

      <form action="/result.php" method="post">
        <div>
          <label for="companyName">Nom de votre entreprise : </label>
          <input
            type="text"
            id="companyName"
            name="companyName"
            required="true"
          />
        </div>

        <div>
          <label for="salesman">Votre vendeur :</label>
          <select id="salesman" name="salesman">
            <?php foreach($sales as $sale): ?>
              <option><?php echo $sale ?></option>
            <?php endforeach ?>
          </select>
        </div>

        <div>
          <label for="<?php echo $firstnameInput->getName() ?>">
        <?php echo $firstnameInput->getLabel() ?></label>
        <input 
          type="<?php echo $firstnameInput->getType() ?>"
          name="<?php echo $firstnameInput->getName() ?>"
          id="<?php echo $firstnameInput->getId() ?>"
          required="<?php echo $firstnameInput->getRequired()? true : false ?>"
        />
        </div>

        <div>
          <label for="lastname">Votre nom : </label>
          <input type="text" id="lastname" name="lastname" required="true" />
        </div>

        <div>
          <label for="email">Votre email : </label>
          <input type="email" id="email" name="email" required="true" />
        </div>

        <div>
          <label for="contactMessage">Votre message : </label>
          <textarea
            name="contactMessage"
            id="contactMessage"
            rows="10"
          ></textarea>
        </div>

        <div class="buttonsLine">
          <button type="submit">Envoyer <img src="images/mail.png" /></button>
        </div>
      </form>
    </main>
  </body>
</html>
