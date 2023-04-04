<?php

$etudaint=new EtudiantController();
$etudiantes=$etudaint->getAllEtudiant();

$etudaint->ajouterEtudiant();
$etudaint->deleteEUser();
?>
<?php ob_start()?>
<div class="container">
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
     <div class="card bg-white my-5">
        <div class="card-header bg-white">
            <div class="d-flex  justify-content-center">
                <img src="file/etudaints.jpg" alt="">
            </div>
            <a href="class" class="btn btn-info text-white btn-sm"><i class="fa-solid fa-right-left"></i></a>    
            <form method="post" class="d-flex flex-row align-items-baseline mt-2">
                    <button type="submit" name="ajouter" class="btn btn-info p-2 text-white mb-2"><i class="fas fa-plus"></i></button>
                    <input type="text" class="form-control" name="fullname" placeholder="le nom complet d'etudiant" required>
                    <input type="hidden" name="class_id" value="<?php echo $_SESSION['class_id'];?>">
                </form>
            </div>
        <div class="card-body">
           <table class="table">
            <thead class="bg-light text-primary">
                <tr>
                    <td class="h6">Etudaint</td>
                    <td class="h6">edit</td>
                    <td class="text-center h6">delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($etudiantes as $Etudaint){?>
                 <tr>
                    <td class="h6"><?php echo $Etudaint['fullname']?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="user_id" value="<?= $Etudaint['user_id']; ?>">
                            <button type="submit" name="submit" class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                        </form>
                        </td>
                        <td class="text-center">
                        <form action="" method="post">
                            <input type="hidden" name="user_id" value="<?= $Etudaint['user_id']; ?>">
                            <button type="submit" name="suprimer" class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
           </table>
        </div>
     </div>
    </div>
</div>
</div>
<?php $content=ob_get_clean();?>
<?php
include('views/includes/layout.php');
?>