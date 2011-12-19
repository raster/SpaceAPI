<?php
date_default_timezone_set('America/Chicago');
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache');
header('Content-type: application/json');

$time	= time();
$open	= 'false';
$status	= 'members only';  
$day	= date("N", $time);
$hour 	= date("G", $time);

// check for Tues or Thurs
if (($day == 2) or ($day == 4)) {
	// check for 7pm to 9pm)
	if (($hour > 19) and ($hour < 21)) {
		$open = 'true';
		$status = 'open for public';
		
	}
	else {
		$open = 'false';
		$status = 'members only';
	}
}
?>
{
  "api":"0.11",
  "space":"Milwaukee Makerspace",
  "url":"http:\/\/milwaukeemakerspace.org",
  "icon":{
    "open":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/open.png",
    "closed":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/closed.png"
  },
  "address":"3073 S Chase Ave, Bldg 34, Milwaukee, WI 53207, USA",
  "contact":{
    "twitter":"@mkemakerspace",
    "ml":"milwaukeemakerspace@googlegroups.com"
  },
  "lat":"42.988773",
  "lon":"-87.912791",
  "logo":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/milwaukeemakerspace.png",
  "open":<?php echo $open ?>,
  "status":"<?php echo $status ?>",
  "lastchange":<?php echo $time ?>
  
}

















