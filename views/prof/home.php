<?php $title = "Accueil"; ?>

<?php ob_start(); ?>
<div class="main mt-5">
    <div class="row mt-0">
        <div class="offset-md-1 col-md-6 p-0 pe-2">
            <div class="main-text text-center text-md-start p-0" style="color: #0B2840;">
                <h3 class="mb-4 fw-bold"> Bienvenue sur notre plateforme scolaire !</h3>
                <p class="m-0 w-md-75 p-md-0 ps-5 pe-5 pe-lg-5 fw-normal fs-5">
                    Notre site web offre une variété de fonctionnalités pour vous aider à gérer efficacement vos cours, tels que la publication de cours, la communication avec les étudiants et la gestion des tâches et des notes.
                </p>
            </div>
        </div>
        <div class="img col-md-5 p-0 mt-5 me-0" style="z-index: 1;">
            <img src="./assets/student.png" class="img-fluid ms-auto me-auto d-none d-md-block me-0" alt="">
        </div>
    </div>
    <div class="custom-shape-divider-bottom-1678992685">
        <svg data-name="Layer 1" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
        </svg>
    </div>
</div>
<div class="blocks mt-5">
    <div class="heading text-center mb-5">
        <h2 class="fs-1 fw-bold">Prof Center</h2>
    </div>
    <div class="row">
        <div class="col-xl-2 col-md-4 col-8 offset-2 offset-md-1 offset-xl-2 actv d-flex justify-content-center text-center rounded mb-5">
            <a href="showProfile" class="text-decoration-none my-auto" style="color: #0B2840;">
                <div class="block my-auto">
                    <div class="icon mb-3"><i class="fa-solid fa-user fs-3"></i></div>
                    <div class="block-text">
                        <h3 class="fw-bold fs-4">Profile</h3>
                        <p>Vos informations</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-md-4 col-8 offset-2 offset-md-2 offset-xl-1 actv d-flex justify-content-center text-center rounded mb-5 ">
            <a href="modules" class="text-decoration-none my-auto" style="color: #0B2840;">
                <div class="block my-auto">
                    <div class="icon mb-3"><i class="fa-solid fa-book fs-3"></i></div>
                    <div class="block-text">
                        <h3 class="fw-bold fs-4">Modules</h3>
                        <p>Accédez à vos leçons</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-md-4 col-8 offset-2 offset-md-1 offset-xl-1 actv d-flex justify-content-center text-center rounded mb-5">
            <a href="note" class="text-decoration-none my-auto" style="color: #0B2840;">
                <div class="block my-auto">
                    <div class="icon mb-3"><i class="fa-solid fa-note-sticky fs-3"></i></div>
                    <div class="block-text">
                        <h3 class="fw-bold fs-4">Espace d'affichage</h3>
                        <p>Connaissez vos notes</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-md-4 col-8 offset-2 offset-md-2 offset-xl-3 actv d-flex justify-content-center text-center rounded mb-5">
            <a href="messanger" class="text-decoration-none my-auto" style="color: #0B2840;">
                <div class="block my-auto">
                    <div class="icon mb-3"><i class="fa-sharp fa-solid fa-comment fs-3"></i></div>
                    <div class="block-text">
                        <h3 class="fw-bold fs-4">Messager</h3>
                        <p>Rapprochez-vous de votres collégues</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-2 col-md-4 col-8 offset-2 offset-md-4 offset-xl-2 actv d-flex justify-content-center text-center rounded mb-5">
            <a href="contact" class="text-decoration-none my-auto" style="color: #0B2840;">
                <div class="block my-auto">
                    <div class="icon mb-3"><i class="fa-solid fa-message fs-3"></i></div>
                    <div class="block-text">
                        <h3 class="fw-bold fs-4">Contact</h3>
                        <p>Services administratifs</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('views/includes/layout.php') ?>