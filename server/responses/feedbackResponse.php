<?php
// setting basic variable 
$mailReciever = 'mohit9451joshi@gmail.com';// replace this with client destination email
$mailSender = "Office@abcdeducators.in";

// getting data from request

$fname = htmlspecialchars($_REQUEST['fd-fname']);
$lname = htmlspecialchars($_REQUEST['fd-lname']);
$email = htmlspecialchars($_REQUEST['fd-email']);
$phone = htmlspecialchars($_REQUEST['fd-pno']);
$sub = htmlspecialchars($_REQUEST['fd-subject']);
$msg = htmlspecialchars($_REQUEST['fd-message']);

// sending mail
if((!empty($email)|| !empty($phone))&& (!empty($sub) || !empty($msg) || !empty($fname) || !empty($lname))){
//passed
    //sending information
    $to = $mailReciever;
    $from = $mailSender;
    $name = '';
    if(!empty($fname)) $name .= $fname . " ";
    if(!empty($lname)) $name .= $lname . " ";

    $subject = "Feedback from ABCDE site";
    
    $message = "<b>This is the Feedback Enquiry from ABCDE site</b>";

    $message .= "<hr> <b>Contact Information</b> <hr>";
    $message .= "<b>Name</b> : " . $name  ."<br>";
    if(!empty($email)) $message .= "<b>Email</b> : " . $email . "<br>";
    if(!empty($phone)) $message .= "<b>Phone Number</b> : " . $phone . "<br>";
    
    $message .= "<hr><b>Feedback Given</b><hr>";
    if(!empty($sub)) $message .= "<b>Subject</b> : " . $sub . "<br>";
    if(!empty($msg)) $message .= "<b>Message</b> : <br>" . $msg . "<br>";

    //email headers
    $headers = "MIME-VERSION:1.0"."\r\n";
    $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

    //additional headers
    $headers .="From: Feedback <".$from.">\r\n";

    if(mail($to, $subject,$message,$headers)){
        //email sent
        echo "Thanks for giving feedback <br>We will looking into your feedback very sincerely.";
    }
    else{
        //Failed 
        echo "There was an error in sending";
    }
}
else{
    echo "We can't process the request , try again later";
}
?>