<?php
$sendMessage = new MessangerController();
$sendMessage->AddMessageToMessanger();
$sendMessage->DeleteMessage();
$title = "messanger";
$message = new  MessangerController();
[$user, $messages] = $message->MessangerWith($_POST['id']);

$messageAncien = "";
?>

<?php ob_start(); ?>

<div class="container p-2 mt-3">

    <div class="container pt-5">

        <div class="bg-white p-3">
            <div class="text-center mb-5"><img style="width: 100px;height:100px" class="rounded-circle my-2 mx-auto" src="./assets/imgsProfile/<?= $user['img'] ?>" alt="sss">
                <h5><?= $user['fullname'] ?></h5>
                <h5 class="text-secondary"><?php
                                            if (isset($user['departement_name'])) {
                                                echo "Departement " . $user['departement_name'];
                                            } else {
                                                echo $user['class_name'];
                                            } ?>
                </h5>
            </div>

            <div style="height:300px " class="overflow-auto" id="messageBody">
                <?php foreach ($messages as $message) { ?>
                    <div class="w-75 mx-auto   p-3">
                        <span class="m-3 d-block text-center font-weight-light text-secondary"> <?= $message['message_time'] ?></span>
                        <div class="row align-items-center">

                            <?php if ($message['message_sender'] == $_SESSION['user_info']['user_id']) {
                                if ($messageAncien == "" || $messageAncien != "me") { ?>
                                    <div class="col-lg-1 col-sm-2 col-3">
                                        <img style="width: 40px;height: 40px" class="rounded-circle my-2 mx-auto" src="./assets/imgsProfile/<?= $_SESSION['user_info']['img'] ?>" alt="sss">
                                    </div>
                                <?php } else {
                                    echo "<div class='col-lg-1 col-sm-2 col-3'></div>";
                                }
                                ?>

                                <div class="col bg-primary rounded-pill py-2">
                                    <p class="text-white px-2 "><?= $message['message_content'] ?></p>

                                </div>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                                    <input type="hidden" name="message_id" value="<?= $message['message_id'] ?>">
                                    <button class="btn btn-white" name="deleteMessage" type="submit"> <i class="text-danger bi bi-trash cursor-pointer"></i> </button>
                                </form>
                                <div class="col-md-4"></div>
                            <?php $messageAncien = "me";
                            } else { ?>

                                <div class="col-md-4"></div>
                                <div class="col bg-light rounded-pill p-2">
                                    <p class="text-secondary px-2"><?= $message['message_content'] ?></p>

                                </div>

                                <?php if ($messageAncien == "" || $messageAncien == "me") { ?>
                                    <div class="col-lg-1 col-sm-2 col-3">
                                        <img style="width: 40px;height: 40px" class="rounded-circle my-2 mx-auto" src="./assets/imgsProfile/<?= $user['img'] ?>" alt="sss">
                                    </div>
                                <?php $messageAncien = "other";
                                } else {
                                    echo "<div class='col-lg-1 col-sm-2 col-3'></div>";
                                }

                                ?>

                            <?php } ?>

                        </div>

                    </div>
                <?php } ?>
            </div>
            <div class="w-75 mx-auto my-2">
                <form method="post">
                    <input type="hidden" name="id" value="<?= $user['user_id'] ?>">
                    <input type="hidden" name="receptor" value="<?= $user['user_id'] ?>">
                    <div class="row mb-4">
                        <div class="col-8">
                            <div class="form-outline  ">
                                <input type="text" id="addMessage" class="form-control bg-light rounded-pill py-3" style="border: 0 ;box-shadow: none;" placeholder="Aa" name="messageContent" required />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <button class="btn btn-white" name="sendMessage" type="submit"><i class="bi bi-send-fill text-primary"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('views/includes/layout.php');
