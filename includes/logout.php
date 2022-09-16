<?php
include_once 'sesiones.php';

$userSession= new UserSession();
$userSession->closeSession();

header ("location: ../index.php");

?>