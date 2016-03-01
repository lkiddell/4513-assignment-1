<!DOCTYPE html>
<?php
require_once('lib/helpers/visits-setup.inc.php');

$browserGateway = new BrowserTableGateway($dbAdapter);
$visitsGateway = new VisitsTableGateway($dbAdapter);
$continentGateway = new ContinentsTableGateway($dbAdapter); 
$deviceBrandGateway = new DeviceBrandTableGateway($dbAdapter);
$countriesGateway = new CountriesTableGateway($dbAdapter);
$allContinent = $continentGateway->findAll();
$allBrowser = $browserGateway->findAll();
$totalVisits = $visitsGateway->getAllCount();
$allDevices = $deviceBrandGateway->findAll();

 ?>

	<html>
	<!--CSS derives from material design lite CSS framework  https://www.getmdl.io/c-->

	<head>
		<link rel="stylesheet" href="//storage.googleapis.com/code.getmdl.io/1.0.1/material.blue_grey-light_green.min.css" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
		<link rel="stylesheet" href="style.css" />
		<script defer src="https://code.getmdl.io/1.1.1/material.min.js"></script>
		<script language="javascript" src="lib/helpers/events.js"></script>


		<title>Admin Dashboard</title>
	</head>

	<body>

		<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer
            mdl-layout--fixed-header">
			<header class="mdl-layout__header">
				<div class="mdl-layout__header-row">
					<div class="mdl-layout-spacer"></div>
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
						<label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
							<i class="material-icons">search</i>
						</label>
						<div class="mdl-textfield__expandable-holder">
							<input class="mdl-textfield__input" type="text" name="sample" id="fixed-header-drawer-exp">
						</div>
					</div>
				</div>
			</header>
			<div class="mdl-layout__drawer">
				<span class="mdl-layout-title">Admin Dashboard</span>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" href="index.php">Index</a>
					<a class="mdl-navigation__link" href="">Link</a>
					<a class="mdl-navigation__link" href="">Link</a>
					<a class="mdl-navigation__link" href="aboutUs.php">About Us</a>
				</nav>
			</div>

			<main class="mdl-layout__content">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--5-col mdl-grid mdl-grid--no-spacing ">
						<div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
							<div class="mdl-card__title mdl-color--teal-300">
								<h1 class="mdl-card__title-text">About The Boys</h1>
							</div>
							<p>Aaron</p>
							<p>Ben</p>
							<p>Louis</p>
						</div>
						</div>
					</div>
				</div>
			</main>
		</div>
		<script>
			window.addEventListener("load", loaded());
		</script>
	</body>
	<!--Import jQuery before materialize.js-->


	</html>