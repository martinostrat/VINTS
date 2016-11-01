<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <title>Kontakt | Vints</title>

    <link href="bootstrap/css/vints.css" rel="stylesheet" />
    <link href="stylesheet.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="script" href="kontakt.js"/>
    <script src="bootstrap/js/jquery-3.1.0.js"></script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <div class="navbar-header">
              <a class="navbar-brand" href="vints.html">
                  <img class="hidden-xs" id="suurlogo" alt="Portable Winch" src="pildid/PW-White.png" />
                  <img class="visible-xs" id="vaikelogo" alt="Portable Winch" src="pildid/PW-White.png" />
              </a>
              <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
          </div>
          <div class="collapse navbar-collapse navHeaderCollapse">
              <ul class="nav navbar-nav navbar-right" id="navi-ul">
                  <li role="presentation" id="navi-li">
                      <a href="vints.html">Pealeht</a>
                  </li>
                  <li role="presentation">
                      <a href="tooteduus.html">Tooted</a>
                  </li>
                  <li role="presentation">
                      <a href="hinnad.html">Hinnad</a>
                  </li>
                  <li role="presentation">
                      <a href="galerii.html">Galerii</a>
                  </li>
                  <li role="presentation" class="active">
                      <a href="kontakt.html">Kontakt</a>
                  </li>
                  <li role="presentation" class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lisainfo <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li role="presentation">
                              <a href="tehnilineinfo.html">Tehniline Info</a>
                          </li>
                          <li role="separator" class="divider"></li>
                          <li role="presentation">
                              <a href="kasutusjuh.html">Kasutusjuhendid</a>
                          </li>
                          <li role="separator" class="divider"></li>
                          <li role="presentation">
                              <a href="eelised.html">Vintsi Eelised</a>
                          </li>
                          <li role="separator" class="divider"></li>
                          <li role="presentation">
                              <a href="nouanded.html">Nõuanded</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <div class="kontaktwrap">
    <div id="contact_form" class="row">
      <div class="col-12 col-sm-12 col-lg-12">
        <h2>Tell Us What You Think...</h2>
        <p>We appreciate any feedback about your overall experience on our site or how to make it even better.  Please fill in the below form with any comments and we will get back to you.</p>
        <form role="form" id="feedbackForm">
          <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            <span class="help-block" style="display: none;">Please enter your name.</span>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
            <span class="help-block" style="display: none;">Please enter a valid e-mail address.</span>
          </div>
          <div class="form-group">
            <textarea rows="10" cols="100" class="form-control" id="message" name="message" placeholder="Message"></textarea>
            <span class="help-block" style="display: none;">Please enter a message.</span>
          </div>
          <img id="captcha" src="securimage/securimage_show.php" alt="CAPTCHA Image" />
          <a href="#" onclick="document.getElementById('captcha').src = 'securimage/securimage_show.php?' + Math.random(); return false" class="btn btn-info btn-sm">Show a Different Image</a><br/>
          <div class="form-group" style="margin-top: 10px;">
            <input type="text" class="form-control" name="captcha_code" id="captcha_code" placeholder="For security, please enter the code displayed in the box." />
            <span class="help-block" style="display: none;">Please enter the code displayed within the image.</span>
          </div>

          <span class="help-block" style="display: none;">Please enter a the security code.</span>
          <button type="submit" id="feedbackSubmit" class="btn btn-primary btn-lg" style="display: block; margin-top: 10px;">Send Feedback</button>
        </form>
      </div><!--/span-->
    </div><!--/row-->
</div>

    <script src="bootstrap/js/jquery-3.1.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>

<?php
  //start a session -- needed for Securimage Captcha check
  session_start();

  //add you e-mail address here
  define("MY_EMAIL", "martinostrat240@gmail.com");

  /**
   * Sets error header and json error message response.
   *
   * @param  String $messsage error message of response
   * @return void
   */
  function errorResponse ($messsage) {
    header('HTTP/1.1 500 Internal Server Error');
    die(json_encode(array('message' => $messsage)));
  }

  /**
   * Return a formatted message body of the form:
   * Name: <name of submitter>
   * Comment: <message/comment submitted by user>
   *
   * @param String $name     name of submitter
   * @param String $message message/comment submitted
   */
  function setMessageBody ($name, $message) {
    $message_body = "Name: " . $name."\n\n";
    $message_body .= "Comment:\n" . nl2br($message);
    return $message_body;
  }

  $email = $_POST['email'];
  $message = $_POST['message'];

  header('Content-type: application/json');
  //do some simple validation. this should have been validated on the client-side also
  if (empty($email) || empty($message)) {
  	errorResponse('Email or message is empty.');
  }

  //do Captcha check, make sure the submitter is not a robot:)...
  include_once '/securimage/securimage.php';
  $securimage = new Securimage();
  if (!$securimage->check($_POST['captcha_code'])) {
    errorResponse('Invalid Security Code');
  }

  //try to send the message
  if(mail(MY_EMAIL, "Feedback Form Results", setMessageBody($_POST["name"], $message), "From: $email")) {
  	echo json_encode(array('message' => 'Your message was successfully submitted.'));
  } else {
  	header('HTTP/1.1 500 Internal Server Error');
  	echo json_encode(array('message' => 'Unexpected error while attempting to send e-mail.'));
  }
?>
