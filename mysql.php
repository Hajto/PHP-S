<FORM method="GET">
Nazwa produktu: <INPUT type="text" name="nazwa"><BR>
Cena: <INPUT type="text" name="cena"><BR>
Ilość: <INPUT type="text" name="ilosc"><BR>
Opis: 
<TEXTAREA name="opis" rows=5 cols=80>

</TEXTAREA>
<BR>
<INPUT type="submit" value="Dodaj">
</FORM>
<?php
 $con=mysql_connect("localhost","root","")
	or die("Nie można połączyć się z serwerem");
  mysql_select_db("sklep")
	or die("Nie można wybrać bazy danych");
  if(isset($_GET['nazwa'])&&isset($_GET['cena'])&&isset($_GET['ilosc']))
	mysql_query("INSERT INTO produkty(nazwa,cena,ilosc) 
	VALUES('".$_GET['nazwa']."',".$_GET['cena'].",".
	$_GET['ilosc'].")")
	or die('Nie można dodać rekordu');
  $wynik=mysql_query("SELECT nazwa,cena,ilosc FROM produkty")
	or die("Nie można pobrać rekordów");
  echo('<table border=1><tr><th>Nazwa produktu</th>
  <th>Cena</th><th>Ilość</th><th>&nbsp;</th></tr>');
  while($rekord=mysql_fetch_array($wynik))
  {
	echo("<tr><td>".$rekord['nazwa']."</td><td>".
	$rekord['cena']."</td><td>".$rekord['ilosc'].
	"</td><td>Usuń</td></tr>");
  }
  echo('</table>');
  mysql_close($con);
?>
