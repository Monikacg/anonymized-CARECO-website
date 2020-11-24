<?php
$link = mysqli_connect("127.0.0.1","root-folder", "password", "database");

$uploaddir = './Logo_filer/';
$id = $_GET["id"];
$id = addslashes($id);
$id = (int)$id;

if (!is_int($id) || $id==0) {
  header("Location: stillinger.php");
  exit;
}

$selectquery = 'SELECT positions.*, companies.logo_file as company_logo, companies.name as company_name FROM positions INNER JOIN companies ON positions.company_id = companies.id WHERE positions.id=' . $_GET["id"];

if (!$link) {
  echo "error 1";
  exit;
}

$result = mysqli_query ($link, $selectquery);

if (!$result) {
  echo "error 2";
  echo mysqli_error($link);
  exit;
}

$row = mysqli_fetch_assoc($result);

?><!DOCTYPE html>
<html lang="nb-no" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $row["title"] ?></title>
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

    <div class="main-content" id="beskriv">
      <div class="sokesider">
        <h1 class="overskrift"><?php echo $row["headline"] ?></h1>
        <img src="<?php echo $uploaddir . $row["company_logo"] ?>" alt="">
        <div class="nokkelboks">
          <a href="soknad.php?id=<?php echo $row["id"] ?>" id="sok-button">Søk på stillingen</a>
          <div class="nokkelinfo">
            <h1>Nøkkelinformasjon</h1>
            <h2>Stillingstittel:</h2>
            <h3><?php echo $row["title"] ?></h3>
            <h2>Arbeidsgiver:</h2>
            <h3><?php echo $row["company_name"] ?></h3>
            <h2>Sted:</h2>
            <h3><?php echo $row["place"] ?></h3>
            <h2>Søknadsfrist:</h2>
            <h3><?php echo $row["end_date"] ?></h3>
          </div>
        </div>
        <?php
          if ($row["image"]) {
            echo "<img src=\"" . $uploaddir . $row["image"] . "\" alt=\"\">";
          }
        ?>
        <div>
          <?php echo $row["teaser"] ?>
        </div>
        <div>
          <?php echo $row["body"] ?>
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
