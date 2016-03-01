<?php 
require_once('lib/helpers/visits-setup.inc.php');
$gateway = new ContinentsTableGateway($dbAdapter);
$results = getAllContinentsAndCodes();
echo json_encode($results);
?>