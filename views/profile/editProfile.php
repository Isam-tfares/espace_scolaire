<?php
$USER = new EtudiantController();
$USER->modifierInfoUser();

?>
<?php $title = 'Modifier Profile' ?>
<?php ob_start(); ?>
<div class="container my-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-center bg-white">
                    <img style="height:150px;width:150px;border-radius:50%;" src="./assets/imgsProfile/<?= $_SESSION['user_info']['img']; ?>" alt="">
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" class="form-control bg-light" value="" name="img">
                            <input type="text" class="form-control bg-light mt-4" name="username" value="<?= $_SESSION['user_info']['username']; ?>" required>
                            <input type="text" class="form-control bg-light mt-4" name="fullname" value="<?= $_SESSION['user_info']['fullname']; ?>" required>
                            <input type="email" class="form-control bg-light mt-4" name="email" value="<?= $_SESSION['user_info']['email']; ?>" required>
                            <input type="text" class="form-control bg-light mt-4" name="password" value="<?= $_SESSION['user_info']['password_user']; ?>" placeholder="mot de pass" required>
                            <button type="submit" name="modifier" class="form-control text-white bg-info mt-4">modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('views/includes/layout.php'); ?>