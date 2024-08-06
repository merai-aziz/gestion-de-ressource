<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<header class="headeer">
    <img  class="img1" src="/images/log1.png" alt="aaa">
    <img   class="img2" src="/images/log2.png" alt="bbb">
    <h1>Gestion des établissements</h1>
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
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['buttone'])){
         // Extraction des informations envoyées
         $nom = $_POST['nom'];
         $type = $_POST['type'];
         $gouvernorat = $_POST['gouvernorat'];
          

           // Vérifier que tous les champs ont été remplis
            if (!empty($nom) && !empty($type) && !empty($gouvernorat)) {


                //connexion à la base de donnée
                include_once "connexion.php";
                //requête d'ajout
                $req = pg_query($con , "INSERT INTO etablissement(nom, type, gouvernorat) VALUES('$nom', '$type','$gouvernorat')");
                if($req){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: gestionEtablissement.php");
                }else {//si non
                    $message = "etablissement non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
       }
    
    ?>








    <div class="container">
        <a href="" class="Btn_add" id="add"> <img src="images/plus.png"> Ajouter</a>
        <a href="index.html" class="Btn_ad" > <img src="images/quitter.png"> Retour</a>
        <div class="popup" id="popupForm" >
        <form action="" method="POST">
            <h2>Ajouter un établissemnt</h2>
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" >
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" >
            <label for="gouvernorat">Gouvernorat:</label>
            <select id="gouvernorat" name="gouvernorat">
                    <option>Ariana</option>
                    <option>Béja</option>
                    <option>Ben Arous</option>
                    <option>Bizerte</option>
                    <option>Gabès</option>
                    <option>Gafsa</option>
                    <option>Jendouba</option>
                    <option>Kairouan</option>
                    <option>Kasserine</option>
                    <option>Kébili</option>
                    <option>Kef</option>
                    <option>Mahdia</option>
                    <option>Manouba</option>
                    <option>Médenine</option>
                    <option>Monastir</option>
                    <option>Nabeul</option>
                    <option>Sfax</option>
                    <option>Sidi Bouzid</option>
                    <option>Siliana</option>
                    <option>Sousse</option>
                    <option>Tataouine</option>
                    <option>Tozeur</option>
                    <option>Tunis</option>
                    <option>Zaghouan</option>
                </select>
            <button id="submitBtn" name="buttone" >Soumettre</button>
        </form>
        </div>
        <div class="overlay" id="overlay"></div>
        
        <script>
            document.getElementById('add').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('popupForm').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            });
        
            document.getElementById('overlay').addEventListener('click', function() {
                document.getElementById('popupForm').style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            });
        
            document.getElementById('submitBtn').addEventListener('click', function() {
                // Vous pouvez ajouter ici les actions pour soumettre le formulaire
                alert('ressource ajouté avec succès!');
                document.getElementById('popupForm').style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            });
        
           
               
            
        </script>
        <table>
            <tr id="items">
                <th>ID</th>
                <th>Nom</th>
                <th>Type</th>
                <th>Gouvernorat</th>
              
            </tr>
            <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des etablissements
                $req = pg_query($con , "SELECT * FROM etablissement");
                if(!$req) {
                    //s'il n'existe pas d'établissements dans la base de donné , alors on affiche ce message :
                echo "Il n'y a pas encore d'établissements ajouter !" ;
                    
                }else {
                    //si non , affichons la liste de tous les établissements
                    while($row=pg_fetch_assoc($req)){
                        ?>
                        <tr>
                            <td><?=$row['id']?></td>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['type']?></td>
                            <td><?=$row['gouvernorat']?></td>
                           
                            <!--Nous alons mettre l'id de chaque ressource dans ce lien -->
                            <td><a href="modifierEtablissemnt.php?id=<?=$row['id']?>">"><img src="/images/pen.png"></a></td>
                            <td><a href="supprimerEtablissement.php?id=<?=$row['id']?>"><img src="/images/trash.png"></a></td>
                        </tr>
                        <?php
                    }
                    
                }
            ?>
      
         
        </table>
   
   
   
   
    </div>
    
</body>


<footer>
<div>

    <label>support</label><br>
    <label>Copyright</label><br>
</div>
</footer>
</html>