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

//$result = '{"StatusCode":0,"Message":null,"ExecutionTime":0,"ResponseData":[{"Name":"Rotebro station (Sollentuna)","SiteId":"9503","Type":"Station","X":"17914009","Y":"59476489"},{"Name":"Häggviks station (Sollentuna)","SiteId":"9505","Type":"Station","X":"17933408","Y":"59444569"},{"Name":"Norrvikens station (Sollentuna)","SiteId":"9504","Type":"Station","X":"17923870","Y":"59458124"},{"Name":"Sollentuna station (Sollentuna)","SiteId":"9506","Type":"Station","X":"17948186","Y":"59429592"},{"Name":"Helenelunds station (Sollentuna)","SiteId":"9507","Type":"Station","X":"17962263","Y":"59409466"},{"Name":"Rotebro station östra (Sollentuna)","SiteId":"9503","Type":"Station","X":"17914009","Y":"59476489"},{"Name":"Ormsta station (Vallentuna)","SiteId":"9625","Type":"Station","X":"18079285","Y":"59546713"},{"Name":"Kårsta station (Vallentuna)","SiteId":"9620","Type":"Station","X":"18266962","Y":"59656939"},{"Name":"Stationsvägen (Vallentuna)","SiteId":"2560","Type":"Station","X":"18168521","Y":"59624497"},{"Name":"Vallentuna station (Vallentuna)","SiteId":"9626","Type":"Station","X":"18079510","Y":"59533256"}]}';
$re = json_decode($result,true);
//print_r($re);

//$manage_array = json_encode($re, true);
$manage_array = $re;
//echo '*******************************';
//print_r($manage_array);

//echo $manage_array['StatusCode'];

$site_array = $manage_array['ResponseData'];
//echo '*******************************';
//print_r($site_array);

$siteidarray = $site_array['0'];
//echo '*******************************';
//print_r($siteidarray);

$siteid = $siteidarray['SiteId'];
echo $siteid;
//$siteidarrayid = $siteid['SiteId'];
//echo '*******************************';
//print_r($siteid);


//echo $manage;
//echo "Result for " . $slstationAPIURL . " is " . $result;
//echo '{"StatusCode":0,"Message":null,"ExecutionTime":0,"ResponseData":[{"Name":"Rotebro station (Sollentuna)","SiteId":"9503","Type":"Station","X":"17914009","Y":"59476489"},{"Name":"Häggviks station (Sollentuna)","SiteId":"9505","Type":"Station","X":"17933408","Y":"59444569"},{"Name":"Norrvikens station (Sollentuna)","SiteId":"9504","Type":"Station","X":"17923870","Y":"59458124"},{"Name":"Sollentuna station (Sollentuna)","SiteId":"9506","Type":"Station","X":"17948186","Y":"59429592"},{"Name":"Helenelunds station (Sollentuna)","SiteId":"9507","Type":"Station","X":"17962263","Y":"59409466"},{"Name":"Rotebro station östra (Sollentuna)","SiteId":"9503","Type":"Station","X":"17914009","Y":"59476489"},{"Name":"Ormsta station (Vallentuna)","SiteId":"9625","Type":"Station","X":"18079285","Y":"59546713"},{"Name":"Kårsta station (Vallentuna)","SiteId":"9620","Type":"Station","X":"18266962","Y":"59656939"},{"Name":"Stationsvägen (Vallentuna)","SiteId":"2560","Type":"Station","X":"18168521","Y":"59624497"},{"Name":"Vallentuna station (Vallentuna)","SiteId":"9626","Type":"Station","X":"18079510","Y":"59533256"}]}'
//echo '{"1": 1, "2": 2, "3": {"4": 4, "5": {"6": 6}}}'
?>
