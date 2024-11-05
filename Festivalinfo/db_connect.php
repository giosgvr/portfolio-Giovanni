<?php

require_once 'database_class.php';

$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "festivalinfo";

$db = new PdoDatabase($host, $user, $pass, $dbname);
