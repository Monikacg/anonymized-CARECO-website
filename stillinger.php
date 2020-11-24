<?php
$link = mysqli_connect("127.0.0.1","root-folder", "password", "database");

$uploaddir = './Logo_filer/';

if (!isset($_GET["page"])) {
  $offset = 0;
} else {
  $offset = $_GET["page"];
}
$limit = 10;
$selectquery = 'SELECT positions.*, companies.logo_file as company_logo, companies.name as company_name FROM positions INNER JOIN companies ON positions.company_id = companies.id limit ' . $limit . ' offset ' . $offset*$limit;

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
                <a href="./stillinger.html">Ledige stillinger</a></li><li><a href="./careco.html">Om CARECO</a>
              </li>
              <li>
                <a href="./kontakt.html">Kontakt oss</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div class="banner underside">
      <img src="./resources/images/Careco1U.jpg" alt="">
      <img src="./resources/images/Careco_logo_A_neg2.png" alt="" id="carecologo">
    </div>

    <div class="main-content">
      <div class="sider">
        <h1 class="overskrift">Stillinger</h1>

        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<a href=\"./stilling.php?id=" . $row["id"] ."\" class=\"stillingsboks\">
              <img src=\" ".$uploaddir.$row["company_logo"]."\" alt=\"". $row["company_name"] . " Logo\"  class=\"item-1\"/>
              <div class=\"item-2\">
                <h1>" . $row["title"] . "</h1>
                <p>" . $row["teaser"] . "</p>
              </div>
              <div class=\"item-3\">
                <p>" . $row["company_name"] . "</p>
                <p>" . $row["end_date"] . "</p>
                <p>" . $row["place"] . "</p>
              </div>
            </a>";
            /*echo "<tr>";
               echo "<td>" . $row["title"] . "</td>";
               echo "<td>" . $row["headline"] . "</td>";
               echo "<td>" . $row["percentage"] . "</td>";
               echo "<td>" . $row["position_type"] . "</td>";
               echo "<td>" . $row["company_name"] . "</td>";
               $urlslett = "/Careco/delete_position.php?id=" . $row["id"];
               $urlendre = "/Careco/edit_position.php?id=" . $row["id"];
               echo "<td><a href=$urlslett onclick = \"return confirm('Er du sikker på at du vil slette " . $row["title"] . "?')\">Slett</a><br><a href=$urlendre>Endre</a></td>";
            echo "</tr>";*/
          }

        echo "<span class='next_and_prev_page'>";
          if ($offset > 0) {
            $prevpage = $offset - 1;
            echo "<a href='stillinger.php?page=$prevpage'>Previous page</a>";
          } else {
            echo "<a id='thispage'></a>";
          }
          $neste = 'select * from positions limit ' . $limit . ' offset ' . ($offset+1)*$limit;
          $nesteresult = mysqli_query ($link, $neste);
          $test = mysqli_fetch_assoc($nesteresult);
          if ($test) {
            $nextpage = $offset + 1;
            echo "<a href='stillinger.php?page=$nextpage'>Next page</a>";
          } else {
            echo "<a id='thispage'></a>";
          }
        echo "</span>";
        ?>
      </div>
    </div>

  </body>
</html>
