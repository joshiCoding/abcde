<?php 
//message variables
$msg = '';
$msg_class = '';

//check for submission
if(filter_has_var(INPUT_POST, 'submit')){
    //get data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $state = htmlspecailchars($_POST['state']);
    $course = htmlspecialchars($_POST['course']);

    //check required fields
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
            $toEmail = 'mohit9451joshi@gmail.com';
            $subject = 'Contact Request Form of '. $name;
            $body = '<h2>Contact Request</h2>
                    <h4>Name</h4> : <p>'.$name.'</p>
                    <h4>Email</h4> : <p>'.$email.'</p>
                    <h4>Course</h4> : <p>'.$course.'</p>
                    <h4>State</h4> : <p>'.$state.'</p>'; 

            //email headers
            $headers = "MIME-VERSION:1.0"."\r\n";
            $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";

            //additional headers
            $headers .="From:".$name."<".$email.">"."\r\n";

            if(mail($toEmail, $subject,$body,$headers)){
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

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABCDEducators</title>
    <link rel="stylesheet" href=" {{ '/assets/css/main.css'  | absolute_url }}">
    <script src="{{ '/assets/js/main.js' |absolute_url }}" defer></script>

    <!-- smooth scroll script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/smooth-scroll/16.1.3/smooth-scroll.min.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            ABCDE
        </div>

        <div class="desktop-menu">
            <li class="desktop-menu-item"><a href="#home" class="menu-items-home smooth-scroll">Home</a></li>
            <li class="desktop-menu-item"><a href="#programs" class="menu-items-programs smooth-scroll">Programs</a></li>
            <li class="desktop-menu-item"><a href="#courses" class="menu-items-courses smooth-scroll">Courses</a></li>
            <li class="desktop-menu-item"><a href="#about" class="menu-items-about smooth-scroll">About Us</a></li>
            <li class="desktop-menu-item"><a href="#contact" class="menu-items-contact smooth-scroll">Contact Us</a></li>
        </div>

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

    <section class="hero" id = "home">
       <div class="hero-background-img"><img src="{{ '/assets/img/hero_1-min.jpg' |absolute_url }}" alt=""></div>
        <div class="hero-content">
            <h1 class="hero-content-heading">Learn From the Experts</h1>
            <p class="hero-content-para">The best teachers from whole world are now at your doorstep , with better learning techniques in your native accents.</p>
            <button class="hero-content-btn"><a href="tel:8005405260">Call Us Now</a></button>
        </div>
        <div class="hero-illustration">
            <img src="{{ '/assets/img/hero-illustration.svg' | absolute_url}} " alt="">
        </div>
    </section>

    <section class="programs" id = "programs">
        <div class="programs-heading">Programs</div>
        <div class="programs-content">
            <div class="prog-box-container">
            <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="{{ '/assets/img/img_1-min.jpg' | absolute_url }}" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">Online Tutorials</h1>
                    <p class="prog-box-content-head">Best online tutoring in your local accent to brighten your child's future even further.</p>
                </div>
            </div>
            <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="{{ '/assets/img/img_2-min.jpg' | absolute_url }}" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">Homework Help</h1>
                    <p class="prog-box-content-head">We provide in-depth help with homework also, to reduce the burden on child and to grasp the minute details of the concept.</p>
                </div>
            </div>
        </div>

        <div class="prog-box-container">

            <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="{{ '/assets/img/img_3-min.jpg' | absolute_url }}" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">1 on 1 Live Classes</h1>
                    <p class="prog-box-content-head">In one-on-one classes we have uniquely designed environment for your child only.</p>
                </div>
            </div>
             <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="{{ '/assets/img/img_4-min.jpg' | absolute_url }}" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">All Subject Tutors</h1>
                    <p class="prog-box-content-head">You can find the tutor for all the subjects you need here. All Tutors are highly experienced in innovative ways of teaching</p>
                </div>
            </div>
        </div>
    </div>

    </section>

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
                 <img src="{{ '/assets/img/teacher-illustration.svg' | absolute_url}} " alt="">
                </div>
        </div>

    </section>

    <section class="demo" id="demo">
        <div class="demo-background-img"><img src="{{ '/assets/img/hero_1-min.jpg' |absolute_url }}" alt=""></div>
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
            </div>
            <div class="demo-content-illustration">
                <img src="{{ '/assets/img/tutorial-illustration.svg' | absolute_url}} " alt="">
            </div>
        </div>
    </section>

    <section class="feedback">
        <div class="feedback-head">Give us Feedback</div>
        <div class="feedback-form">
            <div class="feedback-form-line">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
            </div>
            <div class="feedback-form-line">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Phone Number">
            </div>
            <div class="feedback-form-line line-3">
                <input type="text" placeholder="Subject">
            </div>
            <div class="feedback-form-line line-4">
                <textarea name="message" id="" cols="30" rows="10" placeholder = "Write Your Message Here"></textarea>
            </div>
            <div class="feedback-form-line line-5">
                <input type="submit" value="Send">
            </div>
        </div>
    </section>

    <div class="about-contact-bg">
        <img src="{{ '/assets/img/about-contact-bg-min.jpeg' | absolute_url }}" alt="" class= "bg-img">

    <section class="about" id = "about">
        <h1 class="about-head">About ABCDE</h1>
        <p class="about-para">
           
            Auxilium Beneficium Concept Developers and Educators (ABCDE) is an innovative institution working in the field of online education. We are an India based company with a team of well trained intellectuals. The teaching style of our company is most suited to the individual requirements of kids across United States, Canada and European Countries. We treat every child as an asset for us and had been very successful in building them. For better grades in their respective subjects.
            <br> <br>

            We are working in this field for past 8 years and now are expanding through ABCDE.
        </p>
    </section>

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
           
            <button><a href="tel:8005405260">Make a call</a></button>
        </div>

        <div class="contact-illustration">
            <img src="{{ '/assets/img/about-bg-img.svg' | absolute_url }} " alt="">
        </div>
    </section>

    </div>

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
                <li class="foot-links-content-item"><a href="">HOME</a></li>
                <li class="foot-links-content-item"><a href="">Programs</a></li>
                <li class="foot-links-content-item"><a href="">Courses</a></li>
                <li class="foot-links-content-item"><a href="">Free Demo</a></li>
                <li class="foot-links-content-item"><a href="">Feedback</a></li>
            </div>
        </div>
        <!-- <div class="subscribe">
            <div class="subscribe-head">SUBSCRIBE</div>
            <div class="subscribe-para">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus pariatur magnam, eius nihil incidunt consequuntur quidem aliquam quisquam amet deleniti ipsa natus fugit. Qui quia pariatur mollitia dicta aperiam quidem!</div>
            <div class="subscribe-action">
                <input type="text" placeholder = "Email">
                <input type="submit" value="Send">
            </div>
        </div> -->
    </footer>
</body>
</html>

<!-- extra junk here -->

<!-- feedback form starts here-->
<section class="feedback" id="feedback">
        <div class="feedback-head">Give us Feedback</div>
        <div class="feedback-form">

                <?php if($msg != '') : ?>
                    <div class = "alert <?php echo $msgclass;?>">
                        <?php echo $msg?>
                    </div>
                <?php endif ;?>
        <form method = "post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    
            <div class="feedback-form-line">
                <input type="text" name = "fd-fname"placeholder="First Name" value = "<?php echo isset($_POST['email']) ? $email : '' ;?>">
                <input type="text" name = "fd-lname"placeholder="Last Name" value = "<?php echo isset($_POST['email']) ? $email : '' ;?>">
            </div>
            <div class="feedback-form-line">
                <input type="text" name = "fd-email" placeholder="Email" value = "<?php echo isset($_POST['email']) ? $email : '' ;?>">
                <input type="text" name = "fd-pno" placeholder="Phone Number" value = "<?php echo isset($_POST['email']) ? $email : '' ;?>">
            </div>
            <div class="feedback-form-line line-3">
                <input type="text" name = "fd-subject" placeholder="Subject" value = "<?php echo isset($_POST['email']) ? $email : '' ;?>">
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
