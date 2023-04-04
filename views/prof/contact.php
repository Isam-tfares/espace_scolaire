<?php
if (isset($_POST['send'])) {
    $contact = new ContactController();
    $isSended = $contact->AddMessage();
}
?>
<?php $title = "Modules" ?>
<?php ob_start(); ?>
<div class="container margin-top">
    <div class="container p-2 mt-5" style="margin-top: 100px;">

        <h2 class="text-center text-dark mb-3">Contact Page</h2>
        <div>
            <?php if (isset($_POST['message'])) {
                if ($_POST['message'] == 'sended') { ?>
                    <div class="alert alert-success text-center" role="alert">
                        Votre message est envoyée avec succes
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger text-center" role="alert">
                        Il y'a u probleme Essayez de renvoyer votre message
                    </div>
            <?php }
            } ?>
        </div>
        <form action="AddMessageAdmin" class="container bg-light py-5 px-3 mb-5" method="POST">
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea style="height: 120px" type="text" class="form-control" name="message" id="message" aria-describedby="emailHelp" required><?php if (isset($message)) {
                                                                                                                                                        echo $message;
                                                                                                                                                    } ?></textarea>
            </div>

            <button type="submit" name="send" class="btn btn-primary">Envoyer</button>
        </form>
    </div>

</div>
<?php $content = ob_get_clean(); ?>
<?php include('views/includes/layout.php'); ?>