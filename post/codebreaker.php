<?php
require "../lib/game.inc.php";
require "../lib/Codebreakers/CodebreakController.php";
$controller = new CodebreakController($game,$_POST);

$page = $controller->getPage();
header("location: $page");
exit;