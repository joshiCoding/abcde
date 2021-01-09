
<?php include 'data/data.php';?>
<?php include 'data/svgs.php';?>
<?php include 'data/config.php'?>


<!DOCTYPE html>
<html lang="en">

<?php include 'sections/head.php'?>

<body>

<!-- development warning -->
<?php if($dev == true):?>
    <div class="general-notice">
        <p>This site is under constant contsruction. So some or all features may appear broken at times. Please be patient untill official release.</p>
        <button class="general-notice-close">Close</button>
    </div>
<?php endif;?>



<!-- header starts here -->
<?php include 'sections/header.php'?>



<!-- hero section starts -->
<section class="hero" id = "home">
    <div class="hero-background-img"><img src="<?=$abspath;?>/assets/img/hero_1-min.jpg" alt=""></div>
    <div class="hero-content">
        <h1 class="hero-content-heading"><?=$heroHead;?></h1>
        <p class="hero-content-para"><?=$heroPara;?></p>
        <button class="hero-content-btn"><a href="tel:<?=$phone?>">Call Us Now</a></button>
    </div>
    <div class="hero-illustration">
        <img src="<?=$abspath;?>/assets/img/hero-illustration.svg" alt="">
    </div>
</section>




<!-- courses description here -->
<section class="courses" id="courses">
    <div class="courses-heading">Courses</div>
    <div class="courses-para"><?php echo $coursePara;?></div>
    <div class="courses-content">
        <ul class="courses-content-list">
            <?php for($i = 0 ; $i< count($courseList); $i++): ?>
            <li class='courses-content-list-item'>
                <?=$courseList[$i]?>
            </li>
            <?php endfor ;?>
        </ul>
        <div class="courses-content-illustration">  
                <img src="<?=$abspath?>/assets/img/teacher-illustration.svg" alt="">
            </div>
    </div>
</section>



<!-- demo form starts here -->
<section class="demo" id="demo">
    <!-- background image -->
    <div class="demo-background-img"><img src="<?=$abspath;?>/assets/img/hero_1-min.jpg" alt=""></div>

    <!-- demo header -->
    <div class="demo-head">Request a free Demo Class</div>

    <!-- demo body -->
    <div class="demo-content">
        <div class="demo-content-form">
            <!-- for before submit action -->
            <form method = "post" action="" class="demo-before-submit">
                <input type="text" name ="email" placeholder = "Email or Phone number" value = "" class = "demo-input demo-input-email" >
                <div class="demo-notification demo-email-notif"></div>

                <input type="text" name ="name" placeholder = "Name" value = "">
                <div class="demo-notification demo-name-notif"></div>
                
                <input type="text" name = "state" placeholder = "State" value = "">
                <div class="demo-notification demo-state-notif"></div>
                
                <input type="text" name = "course" placeholder = "Enter Your Course" value = "">
                <div class="demo-notification demo-course-notif"></div>
                
                <input type="submit" value="Request Demo" name= "submit">
            </form>

            <!-- for after submit action -->
            <div class="demo-after-submit">
                <p class="demo-response">Requesting Demo ...</p>
                <button>Request Again</button>
            </div>
                
                
        </div>
            
        <div class="demo-content-illustration">
            <img src="<?=$abspath?>/assets/img/tutorial-illustration.svg" alt="">
        </div>
    </div>
</section>


<!-- programs description here  -->
<section class="programs" id = "programs">
    <div class="programs-heading">Programs</div>
    
    <div class="programs-content">
        <div class="prog-box-container">
            <div class="programs-content-prog prog-box">
                <div class="prog-box-img">
                    <img src="<?=$abspath;?>/assets/img/img_1-min.jpg" alt="">
                </div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">Online Tutorials</h1>
                    <p class="prog-box-content-para">Best online tutoring in your local accent to brighten your child's future even further.</p>
                </div>
            </div>
            <div class="programs-content-prog prog-box">
                <div class="prog-box-img">
                    <img src="<?=$abspath;?>/assets/img/img_2-min.jpg" alt="">
                </div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">Homework Help</h1>
                    <p class="prog-box-content-para">We provide in-depth help with homework also, to reduce the burden on child and to grasp the minute details of the concept.</p>
                </div>
            </div>
        </div>

        <div class="prog-box-container">

            <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="<?=$abspath;?>/assets/img/img_3-min.jpg" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">1 on 1 Live Classes</h1>
                    <p class="prog-box-content-para">In one-on-one classes we have uniquely designed environment for your child only.</p>
                </div>
            </div>
             <div class="programs-content-prog prog-box">
                <div class="prog-box-img"><img src="<?=$abspath;?>/assets/img/img_4-min.jpg" alt=""></div>
                <div class="prog-box-content">
                    <h1 class="prog-box-content-head">All Subject Tutors</h1>
                    <p class="prog-box-content-para">You can find the tutor for all the subjects you need here. All Tutors are highly experienced in innovative ways of teaching</p>
                </div>
            </div>
        </div>
    </div>
    </section>



<!-- testimony section -->
<section class="testimony">
    <h1 class="testimony-head">Student Experience</h1>
    <div class="testimony-content">
        <?php for($i=0;$i<count($testimonySays);$i++):?>
            <div class="testimony-says">
                <p><?=$testimonySays[$i][0]?></p>
                <h3 class="testimony-says-sayer"><?=$testimonySays[$i][1]?></h3>
                <h6 class="testimony-says-rank"><?=$testimonySays[$i][2]?></h6>
            </div>
        <?php endfor;?>

        <button class="next-btn">&#10095;</button>
        <button class="prev-btn">&#10094;</button>        
    </div>    
</section>
    
<!-- for common background of about and contact section -->
<div class="about-contact-bg">
    <img src="<?=$abspath;?>/assets/img/about-contact-bg-min.jpeg" alt="" class= "bg-img">

    <!-- about section starts here -->
    <section class="about" id = "about">
        <h1 class="about-head">About ABCDE</h1>
        <p class="about-para">
        <?=$aboutPara?>
        </p>
    </section>

    <!-- contact section start here -->
    <section class="contact" id = "contact">
        <div class="contact-content">
            <h1 class="contact-content-head">Give us a Call</h1>
            <p class="contact-content-para">To reach us or enquire about anything
                <ul class="contact-content-list">
                    <li class="contact-content-list-item">
                        <a href="tel:<?=$phone?>"> Call us at : +91 <?=$phone?></a>
                    </li>
                    
                    <li class="contact-content-list-item">
                    <a href="https://wa.me/+91<?=$phone?>?text=<?=$wappMsg?>">Whatsapp us at : +91 <?=$phone?>
                        </a>
                    </li>

                    <li class="contact-content-list-item">Email :<a href="mailto:<?=$email?>"><?=$email?></a></li>
    
                </ul>
            </p>
           
            <button><a href="tel:<?=$phone?>">Make a call</a></button>
        </div>

        <div class="contact-illustration">
            <img src="<?=$abspath;?>/assets/img/about-bg-img.svg" alt="">
        </div>
    </section>

    </div>


<!-- feedback form starts here-->
<section class="feedback" id="feedback">
        <div class="feedback-head">Give us Feedback</div>
        <div class="feedback-form">
        <!-- for before submit action -->
        <form method = "post" action="" class = "feedback-before-submit">
    
            <div class="feedback-form-line">
                <input type="text" name = "fd-fname"placeholder="First Name" value = "">                
                <input type="text" name = "fd-lname"placeholder="Last Name" value = "">
            </div>
            <div class="fd-notification fd-name-notif">Name Error</div>
            
            <div class="feedback-form-line">
                <div>
                    <input type="text" name = "fd-email" placeholder="Email" value = "">
                    <div class="fd-notification fd-email-notif">Email Error</div>
                </div>

                <div>
                    <input type="text" name = "fd-pno" placeholder="Phone Number" value = "">
                    <div class="fd-notification fd-pno-notif">Phone Error</div>
                </div>
            </div>
            
            <div class="feedback-form-line line-3">
                <input type="text" name = "fd-subject" placeholder="Subject" value = "">
            </div>
            <div class="fd-notification fd-sub-notif">Subject or Message Error</div>

            <div class="feedback-form-line line-4">
                <textarea name="fd-message" id="" cols="30" rows="10" placeholder = "Write Your Message Here"></textarea>
            </div>

            <div class="feedback-form-line line-5">
                <input type="submit" value="Send" name ="fd-submit">
            </div>
        </form>  
        
         <!-- for after submit action -->
         <div class="feedback-after-submit">
            <p class= "feedback-response">Sending Feedback...</p>
            <button>Resend</button>
        </div>
         
        </div>
</section>

<!-- footer starts here -->
<footer>
    <div class="foot-info">
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
    
        <div class="foot-links">
            <div class="foot-links-head">Contact Information</div>
            <div class="foot-links-content">
                <li class="foot-links-content-item"> Phone : <br><a href="tel:<?=$phone?>"><?=$phone?></a></li>
                <li class="foot-links-content-item">Whatsapp : <br>
                <a href="https://wa.me/+91<?=$phone?>?text=<?=$wappMsg?>">+91 <?=$phone?></a></li>
                <li class="foot-links-content-item">Email : <br><a href="mailto:<?=$email?>"><?=$email?></a></li>
            </div>
        </div>

        <div class="foot-about">
            <div class="foot-about-head">ABOUT ABCDE</div>
            <div class="foot-about-para">
                <?=$footerAbout?>
            </div>
        </div>
    </div>

    <div class="foot-copyright">
        <p><?=$copyright?></p>
        <p>Developed and maintained by : <a href="<?=$developerSite?>"><?=$developer?></a></p>
    </div>
</footer>
 
</body>
</html>

