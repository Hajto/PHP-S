<?php
/* ------ Po³¹cznie z baz¹ danych ----*/
 $con=mysql_connect("localhost","root","")
	or die("Nie mo¿na po³¹czyæ siê z serwerem");
  mysql_select_db("sklep")
	or die("Nie mo¿na wybraæ bazy danych");
/*    -----------------         */	
	$nazwa = "";
	$opis = "";
	$cena = "";
	$ilosc = "";
/*                               */	
  if(isset($_GET['nazwa'])&&isset($_GET['cena'])&&isset($_GET['ilosc']))
	  mysql_query("INSERT INTO produkty(nazwa,cena,ilosc) 
		VALUES('".$_GET['nazwa']."',".$_GET['cena'].",".
		$_GET['ilosc'].")")
		or die('Nie mo¿na dodaæ rekordu');
  if(isset($_GET['id']) && isset($_GET['co'])) 
	switch($_GET['co']){
		case 'Usun':
			mysql_query("DELETE FROM produkty WHERE ID=".$_GET['id'])
			or die('Nie mogê usun¹æ rekordu');
			break;
		case 'Edytuj':
			$tempUnFetchedArray = mysql_query("Select nazwa,cena,ilosc,opis FROM produkty WHERE ID=".$_GET['id'])
			or die('Nie edytowaæ rekordu rekordu');
			$tempFetchedArray = mysql_fetch_array($tempUnFetchedArray);
			$nazwa = $tempFetchedArray['nazwa'];
			$opis = $tempFetchedArray['opis'];
			$cena = $tempFetchedArray['cena'];
			$ilosc = $tempFetchedArray['ilosc'];
			echo($nazwa.$opis.$cena.$ilosc);
			break;
	}
	
	
  
  $wynik=mysql_query("SELECT ID,nazwa,cena,ilosc FROM produkty")
	or die("Nie mo¿na pobraæ rekordów");
  echo('<table border=1><tr><th>Nazwa produktu</th>
  <th>Cena</th><th>Iloœæ</th><th>&nbsp;</th><th>&nbsp;</th></tr>');
  while($rekord=mysql_fetch_array($wynik))
  {
	echo("<tr><td>".$rekord['nazwa']."</td><td>".
	$rekord['cena']."</td><td>".$rekord['ilosc'].
	"</td><td><a href='?id=".$rekord['ID']."&co=Usun'>Usuñ</a></td><td><a href='?id=".$rekord['ID']."&co=Edytuj'>Edytuj</a></td></tr>");
  }
  echo('</table>');
  mysql_close($con);
  
  echo('<FORM method="GET">
Nazwa produktu: <INPUT type="text" name="nazwa" value='.$nazwa.'><BR>
Cena: <INPUT type="text" name="cena" value='.$cena.'><BR>
Iloœæ: <INPUT type="text" name="ilosc" value='.$ilosc.'><BR>
Opis: 
<TEXTAREA name="opis" rows=5 cols=80 value='.$opis.'>

</TEXTAREA>
<BR>
<INPUT type="submit" value="'.($nazwa != ""? "Edytuj" : "Zapisz").'">
</FORM>');
?>
