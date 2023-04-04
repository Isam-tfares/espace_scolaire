<?php

$Prof=new EtudiantController();
$profs=$Prof->getAllProf();

$modul=new ModuleController();
$modules=$modul->getAllModulle();

$modul->ajouterModule();
$modul->deleteModule();

?>
<?php $title="module"?>
<?php ob_start();?>

<div class="container">
<div class="modal" id="myModal2">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-light">
        <h4 class="modal-title h6">ajouter du module</h4>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form method="post"mt-2">
                 <input type="text" class="form-control mt-2" name="module_name" placeholder="le nom du module" required> 
                 <input type="hidden" name="class_id" value="<?php echo $_SESSION['class_id'];?>"> 
                 <select class="form-control my-4" name="select" class="mt-2" required>
                <option selected disabled>responsable du cour</option>
                <?php foreach($profs as $prof){?>
                <option value="<?= $prof['user_id'];?>">
                <?= $prof['fullname'];?>
                </option>
                <?php } ?>
               </select>
               <button type="submit" name="ajouter" class="form-control bg-info text-white"><i class="fas fa-plus"></i></button>
                
        </form>
      </div>
    </div>
  </div>
 </div>

<div class="container">
<div class="row d-flex justify-content-center">
<div class="col-md-6">
     <div class="card bg-white my-5">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-center">
                <img src="file/cour.png" alt="">
            </div>
            <a href="class" class="btn btn-info text-white btn-sm"><i class="fa-solid fa-right-left"></i></a>    
            <button class="form-control bg-info text-white mt-2" data-bs-toggle="modal" data-bs-target="#myModal2" title="ajoute du module"><i class="fas fa-plus p-1"></i></button>
        </div>
        <div class="card-body">
           <table class="table">
            <thead class="bg-light text-primary">
                <tr>
                    <td class="h6">Module</td>
                    <td class="h6">edit</td>
                    <td class="h6 text-center">delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($modules as $module){?>
                 <tr>
                    <td class="h6"><?php echo $module['module_name']?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="module_id" value="<?= $module['module_id']; ?>">
                            <button type="submit" name="submit" class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form  method="post">
                            <input type="hidden" name="module_id" value="<?= $module['module_id']; ?>">
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
<?php $content=ob_get_clean();?>
<?php include('views/includes/layout.php'); ?>