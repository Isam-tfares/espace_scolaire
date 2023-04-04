<?php

require_once('./autoload.php');
require_once('controllers/HomeController.php');
$Home = new HomeController();
if (isset($_GET['page'])) {
  $Home->index($_GET['page']);
} else {
  $Home->index('login');
}
