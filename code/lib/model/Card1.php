<?php 
require_once('lib/helpers/visits-setup.inc.php');
$gateway = new VisitsTableGateway($dbAdapter);
$results = getAllCount();
echo json_encode($results);
?>
<?php 
require_once('lib/helpers/visits-setup.inc.php');
$gateway = new VisitsTableGateway($dbAdapter);
$results = getAllCount();
echo json_encode($results);
?>