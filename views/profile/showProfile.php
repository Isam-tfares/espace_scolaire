<?php $title = 'Profile' ?>
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


                        <input type="text" class="form-control bg-light mt-4" name="username" value="<?= $_SESSION['user_info']['username']; ?>" readonly>
                        <input type="text" class="form-control bg-light mt-4" name="fullname" value="<?= $_SESSION['user_info']['fullname']; ?>" readonly>
                        <input type="email" class="form-control bg-light mt-4" name="email" value="<?= $_SESSION['user_info']['email']; ?>" readonly>
                        <input type="text" class="form-control bg-light mt-4" name="password" value="<?= $_SESSION['user_info']['password_user']; ?>" placeholder="mot de pass" readonly>
                        <a class="btn btn-primary my-3" href="editProfile">Modifier profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include('views/includes/layout.php'); ?>