<?php
$link = mysqli_connect("127.0.0.1","root-folder", "password", "database");

$id = $_GET["id"];
$uploaddir = '../Logo_filer/';

$company_data = [
    "id"                  => $id,
    "name"                => $_POST['name'],
    "email"               => $_POST['email'],
    "telephone"           => $_POST['telephone'],
    "address"             => $_POST['address'],
    "organization_number" => $_POST['organization_number'],
    //"logo_file"           => $_POST['logo_file'],
];



if (is_uploaded_file($_FILES['logo_file']['tmp_name'])){
  $logoname = uniqid();
  $uploadfile = $uploaddir . $logoname;
  move_uploaded_file($_FILES['logo_file']['tmp_name'], $uploadfile);
  $updatequery = 'UPDATE `companies` SET `name` = \''.$company_data["name"].'\', `email` = \''.$company_data["email"].'\', `telephone` = \''.$company_data["telephone"].'\', `address` = \''.$company_data["address"].'\', `organization_number` = \''.$company_data["organization_number"].'\', `logo_file` = \''.$logoname.'\' WHERE `id`='.$id;
}
else {
  $updatequery = 'UPDATE `companies` SET `name` = \''.$company_data["name"].'\', `email` = \''.$company_data["email"].'\', `telephone` = \''.$company_data["telephone"].'\', `address` = \''.$company_data["address"].'\', `organization_number` = \''.$company_data["organization_number"].'\' WHERE `id`='.$id;
}

//var_dump($_FILES);
//exit;

//$uploadfile = $uploaddir . $_POST['logo_file'];
//move_uploaded_file($_FILES['logo_file']['tmp_name'], $uploadfile);



//echo $updatequery;
//exit;

if (!$link) {
  echo "error 1";
  exit;
}

$result = mysqli_query ($link, $updatequery);

if (!$result) {
  echo "error 2";
  echo mysqli_error($link);
  exit;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Takk!</title>
    <link rel="stylesheet" href="../resources/css/index.css">
    <link rel="stylesheet" href="../resources/fonts/stylesheet.css">
    <script src="https://kit.fontawesome.com/32229c90e3.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="../resources/images/favicon.ico" type="image/x-icon">
  </head>

  <body>
    <header>
      <nav  class="desktop">
        <a href="../index.html">
          <img src="../resources/images/Careco_symbol_orange.png" class="navlogo">
        </a>
        <ul>
          <li>
            <a href="../cv.html">Send din CV</a>
          </li>
          <li>
            <a href="../stillinger.html">Ledige stillinger</a>
          </li>
          <li>
            <a href="../careco.html">Om CARECO</a>
          </li>
          <li>
            <a href="../kontakt.html">Kontakt oss</a>
          </li>
        </ul>
      </nav>
      <nav class="mobile">
        <a href="../index.html">
          <img src="../resources/images/Careco_symbol_orange.png" class="navlogo">
        </a>
        <div class="nav-dropdownmeny">
          <a class="nav-button">
            <img src="../resources/images/bars-solid.png" alt="">
          </a>
          <div class="nav-container">
            <a href="../index.html">
              <img src="../resources/images/Careco_symbol_orange.png" class="navlogo">
            </a>
            <ul>
              <li>
                <a href="../cv.html">Send din CV</a>
              </li>
              <li>
                <a href="../stillinger.html">Ledige stillinger</a></li><li><a href="../careco.html">Om CARECO</a>
              </li>
              <li>
                <a href="../kontakt.html">Kontakt oss</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="banner underside">
      <img src="../resources/images/Careco1U.jpg" alt="">
      <img src="../resources/images/Careco_logo_A_neg2.png" alt="" id="carecologo">
    </div>

    <div class="main-content">
      <div class="sider">
        <h1 class="overskrift"><?php //echo ucfirst($name); ?> endret</h1>
        <p class="overskrift"><a href="../bedrifter.php">Back</a></p>
      </div>
    </div>

    <footer>
      <div class="footerboks">
        <h1>
          <a href="../careco.html">Om CARECO</a>
        </h1>
        <p>Bli kjent med CARECO og tjenester som tilbys.</p>
        <p>Organisasjonsnummer:<br>920 465 889</p>
      </div>
      <div class="footerboks" id="kontakt">
        <div>
          <h1>
            <a href="../kontakt.html">Kontaktinformasjon</a>
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
