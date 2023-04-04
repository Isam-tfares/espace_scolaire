<?php $title = "Modules" ?>
<?php ob_start(); ?>
<div class="container">
    <div class="container p-2 mt-3">

        <h2 class="text-center text-white mb-3">Contact Page</h2>
        <div>
            <?php if (isset($isSended)) {
                if ($isSended) { ?>
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
        <form class="container bg-light py-5 px-3 mb-5" action="index.php?action=contact" method="POST">

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