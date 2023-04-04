<?php

$fillier=new FilliereController();
$fillieres=$fillier->getAllFillere();

$fillier->ajouterFilliere();

$fillier->deleteFilliere();

?>
<?php ob_start()?>
<div class="container">
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
     <div class="card bg-white my-5">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-center">
              <img src="file/filliere.png" alt="">
            </div>
            <form method="post" class="d-flex flex-row align-items-baseline mt-2">
                <button type="submit" name="ajouter" class="btn btn-info p-2 text-white btn-sm mb-2"><i class="fas fa-plus"></i></button>
                 <input type="text" class="form-control" name="filliere_name" placeholder="nom de la filliere" required>
                 <input type="hidden" name="departement_id" value="<?php echo $_SESSION['departement_id'];?>">
            </form>
        </div>
        <div class="card-body  d-flex justify-content-center">
           <table class="table">
            <thead class="bg-light ">
                <tr>
                    <td class="h6">Filliere</td>
                    <td class="h6">classes</td>
                    <td class="text-center h6">delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($fillieres as $filliere){?>
                 <tr>
                    <td class="h6"><?php echo $filliere['filliere_name']?></td>
                    <td>
                        <form action="class" method="post">
                            <input type="hidden" name="filliere_id" value="<?= $filliere['filliere_id']; ?>">
                            <button type="submit" name="submit" class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form method="post">
                            <input type="hidden" name="filliere_id" value="<?= $filliere['filliere_id']; ?>">
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