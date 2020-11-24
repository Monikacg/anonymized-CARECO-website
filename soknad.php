<?php

?><!DOCTYPE html>
<html lang="nb-no" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Søk</title>
    <link rel="stylesheet" href="./resources/css/index.css">
    <link rel="stylesheet" href="./resources/fonts/stylesheet.css">
    <script src="https://kit.fontawesome.com/32229c90e3.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./resources/images/favicon.ico" type="image/x-icon">
  </head>

  <body>
    <header>
      <nav  class="desktop">
        <a href="./index.html">
          <img src="./resources/images/Careco_symbol_orange.png" class="navlogo">
        </a>
        <ul>
          <li>
            <a href="./cv.html">Send din CV</a>
          </li>
          <li>
            <a href="./stillinger.html">Ledige stillinger</a>
          </li>
          <li>
            <a href="./careco.html">Om CARECO</a>
          </li>
          <li>
            <a href="./kontakt.html">Kontakt oss</a>
          </li>
        </ul>
      </nav>
      <nav class="mobile">
        <a href="./index.html">
          <img src="./resources/images/Careco_symbol_orange.png" class="navlogo">
        </a>
        <div class="nav-dropdownmeny">
          <a class="nav-button">
            <img src="./resources/images/bars-solid.png" alt="">
          </a>
          <div class="nav-container">
            <a href="./index.html">
              <img src="./resources/images/Careco_symbol_orange.png" class="navlogo">
            </a>
            <ul>
              <li>
                <a href="./cv.html">Send din CV</a>
              </li>
              <li>
                <a href="./stillinger.html">Ledige stillinger</a>
              </li>
              <li>
                <a href="./careco.html">Om CARECO</a>
              </li>
              <li>
                <a href="./kontakt.html">Kontakt oss</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="main-content">
      <div class="sider">
        <h1 class="overskrift sok">Interaction Designer - Telenor Digital</h1>
        <img src="./resources/images/telenordigital.png" alt="">
        <div class="form">
          <form action="./takk.html" method="POST">
            <div class="navn">
              <div class="for">
                <label for="first-name">Fornavn<span class="text-danger">*</span></label>
                <input type="text" name="first-name" id="first-name" required>
              </div>
              <div class="etter">
                <label for="last-name">Etternavn<span class="text-danger">*</span></label>
                <input type="text" name="last-name" id="last-name" required>
              </div>
            </div>
            <label for="email">Epost<span class="text-danger">*</span></label>
            <input type="email" name="email" id="email" required>
            <label for="phone">Telefon<span class="text-danger">*</span></label>
            <input type="text" name="phone" id="phone">
            <label for="linkedin">Linkedin profil link</label>
            <input type="url" name="linkedin" id="linkedin">
            <label for="cv">CV<span class="text-danger">*</span></label>
            <input type="file" name="cv" id="cv" accept="application/pdf" required>
            <label for="cover">Søknad<span class="text-danger">*</span></label>
            <input type="file" name="cover" id="cover" accept="application/pdf" required>
            <input type="submit" value="Send søknad" id="send">
          </form>
        </div>
      </div>
    </div>

    <footer>
      <div class="footerboks">
        <h1>
          <a href="./careco.html">Om CARECO</a>
        </h1>
        <p>Bli kjent med CARECO og tjenester som tilbys.</p>
        <p>Organisasjonsnummer:<br>920 465 889</p>
      </div>
      <div class="footerboks" id="kontakt">
        <div>
          <h1>
            <a href="./kontakt.html">Kontaktinformasjon</a>
          </h1>
          <p>kari@careco.no <br> +47 934 27 110</p>
        </div>
      </div>
      <div class="footerboks" id="icons">
        <h1>Følg oss</h1>
        <span>
          <a href="https://www.facebook.com/Carecoas/"><i class="fab fa-facebook"></i></a>
          <a href="https://www.linkedin.com/company/careco-as/?trk=ppro_cprof&originalSubdomain=no"><i class="fab fa-linkedin"></i></a>
        </span>
      </div>
    </footer>

  </body>
</html>
