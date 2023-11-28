<!DOCTYPE html>

<html>
<head>
  <title>Rövidpályás gyorskorcsolya a téli olimpiai játékokon</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="olimpia2018.css">
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teliolimpia2018";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}


// Helyszínek
$helyszinek_query = "SELECT varos, sportagneve, versenyszamok, helyszin FROM sportagak ORDER BY varos";
$helyszinek_result = $conn->query($helyszinek_query);

echo "<h2>Dél-Koreai téli olimpiai játékok 2018, helyszínek:</h2>";
echo "<table border='1'>";
echo "<tr><th>Város</th><th>Sportág</th><th>Helyszín</th><th>Versenyszámok</th></tr>";
while ($row = $helyszinek_result->fetch_assoc()) {
    echo "<tr><td>{$row['varos']}</td><td>{$row['sportagneve']}</td><td>{$row['helyszin']}</td><td>{$row['versenyszamok']}</td></tr>";
}
echo "</table>";


// Helyezések listája
$helyezesek_query = "SELECT orszag, arany, ezust, bronz FROM helyezettek ORDER BY orszag";
$helyezesek_result = $conn->query($helyezesek_query);

echo "<h2>Helyezések listája:</h2>";
echo "<table border='1'>";
echo "<tr><th>Ország</th><th>Arany</th><th>Ezüst</th><th>Bronz</th></tr>";
while ($row = $helyezesek_result->fetch_assoc()) {
    echo "<tr><td>{$row['orszag']}</td><td>{$row['arany']}</td><td>{$row['ezust']}</td><td>{$row['bronz']}</td></tr>";
}
echo "</table>";


// Éremszerzők
$eremszerzok_query = "SELECT DISTINCT orszag FROM helyezettek";
$eremszerzok_result = $conn->query($eremszerzok_query);

echo "<h2>Éremszerzők listája:</h2>";
echo "<form method='post' action=''>";
echo "<label for='orszag'>Válassza ki, melyik résztvevő ország adatait szeretné látni: </label>";
echo "<select name='orszag' id='orszag'>";
while ($row = $eremszerzok_result->fetch_assoc()) {
    echo "<option value='{$row['orszag']}'>{$row['orszag']}</option>";
}

echo "</select>";
echo "<br>";
echo "<input type='submit' name='submit' value='Kiválaszt'>";
echo "</form>";

// Éremszerzők listája megjelenítése
if (isset($_POST['submit'])) {
    $valasztott_orszag = $_POST['orszag'];
    $valasztott_query = "SELECT helyezes, SUM(arany+ezust+bronz) AS ermek_osszesen FROM helyezettek WHERE orszag = '$valasztott_orszag' GROUP BY helyezes";
    $valasztott_result = $conn->query($valasztott_query);
    echo "<table border='1'>";
    echo "<h3>A kiválasztott éremszerző adatai: $valasztott_orszag</h3>";
    echo "<tr><th>Helyezés</th><th>Érmek összesen</th></tr>";
    while ($row = $valasztott_result->fetch_assoc()) {
        echo "<tr><td>{$row['helyezes']}</td><td>{$row['ermek_osszesen']}</td></tr>";
    }
    echo "</table>";
}

// Adatbázis kapcsolat lezárása
$conn->close();
?>

  
<div>
    <div>
<h1>Téli olimpiai játékok</h1>
    </div>

    <div>
    <div>
        <h3>Kinai téli olompiai játékok</h3>
        <p><img src="https://commons.wikimedia.org/wiki/File:2022_Winter_Olympics_logo.svg"/>
        <p>
          eijing2022.cn, Public domain, via Wikimedia Commons
          A XXIV. téli olimpiai játékokat 2022. február 4. és február 20. között rendezték a kínai Pekingben. A rendező várost a 128. IOC gyűlésen választotta ki a Nemzetközi Olimpiai Bizottság 2015. július 31-én a malajziai Kuala Lumpurban. A 2022-es téli olimpiának 25 helyszíne van. A bázis Pekingben található, amely otthont ad például a jégkorong, a gyorskorcsolya, a curling versenyeknek. A 2022. február 4. és 20. között zajló pekingi téli olimpiai játékok egyetlen új, a játékokra emelt állandó helyszíne az Ice Ribbon, azaz Jégszalag.
          Peking a Kínai Népköztársaság fővárosa, négy tartományi jogú városának egyike, a Pekingi főegyházmegye érseki székvárosa. Pekinget északról, nyugatról, délről és kis részben keletről Hopej tartomány határolja, míg délkeletről Tiencsin tartománnyal szomszédos.
      </p>
        <div>
            <div>
                <h3>Helyszinek:</h3>
                <table>
                    <thead>
                    <tr>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>


<div>
  <div>
      <div>
          <h3>Rövidpályás gyorskorcsolya a téli olimpiai játékokon</h3>

          <p>A 2022. évi téli olimpiai játékokon a rövidpályás gyorskorcsolya versenyszámait a pekingi Fővárosi Fedett Stadionban rendezték február 5. és 16. között. A férfiaknak és a nőknek egyaránt 4–4 versenyszámban, illetve egy vegyes versenyszámban osztottak érmeket. A vegyes 2000 méteres váltó először szerepelt a téli olimpiai játékok programjában. https://hu.wikipedia.org/wiki/R%C3%B6vidp%C3%A1ly%C3%A1s_gyorskorcsolya, Rövidpályás gyorskorcsolya</p>       </div>
    <div>
      <h3>Téli olimpia története</h3>
      <p>Az 1924. évi téli olimpiai játékok, később adott hivatalos nevén az I. téli olimpiai játékok egy több sportot magába foglaló nemzetközi sportesemény volt, melyet 1924. január 25. és február 5. között rendeztek meg a franciaországi Chamonix-ban. Hivatalosan Semaine Internationale des Sports d'Hiver (Télisportok Nemzetközi Hete) néven szerepelt az 1924. évi nyári olimpiai játékokkal, a Mont Blanc lábánál. Chamonix olimpiáját a Francia Olimpiai Bizottság rendezte meg, a várost a Nemzetközi Olimpiai Bizottság jelölte ki, mint az első téli olimpiai játékok házigazdáját. 1924-től egészen 1992-ig a téli olimpiákat a nyáriakkal megegyező években tartották.</p>
    <br>
    <p>A kép címe: "Készítette: Auguste Matisse - precise immediate image source is unknown. The poster is also on display at the website of the IOC.,Közkincs"</p>
    <a href="https://commons.wikimedia.org/w/index.php?curid=216754" target="_blank">Eredeti oldal</a>
  </div>
    <div>
      <h3>Rövid pályás gyorskorcsolya Magyarország</h3>
        
    </div>      
    <p>Magyarország a kínai Pekingben megrendezett 2022. évi téli olimpiai játékok egyik részt vevő nemzete volt. Az országot az olimpián 5 sportágban 14 sportoló képviselte. Magyarország először szerzett egynél több érmet a téli olimpiai játékok történetében. Liu Shaoang Magyarország első egyéni téli olimpiai aranyérmét nyerte.
         
      A kép címe: "A magyar érmeket szállító short trackesek (balról): Liu Shaoang, Jászapáti Petra, Kónya Zsófia, Liu Shaolin Sándor és Krueger John-Henry (Fotó: Árvai Károly)"
    Maga a sportág 1992 óta szerepel az olimpiákon, és eddig 16 ország tudott érmet szerezni az azóta lebonyolított kilenc játékokon. Közülük a belgák most iratkoztak fel egy bronzéremmel. Az élen itt is Dél-Korea áll 26 arannyal és 53 éremmel, a kínaiaknak 12 aranyuk és 37 dobogós helyezésük, a kanadaiaknak 10 aranyuk és 37 medáliájuk van. Innentől kezdve viszont nagyon szoros a mezőny: az amerikaiaknak 4 aranyuk, az olaszoknak, a hollandoknak és Oroszországnak 3-3 olimpiai bajnoki címe van, és Liu Shaoang 500-as aranyával, 1000 méteres bronzával és a vegyes váltó harmadik helyével Magyarország az igen előkelő 8. helyre lépett előre a tizedikről, megelőzve Japánt és Ausztráliát is. A mieink négy éve iratkoztak fel a tabellára a férfiváltó aranyérmével.</p>
   </div>
</div>
    <div class="container-fluid">
       <div>
           <div>
                 <h3>Éremszerző helyek listálya:</h3>
                   <table class="table table-striped">
                     <thead>
                       <tr>
                       
                      </tr>
                    </thead>
                   <tbody>
                    
                </tbody>
            </table>
           </div>
           <div class="col-md-5">
           <h3>Magyar éremszerzők listája</h3>
                <h6>A kiválasztott éremszerző adatai jelennek meg.</h6>
                
           </div>
       </div>
    </div>
</body>
</html>

