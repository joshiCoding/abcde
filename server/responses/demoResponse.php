<?php
include '../data/data.php';

// getting data from request
htmlspecialchars($_POST['name']);
$name = htmlspecialchars($_REQUEST['name']);
$email = htmlspecialchars($_REQUEST['email']);
$state = htmlspecialchars($_REQUEST['state']);
$course = htmlspecialchars($_REQUEST['course']);

// sending mail
if(!empty($email) && (!empty($name) || !empty($course) || !empty($state))){
//passed
    //sending information
    $to = $mailReciever;  
    $from = $mailSender;

    $subject = 'Enquiry for Demo on the ABCDE site';

    $message = "<b>Name</b> : " . $name . "<br>\r\n";
    $message .= "<b>Email</b> : " . $email . "<br>\r\n";
    $message .= "<b>State</b> : " . $state . "<br>\r\n";
    $message .= "<b>Course</b> : " . $course . "<br>\r\n";

    //email headers
    $headers = "MIME-VERSION:1.0"."\r\n";
    $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

    //additional headers
    $headers .="From: Demo <".$from.">\r\n";

    if(mail($to, $subject,$message,$headers)){
        //email sent
        echo "Thanks for putting enquiry for demo.<br> We will reach you the soonest we can.";
    }
    else{
        //Failed 
        echo "Something went wrong. Please try again";
    }
}
else{
    echo "Unable to send it ";
}
?>