<?php
// Laragon
require($_SERVER['DOCUMENT_ROOT'] . '/configuration/session.php');
require($_SERVER['DOCUMENT_ROOT'] . '/controller/AuthController.php');
// XAMPP
// require($_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/configuration/session.php');
// require($_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/controller/AuthController.php');
$auth = new AuthController();
$auth->AuthCheck('location:../login', 'location:dashboard');
