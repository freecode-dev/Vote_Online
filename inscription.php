<?php
//Developper par FreeCode.
//Notre chaine est sur Youtube, vous ave juste a chercher FreeCode.
//Contacter nous par Email, notre email: ufreecode@gmail.com
    include 'entete.php';
    if(isset($_SESSION['id']))
    {
        header('location:profil.php');
    }
    if(isset($_POST['envoyer']))
    {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mdp = $_POST['mdp'];
        $mdp1 = $_POST['mdp1'];
        //Verifier que l'utilisateur a rempli tous les champs
        if(!empty($nom) AND !empty($prenom) AND !empty($mdp) AND !empty($mdp1))
        {
            //Executer le code ci dessous si les champs sont tous remplis
            
            if($mdp == $mdp1)
            {
                $query = "INSERT INTO votant(nom, prenom, motdepasse) VALUES (?,?,?)";
            $execution = $connect->prepare($query);
            $execution->execute(array($nom, $prenom, sha1($mdp)));
            $msg_success = 'Votre compte a été crée!';
            }
            else
            {
                $msg_error = 'Vos mot de passe ne concordent pas';
            }
        }
        else
        {
            $msg_error = 'Veuillez remplir tous les champs';
        }
    }
?>

<div class="row mt-5">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="formulaire shadow p-2">
    <center>Inscrivez vous pour voter</center>
    <?php
        if(isset($msg_error))
            {?>
                <div class="alert alert-danger"><?= $msg_error?></div>
             <?php }elseif(isset($msg_success)){
                 echo '<div class="alert alert-success">'.$msg_success.'</div>';
             }
        
    ?>
    <div class="formulaire__inscription ">
        <form action="" method="post">
            <div class="form-group">
                <label for="">Nom</label>                    
                <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom">
            </div>
            <div class="form-group">
                <label for="">prenom</label>
                <input type="text" class="form-control" name="prenom" placeholder="Entrer votre nom">
            </div>
            <div class="form-group">
                <label for="">Mot de passe</label>        
                <input type="password" class="form-control" name="mdp" placeholder="Entrer votre nom">
            </div>
            <div class="form-group">
                <label for="">Confirmer Mot de passe</label>
                <input type="password" class="form-control" name="mdp1" placeholder="Entrer votre nom">
            </div>
                <div class="form-group">
                <input type="submit" class="btn btn-info btn-sm" name="envoyer" value="M'inscrire">
                </div>
            </table>
        </form>
    </div>
</div>
    </div>
    <div class="col-md-4"></div>
</div>