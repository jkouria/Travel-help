<?php

//$data = file_get_contents('php://input');
$apiurl = "https://api.eu.apim.ibmcloud.com/johannrodinseibmcom-myteamspace/sb/station/";
$apiclient_id = "d45528cc-21d8-4bed-a055-e80436380e85";
$apiclient_secret = "bQ0uG5oQ6qL2oS2rQ1sU7xG5vM3eR6oU0uD1qT5vK4hW2tE2xT";		
//$slstationAPIURL = $apiurl . "?client_id=" . $apiclient_id . "&client_secret=" . $apiclient_secret . "&searchstring=" . $_GET['name'];
$slstationAPIURL = $apiurl . $_GET['name'];

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
$re = json_decode($result,true);

$manage_array = $re;

//fault handling in submitRealTimeTraffic, don't need to test for StatusCode == 0
//echo $manage_array['StatusCode'];

$site_array = $manage_array['ResponseData'];
$siteidarray = $site_array['0'];

$lon = substr($siteidarray['X'],0,2) . "." . substr($siteidarray['X'],2);
//print_r($lon);
$lat = substr($siteidarray['Y'],0,2) . "." . substr($siteidarray['Y'],2);
//print_r($lat);


$siteid = $siteidarray['SiteId'];
echo json_encode(array($siteid, $lon, $lat));
?>
