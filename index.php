<?php

$hostip = $_SERVER['REMOTE_ADDR'];
$useragent = $_SERVER['HTTP_USER_AGENT']; 
$language = substr( $_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

// Simple pattern matching
function getBrowser( $useragent ) {
	if(preg_match( '/MSIE/i',$useragent ) ) {
		$browser = "Microsoft Internet Explorer";
	}	else if( preg_match( '/Mozilla/i',$useragent ) ) {
		$browser = "Mozilla Firefox";
	} else if( preg_match( '/Safari/i',$useragent ) ) {
		$browser = "Safari";
	} else if( preg_match( '/Chrome/i',$useragent ) ) {
		$browser = "Chrome";
	} else if( preg_match( '/Webkit/i',$useragent ) ) {
		$browser = "Webkit";
	} else if( preg_match( '/Edge/i',$useragent ) ) {
		$browser = "Microsoft Edge";
	} else {
		$browser = "unknown";
	}
	return $browser;
}

function ipCheck() {
	if( getenv( 'HTTP_CLIENT_IP' ) ) {
		$ip = getenv( 'HTTP_CLIENT_IP' );
	} else if( getenv( 'HTTP_X_FORWARDED_FOR' ) ) {
		$ip = getenv( 'HTTP_X_FORWARDED_FOR' );
	}	else if( getenv( 'HTTP_X_FORWARDED' ) ) {
		$ip = getenv( 'HTTP_X_FORWARDED' );
	}	else if( getenv( 'HTTP_FORWARDED_FOR' ) ) {
		$ip = getenv( 'HTTP_FORWARDED_FOR' );
	}	else if( getenv( 'HTTP_FORWARDED' ) ) {
		$ip = getenv( 'HTTP_FORWARDED' );
	}	else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

?>
<!DOCTYPE html>
<html lang="<?php echo $language ?>">
<head>
<title>Browser Information</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<style type="text/css">
body {
  background: #FFFFFF;
  background: -moz-linear-gradient(top, #ECECEC, #FFFFFF 60%) no-repeat;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #ECECEC), color-stop(.60, #FFFFFF)) no-repeat;
}
a { color:#2583ad; text-decoration:none; font-weight:bold; }
a:hover { color:#d54e21; }
h1 { border-bottom:1px solid #dadada; color:#666; font:125% Georgia,"Times New Roman",Times,serif; margin:0 0 0 -4px; padding:15px 0 7px 0; }
#content {
  background:#FFFFFF;
  background: -moz-linear-gradient(top, #DEF2F2, #FFFFFF 12%) no-repeat;
  font: 100% Arial, Helvetica, sans-serif;
  color: #747d67;
  margin:2em auto;
  width:80%;
  padding:1em 2em;
  -moz-border-radius:11px;
  -khtml-border-radius:11px;
  -webkit-border-radius:11px;
  -moz-box-shadow: 0 4px 5px #999;
  -webkit-box-shadow: 0 4px 5px #999;
  box-shadow: 0 4px 5px #999;
  border-radius:11px;
  border:1px solid #dfdfdf;
}
#content p { font-style:italic; margin:10px 0 0 -3px; }
.ip { color: #666; font-weight:bold; font-size:22px; }
.right { float:right; }
.clear { clear:both; }
</style>
</head>
<body>

<div id="content">

<div id="main">

  <h1>Browser Information</h1>
  <p>Informationen zu dem verwendeten Browser und der vom Internetanbieter vergebenen IP-Adresse. Es werden keine Daten gespeichert, diese Seite stellt einen reinen Informationsdienst zu Verf&uuml;hgung. </p>

  <h1>Die von Ihnen verwendete IP Addresse</h1>
  <p>
  	<?php echo "<span class='ip'>" . $hostip . "</span>"; ?>
  	<?php if( $hostip != ipCheck() ) echo " ( intern " . ipCheck() . " )"; ?>
  </p>

  <h1>Details &uuml;ber den verwendeten Browser</h1>
  <p>Browser: <?php echo getBrowser( $useragent ); ?></p>
  <p>User-Agent: <?php echo $useragent; ?></p>
  <p>Sprache: <?php echo $language; ?></p>

  <h1>Der von Ihnen verwendeter Hostname</h1>
  <p><?php echo GetHostByAddr($hostip); ?></p>

  <p class="right"><a href="http://mvattersen.de/">mvattersen.de</a></p>
  
  <div class="clear"></div>
  
</div>
</div>


</body>
</html>
