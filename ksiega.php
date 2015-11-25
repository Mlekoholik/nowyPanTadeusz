<?php

include_once 'vendor/autoload.php';

use Ptad\Component\Books\Content;
use Ptad\Component\Books\manageContent;

$books = new manageContent();
$save = false;
//używane tylko za pierwszym razem, do wygenerowania .json'a
if ($save = true) {
    $books->SaveContentToFile('Gospodarstwo', 'Litwo! Ojczyzno moja! ty jesteś jak zdrowie.<br/>
Ile cię trzeba cenić, ten tylko się dowie,<br/>
Kto cię stracił. Dziś piękność twą w całej ozdobie<br/>
Widzę i opisuję, bo tęsknię po tobie.');

    $books->SaveContentToFile('Zamek', 'Kto z nas tych lat nie pomni, gdy, młode pacholę,<br/>
Ze strzelbą na ramieniu świszcząc szedł na pole,<br/>
Gdzie żaden wał, płot żaden nogi nie utrudza,<br/>
Gdzie przestępując miedzę, nie poznasz, że cudza!');

    $books->SaveContentToFile('Umizgi', 'Hrabia wracał do siebie, lecz konia wstrzymywał,<br/>
Głową coraz w tył kręcił, w ogród się wpatrywał;<br/>
I raz mu się zdawało, że znowu z okienka<br/>
Błysnęła tajemnicza bieluchna sukienka');

    $books->SaveContentToFile('Dyplomatyka i łowy', 'Rówienniki litewskich wielkich kniaziów, drzewa<br/>
Białowieży, Świtezi, Ponar, Kuszelewa!<br/>
Których cień spadał niegdyś na koronne głowy<br/>
Groźnego Witenesa, wielkiego Mindowy');

    $books->SaveContentToFile('Kłótnia', 'Wojski, chlubnie skończywszy łowy, wraca z boru,<br/>
A Telimena w głębi samotnego dworu<br/>
Zaczyna polowanie. Wprawdzie nieruchoma<br/>
Siedzi z założonemi na piersiach rękoma,');

    $books->SaveContentToFile('Zaścianek', 'Nieznacznie z wilgotnego wykradał się mroku<br/>
Świt bez rumieńca, wiodąc dzień bez światła w oku.<br/>
Dawno wszedł dzień, a jeszcze ledwie jest widomy.<br/>
Mgła wisiała nad ziemią, jak strzecha ze słomy');

    $books->SaveContentToFile('Rada', 'Z kolei Bartek poseł rzecz swą wyprowadzał;<br/>
Ten, że często na strugach do Królewca chadzał,<br/>
Nazwany był Prusakiem od swych spółrodaków<br/>
Przez żart, bo nienawidził okropnie Prusaków,');

    $books->SaveContentToFile('Zajazd', 'Przed burzą bywa chwila cicha i ponura,<br/>
Kiedy nad głowy ludzi przyleciawszy chmura<br/>
Stanie i grożąc twarzą, dech wiatrów zatrzyma,<br/>
Milczy, obiega ziemię błyskawic oczyma,');

    $books->SaveContentToFile('Bitwa', 'A chrapali tak twardym snem, że ich nie budzi<br/>
Blask latarek i wniście kilkudziesiąt ludzi,<br/>
Którzy wpadli na szlachtę, jak pająki ścienne<br/>
Nazwane k o s a r z a m i na muchy wpółsenne:');

    $books->SaveContentToFile('Emigracja. Jacek', 'Owe obłoki ranne, zrazu rozpierzchnione<br/>
Jak czarne ptaki, lecąc w wyższą nieba stronę,<br/>
Coraz się zgromadzały; ledwie słońce zbiegło<br/>
Z południa, już ich stado pół niebios obległo');

    $books->SaveContentToFile('Rok 1812', 'O roku ów! kto ciebie widział w naszym kraju!<br/>
Ciebie lud zowie dotąd rokiem urodzaju,<br/>
A żołnierz rokiem wojny; dotąd lubią starzy<br/>
O tobie bajać, dotąd pieśń o tobie marzy.');

    $books->SaveContentToFile('Kochajmy się', 'Na koniec z trzaskiem sali drzwi na wściąż otwarto.<br/>
Wchodzi pan Wojski w czapce i z głową zadartą,<br/>
Nie wita się i miejsca za stołem nie bierze,<br/>
Bo Wojski występuje w nowym charakterze,');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Pan Tadeusz
        </title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Pan Tadeusz - Szymon Pogon</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-ledft">
                        <li><a href="index.php">O mnie</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
<?php
for ($i = 1; $i <= 12; $i++) {
    ?>
                            <li <?php
    if ($_GET['page'] == $i) {
        echo "class=\"active\"";
    }
    ?>><a href="ksiega.php?page=<?php echo $i; ?>">Księga <?php echo $i; ?></a></li>
    <?php
}
?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 col-xs-9 col-xs-offset-3 main">
            <?php
                            $books_data = $books->getContent($_GET['page']);
                            ?>
            <h1 class="page-header">Księga <?php echo $_GET['page'].": ".$books_data["title"]; ?></h1>
                        <?php echo $books_data["content"]; ?>
            <hr/>
<?php
if (isset($_POST['wyslij'])) {
    /* $url = 'https://mandrillapp.com/api/1.0/messages/send.json';
      $params = [
      'message' => array(
      'subject' => $_POST['tytul'],
      'text' => $_POST['wiadomosc'],
      //'html' => '<p>' . $reflection . '</p>',
      'from_email' => 'pp5@uek.krakow.pl',
      'to' => array(
      array(
      'email' => 'szymonpogon@outlook.com',
      'name' => 'Szymon Pogon'
      )
      )
      )
      ];

      $params['key'] = 'HEpZLrPrRBEa7W9fLAJKeQ';
      $params = json_encode($params);
      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
      curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

      $head = curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch); */

    $db = pg_connect('host=sbazy dbname=s181415 user=s181415 password=1');

    $tytul = pg_escape_string($_POST['tytul']);
    $wiadomosc = pg_escape_string($_POST['wiadomosc']);
    $ksiega = pg_escape_string($_GET['page']);

    $query = "INSERT INTO pantadeusz(title, reflection, book) VALUES('" . $tytul . "', '" . $wiadomosc . "', '" . $ksiega . "')";
    $result = pg_query($query);
    if (!$result) {
        $errormessage = pg_last_error();
        echo "Error with query: " . $errormessage;
        exit();
    }
    printf("These values were inserted into the database - %s %s %s", $tytul, $wiadomosc, $ksiega);
    pg_close();

    header("Location: ksiega.php?page=" . $_GET['page']);
} else {
    ?>

                <form method="POST" action="ksiega.php?page=<?php echo $_GET['page']; ?>">
                    <div class="form-group">
                        <label for="tytul">Tytuł:</label>
                        <input type="text" class="form-control" name="tytul" id="tytul">
                    </div>
                    <div class="form-group">
                        <label for="wiadomosc">Wiadomość:</label>
                        <textarea class="form-control" rows="5" name="wiadomosc" id="wiadomosc"></textarea>
                    </div>
                    <div class="text-right">
                        <input class="btn btn-info" type="submit" name="wyslij" value="Wyślij">
                    </div>
                </form>

    <?php
}
$db = pg_connect('host=sbazy dbname=s181415 user=s181415 password=1');
$ksiega = pg_escape_string($_GET['page']);
$query = "SELECT * FROM pantadeusz WHERE book='" . $ksiega . "' ORDER by id DESC";

$result = pg_query($query);
if (!$result) {
    echo "Problem with query " . $query . "<br/>";
    echo pg_last_error();
    exit();
}

while ($myrow = pg_fetch_assoc($result)) {
    ?>
                <div class="well well-sm" style="margin-top: 20px;">
                    <h5><?php echo $myrow['title']; ?></h5>
                <?php echo $myrow['reflection']; ?>
                </div>
                <?php
            }
            ?>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="text-center text-muted">Copyright &copy; Szymon Pogon</p>
            </div>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>