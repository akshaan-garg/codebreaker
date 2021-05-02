<?php
require "Codebreakers/Codebreakers.php";
require "Codebreakers/Codes.php";
session_start();

define("CODEBREAK_SESSION", "codebreaker");

if(!isset($_SESSION[CODEBREAK_SESSION])) {
    $codes = new Codes();
    $code = $codes->getCode();
    $_SESSION[CODEBREAK_SESSION] = new Codebreakers($code);
}

$game = $_SESSION[CODEBREAK_SESSION];
