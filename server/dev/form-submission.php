<?php 
//message variables
$msg = '';
$msg_class = '';
$mailReciever = 'mohit9451joshi@gmail.com';// replace this with client destination email
$mailSender = "Office@abcdeducators.in";

//check for submission
if(filter_has_var(INPUT_POST, 'submit')){
    //get data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $state = htmlspecialchars($_POST['state']);
    $course = htmlspecialchars($_POST['course']);


    // check required fields
    if(!empty($email) && !empty($name) && !empty($course)){
        //passed
        //check Email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false ){
            //failed email check
            $msg = 'Please use a valid email';
            $msgclass = 'alert-danger';
        }
        else {
            //passed
            //sending information
            $to = $mailReciever;   
            $subject = 'Enquiry for Demo on the ABCDE site';
        
            $message = "Name : " . $name . "<br>\r\n";
            $message .= "Email : " . $email . "<br>\r\n";
            $message .= "State : " . $state . "<br>\r\n";
            $message .= "Course : " . $course . "<br>\r\n";
            $from = $mailSender;

            //email headers
            $headers = "MIME-VERSION:1.0"."\r\n";
            $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

            //additional headers
            $headers .="From: ".$from."\r\n";

            if(mail($to, $subject,$message,$headers)){
                //email sent
                $msg = 'Your email was sent';
                $msgclass = 'alert-success';
            }
            else{
                //Failed 
                $msg= "your email was not sent";
                $msgclass="alert-danger";
            }
        }
    }
    // header('Location: /server/index.php#demo');
    echo "Message is " . $msg;
}
?>