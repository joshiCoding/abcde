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
}

// for feedback form
$fdMsg = '';
$fdMsgClass = '';

if(filter_has_var(INPUT_POST, 'fd-submit')){
    //get data
    $fdFname = htmlspecialchars($_POST['fd-fname']);
    $fdLname = htmlspecialchars($_POST['fd-lname']);
    $fdEmail = htmlspecialchars($_POST['fd-email']);
    $fdPno = htmlspecialchars($_POST['fd-pno']);
    $fdSubject = htmlspecialchars($_POST['fd-subject']);
    $fdMessage = htmlspecialchars($_POST['fd-message']);

    if((!empty($fdEmail) || !empty($fdPno)) && (!empty($fdMessage) || !empty($fdSubject)) ){


        // check for valid email
        if(filter_var($fdEmail, FILTER_VALIDATE_EMAIL) === false ){
            //failed email check
            $fdMsg = 'Please use a valid email';
            $fdMsgClass = 'alert-danger';
        }
        // check for valid phone number (contains only numbers)
        else if(false){
            // do it later
        }
        // send mail to the client informing about enquiry
        else{
            $to = $mailReciever;
            $from = $mailSender;
            $name = '';
            if(!empty(fdFname)) $name .= $fdFname . " ";
            if(!empty(fdLname)) $name .= $fdLname . " ";

            $subject = "Feedback from ABCDE site";
            
            $message = "<b>This is the Feedback Enquiry from ABCDE site</b>";

            $message .= "<hr> <b>Contact Information</b> <hr>";
            $message .= "<b>Name</b> : " . $name  ."<br>";
            if(!empty(fdEmail)) $message .= "<b>Email</b> : " . $fdEmail . "<br>";
            if(!empty(fdPno)) $message .= "<b>Phone Number</b> : " . $fdPno . "<br>";
            
            $message .= "<hr><b>Feedback Given</b><hr>";
            if(!empty(fdSubject)) $message .= "<b>Subject<b> : " . $fdSubject . "<br>";
            if(!empty(fdMessage)) $message .= "<b>Message<b> : <br>" . $fdMessage . "<br>";

            //email headers
            $headers = "MIME-VERSION:1.0"."\r\n";
            $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

            //additional headers
            $headers .="From: ".$from."\r\n";

            if(mail($to, $subject,$message,$headers)){
                //email sent
                $fdMsg = 'Your email was sent';
                $fdMsgClass = 'alert-success';
            }
            else{
                //Failed 
                $fdMsg= "your email was not sent";
                $fdMsgClass="alert-danger";
            }
        }


    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABCDEducators</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/main.js" defer></script>

    <!-- smooth scroll script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.min.js"></script>
</head>
<body>
    <!-- header starts here -->
    <header>
        <div class="logo">
            ABCDE
        </div>
            <!-- desktop menu here-->
        <div class="desktop-menu">
            <li class="desktop-menu-item"><a href="#home" class="menu-items-home smooth-scroll">Home</a></li>
            <li class="desktop-menu-item"><a href="#programs" class="menu-items-programs smooth-scroll">Programs</a></li>
            <li class="desktop-menu-item"><a href="#courses" class="menu-items-courses smooth-scroll">Courses</a></li>
            <li class="desktop-menu-item"><a href="#about" class="menu-items-about smooth-scroll">About Us</a></li>
            <li class="desktop-menu-item"><a href="#contact" class="menu-items-contact smooth-scroll">Contact Us</a></li>
        </div>
            <!-- mobile menu here -->
        <div class="mobile-menu">
            <div class="menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
            </div>
            <div class="mobile-menu-list">
                <li class="mobile-menu-list-item close-btn"><button><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/></svg></button></li>

                <li class="mobile-menu-list-item"><a href="#home" class="menu-items-home smooth-scroll">Home</a></li>
                <li class="mobile-menu-list-item"><a href="#programs" class="menu-items-programs smooth-scroll">Programs</a></li>
                <li class="mobile-menu-list-item"><a href="#courses" class="menu-items-courses smooth-scroll">Courses</a></li>
                <li class="mobile-menu-list-item"><a href="#about" class="menu-items-about smooth-scroll">About Us</a></li>
                <li class="mobile-menu-list-item"><a href="#contact" class="menu-items-contact smooth-scroll">Contact Us</a></li>
            </div>
        </div>
    </header>

<!-- hero section starts -->
    <section class="hero" id = "home">
       <div class="hero-background-img"><img src="/assets/img/hero_1-min.jpg" alt=""></div>
        <div class="hero-content">
            <h1 class="hero-content-heading">Learn From the Experts</h1>
            <p class="hero-content-para">The best teachers from whole world are now at your doorstep , with better learning techniques in your native accents.</p>
            <button class="hero-content-btn"><a href="tel:8005405260">Call Us Now</a></button>
        </div>
        <div class="hero-illustration">
            <img src="/assets/img/hero-illustration.svg" alt="">
        </div>
    </section>

<!-- programs description here  -->
    <section class="programs" id = "programs">
        <div class="programs-heading">Programs</div>
        <div class="programs-content">
            <div class="prog-box-container">
            <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="/assets/img/img_1-min.jpg" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">Online Tutorials</h1>
                    <p class="prog-box-content-para">Best online tutoring in your local accent to brighten your child's future even further.</p>
                </div>
            </div>
            <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="/assets/img/img_2-min.jpg" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">Homework Help</h1>
                    <p class="prog-box-content-para">We provide in-depth help with homework also, to reduce the burden on child and to grasp the minute details of the concept.</p>
                </div>
            </div>
        </div>

        <div class="prog-box-container">

            <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="/assets/img/img_3-min.jpg" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">1 on 1 Live Classes</h1>
                    <p class="prog-box-content-para">In one-on-one classes we have uniquely designed environment for your child only.</p>
                </div>
            </div>
             <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="/assets/img/img_4-min.jpg" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">All Subject Tutors</h1>
                    <p class="prog-box-content-para">You can find the tutor for all the subjects you need here. All Tutors are highly experienced in innovative ways of teaching</p>
                </div>
            </div>
        </div>
    </div>
    </section>


<!-- courses description here -->
    <section class="courses" id="courses">
        <div class="courses-heading">Courses</div>
        <div class="courses-para">We have the most curated list of the courses available from basic classroom courses to crash courses to help your child with those little details and excel as your child should be.</div>
        <div class="courses-content">
            <ul class="courses-content-list">
                <li class="courses-content-list-item">
                    Grade 1<sup>st</sup> To 12<sup>th</sup>
                </li>
                <li class="courses-content-list-item">
                    Elementary Maths to higher Mathematics
                </li>
                <li class="courses-content-list-item">
                    Chemistry, Physics, English language, Life Sciences.
                </li>
                <li class="courses-content-list-item">
                    Online Classes for different subjects like Mathematics, Science, English and other languages.
                </li>
                <li class="courses-content-list-item">
                    Other Courses like PSAT, SSAT, ACT, etc
                </li>

            </ul>
            <div class="courses-content-illustration">  
                 <img src="/assets/img/teacher-illustration.svg" alt="">
                </div>
        </div>
    </section>



<!-- demo form starts here -->
<section class="demo" id="demo">
        <div class="demo-background-img"><img src="/assets/img/hero_1-min.jpg" alt=""></div>
        <div class="demo-head">Request a free Demo Class</div>
        <div class="demo-content">
            <div class="demo-content-form">
                <?php if($msg != '') : ?>
                    <div class = "alert <?php echo $msgclass;?>">
                        <?php echo $msg?>
                    </div>
                <?php endif ;?>

                <form method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="text" name ="email" placeholder = "Email" 
                value = "<?php echo isset($_POST['email']) ? $email : '' ;?>">

                <input type="text" name ="name" placeholder = "Name"
                value = "<?php echo isset($_POST['name']) ? $name : '' ;?>">
                
                <input type="text" name = "state" placeholder = "State" 
                value = "<?php echo isset($_POST['state']) ? $state : '' ;?>">
                
                <input type="text" name = "course" placeholder = "Enter Your Course" 
                value = "<?php echo isset($_POST['course']) ? $course : '' ;?>">
                
                <input type="submit" value="Submit" name= "submit">
                </form>

                <!-- for after submit action -->
            </div>
            <div class="demo-content-illustration">
                <img src="/assets/img/tutorial-illustration.svg" alt="">
            </div>
        </div>
    </section>

<!-- testimony carousel here -->

<!-- testimony section -->
<section class="testimony">
    <h1 class="testimony-head">Student Experience</h1>
    <div class="testimony-content">
        <div class="testimony-says">
            <p>The institute has helped me in various of ways to get better at the job</p>
            <h3 class="testimony-says-sayer">Rahul Bhargav</h3>
            <h6 class="testimony-says-rank">Student</h6>

        </div>

        <div class="testimony-says">
            <p>Newer ways of teaching really help to build the concepts from ground up</p>
            <h3 class="testimony-says-sayer">Vaibhav Sharma</h3>
            <h6 class="testimony-says-rank">Student</h6>

        </div>

        <div class="testimony-says">
            <p>The engaging classes and interactive teaching methods sure help be excel in my subject</p>
            <h3 class="testimony-says-sayer">Divya Shrivastav</h3>
            <h6 class="testimony-says-rank">Student</h6>

        </div>

        <div class="testimony-says">
            <p>The best teachers i have ever learnt from in my entire life. Blessed to be here</p>
            <h3 class="testimony-says-sayer">Rajeev Makhani</h3>
            <h6 class="testimony-says-rank">Student</h6>

        </div>
        <div class="testimony-says">
            <p>Overall environment is very good and my kind is very much impressed</p>
            <h3 class="testimony-says-sayer">Rohit Mehra</h3>
            <h6 class="testimony-says-rank">Father of a Sanjay Mehra</h6>

        </div>
        <div class="testimony-says">
            <p>Worth every penny i have ever spent in the education for the coaching</p>
            <h3 class="testimony-says-sayer">Rekha Verma</h3>
            <h6 class="testimony-says-rank">Mother of Rahul Verma</h6>

        </div>

        <button class="next-btn">&#10095;</button>
        <button class="prev-btn">&#10094;</button>
        
    </div>
    
</section>
    
<!-- for common background of about and contact section -->
    <div class="about-contact-bg">
        <img src="/assets/img/about-contact-bg-min.jpeg" alt="" class= "bg-img">

    <!-- about section starts here -->
    <section class="about" id = "about">
        <h1 class="about-head">About ABCDE</h1>
        <p class="about-para">
           
            Auxilium Beneficium Concept Developers and Educators (ABCDE) is an innovative institution working in the field of online education. We are an India based company with a team of well trained intellectuals. The teaching style of our company is most suited to the individual requirements of kids across United States, Canada and European Countries. We treat every child as an asset for us and had been very successful in building them. For better grades in their respective subjects.
            <br> <br>

            We are working in this field for past 8 years and now are expanding through ABCDE.
        </p>
    </section>

    <!-- contact section start here -->
    <section class="contact" id = "contact">
        <div class="contact-content">
            <h1 class="contact-content-head">Give us a Call</h1>
            <p class="contact-content-para">To reach us or enquire about anything
                <ul class="contact-content-list">
                    <li class="contact-content-list-item">
                        Call us at : +91 9696894360
                    </li>
                    <li class="contact-content-list-item">
                        Whatsapp us at : +91 9696894360
                    </li>
    
                </ul>
            </p>
           
            <button><a href="tel:9696894360">Make a call</a></button>
        </div>

        <div class="contact-illustration">
            <img src="/assets/img/about-bg-img.svg" alt="">
        </div>
    </section>

    </div>


<!-- feedback form starts here-->
<section class="feedback" id="feedback">
        <div class="feedback-head">Give us Feedback</div>
        <div class="feedback-form">

                <?php if($fdMsg != '') : ?>
                    <div class = "alert <?php echo $fdMsgClass;?>">
                        <?php echo $fdMsg?>
                    </div>
                <?php endif ;?>

        <form method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
            <div class="feedback-form-line">
                <input type="text" name = "fd-fname"placeholder="First Name" value = "">
                <input type="text" name = "fd-lname"placeholder="Last Name" value = "">
            </div>
            <div class="feedback-form-line">
                <input type="text" name = "fd-email" placeholder="Email" value = "">
                <input type="text" name = "fd-pno" placeholder="Phone Number" value = "">
            </div>
            <div class="feedback-form-line line-3">
                <input type="text" name = "fd-subject" placeholder="Subject" value = "">
            </div>
            <div class="feedback-form-line line-4">
                <textarea name="fd-message" id="" cols="30" rows="10" placeholder = "Write Your Message Here"></textarea>
            </div>
            <div class="feedback-form-line line-5">
                <input type="submit" value="Send" name ="fd-submit">
            </div>
        </form>    
        </div>
</section>

<!-- footer starts here -->
    <footer>
        <div class="foot-about">
            <div class="foot-about-head">ABOUT ABCDE</div>
            <div class="foot-about-para">
                We are a leading name in the education sector to provide overseas educations in the most unique and new you have ever imagine.
            </div>
        </div>
        <div class="foot-links">
            <div class="foot-links-head">LINKS</div>
            <div class="foot-links-content">
                <li class="foot-links-content-item"><a href="#home" class="smooth-scroll">HOME</a></li>
                <li class="foot-links-content-item"><a href="#programs" class="smooth-scroll">Programs</a></li>
                <li class="foot-links-content-item"><a href="#courses" class="smooth-scroll">Courses</a></li>
                <li class="foot-links-content-item"><a href="#demo" class="smooth-scroll">Free Demo</a></li>
                <li class="foot-links-content-item"><a href="#feedback" class="smooth-scroll">Feedback</a></li>
            </div>
        </div>
    </footer>
 
</body>
</html>