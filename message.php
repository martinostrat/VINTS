<?php
if(isset($_POST['submit'])) {
  $secret = '6Lf74BkUAAAAAGxPhKM1Hm4xKOKM0yX5bVN0EO_i';
  $response = $_POST['g-recaptcha-response'];
  $remoteip = $_SERVER['REMOTE_ADDR'];

  $url = file_get_contents(
  "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");
  $result = json_decode($url, TRUE);
  if($result['success'] == 1) {
    $to = "martin.ostrat@khk.ee";
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $message_full = '<p>'.$message.'</p>';
    $message_full .= '<br /><br /><br />Eesnimi:'.$fname.'<br />';
    $message_full .= 'Perekonnanimi: '.$lname.'<br />';
    $message_full .= 'Telefon: '.$phone.'<br />';
    $message_full .= 'Email: '.$email;

    $headers = "Content-type: text/html\r\n";


    mail($to, "Vints.ee sõnum", $message_full, $headers);
    echo $message_full;
  } else {
    echo 'ei tööta';
  }

}

 ?>
