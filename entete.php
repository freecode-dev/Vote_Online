<?php
//Developper par FreeCode.
//Notre chaine est sur Youtube, vous ave juste a chercher FreeCode.
//Contacter nous par Email, notre email: ufreecode@gmail.com

    include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    
    <title>FreeCode - Election en ligne</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script src="dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="design_general">
    <nav>
        <ul>
            <li> <a href="#" class="active__selected">FreeCode Election- App</a> </li>
            <li> <a href="index.php">Accueil</a> </li>
            <?php
                if(isset($_SESSION['id'])){?>
                  <li><a href="profil.php">Profil</a></li>
             <?php }else{?>
                      <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
                <?php }
            ?>
          
        </ul>
    </nav>




    <style>
    .design_general
    {
        margin-left:10%;
        margin-right: 10%;
        padding:2rem;
    }
    nav
    {
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
        border-radius: 5px;
    }
    ul{ 
        display:flex;
        flex-direction: row;
    }
    li{
        margin-left:30px;
        list-style:none;
    }
    li a{
        color:#000;
        text-decoration:none;
        transition:0.5s all;
    }

    li a:hover{
        color:orange;
        font-size: 15px;
        box-shadow: 0 0 8px #D0D0D0;
        padding:2rem;
    }
    ul li a.active__selected{
        color:orange;
    }
    .formulaire{
        width:500px;
        margin-top:50px;
        margin-left: -20%;
         box-shadow: 0 0 8px #D0D0D0;
        height:auto;
        padding:2rem;
    }
    /*
    .formulaire input{
        width:400px;
        height:25px;
        outline:none;
    
    }*/
    /**
    *Design de l'espace des candidats
     */
     .candidat__box{
         margin-left:20px;
         padding:1rem;
         transition:0.5s all;
     }
     .candidat__box:hover{

         box-shadow: 0 0 8px #D0D0D0; 
         cursor:pointer;
          transition:0.5s all;
          transform: scale(1)
     }
     #vote_button{
         background : purple;
         padding:.2rem;
         border-radius:5px;
         color: #fff;
     }
     #vote_button:hover{
         background : #fff;
         color: purple;
         cursor : pointer;
     }
</style>