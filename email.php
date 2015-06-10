<?php

if(isset($_POST['email'])) {
     
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "ENTER THE EMAIL YOU WANT TO SEND HERE";
    $data = "ADD THE DATA YOU WANT TO SEND HERE.";
    $email_from = "obama@whitehouse.gov";
  
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if( !isset($_POST['email'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
 
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
 //$cart = array();
//$cart[] = $email_to;

if (($addURLS) != '') {
    $message .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . strip_tags($addURLS) . "</td></tr>";
}
$curText = htmlentities($_POST['email']);           
if (($curText) != '') {
    $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
}
$message .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['email']) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";


    $email_message .= $data; 
    //$email_message .= $cart;
   //  $message .= $data; 


    $email_subject = $_POST['email'];
// create email headers

$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>


<!DOCTYPE html>
<html lang="en">
 <head>
<script>
    alert("You've been added! Expect an email inviting you to Pearl within one week");
</script>
  <meta http-equiv="refresh" content="0; url=/index.html" />
 <script type="text/javascript">
            window.location.href = "http://pearlapp.org/"
        </script>
 </head>
 
 <body>
<script>
    alert("You've been added! Expect an email inviting you to Pearl soon!");

</script>

 </body>
</html>
<?php
}
?>
