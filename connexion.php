<?php
//Developper par FreeCode.
//Notre chaine est sur Youtube, vous ave juste a chercher FreeCode.
//Contacter nous par Email, notre email: ufreecode@gmail.com
//Besoin d'aide pour un projet? Nous sommes là pour vous.
    include 'entete.php';
     if(isset($_SESSION['id']))
    {
        header('location:profil.php');
    }
    
    if(isset($_POST['verifier']))
    {
       $nom = $_POST['nom'];
       $mdp = $_POST['mdp'];
       if(!empty($mdp) AND !empty($nom))
       {
           //comparer les informations entree a celle de la base de donnée

           $query = "SELECT * FROM votant WHERE nom= ? AND motdepasse=?";
           $statement = $connect->prepare($query);
           $statement->execute(array($nom, sha1($mdp)));
           //retour d'information
           //Comparer le resultat trouvé
           if($statement->rowCount() >= 1  )
           {
               //Garde les informations en memoire || La variable de session
               //Les boucles
               foreach($statement->fetchAll() as $recuperation)
               {
                   $_SESSION['id'] = $recuperation['id'];
                   $_SESSION['nom'] = $recuperation['nom'];
                   $_SESSION['prenom'] = $recuperation['prenom'];
                   //rediriger || header
                   header('location:profil.php');
               }

           }
           else
           {
               $msg_error = 'Votant n\'existe pas';
           }

       }
       else
       {
            $msg_error = ' Veuillez saisir vos identifiants';
       }
    }
?>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
    <div class="formulaire">
    <h3>Connecter vous</h3>
    <div class="formulaire__inscription">
       <?php
            if(isset($msg_error))
            {?>
                <div class="alert alert-danger"><?= $msg_error?></div>
             <?php 
        }
    ?>
        <form action="" method="post">
                 <div class="form-group">
                 <label for="">Nom</label>
                 <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom">
                 </div>
                 <div class="form-group">
                     <label for="">Mot de passe</label>
                  <input type="password" class="form-control" name="mdp" placeholder="Entrer votre nom">
                 </div>
                   <div class="form-group">
                   <input type="submit" class="btn btn-info btn-sm" name="verifier" value="Me Connecter">
                   </div>
        </form>
    </div>
</div>
</div>
    <div class="col-md-4"></div>
</div>