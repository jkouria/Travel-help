<?php header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0"); header("Cache-Control: post-check=0, pre-check=0", false); header("Pragma: no-cache"); ?> 
<!DOCTYPE html>
<html>
		
<head>
	<title>Travel Help Application</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	
	<script>
	function loadStations() {
	var stn_id = document.getElementById("stationText").value;
	siteid = 9201; //default value
	mytable = ""; //default value
	
	$.get("submitStations.php?name=" + stn_id, function(data) {
		if (data != null) {
			siteid = data;
		} else console.log("No data returned");
	
		$.get("submitRealTimeTraffic.php?name=" + siteid, function(data) {
	
			if (data != null) {
				mytable = data;
			} else console.log("No data returned");
			document.getElementById('tablePrint').innerHTML = mytable;
		});
	});
	}
	</script>
</head>
<body>

<form action = "">
  <fieldset>
  <h1><em><img src="images/ladda ned.png" width="60" height="57">Travel Help</em>  </h1>
  <ul>
    <li class="dropdown  style11"> 
      <div align="left"><a href="http://sl.se/en/" class="selected" target="_self"><span class style="background-color:#999999"="sl-logo clickable">Start</span> </a> </div>
    </li>
    <li class="dropdown  style12"> 
      <div align="left"><a href="http://sl.se/en/getting-around/" target="_self"><span class style="background-color:#CCCCCC"="sl-logo clickable">Getting around</span> </a> </div>
    </li>
    <li class="dropdown"> 
      <div align="left"><a href="http://sl.se/en/fares--tickets/" target="_self"><span class style="background-color:#999999"="sl-logo clickable">Fares & Tickets</span> </a> </div>
    </li>
    <li class="dropdown"> 
      <div align="left"><a href="http://sl.se/en/help--contact/" target="_self"><span class style="background-color:#CCCCCC"="sl-logo clickable">Help & Contacts</span></a></div>
    </li>
  </ul>
  <div><br>
	Type your station name: </label>
	<p>
	  <input type = "text" id = "stationText" />
	  <input type = "button" value = "Click here to get realtime information" onclick = "loadStations()"/>
  </p>
  <li class="dropdown  style11">
	  <div>
	      <p><img src="img/dg8.gif" name="hr1"><img 
src="images/dg8.gif" name="hr2"><img 
src="images/dgc.gif"><img 
src="images/dg8.gif" name="mn1"><img 
src="images/dg8.gif" name="mn2"><img 
src="images/dgc.gif"><img 
src="images/dg8.gif" name="se1"><img 
src="images/dg8.gif" name="se2"><img 
src="images/dgam.gif" name="ampm">
            <head>
            <script
src="http://maps.googleapis.com/maps/api/js">
        </script>
	        
            <script>
function initialize()
{
  var mapProp = {
    center: new google.maps.LatLng(51.508742,-0.120850),
    zoom:9,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  
  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp)
}

google.maps.event.addDomListener(window, 'load', initialize);
        </script>
            <body>
        <div align="center"id="googleMap" style="width:400px;height:300px;"></div>
      </div>
	  <script type="text/javascript">
dg = new Array();
dg[0]=new Image();dg[0].src="images/dg0.gif";
dg[1]=new Image();dg[1].src="images/dg1.gif";
dg[2]=new Image();dg[2].src="images/dg2.gif";
dg[3]=new Image();dg[3].src="images/dg3.gif";
dg[4]=new Image();dg[4].src="images/dg4.gif";
dg[5]=new Image();dg[5].src="images/dg5.gif";
dg[6]=new Image();dg[6].src="images/dg6.gif";
dg[7]=new Image();dg[7].src="images/dg7.gif";
dg[8]=new Image();dg[8].src="images/dg8.gif";
dg[9]=new Image();dg[9].src="images/dg9.gif";
dgam=new Image();dgam.src="images/dgam.gif";
dgpm=new Image();dgpm.src="images/dgpm.gif";

function dotime(){ 
	var d=new Date();
	var hr=d.getHours(),mn=d.getMinutes(),se=d.getSeconds();

	// set AM or PM
	document.ampm.src=((hr<12)?dgam.src:dgpm.src);

	// adjust from 24hr clock
	if(hr==0){hr=12;}
	else if(hr>12){hr-=12;}

	document.hr1.src = getSrc(hr,10);
	document.hr2.src = getSrc(hr,1);
	document.mn1.src = getSrc(mn,10);
	document.mn2.src = getSrc(mn,1);
	document.se1.src = getSrc(se,10);
	document.se2.src = getSrc(se,1);
}

function getSrc(digit,index){
	return dg[(Math.floor(digit/index)%10)].src;
}

window.onload=function(){
	dotime();
	setInterval(dotime,1000);
};

      </script>
    &nbsp;  
</p>
  </li>
  </fieldset>
  <fieldset>
	<div id="tablePrint"> </div>
  </fieldset>
</form>
 
</body>
</html>
