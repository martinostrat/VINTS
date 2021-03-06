<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Kontakt | Vints</title>
    <link href="bootstrap/css/vints.css" rel="stylesheet" />
    <link href="stylesheet.css" rel="stylesheet" />
    <link rel="stylesheet" href="vintsid.css">
    <link rel="stylesheet" href="kontakt.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="bootstrap/js/jquery-3.1.0.js"></script>
    <script src="bootstrap/js/jquery-3.1.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Raleway" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
          <div class="navbar-header">
              <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
          </div>
          <div class="collapse navbar-collapse navHeaderCollapse">
              <ul class="nav navbar-nav " id="navi-ul">
                  <li role="presentation" class="active menu_item" id="navi-li">
                      <a href="pealeht.html">Pealeht</a>
                  </li>
                  <li role="presentation" class="menu_item active">
                      <a href="vintsid.html">Vintsid</a>
                  </li>
                  <li role="presentation" class="menu_item active">
                      <a href="tooriistad.html">Tööriistad</a>
                  </li>
                  <li role="presentation" class="menu_item active">
                      <a href="lisavarustus.html">Lisavarustus</a>
                  </li>
                  <li role="presentation" class="menu_item active">
                      <a href="hinnad.html">Hinnad</a>
                  </li>
                  <li role="presentation" class="menu_item active">
                      <a href="kontakt.html" class="inuse">Kontakt</a>
                  </li>
                  <li role="presentation" class="dropdown menu_item active">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lisainfo <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li role="presentation" class="menu_item_sub">
                              <a href="tehnilineinfo.html">Tehniline Info</a>
                          </li>
                          <li role="presentation">
                              <a href="kasutusjuh.html">Kasutusjuhendid</a>
                          </li>
                          <li role="presentation" >
                              <a href="galerii.html">Galerii</a>
                          </li>
                          <li role="presentation">
                              <a href="eelised.html">Vintsi Eelised</a>
                          </li>
                          <li role="presentation">
                              <a href="nouanded.html" id="no-border">Nõuanded</a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </div>
      </div>
  </nav>

  <div class="container">
<form action="message.php" method="post">
  <ul class="flex-outer">
    <li>
      <label for="first-name">Eesnimi*</label>
      <input type="text" id="first-name" name="fname" required placeholder="Eesnimi">
    </li>
    <li>
      <label for="last-name">Perekonnanimi*</label>
      <input type="text" id="last-name" name="lname" required placeholder="Perekonnanimi">
    </li>
    <li>
      <label for="email">Email*</label>
      <input type="email" id="email" name="email" required placeholder="Email">
    </li>
    <li>
      <label for="phone">Telefon</label>
      <input type="tel" id="phone" name="phone" placeholder="Telefon">
    </li>
    <li>
      <label for="message">Sõnum*</label>
      <textarea rows="6" id="message" name="message" required placeholder="Sõnum"></textarea>
    </li>
      <div class="g-recaptcha" data-sitekey="6Lf74BkUAAAAAKvISR5VxXmNepS6wDRWRnI03s9n"></div>
    <li>
      <button type="submit" name="submit">SAADA</button>
    </li>
  </ul>
</form>
</div>

    <div class="kontaktmuu">
        <p>
            Kui mingil põhjusel kontaktivormi kaudu kirja saatmine ebaõnnestus saate alati võtta ühendust all oleva informatsiooni teel.
            <br>
            <br> Telefon: +372 53 330 641 või +372 50 83 731

            <br>
            <br> E-mail: info@vints.ee
        </p>
    </div>

    <div class="jalus kontaktjalus">
        <div class="row ">
            <div class="col-sm-12 ">
              <p class="text-center tooriistad_p">
                  Tel: +372 53 33 06 41 või  +372 50 83 731 E-mail: info@vints.ee
              </p>
            </div>
        </div>
    </div>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-90583306-1', 'auto');
        ga('send', 'pageview');
    </script>

</body>

</html>
