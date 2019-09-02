<?php

if (isset($_POST['imastudent'])) {
  $imastudent=1;
}  else {
  $imastudent=0;
}

#$imastudent=$_POST['imastudent'];
$firstname=$_POST['given-name'];
$surname=$_POST['family-name'];
$birthplace=$_POST['birthplace'];
$birthdate=$_POST['birthdate'];
$email=$_POST['email'];
$position=$_POST['position'];
$affiliation=$_POST['affiliation'];
$dept=$_POST['dept'];
$address=$_POST['address'];
$zip=$_POST['zip'];
$country=$_POST['country'];
$city=$_POST['city'];
$telephone=$_POST['telephone'];
$arrival=$_POST['arrival'];
$departure=$_POST['departure'];
$roommate=$_POST['roommate'];
$poster=$_POST['poster'];
$accompanying=$_POST['accompanying'];

date_default_timezone_set('UTC');
$registration_date = date('l jS \of F Y h:i:s A');

$msg =
  $imastudent . ';'
  . $firstname . ';'
  . $surname . ';'
  . $birthplace . ';'
  . $birthdate . ';'
  . $email . ';'
  . $position . ';'
  . $affiliation . ';'
  . $dept . ';'
  . $address . ';'
  . $zip . ';'
  . $country . ';'
  . $city . ';'
  . $telephone . ';'
  . $arrival . ';'
  . $departure . ';'
  . $roommate . ';'
  . $accompanying . ';'
  . $poster . ';'
  . $registration_date
  . "\n";

$filename = 'registration_data.txt';
$rc = file_put_contents($filename, $msg, FILE_APPEND | LOCK_EX);

if (!$rc) {
  $log_filename = 'registration_data.log';
  $log_handle = fopen($filename, 'a');
  fwrite($log_handle, "Couldn't register some data\n");
  fclose($log_handle);
}

echo '<p>Thank you, your data has been submitted for registration, as reported below. If you notice some error please resubmit your application</p>';
echo '<p>I\'m a student: '. ($imastudent ? 'true' : 'false') . '</p>';
echo '<p>First Name: '. $firstname . '</p>';
echo '<p>Last Name: '. $surname . '</p>';
echo '<p>Place of birth: '. $birthplace . '</p>';
echo '<p>Birth date: '. $birthdate . '</p>';
echo '<p>Email: '. $email . '</p>';
echo '<p>Present position: '. $position . '</p>';
echo '<p>Institution: '. $affiliation . '</p>';
echo '<p>Department/Lab: '. $dept . '</p>';
echo '<p>Address: '. $address . '</p>';
echo '<p>Zip: '. $zip . '</p>';
echo '<p>Country: '. $country . '</p>';
echo '<p>City: '. $city . '</p>';
echo '<p>Phone number: '. $telephone . '</p>';
echo '<p>Arrival date: '. $arrival . '</p>';
echo '<p>Departure date: '. $departure . '</p>';
echo '<p>I wish to share the room with: '. $roommate . '</p>';
echo '<p>Accompanying person: '. $accompanying . '</p>';
echo '<p>I wish to present a poster with title: '. $poster . '</p>';
echo '<p>Registration date (UTC): '. $registration_date . '</p>';

?>
