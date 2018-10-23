<?php

include 'noiti_connect.php';

$lname=$_POST['lname'];
$lname=stripslashes($_POST['lname']);
$lname=mysqli_real_escape_string($conn, $lname);

$fname=$_POST['fname'];
$fname=stripslashes($_POST['fname']);
$fname=mysqli_real_escape_string($conn, $fname);

$email=$_POST['email'];
$email=stripslashes($_POST['email']);
$email=mysqli_real_escape_string($conn, $email);

$country=$_POST['country'];
$country=stripslashes($_POST['country']);
$country=mysqli_real_escape_string($conn, $country);

$message=$_POST['message'];
$message=stripslashes($_POST['message']);
$message=mysqli_real_escape_string($conn, $message);



    
   $sql = "INSERT INTO contact (lastname, firstname, email, country, message, date_sent) VALUES ('$lname','$fname', '$email', '$country', '$message', now())";
if(mysqli_query($conn, $sql)){ ?>

	<script language="javascript" type="text/javascript">
		alert('Thank you for your message. You will be hearing from us shortly.');
		window.location = 'homeEN.php#contact';
	</script>

<?php    } else { ?>

	<script language="javascript" type="text/javascript">
		alert('Message failed. Please, send an email to olga.pozeli@gmail.com');
		window.location = 'homeEN.php#contact';
	</script>

<?php  } 

 
// Close connection
mysqli_close($conn);
?>
