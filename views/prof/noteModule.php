<?php

$etudaint = new EtudiantController();
$students = $etudaint->getAllEtudiantDeclass();

// $Note = new NoteController();
// $Note->enregistrerNote();

// $Note = new NoteController();
// $Note->suprimerNote();
$title = 'Gestion du notes';
?>
<?php ob_start() ?>
<div class="container">
    <div class="row d-flex justify-content-center margin-top">
        <div class="col-md-7">
            <div class="card bg-white my-5">
                <div class="card-header bg-white d-flex justify-content-center">
                    <img src="file/notes.jpg" alt="">
                </div>
                <div class="card-body">
                    <div style="overflow-x:auto">
                        <table class="table">
                            <thead class="bg-light text-primary">
                                <tr>
                                    <td class="h6">Etudaint</td>
                                    <td class="h6 ">Note</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $Etudaint) { ?>
                                    <tr class="align-items-center">
                                        <td class="h6"><?php echo $Etudaint['fullname'] ?></td>

                                        <td class=" d-flex justify-content-start">
                                            <form action="AddNote" method="post">
                                                <input type="text" name="note" class="text-center btn btn-sm border-secondary" value="<?php if (!empty($Etudaint['note'])) {
                                                                                                                                            echo $Etudaint['note'];
                                                                                                                                        } ?>" required>
                                                <input type="hidden" name="student_id" value="<?php echo $Etudaint['user_id']; ?>">
                                                <input type="hidden" name="module" value="<?= $_POST['id'] ?>">
                                                <button type="submit" name="ajouter" class="btn btn-primary mx-2"><?php echo (empty($Etudaint['note']) ? 'Ajouter' : 'Modifier') ?></button>

                                            </form>
                                            <form action="deleteNote" method="post">
                                                <input type="hidden" name="student_id" value="<?php echo $Etudaint['user_id']; ?>">
                                                <input type="hidden" name="module" value="<?= $_POST['id'] ?>">
                                                <button type="submit" name="suprimer" class="btn btn-danger mx-2" title="suprimer">Supprimer</button>
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
</div>
<?php $content = ob_get_clean(); ?>
<?php
include('views/includes/layout.php');
?>