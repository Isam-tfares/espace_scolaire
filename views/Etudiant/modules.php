<?php
$module = new ModuleController();
$modules = $module->getModulesOfUser();

?>
<?php $title = "Modules" ?>
<?php ob_start(); ?>
<div class="container">

    <div class="row justify-content-center text-center" style="margin-top: 100px;">
        <?php foreach ($modules as $module) {
        ?>
            <div class="col-lg-3 col-md-4 col-10 m-2 py-5 px-2 bg-light">
                <h4><?= $module['module_name'] ?></h4>
                <h5><?= $module['prof_name'] ?></h5>
                <form action="module" method="post" class="py-0 border-bottom">
                    <input type="hidden" name="id" value="<?= $module['module_id'] ?>">
                    <button class="bg-transparent border-0 py-2 my-1 text-primary" name="module" type="submit">
                        See it
                    </button>
                </form>
            </div>
        <?php } ?>

    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php include('views/includes/layout.php'); ?>