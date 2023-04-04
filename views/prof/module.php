<?php
$title = "Module";
$module = new ModuleController();
[$module, $cours, $tasks] = $module->getModule($_POST['id']);
?>
<?php ob_start();
?>
<div class="container p-2 margin-top">
    <div class="my-5 mx-3">
        <h2 class="text-center"><?= $module['module_name'] ?></h2>
        <div>
            <?php if (isset($_POST['message']) && $_POST['message'] != null) {
                if ($_POST['message'][0] == 'I') { ?>
                    <div class=" w-75 my-3 mx-auto alert alert-danger text-center" role="alert">
                        <?= $_POST['message'] ?>
                    </div>

                <?php } else { ?>
                    <div class=" w-75 my-3 mx-auto alert alert-success text-center" role="alert">
                        <?= $_POST['message'] ?>
                    </div>
            <?php }
            }
            unset($_POST['message']);
            ?>
        </div>

        <div class="row">
            <div class="col-12  col-md-4 py-5">
                <div class="py-3 px-2 bg-light">
                    <div class="py-3 px-2">
                        <h5 class="text-center">Devoirs Et Nouveaux</h5>
                        <div class="py-4">
                            <?php
                            if (!empty($tasks)) {
                                foreach ($tasks as $key => $task) {
                                    $class = $key == '0' ? "position-relative py-3 px-2 border-top border-bottom border-dark" : "position-relative py-3 px-2 border-bottom border-dark";
                            ?>
                                    <div class="<?= $class ?>" style="border-width: 2px !important;">
                                        <div><?= $task['task_content'] ?></div>
                                        <div class="font-weight-light position-absolute bottom-0 end-0" style="font-size: 12px;"><?= $task['task_date'] ?></div>
                                        <span class="position-absolute top-0 end-0">
                                            <form action="deleteTask" method="post" class="">
                                                <input type="hidden" name="task_id" id="" value="<?= $task['task_id'] ?>">
                                                <button class="btn btn-link text-danger " type="submit" name="supprimer"><i class="bi bi-x-circle"></i></button>
                                                <input type="hidden" name="module" value="<?= $_POST['id'] ?>" id="">
                                            </form>
                                        </span>
                                    </div>
                                <?php }
                            } else { ?>
                                <div>Aucun devoir a afficher</div>
                            <?php } ?>


                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Ajouter Devoir
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter Devoir</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="addTask" method="post">
                                            <input type="hidden" name="module" value="<?= $_POST['id'] ?>">

                                            <div class="my-2"> <textarea class="form-control" name="name" id=""></textarea></div>
                                            <div class="my-2 w-25 "><input class="form-control btn btn-primary" type="submit" value="ajouter" name="ajouterTask" class="">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-12  col-md-8 py-5">
                <div class="py-3 px-2 bg-light">
                    <div class="py-3 px-2">
                        <h5 class="text-center">Cours</h5>
                        <div class="py-4 px-2">
                            <?php
                            if (!empty($cours)) {
                                foreach ($cours as $cour) { ?>
                                    <div class=" my-2 py-3 px-2 border border-primary border-3 row align-items-center" style="border-width: 2px !important;">
                                        <div class="col-1"><i class="bi bi-file-earmark-pdf-fill"></i></div>
                                        <div class="content position-relative col-11">
                                            <div class="fw-bold">
                                                <form class="col" action="<?php echo $cour["filename"]; ?>" method="get" target="_blank">
                                                    <button type="submit" class="btn btn-white">
                                                        <?php echo $cour["cour_name"]; ?>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="font-weight-light position-absolute bottom-0 end-0" style="font-size: 12px;"><?= $cour['date_pub'] ?></div>
                                            <span class="position-absolute " style="top: -35px;right: -29px;font-size:20px">
                                                <form action="deleteCour" method="post">
                                                    <input type="hidden" name="cour_id" id="" value="<?= $cour['cour_id'] ?>">
                                                    <button class="btn btn-link text-danger " type="submit" name="supprimer"><i class="bi bi-x-circle"></i></button>
                                                    <input type="hidden" name="module" value="<?= $_POST['id'] ?>" id="">
                                                </form>
                                            </span>
                                        </div>

                                    </div>
                                <?php }
                            } else { ?>
                                <div>
                                    Aucun fichier a afficher
                                </div>
                            <?php } ?>


                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrops">
                            Ajouter Cour
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrops" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter Cour</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="addCour" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="module" value="<?= $_POST['id'] ?>">
                                            <div class="my-2"><input class="form-control" type="text" name="name" id="" placeholder="titre du cours" required></div>
                                            <div class="my-2"><input class="form-control" type="file" name="file" id="" required></div>
                                            <div class="my-2 w-25"><input type="submit" value="ajouter" name="ajouterCour" class="btn btn-primary form-control"></div>
                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>



<?php $content = ob_get_clean(); ?>

<?php require('views/includes/layout.php');
