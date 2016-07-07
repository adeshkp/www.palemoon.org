<?php

  $currentbuild = "20160707"; // Change this to the current latest build.

  function Redirect($url, $permanent = false)
  {
    if (headers_sent() === false)
    {
      header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
  }
  
  $clientbuild = htmlspecialchars($_GET["build"]);
  
  if ($clientbuild == $currentbuild) {
    // Return empty update file, it's current!
    // Note: RFC 2616 says this should be a full URL.
    Redirect("https://www.palemoon.org/update/unstable/noupdate.xml");
  } else {
    // Return update
    Redirect("https://www.palemoon.org/update/unstable/update.xml");
  }
  
?>