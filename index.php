<?php
require($_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/configuration/session.php');
require($_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/controller/AuthController.php');
$auth = new AuthController();
$auth->AuthCheck('location:login', 'location:administrator/dashboard');