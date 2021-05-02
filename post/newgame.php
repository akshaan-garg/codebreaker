<?php
require "../lib/game.inc.php";
$name = $game->getName();
$codes = new Codes();
$code = $codes->getCode();
$_SESSION[CODEBREAK_SESSION] = new Codebreakers($code);
$game = $_SESSION[CODEBREAK_SESSION];
$game->setName($name);
header("location: ../codebreaker.php");
exit;
