<?php
$link = mysqli_connect("127.0.0.1","root-folder", "password", "database");

$uploaddir = '../Logo_filer/';

$id = $_GET["id"];
$selectquery = "SELECT * FROM companies WHERE id = $id";

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

$company_data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CV</title>
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

    <div class="main-content">
      <div class="CVskjema">
        <h1 class="overskrift">Endre bedrift</h1>
        <div class="form"> <!-- Logo	Epost	Telefon	Address	Org-nummer -->
          <form enctype="multipart/form-data" action="edit_company2.php?id=<?php echo $id; ?>" method="POST">
            <label for="name">navn</label>
            <input type="text" name="name" id="name" value="<?php echo $company_data["name"]; ?>">
            <label for="email">Epost</label>
            <input type="email" name="email" id="email" value="<?php echo $company_data["email"]; ?>">
            <label for="telephone">Telefon</label>
            <input type="text" name="telephone" id="telephone" value="<?php echo $company_data["telephone"]; ?>">
            <label for="address">adresse</label>
            <input type="text" name="address" id="address" value="<?php echo $company_data["address"]; ?>">
            <label for="organization_number">org nummer</label>
            <input type="number" name="organization_number" id="organization_number" value="<?php echo $company_data["organization_number"]; ?>">
            <label for="logo_file">Logo</label>
            <input type="file" name="logo_file" id="logo_file" accept="image/png">
            <?php echo "<img style=\"width:150px\" src=\" ".$uploaddir.$company_data["logo_file"]."  \"/>"; ?>
            <input type="submit" value="submit" id="send">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>
