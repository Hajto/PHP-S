<html>
<head>
    <meta charset="utf-8"/>
</head>
</html>
<?php
echo $_SERVER['REMOTE_ADDR'];

$Baza_connection = new PDO("mysql:host=127.0.0.1; dbname=stadnik", "root", "")
or die ("Błąd połączenia");
$IPAdressesToFetch = $Baza_connection->query("select * from `Adresy IP` where Adres_IP='" . $_SERVER['REMOTE_ADDR'] . "'");
$record = $IPAdressesToFetch->fetch(PDO::FETCH_ASSOC);
if ($record['Adres_IP'] == $_SERVER['REMOTE_ADDR']) {
    echo "Już jest";
    $Baza_connection->query("Update `Adresy IP` set Times=" . ($record['Times'] + 1) . ", Monthly=" . ($record['Monthly'] + 1) . " where Adres_IP='" . $record['Adres_IP'] . "'");
} else {
    $Baza_connection->query("Insert into `Adresy IP` values ('" . $_SERVER['REMOTE_ADDR'] . "')")
    or die("Nie można dodać adresu IP do listy");
}

$temp = $Baza_connection->query("SELECT COUNT(*) FROM `Adresy IP`")->fetch(PDO::FETCH_ASSOC);
echo "<br />Strona ma " . $temp['COUNT(*)'] . " unikalnych wyświetleń";

$IPAdressesToFetch = $Baza_connection->query("SELECT * FROM `Adresy IP` ORDER BY Times DESC limit 3");
$tempString = "<table>";
while ($record = $IPAdressesToFetch->fetch(PDO::FETCH_ASSOC)) {
    $tempString .= "<tr><td>" . $record['Adres_IP'] . "</td><td>" . $record['Times'] . "</td><td>" . $record['Monthly'] . "</td></tr>";
}
$tempString .= "</table>";
echo $tempString;
?>
