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
if((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
}else{
	$message = 'No message entered';
}

// Insert into database
$link = mysql_connect('localhost', 'kawedding_admin', 'I5ekBsBsQj242K2soplu');
mysql_select_db('kawedding', $link);
$sql = "INSERT INTO  `messages_contact` (`id`, `name`, `email`, `message`, `created`) VALUES ( NULL ,  '$name',  '$email',  '$message', CURRENT_TIMESTAMP);";
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
<h3>KelleyAndArt.com Contact Us</h3>
<p>Someone has sent a contact message via your website. Respond to them!</p>
<table>
  <tr>
    <td>Name</td>
    <td><?= $name; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?= $email; ?></td>
  </tr>
  <tr>
    <td>Message</td>
    <td><?= $message; ?></td>
  </tr>
</table>
</body>
</html>
<?
$body = ob_get_contents();
echo $body;
$headers  = "From: no-reply-contact@kelleyandart.com\r\n"; 
$headers .= "Content-type: text/html\r\n"; 
mail("me@artarmstrong.com", "KelleyAndArt.com Contact - $name", $body, $headers);

?>
