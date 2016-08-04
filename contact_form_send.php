<?php
if(isset($_POST['email'])) {

    $email_to = "nisarg.joshi.95@gmail.com";

    $email_subject = "PORTFOLIO CONTACT";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {

        died("I'm sorry, but there appears to be a problem with the form you submitted.");
    }

    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }
    $string_exp = "/^[A-Za-z .'-]+$/";
    if(!preg_match($string_exp,$first_name)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }
    if(!preg_match($string_exp,$last_name)) {
        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    }
    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }
    if(strlen($error_message) > 0) {
        died($error_message);
    }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
    // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);  
?>

<!-- place your own success html below -->
<link rel="stylesheet" href="assets/css/reset.css" type="text/css">
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Bungee+Shade" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<div class="nav_container">
            <ul class="navbar">
                <!--left half of menu bar-->
                <li class="navitem_title"><h1>Nisarg Joshi</h1></li>
                <!--right half of menu bar-->
                <li class="navitem_right" style="background-color: #E6AA68"><a href="contact.html" id="contact">Contact</a></li>
                <li class="navitem_right"><a href="portfolio.html"  id="portfolio">Portfolio</a></li>
                <li class="navitem_right"><a href="index.html">About</a></li>
            </ul>
        </div>
        <div class="push"></div>
        <!--main content area--> 
        <div class="main_content_area">
            <!--about blurb-->
            <div class="content_section" align="center" style="margin-bottom: 50;">
                <h1>Contact</h1> <hr>
                <div class="textbox">
                    <!--confirmation-->
                    <p>Thank you for contacting me. I will be in touch with you shortly.</p>
                    <a href="index.html" style="text-decoration: none"><div class="fancy_link">Done</div></a>
                </div>
            </div>
            <!--sidebar-->
            <section>
            <div class="sidebar" align="center">
                <h1>Connect</h1> <hr>
                <div class="textbox">
                    <a href="https://www.facebook.com/nisargj" target="_blank"><img src="assets/images/facebook.png" class="social_icon"></a>
                    <a href="https://twitter.com/badguynini" target="_blank"><img src="assets/images/twitter.png"  class="social_icon"></a>
                    <a href="https://www.linkedin.com/in/nisarg-joshi-342a5153" target="_blank"><img src="assets/images/linkedin.png" class="social_icon"></a>
                    <a href="https://github.com/nisargjoshi95" target="_blank"><img src="assets/images/github.png" class="social_icon"></a> <br>
                    <a href="https://docs.google.com/document/d/1uTY7B04eJS5L-0M54UyQdlgNxRznoD-9ZeVL2MdUlw8/export?format=pdf" style="text-decoration: none;"><div class="fancy_link">Resume</div></a>
                </div>
            </div>
            <div id="whatsUp" class="sidebar" align="center">
                <h1>Currently...</h1> <hr>
                <div class="textbox">
                    <p>Attending The Coding Boot Camp at UT. Hook 'em!&#129304</p>
                </div>
            </div>
            </section>
        </div>
        <div class="push"></div>
        <footer class="footer">&copy Copyright 2016 Nisarg Joshi</footer>

<?php
}
die();
?>