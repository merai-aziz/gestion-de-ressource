<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModifierEtablissement</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <header class="headeer">
        <img  class="img1" src="/images/log1.png" alt="aaa">
        <img   class="img2" src="/images/log2.png" alt="bbb">
        <h1>Gestion des  établissements</h1>
    </header>
    
    
        <aside>
    <h4><strong>Menu</strong></h4>
            <nav>
                <a href="gestionRessources.html">Gestion des ressources</a><br>
                <a href="gestionEtablissement.php">Gestion des établissements</a><br>
                <a href="">Gestion des affectations</a><br>
                <a href="">Gestion des compétences</a><br>
            </nav>
    
        </aside>
<?php

         //connexion à la base de donnée
          include_once "connexion.php";
         //on récupère le id dans le lien
          $id = $_GET['id'];
          //requête pour afficher les infos d'un employé
          $req = pg_query($con , "SELECT * FROM etablissement WHERE id = $id");
          $row = pg_fetch_assoc($req);


       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['buttone'])){
           //extraction des informations envoyé dans des variables par la methode POST
           extract($_POST);
           //verifier que tous les champs ont été remplis
           if(isset($nom) && isset($type) && isset($gouvernorat)){

             // échapper les valeurs pour éviter les injections SQL
        $nom = pg_escape_string($con, $nom);
        $type = pg_escape_string($con, $type);
        $gouvernorat = pg_escape_string($con, $gouvernorat);

               //requête de modification
               $req = pg_query($con, "UPDATE etablissement SET nom = '$nom' , type = '$type' , gouvernorat = '$gouvernorat' WHERE id = $id");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: gestionEtablissement.php");
                }else {//si non
                    $message = "etablissement non modifié";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>

    <div class="form">
        <a href="gestionEtablissement.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h4>Modifier l'établissement de :<?= htmlspecialchars($row['nom']) ?> </h4>
        <p class="erreur_message">
           <?php 
              if(isset($message)){
                  echo $message ;
              }
           ?>
        </p>
        <form action="" method="POST">
           
            <label>Nom</label>
            <input type="text" name="nom" value="<?= htmlspecialchars($row['nom']) ?>">
            <label>Type</label>
            <input type="text" name="type" value="<?= htmlspecialchars($row['type']) ?>">
            <label>Gouvernorat</label>
            <select id="gouvernorat" name="gouvernorat">
                <option <?= $row['gouvernorat'] == 'Ariana' ? 'selected' : '' ?>>Ariana</option>
                <option <?= $row['gouvernorat'] == 'Béja' ? 'selected' : '' ?>>Béja</option>
                <option <?= $row['gouvernorat'] == 'Ben Arous' ? 'selected' : '' ?>>Ben Arous</option>
                <option <?= $row['gouvernorat'] == 'Bizerte' ? 'selected' : '' ?>>Bizerte</option>
                <option <?= $row['gouvernorat'] == 'Gabès' ? 'selected' : '' ?>>Gabès</option>
                <option <?= $row['gouvernorat'] == 'Gafsa' ? 'selected' : '' ?>>Gafsa</option>
                <option <?= $row['gouvernorat'] == 'Jendouba' ? 'selected' : '' ?>>Jendouba</option>
                <option <?= $row['gouvernorat'] == 'Kairouan' ? 'selected' : '' ?>>Kairouan</option>
                <option <?= $row['gouvernorat'] == 'Kasserine' ? 'selected' : '' ?>>Kasserine</option>
                <option <?= $row['gouvernorat'] == 'Kébili' ? 'selected' : '' ?>>Kébili</option>
                <option <?= $row['gouvernorat'] == 'Kef' ? 'selected' : '' ?>>Kef</option>
                <option <?= $row['gouvernorat'] == 'Mahdia' ? 'selected' : '' ?>>Mahdia</option>
                <option <?= $row['gouvernorat'] == 'Manouba' ? 'selected' : '' ?>>Manouba</option>
                <option <?= $row['gouvernorat'] == 'Médenine' ? 'selected' : '' ?>>Médenine</option>
                <option <?= $row['gouvernorat'] == 'Monastir' ? 'selected' : '' ?>>Monastir</option>
                <option <?= $row['gouvernorat'] == 'Nabeul' ? 'selected' : '' ?>>Nabeul</option>
                <option <?= $row['gouvernorat'] == 'Sfax' ? 'selected' : '' ?>>Sfax</option>
                <option <?= $row['gouvernorat'] == 'Sidi Bouzid' ? 'selected' : '' ?>>Sidi Bouzid</option>
                <option <?= $row['gouvernorat'] == 'Siliana' ? 'selected' : '' ?>>Siliana</option>
                <option <?= $row['gouvernorat'] == 'Sousse' ? 'selected' : '' ?>>Sousse</option>
                <option <?= $row['gouvernorat'] == 'Tataouine' ? 'selected' : '' ?>>Tataouine</option>
                <option <?= $row['gouvernorat'] == 'Tozeur' ? 'selected' : '' ?>>Tozeur</option>
                <option <?= $row['gouvernorat'] == 'Tunis' ? 'selected' : '' ?>>Tunis</option>
                <option <?= $row['gouvernorat'] == 'Zaghouan' ? 'selected' : '' ?>>Zaghouan</option>
            </select>
            <input type="submit" value="Modifier" name="buttone">
        </form>
    </div>
</body>
</html>