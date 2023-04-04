<?php

$departs=new DepartementController();
$departements=$departs->getAllDepartement();

$departs->ajouterDepartement();

$departs->deleteDepartement();



?>
<?php ob_start()?>
<div class="container">
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
     <div class="card bg-white my-5">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-center">
                <img src="file/admin.jpg" alt="">
            </div>
            <form method="post" class="d-flex flex-row align-items-baseline">
                <button type="submit" name="ajouter" class="btn btn-info p-2 text-white btn-sm mb-2"><i class="fas fa-plus"></i></button>
                <input type="text" class="form-control" name="departement_name" placeholder="nom de la departement" required>
                
            </form>
        </div>
        <div class="card-body d-flex justify-content-center">
           <table class="table">
            <thead class="bg-light text-primary">
                <tr>
                    <td class="h6">Departement</td>
                    <td class="h6">les profs</td>
                    <td class="h6">les fillieres</td>
                    <td class="h6">delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($departements as $departement){?>
                 <tr>
                    <td class="h6"><?php echo $departement['departement_name']?></td>
                    <td>
                        <form action="prof" method="post">
                            <input type="hidden" name="departement_id" value="<?= $departement['departement_id']; ?>">
                            <button type="submit" name="submit" class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                        </form>
                      </td>
                      <td>
                        <form action="filliere" method="post">
                            <input type="hidden" name="departement_id" value="<?= $departement['departement_id']; ?>">
                            <button type="submit" name="submit"  class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                        </form>
                        </td>
                        <td>
                        <form method="post" action="">
                            <input type="hidden" name="departement_id" value="<?= $departement['departement_id']; ?>">
                            <button type="submit" name="delete" class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
           </table>
        </div>
        <div class="card-header">
        </div>
     </div>
    </div>

</div>
</div>
<?php $content=ob_get_clean();?>
<?php
include('views/includes/layout.php');
?>