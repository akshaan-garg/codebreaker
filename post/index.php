<?php
require "../lib/game.inc.php";

$game->setName($_POST["name"]);

if (empty($game->getName()))
{
    header("location: ../index.php");
}
else
{
    header("location: ../codebreaker.php");
}
