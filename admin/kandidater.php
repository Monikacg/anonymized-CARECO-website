<?php
$link = mysqli_connect("127.0.0.1","root-folder", "password", "database");

$uploaddir = '../CVfiler/';

if (!isset($_GET["page"])) {
  $offset = 0;
} else {
  $offset = $_GET["page"];
}
$limit = 10;
$selectquery = 'select * from cver limit ' . $limit . ' offset ' . $offset*$limit;

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
        <h1 class="overskrift">Kandidater</h1>
        <table border = "1">
          <tr>
            <th>Navn</th>
            <th>epost</th>
            <th>telefon</th>
            <th>linkedin</th>
            <th>CV</th>
         </tr>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
               echo "<td>" . $row["fornavn"] . " " . $row["etternavn"] . "</td>";
               echo "<td>" . $row["epost"] . "</td>";
               echo "<td>" . $row["telefon"] . "</td>";
               echo "<td>" . $row["linkedin"] . "</td>";
               echo "<td>
<a href=\" ".$uploaddir.$row["cv"]."  \"> Last ned </a> </td>";
            echo "</tr>";
          }
        ?>
        </table>
        <?php
        echo "<span class='next_and_prev_page'>";
          if ($offset > 0) {
            $prevpage = $offset - 1;
            echo "<a href='kandidater.php?page=$prevpage'>Previous page</a>";
          } else {
            echo "<a id='thispage'></a>";
          }
          $neste = 'select * from cver limit ' . $limit . ' offset ' . ($offset+1)*$limit;
          $nesteresult = mysqli_query ($link, $neste);
          $test = mysqli_fetch_assoc($nesteresult);
          if ($test) {
            $nextpage = $offset + 1;
            echo "<a id='nextpage' href='kandidater.php?page=$nextpage'>Next page</a>";
          } else {
            echo "<a id='thispage'></a>";
          }

        echo "</span>";
        ?>
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
