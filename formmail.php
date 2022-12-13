<?php
   if ($_SERVER['REQUEST_METHOD']=="POST"){
      // In testing, if you get an Bad referer error
      // comment out or remove the next three lines
      //if (strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST'])>7 ||
      //   !strpos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']))
      //   die("Bad referer");
      $msg="Values submitted by the user:\n";
      foreach($_POST as $key => $val){
         if (is_array($val)){
            $msg.="Item: $key\n";
            foreach($val as $v){
               $v = stripslashes($v);
               $msg.="   $v\n";
            }
         } else {
            $val = stripslashes($val);
            $msg.="$key: $val\n";
         }
      }
      $recipient="aharvey6@student.morainepark.edu";
      $subject="Form Submission";
      error_reporting(0);
      if (mail($recipient, $subject, $msg)){
         echo "<h1>Thank you</h1><p>Message successfully sent.</p>\n";
         echo nl2br($input);
      } else
         echo "An error occurred and the message could not be sent.";
   } else
      echo "Bad request method";
      echo "<meta http-equiv='refresh' content='5;url=https://theadimz.github.io/?a=1&b=2'>";
?>
