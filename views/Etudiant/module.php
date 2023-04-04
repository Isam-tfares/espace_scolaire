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
                                    </div>
                                <?php }
                            } else { ?>
                                <div>Aucun devoir a afficher</div>
                            <?php } ?>
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
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>
                                <div>
                                    Aucun fichier a afficher
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>

<?php require('views/includes/layout.php');
