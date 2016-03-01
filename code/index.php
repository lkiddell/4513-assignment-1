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
		<script src="//code.jquery.com/jquery-2.2.1.js"></script>



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
					<a class="mdl-navigation__link" href="indexJavaScript.HTML">Index2</a>
					<a class="mdl-navigation__link" href="">Link</a>
					<a class="mdl-navigation__link" href="aboutUs.php">About Us</a>
				</nav>
			</div>

			<main class="mdl-layout__content">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--5-col mdl-grid mdl-grid--no-spacing ">
						<div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
							<div class="mdl-card__title mdl-color--teal-300">
								<h2 class="mdl-card__title-text">Browsers and % of Visits</h2>
							</div>
							<div class="mdl-card__supporting-text">

								<?php
                				echo "<table class='mdl-data-table mdl-js-data-table'>";
                				echo "<thead>";
    							echo "<tr>";
      							echo "<th class='mdl-data-table__cell--non-numeric'>Browser Name</th>";
      							echo "<th>% of Visits</th></tr>";
  								echo "</thead>";

                				$count = 1;
                    			foreach ($allBrowser as $row)
                        		{
                            		$browCount = $visitsGateway->getCount($count);                 		
                            		$percentage = ($browCount / $totalVisits) * 100;
                            		$percentage = substr($percentage, 0, 4)."%";
                            
                            		echo "<tr>";
                            		echo "<td class='mdl-data-table__cell--non-numeric'>" . $row->name . "</td>";
                            		echo "<td>" . $percentage . "</td>";
                            		echo "</tr>";
                            		$count ++;
                        		}
                 				echo "</table>";
                			?>

							</div>
						</div>
						<div class="demo-separator mdl-cell--1-col"></div>

						<div class="mdl-card mdl-shadow--4dp mdl-cell mdl-cell--12-col">
							<div class="mdl-card__title mdl-color--light-green-300">
								<h2 class="mdl-card__title-text">Visits Per Device Brand</h2>
							</div>
							<div class="mdl-card__supporting-text">

								<form action="#" method="get">
									<div class="mdl-select mdl-js-select mdl-select--floating-label">
										<?php 
										$options ="";
    											$dropdown_result=$deviceBrandGateway->getDeviceNameAndCount();
												foreach($dropdown_result as $row){
													$name=$row["name"];
            										$deviceViewCount=$row["Views"];
            									    $options.= "<option value = '". $deviceViewCount . "'>" . $name . "</option>";
	
	
												}
										
    										?>
											<select class="mdl-select__input" id="deviceBrand" name="deviceBrand" onchange="dropdown_change(this)">
												<OPTION VALUE=0>Select a brand</OPTION>
												<?php echo $options ?>
											</select>


											<script type="text/javascript">
												function dropdown_change(e) {

													var string = document.getElementById("deviceBrand").selectedIndex;
													var value = document.getElementsByTagName("option")[string].value;
													document.getElementById("visits").innerHTML = value;
												}
											</script>

											</select>
											<p id="visits"></p>
									</div>
								</form>

							</div>
						</div>
					</div>

					<div class="mdl-cell mdl-cell--7-col mdl-card mdl-shadow--4dp">
						<div class="mdl-card__title mdl-color--brown-300">
							<h2 class="mdl-card__title-text">Countries and Views</h2></div>
						<div class="mdl-card__supporting-text">

							<?php $continents = $continentGateway->getAllContinentsAndCodes();  ?>

								<select class="mdl-select__input" id="continents" name="continents" onchange="displayCountries()">
									<?php

                            echo "<option>Select Continent</option>"; 
                            foreach($continents as $row) { 
                            	echo $row->ContinentName;
                            echo "<option value='" . $row['ContinentCode'] . "'> " . $row['ContinentName'] . "</option>"; } ?>
                            	</select>
	<script type="text/javascript">
			var planetEarth = JSON.parse('<?php echo json_encode($countriesGateway->getCountryNamesAndCount()) ?>') ;

	function displayCountries() {

		var table_string = "<thead> <tr> <th class = 'mdl-data-table__cell--non-numeric' > Country Name </th>  <th> #of Visits </th> </tr> </thead>";
		var string2 = document.getElementById("continents").selectedIndex;
		console.log("String: "+string2);
		var value2 = document.getElementById("continents").childNodes[string2+1].value;
		// getElementsByTagName("option")[string2].value;

		for(var i = 0; i < planetEarth.length; i++) {
    var obj = planetEarth[i];
			console.log("CONTINENT CODE "+ obj.Continent);
			console.log("VALUE: "+value2);
						if (obj.Continent == value2){
						table_string+="<tr> <td class='mdl-data-table__cell--non-numeric'>" + obj.CountryName + "</td>"+"<td>"+ obj.Views + "</td></tr>";
													}
		};

		document.getElementById("countries_table").innerHTML = table_string;
												
};
		</script>
												
												<table class = 'mdl-data-table mdl-js-data-table' id='countries_table'></table>
											

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