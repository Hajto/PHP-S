<?php
/* ------ Po��cznie z baz� danych ----*/
$con = mysql_connect("localhost", "root", "")
or die("Nie mo�na po��czy� si� z serwerem");
mysql_select_db("sklep")
or die("Nie mo�na wybra� bazy danych");
/*    -----------------         */
$nazwa = "";
$opis = "";
$cena = "";
$ilosc = "";
/*                               */
if (isset($_GET['nazwa']) && isset($_GET['cena']) && isset($_GET['ilosc']))
    mysql_query("INSERT INTO produkty(nazwa,cena,ilosc)
		VALUES('" . $_GET['nazwa'] . "'," . $_GET['cena'] . "," .
        $_GET['ilosc'] . ")")
    or die('Nie mo�na doda� rekordu');
if (isset($_GET['id']) && isset($_GET['co']))
    switch ($_GET['co']) {
        case 'Usun':
            mysql_query("DELETE FROM produkty WHERE ID=" . $_GET['id'])
            or die('Nie mog� usun�� rekordu');
            break;
        case 'Edytuj':
            $tempUnFetchedArray = mysql_query("Select nazwa,cena,ilosc,opis FROM produkty WHERE ID=" . $_GET['id'])
            or die('Nie edytowa� rekordu rekordu');
            $tempFetchedArray = mysql_fetch_array($tempUnFetchedArray);
            $nazwa = $tempFetchedArray['nazwa'];
            $opis = $tempFetchedArray['opis'];
            $cena = $tempFetchedArray['cena'];
            $ilosc = $tempFetchedArray['ilosc'];
            $id = $_GET['id'];
            break;
        case 'Zapisz':
            //tutaj ma by� update
            echo "Rekord b�dzie edytowany";
            break;
    }

$wynik = mysql_query("SELECT ID,nazwa,cena,ilosc FROM produkty")
or die("Nie mo�na pobra� rekord�w");
echo('<table border=1><tr><th>Nazwa produktu</th>
  <th>Cena</th><th>Ilo��</th><th>&nbsp;</th><th>&nbsp;</th></tr>');
while ($rekord = mysql_fetch_array($wynik)) {
    echo("<tr><td>" . $rekord['nazwa'] . "</td><td>" .
        $rekord['cena'] . "</td><td>" . $rekord['ilosc'] .
        "</td><td><a href='?id=" . $rekord['ID'] . "&co=Usun'>Usu�</a></td><td><a href='?id=" . $rekord['ID'] . "&co=Edytuj'>Edytuj</a></td></tr>");
}
echo('</table>');
mysql_close($con);

echo('<FORM method="GET">
Nazwa produktu: <INPUT type="text" name="nazwa" value=' . $nazwa . '><BR>
Cena: <INPUT type="text" name="cena" value=' . $cena . '><BR>
Ilo��: <INPUT type="text" name="ilosc" value=' . $ilosc . '><BR>
Opis: 
<TEXTAREA name="opis" rows=5 cols=80 value=' . $opis . '>

</TEXTAREA>
<input type="hidden" name="id" value="' . (isset($id) ? $id : 1) . '" />
<BR>
<INPUT type="submit" name="co" value="' . ($nazwa != "" ? "Zapisz" : "Dodaj") . '">
</FORM>');
?>
