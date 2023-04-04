<?php

$Prof=new EtudiantController();
$profes=$Prof->getAllProf();

$Prof->ajouterProf();

$Prof->deleteEUser();

?>
<?php ob_start()?>
<div class="container">
<div class="row d-flex justify-content-center">
<div class="col-md-6">
     <div class="card bg-white my-5">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-center">
              <img src="file/profs.jpg" alt="">
          </div>
      <form method="post" class="d-flex flex-row align-items-baseline mt-2">
          <button type="submit" name="ajouterprof" class="btn btn-info p-2 text-white btn-sm mb-2"><i class="fas fa-plus"></i></button>
          <input type="text" class="form-control" name="fullname" placeholder="le nom du proffesseur" required>  
          <input type="hidden" name="departement_id" value="<?php echo $_SESSION['departement_id'];?>">          </form>
        </div>
        <div class="card-body">
           <table class="table">
            <thead class="bg-light text-primary">
                <tr>
                    <td class="h6">professeur</td>
                    <td class="h6">edit</td>
                    <td class="text-center h6">delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($profes as $prof){?>
                 <tr>
                    <td class="h6"><?php echo $prof['fullname']?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="user_id" value="<?= $prof['user_id']; ?>">
                            <button type="submit" name="submit" class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                        </form>
                        </td>
                        <td class="text-center">
                        <form  method="post">
                            <input type="hidden" name="user_id" value="<?= $prof['user_id']; ?>">
                            <button type="submit" name="suprimer"  class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-trash"></i></button>
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