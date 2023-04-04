<?php
if (isset($_POST['submit'])) {
  $userConn = new EtudiantController();
  $userConn->userConn();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>acceuil</title>
  <link rel="stylesheet" href="style/bstrp.css" type="text/css">
  <link rel="stylesheet" href="style/css/all.css">
  <script src="style/bosstrap.js"></script>
  <style>
    .home {
      height: 90vh !important;
      background-image: url('file/ens.jpg');
      background-size: cover !important;
      background-position: center;
      background-repeat: no-repeat;
    }

    footer {
      height: 70vh;
    }

    li:hover {
      color: cyan
    }

    video {
      width: 100% !important;
      height: 100vh !important
    }
  </style>
</head>

<body style="background-color:white;">

  <section class="pt-2 d-flex align-items-center justify-content-center" style="height:200px">
    <button class="h6 btn btn-info text-white btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">
      connexion
    </button>
  </section>

  <div class="container bg-white my-5">
    <div class="home">

      <div class="modal" id="myModal">
        <div class="modal-dialog  modal-dialog-centered">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header d-inline" style="background-image:linear-gradient(blue,cyan);">
              <button type="button" class="btn-close bg-white float-end" data-bs-dismiss="modal"></button>
              <div class="container-fluid d-flex justify-content-center" style="height:100px;">
                <img src="file/users.jpg" style="width:150px;height:150px;;border-radius:50%;" alt="">
              </div>
            </div>

            <!-- Modal body -->
            <div class="modal-body mt-4">
              <div class="container">
                <form method="post">
                  <div class="form-group">
                    <label class="form-label h6" for="username">nom d'utilusateur </label>
                    <input class="form-control bg-light" type="text" name="username" id="username" placeholder="nom d'utilusateur" required>
                  </div>
                  <div class="form-group">
                    <label class="form-label h6" for="password">mot de pass: </label>
                    <input class="form-control bg-light" type="password" name="password_user" id="password" placeholder="mot de pass" required>
                  </div>
                  <button type="submit" class="form-control mt-4 btn btn-sm mb-2 text-white bg-info" name="submit">Connexion</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

</body>

</html>