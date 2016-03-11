<?php

$apiurl = "https://api.eu.apim.ibmcloud.com/johannrodinseibmcom-myteamspace/sb/realtime/";
$apiclient_id = "549d2618-0ffd-4720-b139-4b2c69a4d223";
$apiclient_secret = "cD5sO6gW5aB0dV6nH5lR6oP5wQ5kQ5rF3yM2cA0jJ2oO2vM2sX";
//$apiclient_secret = "bQ0uG5oQ6qL2oS2rQ1sU7xG5vM3eR6oU0uD1qT5vK4hW2tE2xT";		
//$slstationAPIURL = $apiurl . "?client_id=" . $apiclient_id . "&client_secret=" . $apiclient_secret . "&searchstring=" . $_GET['id'];
$slstationAPIURL = $apiurl . $_GET['id'];

function build_table_row($data)
{
	while (list($var, $val) = each($data)) {
		echo "<tr>";
		foreach($val as $leaf_key => $leaf_value) {
		
		//Show only DisplayTime, LineNumber, Destination, TransportMode
		if ($leaf_key == 'DisplayTime' || $leaf_key == 'LineNumber'||$leaf_key == 'Destination') {
			//echo "<td>";
			//echo $leaf_key;
			//echo "= </td>";
			echo "<td>";
			echo $leaf_value;
			echo "</td> ";
			} else if ($leaf_key == 'TransportMode') {
			echo "<td>";
			//insert image
			echo "<img src=\"images/";
			echo $leaf_value;
			echo ".png\">";
			echo "</td>";
			}
			
		}
		echo "</tr>";
	}
}

function httpGet($url)
{
	$ch = curl_init();  
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$output=curl_exec($ch);
	curl_close($ch);
	return $output;
}

$result = httpGet($slstationAPIURL);

if ($result) {
	//Take the JSON encoded string and convert it into a PHP variable. 
	$manage_array = json_decode($result,true);
	
	if ($manage_array['StatusCode'] === 0) { 
		//StatusCode is 0, there are results to display
		$site_array = $manage_array['ResponseData'];

		echo "<table id='display' border='2px' align=\"left\"><tr><th>DisplayTime</th><th>TransportMode</th><th>LineNumber</th><th>Destination</th></tr>"; 
		foreach($site_array as $key => $value) {

			
			if (is_array($value)) {
				//found array
			
				//Build for METRO, BUS, TRAIN, TRAM, SHIP
				build_table_row($value);
			} else { //display LatestUpdate and DataAge
				//echo "<tr>";
				//echo "<td>";
				//echo $key;
				//echo " = </td>";
				//echo "<td>";
				//echo $value;
				//echo "</td>";
				//echo "</tr>";
			}
			
		};
		echo "</table>";
	} else {		//StatusCode is not 0, something is wrong
			echo "StatusCode: ";
			echo $manage_array['StatusCode'];
		}
} else
echo "No results, try again later.";
?>
