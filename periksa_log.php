<?php

include_once('class/login.php');

$email = $_POST['email'];
$pass = ($_POST['password']);

$login = new login($email, $pass);
$login->validasi();
