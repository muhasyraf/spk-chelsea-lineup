<?php
include_once('class/login.php');
$logout = new login($email, $password);
$logout->doLogout();
