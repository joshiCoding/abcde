<h1> New mail sender </h1>
<?php
   $to = "mohit9451joshi@gmail.com"; // <– replace with your address here
   $subject = "Mail from ABCDE site";
   $message = "If it works , it is sure that he installed something here that made it work";
   $from = "contact@abcdeducators.in";
   $headers = "From:" . $from;
   if(mail($to,$subject,$message,$headers)){
    echo "Mail Sent.";
   }
   else {
       echo "unable to send mail";
   }
?>