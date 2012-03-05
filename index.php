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
	if (($hour > 18) and ($hour < 21)) {
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
  "api":"0.12",
  "space":"Milwaukee Makerspace",
  "url":"http:\/\/milwaukeemakerspace.org",
  "address":"3073 S Chase Ave, Bldg 34, Milwaukee, WI 53207, USA",
  "lat":"42.988773",
  "lon":"-87.912791",
  "logo":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/milwaukeemakerspace.png",
  "icon":{
    "open":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/open.png",
    "closed":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/closed.png"
  },
  "contact":{
    "twitter":"@mkemakerspace",
    "ml":"milwaukeemakerspace@googlegroups.com"
  },
  "open":<?php echo $open ?>,
  "status":"<?php echo $status ?>",
  "feeds":[
    {"name":"blog","type":"application/rss+xml","url":"http://milwaukeemakerspace.org/feed/"},
    {"name":"wiki","type":"application/rss+xml","url":"http://wiki.milwaukeemakerspace.org/feed.php"},
    {"name":"photos","type":"text/xml","url":"http://api.flickr.com/services/feeds/groups_pool.gne?id=1554189@N20&lang=en-us&format=rss_200"},
    {"name":"calendar","type":"text/calendar","url":"http://www.google.com/calendar/ical/milwaukeemakerspace.org_kckatpfskv1lerggn73utbadgc%40group.calendar.google.com/public/basic.ics"}
  ],
  "lastchange":<?php echo $time ?>
  
}
