<?php
//Developper par FreeCode.
//Notre chaine est sur Youtube, vous ave juste a chercher FreeCode.
//Contacter nous par Email, notre email: ufreecode@gmail.com

include 'entete.php';
    $query = "SELECT * FROM candidat";
    $statement = $connect->prepare($query);
    $statement->execute();
?>
<h3 class="alert alert-info">Resultat de l'élection -- election toujours en cour</h3>

<table class="table table-bordered table-striped">
    <thead>
        <th>#</th>
        <th>Candidat</th>
        <th>Nombre de vote obtenue</th>
    </thead>
    <tbody>
        <?php
            foreach($statement->fetchAll() as $candidat){?>
            <tr>
                <td></td>
                <td> <?= $candidat['nom']?> </td>
            
            <?php
                $sub_query = "SELECT * FROM vote WHERE candidat_id = ?";
                $sub_statement= $connect->prepare($sub_query);
                $sub_statement->execute(array($candidat['id']));
                echo '<td>'.$sub_statement->rowCount().'</td>';
            ?>
            </tr>
            <?php }
        ?>

    </tbody>
</table>