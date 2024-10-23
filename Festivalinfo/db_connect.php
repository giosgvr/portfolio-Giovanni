<?php

require_once 'database_class.php';

$host = "localhost";
$user = "postgres";
$pass = "password";
$dbname = "festivalinfo";

$db = new PdoDatabase($host, $user, $pass, $dbname);
