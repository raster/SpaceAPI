<?php
date_default_timezone_set('America/Chicago');
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache');
header('Content-type: application/json');

$time	= time();
$open	= 'null';
$status	= 'members only';  
$day	= date("N", $time);
$hour 	= date("G", $time);

// check for Tues or Thurs
if (($day == 2) or ($day == 4)) {
	// check for 7pm to 9pm)
	if (($hour > 18) and ($hour < 21)) {
		$open = '"true"';
		$status = 'open for public';
		
	}
	else {
		$open = 'null';
		$status = 'members only';
	}
}
?>
{
  "api":"0.13",
  "space":"Milwaukee Makerspace",
  "url":"http:\/\/milwaukeemakerspace.org",
  "location":{
    "address":"2555 South Lenox Street, Milwaukee, WI 53207, USA",
    "lat":42.998085,
    "lon":-87.898484
  },
  "logo":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/milwaukeemakerspace.png",
  "contact":{
    "email":"info@milwaukeemakerspace.org",
    "twitter":"@mkemakerspace",
    "ml":"milwaukeemakerspace@googlegroups.com",
    "issue_mail":"pete.prodoehl@milwaukeemakerspace.org"
  },
  "issue_report_channels": [
    "issue_mail"
  ],
  "cam": [
	"http://apps.2xlnetworks.net/milwaukeemakerspace/webcam/"
  ],
  "state":{
    "open":<?php echo $open ?>,
    "icon":{
      "open":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/open.png",
      "closed":"http:\/\/apps.2xlnetworks.net\/milwaukeemakerspace\/images\/closed.png"
    }
  },
    "feeds": {
        "blog": {
            "type": "application/rss+xml",
            "url": "http://milwaukeemakerspace.org/feed/"
        },
        "wiki": {
            "type": "application/rss+xml",
            "url": "http://wiki.milwaukeemakerspace.org/feed.php"
        },
        "calendar": {
            "type": "ical",
            "url": "http://www.google.com/calendar/ical/milwaukeemakerspace.org_kckatpfskv1lerggn73utbadgc%40group.calendar.google.com/public/basic.ics"
        },
        "photos": {
            "type": "flickr",
            "url": "http://api.flickr.com/services/feeds/groups_pool.gne?id=1554189@N20&lang=en-us&format=rss_200"
        }
    },
  "lastchange":<?php echo $time ?>
  
}
