<?php
  //connexion a la base de données
  include_once "connexion.php";
  //récupération de l'id dans le lien
  $id= $_GET['id'];
  //requête de suppression
  $req = pg_query($con , "DELETE FROM etablissement WHERE id = $id");
  //redirection vers la page index.php
  header("Location:gestionEtablissement.php")
?>