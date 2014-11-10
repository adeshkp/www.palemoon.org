<?php
// reCAPTCHA
require_once('recaptchalib.php');
  $privatekey = "6LeuqMgSAAAAAFTrML4L9d4C-TL1MVqQ_J-BDzFU";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {

// Configuration Settings
$SendFrom =    "Palemoon Feedback <feedback@palemoon.org>";
$SendTo =      "moonchild@palemoon.org";
$SubjectLine = "Pale Moon Feedback - ";
$ThanksURL =   "/contact/thanks.html";  //confirmation page
$Divider =     "=======================================";


// substring function

function InStr($String,$Find)
{
 $i=0;
 unset($substring);
 $Find=strtolower($Find);
 $String=strtolower($String);
 while (strlen($String)>=$i)
 {
  $substring=substr($String,$i,strlen($Find));
  if ($substring==$Find) return true;
  $i++;
 }
 return false;
}

// IP fetch including CloudFlare

function fetch_cf()
{
 if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) 
 { 
   return $_SERVER['REMOTE_ADDR'];
 }
 return '';
}

function fetch_ip()
{
 if(isset($_SERVER['HTTP_CF_CONNECTING_IP'])) 
 { 
   return $_SERVER['HTTP_CF_CONNECTING_IP']; 
 }
 return $_SERVER['REMOTE_ADDR'];
}

// MAIN

$CF_server = fetch_cf();
$CF_country = $_SERVER["HTTP_CF_IPCOUNTRY"];
$remoteIP = fetch_ip();
if (strstr($remoteIP, ', ')) {
   $ips = explode(', ', $remoteIP);
   $remoteIP = $ips[0];
}
$fullhost = gethostbyaddr($remoteIP);


$name = $_REQUEST['name'] ;
$email = $_REQUEST['e-mail'] ;
$emailv = $_REQUEST['verification'] ;
$message = $_REQUEST['Comment'] ;
$subtopic = $_REQUEST['Subject'] ;
$location = $_REQUEST['Location'] ;

if (!($email==$emailv)) {
  header( "Location: /contact/error-mismatch.html" );
}
elseif (empty ($name) || empty($email) || empty($message) || InStr($subtopic,"--")) {
  header( "Location: /contact/error.html" );
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header( "Location: /contact/error-notemail.html" );
}
elseif (InStr($location,"http://")) {
  header( "Location: /contact/error.html" );
}
elseif (strlen($location)<5 && InStr($subtopic,"Testimonial")) {
  header( "Location: /contact/error-tst.html" );
}
elseif (InStr($fullhost,"airtelbroadband.in")) {
  header( "Location: /contact/error-atbb.html" );
}  

else {
// Build Message Body from Web Form Input
$MsgBody = $fullhost . "(" . $remoteIP . ")\n";
if ($CF_server != '') {
$MsgBody .= "CloudFlare: " . $CF_server . "(" . $CF_country . ")\n";
}
$MsgBody .= "$Divider\n";

foreach ($_POST as $Field=>$Value)
{
if (!InStr($Field,"recaptcha_")) //skip recaptcha fields
  {
   $MsgBody .= "$Field: $Value\n";
  }
} //foreach
$MsgBody .= $Divider . "\n" . $_SERVER['HTTP_USER_AGENT'] . "\n";
// $MsgBody = htmlspecialchars($MsgBody);  //make content safe
// add chosen subject to mail subject
$SubjectLine .= $subtopic;
// Send E-Mail and Direct Browser to Confirmation Page
mail($SendTo, $SubjectLine, $MsgBody, "From: " . $email);
header("Location: $ThanksURL");
      }
exit;
} // reCAPTCHA success
?>
