<?php

$Note = new NoteController();
[$notes, $seuil, $moyenne] = $Note->getAllNotes();

?>
<?php $title = "note" ?>
<?php ob_start(); ?>

<div class="container p-2 mt-5">
    <h1 class="fs-1 fw-bold mt-5 mb-5 text-center" style="color:var(--main-color);">Notes</h1>
    <div class="row m-0 container-fluid">
        <div class="col-4 col-lg-4 offset-lg-2 bg-light bdr ps-3">Matière</div>
        <div class="col-4 col-lg-2 text-center bg-light bdr">Note</div>
        <div class="col-4 col-lg-2 text-center bg-light bdr">Décision</div>
    </div>
    <div class="row m-0 container-fluid">
        <?php foreach ($notes as $note) { ?>
            <div class="col-4 col-lg-4 offset-lg-2 bdr ps-3"><?= $note['module_name'] ?></div>
            <div class="col-4 col-lg-2 text-center bdr"><?= $note['note_value'] ?></div>
            <?php if ($note['note_value'] >= $seuil) { ?>
                <div class="col-4 col-lg-2 text-center bdr" style="background-color: #5ced73;">V</div>
            <?php } else if ($note['note_value'] == null) { ?>
                <div class="col-4 col-lg-2 text-center bdr"></div>
            <?php } else { ?>
                <div class="col-4 col-lg-2 text-center bdr" style="background-color: #ce0000ad; color:white;">NV</div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="row ms-0 me-0 mb-5 container-fluid">
        <div class="col-4 col-lg-4 offset-lg-2 font-weight-bold bdr ps-3">Moyenne</div>
        <div class="col-4 col-lg-2 text-center bdr">
            <?= $moyenne ?></div>
        <?php if ($moyenne >= 10) { ?>
            <div class="col-4 col-lg-2 text-center bdr" style="background-color: #5ced73;">V</div>
        <?php } else if ($moyenne == null) { ?>
            <div class="col-4 col-lg-2 text-center bdr"></div>
        <?php } else { ?>
            <div class="col-4 col-lg-2 text-center bdr" style="background-color: #ce0000ad; color:white;">NV</div>
        <?php } ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php include('views/includes/layout.php'); ?>