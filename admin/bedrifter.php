<?php
$link = mysqli_connect("127.0.0.1","root-folder", "password", "database");

$uploaddir = '../Logo_filer/';

if (!isset($_GET["page"])) {
  $offset = 0;
} else {
  $offset = $_GET["page"];
}
$limit = 3;
$selectquery = 'select * from companies limit ' . $limit . ' offset ' . $offset*$limit;


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

    <div class="main-content">
      <div class="sider">
        <h1 class="overskrift">Bedrifter</h1>
        <a href="/Careco/add_company.html">Legg til ny bedrift</a>
        <table border = "1">
          <tr>
            <th>Navn</th>
            <th>Logo</th>
            <th>Epost</th>
            <th>Telefon</th>
            <th>Address</th>
            <th>Org-nummer</th>
            <th>Action</th>
         </tr>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
               echo "<td>" . $row["name"] . "</td>";
               echo "<td><img src=\" ".$uploaddir.$row["logo_file"]."  \"/></td>";
               echo "<td>" . $row["email"] . "</td>";
               echo "<td>" . $row["telephone"] . "</td>";
               echo "<td>" . $row["address"] . "</td>";
               echo "<td>" . $row["organization_number"] . "</td>";
               $urlslett = "/Careco/delete_company.php?id=" . $row["id"];
               $urlendre = "/Careco/edit_company.php?id=" . $row["id"];
               echo "<td><a href=$urlslett onclick = \"return confirm('Er du sikker på at du vil slette " . $row["name"] . "?')\">Slett</a><br><a href=$urlendre>Endre</a></td>";
            echo "</tr>";
          }
        ?>
        </table>
        <?php
        echo "<span class='next_and_prev_page'>";
          if ($offset > 0) {
            $prevpage = $offset - 1;
            echo "<a href='bedrifter.php?page=$prevpage'>Previous page</a>";
          } else {
            echo "<a id='thispage'></a>";
          }
          $neste = 'select * from companies limit ' . $limit . ' offset ' . ($offset+1)*$limit;
          $nesteresult = mysqli_query ($link, $neste);
          $test = mysqli_fetch_assoc($nesteresult);
          if ($test) {
            $nextpage = $offset + 1;
            echo "<a href='bedrifter.php?page=$nextpage'>Next page</a>";
          } else {
            echo "<a id='thispage'></a>";
          }
        echo "</span>";
        ?>
      </div>
    </div>

  </body>
</html>
