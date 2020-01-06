<?php
/**
 * Created by PhpStorm.
 * User: dimitriosvergados
 * Date: 23/06/2019
 * Time: 19:45
 */

// multiple recipients
$to  = 'dimbergyn@gmail.com'; // note the comma
//$to .= 'wez@example.com';

// subject
$subject = 'Noiti Grammmi | New Contact';

// message
$message = '<p>Test Message</p>';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: Noiti Grammi <info@noitigrammi.gr>' . "\r\n";
$headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);