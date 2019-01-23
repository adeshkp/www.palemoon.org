<?php


// Sanitizing getter
function funcHTTPGetValue($_value) {
  if (!isset($_GET[$_value]) || $_GET[$_value] === '' || $_GET[$_value] === null || empty($_GET[$_value])) {
    return null;
  } else {    
    $_finalValue = preg_replace('/[^-a-zA-Z0-9_\.]/', '', $_GET[$_value]);
    return $_finalValue;
  }
}

// Sends the standard headers
function funcSendHeader($_value) {
  $_arrayHeaders = array(
    '404' => 'HTTP/1.0 404 Not Found',
    '501' => 'HTTP/1.0 501 Not Implemented',
    'html' => 'Content-Type: text/html',
    'text' => 'Content-Type: text/plain',
    'xml' => 'Content-Type: text/xml',
    'css' => 'Content-Type: text/css',
  );
    
  if (array_key_exists($_value, $_arrayHeaders)) {
    header($_arrayHeaders[$_value]);
        
    if ($_value == '404') {
      // We are done here
      exit();
    }
  }
}

// Sends a redirect header to the supplied url
function redirect($url, $statusCode = 303)
{
   header('Location: ' . $url, true, $statusCode);
   die();
}

// startsWith and endsWith polyfills
function startsWith($haystack, $needle) {
     $length = strlen($needle);
     return (substr($haystack, 0, $length) === $needle);
}
function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }
    return (substr($haystack, -$length) === $needle);
}

// 404's if user agent starts with wget and curl
// Prevent site scraping
function funcCheckUserAgent() {
    if (startsWith(strtolower($_SERVER['HTTP_USER_AGENT']), 'wget/') ||
        startsWith(strtolower($_SERVER['HTTP_USER_AGENT']), 'curl/')) {
        funcSendHeader('404');
    }
}


function constructDownloadURL($version, $mirror, $bits, $type) {

  $validmirrors = ['eu', 'us', 'as', 'sig'];
  
  if (!in_array($mirror, $validmirrors))
    die ('Invalid mirror.');
  
  $validbits = ['32', '64'];
  
  if (!in_array($bits, $validbits, true))
    die ('Invalid architecture.');
  
  switch ($mirror) {
    case 'sig':
      $url = 'http://www.palemoon.org/pgp/';
      break;
    default:
      $url = 'http://rm-' . $mirror . '.palemoon.org/release/';
  }
  
  switch ($type) {
    case 'installer':
      $url = $url . 'palemoon-' . $version . '.win' . $bits . '.installer.exe';
      break;
    case 'zip':
      $url = $url . 'palemoon-' . $version . '.win' . $bits . '.zip';
      break;
    case 'portable':
      $url = $url . 'Palemoon-Portable-' . $version . '.win' . $bits . ".exe";
      break;
    default:
      // Unsupported download type; abort.
      die('Incorrect type.');
  }
  
  if ($mirror == 'sig') {
    $url = $url . '.sig';
  }
  
  return $url;
}

// ****************** MAIN **********************

// Disabled for now to allow scripted downloads of installers, but if
// abusive or leading to DoS, should be uncommented.
// funcCheckUserAgent();

$version = '28.3.1';

$mirror = funcHTTPGetValue('mirror');
$bits = funcHTTPGetValue('bits');
$type = funcHTTPGetValue('type');

if (!$mirror || !$bits || !$type)
  die('Incorrect use.');

redirect(constructDownloadURL($version, $mirror, $bits, $type));

?>
