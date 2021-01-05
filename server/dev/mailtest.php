<?php
   $to = "mohit9451joshi@gmail.com"; // <– replace with your address here
   $subject = "Test mail";
   $message = "Hello! This is a simple test email message.";
   $from = "contact@abcdeducators.in";
   $headers = "From:" . $from;
   if(mail($to,$subject,$message,$headers)){
    echo "Mail Sent.";
   }
   else {
       echo "unable to send mail";
   }
?>