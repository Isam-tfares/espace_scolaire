<?php
$class=new ClassController();

$class->deleteClass();
$class->ajouterClass();

$classes=$class->getAllClasses();
?>
<?php ob_start()?>
<div class="container">
<div class="row d-flex justify-content-center">
    <div class="col-md-6">
        <div class="card bg-white my-5">
            <div class="card-header bg-white">
                <div class="d-flex justify-content-center">
                    <img src="file/class.jpg" alt="">
                </div>
                <a href="filliere" class="btn btn-info text-white btn-sm"><i class="fa-solid fa-right-left"></i></a>
                    <form method="post" class="d-flex flex-row align-items-baseline mt-2">
                        <button type="submit" name="ajouter" class="btn btn-info p-2 text-white btn-sm mb-2"><i class="fas fa-plus"></i></button>
                        <input type="text" class="form-control" name="class_name" placeholder="nom de la class" required>
                        <input type="hidden" name="filliere_id" value="<?= $_SESSION['filliere_id'];?>">
                    </form>
        </div>
        <div class="card-body">
           <table class="table">
            <thead class="bg-light text-primary">
                <tr>
                    <td class="h6">Class</td>
                    <td class="h6">modules</td>
                    <td class="h6">etudiants</td>
                    <td class="text-center h6">delete</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($classes as $classe){?>
                 <tr>
                    <td class="h6"><?php echo $classe['class_name']?></td>
                    <td>
                       <form action="module" method="post">
                            <input type="hidden" name="class_id" value="<?= $classe['class_id']; ?>">
                            <button type="submit" name="submit"  class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                       </form>
                    </td>
                    <td>
                        <form action="etudiant" method="post">
                            <input type="hidden" name="class_id" value="<?= $classe['class_id']; ?>">
                            <button type="submit" name="submit"  class="btn text-dark btn-sm" style="background-color:lightgrey;border-radius:50%;"><i class="fas fa-edit"></i></button>
                        </form>
                    </td>
                    <td class="text-center">
                        <form method="post">
                            <input type="hidden" name="class_id" value="<?php echo $classe['class_id']; ?>">
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