<?php 
//Developper par FreeCode.
//Notre chaine est sur Youtube, vous ave juste a chercher FreeCode.
//Contacter nous par Email, notre email: ufreecode@gmail.com

    include 'entete.php';
    //Script de vote
    if(isset($_POST['btn_vote'])){
        
        $candidat_id = $_POST['candidat_id'];
        $date = date('y-m-d h:i:s');
        //verifier qu'un votant a deja voté ou pas

        $query = "SELECT votant_id FROM vote WHERE votant_id=?";
        $statement = $connect->prepare($query);
        $statement->execute(array($_SESSION['id']));
        if($statement->rowCount() >= 1){
            echo 'Vous avez deja voté';
        }else{
            $query = "INSERT INTO vote(votant_id, candidat_id, date_vote) VALUES (?,?,?)";
        $statement = $connect->prepare($query);
        $statement->execute(array($_SESSION['id'],$candidat_id, $date));
            echo 'Vote Enregistré';
        }
        
    }
    $query = "SELECT * FROM candidat";
           $statement = $connect->prepare($query);
           $statement->execute();

           
?>
    <h2>Liste des candidats</h2>
      <?php
            if(isset($_SESSION['id'])){?> <a href="resultat.php" class="btn btn-info btn-sm">Resultat election</a> </p> <?php }else{?>
                <p class="alert alert-danger">Vous ne pourrez voter que lorsque vous serez connecté
             <?php } ?>
    <div class="card">
     <div class="list-group list-group-flush">
       <?php foreach($statement->fetchAll() as $candidat){
           
             if(isset($_SESSION['id']))
             {
                 $query = "SELECT votant_id FROM vote WHERE votant_id=?";
                $statement = $connect->prepare($query);
                $statement->execute(array($_SESSION['id']));
                if($statement->rowCount() >= 1){
                    $vote_btn = '
                    <div class="text text-right text-danger"> Vous avez deja Voté</div>
                    ';}else{
                    $vote_btn = '
                    <form action="" method="post" class="float-right text-right">
                        <input type="hidden" name="candidat_id" class="text" value="'.$candidat['id'].'">
                        <button type="submit" name="btn_vote" class="btn btn-info" >Voter</button>
                    </form>
                    ';  
                    }
             }
                    
           ?>
        
        <div class="list-group-item">
            <h4><?= $candidat['nom'] ?> <?= $candidat['prenom'] ?></h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <p></p>
           <?php
            if(isset($_SESSION['id'])){ echo $vote_btn; }
           ?>
        </div>
        
       <?php } ?>
    </div>
    </div>
</div>
</body>
</html>
