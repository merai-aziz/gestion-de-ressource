<?php


  //connexion à la base de données
  $con = pg_connect("host=localhost user=postgres dbname=db_cims password=040506");


  if(!$con){
     echo "Vous n'êtes pas connecté à la base de donnée";
     exit;
  
}
?>