<?php

// Setup variables
if((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
}else{
	$name = 'No name entered';
}
if((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
}else{
	$email = 'No email entered';
}
if((isset($_POST['guests'])) && (strlen(trim($_POST['guests'])) > 0)) {
	$guests = stripslashes(strip_tags($_POST['guests']));
}else{
	$guests = 'No guests entered';
}

// Insert into database
$link = mysql_connect('localhost', 'kawedding_admin', 'I5ekBsBsQj242K2soplu');
mysql_select_db('kawedding', $link);
$sql = "INSERT INTO  `messages_rsvp` (`id`, `name`, `email`, `guests`, `created`) VALUES ( NULL ,  '$name',  '$email',  '$guests', CURRENT_TIMESTAMP);";
mysql_query($sql, $link);
mysql_close($link);

// Get email body
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<h3>KelleyAndArt.com RSVP</h3>
<p>Someone has sent a RSVP message via your website. REMEMBER IT!</p>
<table>
  <tr>
    <td>Name:</td>
    <td><?= $name; ?></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><?= $email; ?></td>
  </tr>
  <tr>
    <td>Guests:</td>
    <td><?= $guests; ?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();
echo $body;
$headers  = "From: no-reply-rsvp@kelleyandart.com\r\n"; 
$headers .= "Content-type: text/html\r\n"; 
mail("me@artarmstrong.com", "KelleyAndArt.com RSVP - $name", $body, $headers);


// Get response email body
ob_start();
?>
<html>
<head>
	<title>KelleyAndArt.com RSVP</title>
</head>
<body>
	<h3>KelleyAndArt.com RSVP</h3>
	<p>Thank you for RSVP'ing for our wedding!</p>
	<p>We've tried to make arrangements for those that might be coming from out of town are about to find the venue, and also to have a good place to stay. Please review and if you have any questions, please contact us right away!</p>
	<strong>Wedding Venue</strong>
	<div style="padding: 5px 0 15px 10px;font-size:smaller;">	
		Sahalee Country Club<br />
		21200 N.E. Sahalee Country Club Drive<br />
		Sammamish, Washington 98074<br />
		<a href="http://goo.gl/maps/FzKej">Get a Map</a> | <a href="http://www.sahalee.com/">View Website</a>
	</div>
	<strong>Flying In?</strong>
	<div style="padding: 5px 0 15px 10px;font-size:smaller;">
		Your best choice for flying into Seattle is SEATAC Airport. Once you land, you'll want to rent a car, as Taxi rates will be prohibitive.
	</div>
	<strong>Lodging</strong><br />
	<div style="padding: 5px 0 15px 10px;font-size:smaller;">
		Redmond Inn<br />
		$79/night (mention "our names")<br />
		Includes Shuttle Service to/from Venue<br />
		17601 Redmond Way<br />
		Redmond, WA 98052<br />
		<a href="http://www.redmondinn.com/">Website</a> | 800-634-8080
	</div>
</body>
</html>
<?
$body = ob_get_contents();
echo $body;
$headers  = "From: no-reply@kelleyandart.com\r\n"; 
$headers .= "Content-type: text/html\r\n"; 
mail($email, "KelleyAndArt.com RSVP Info", $body, $headers);

?>
