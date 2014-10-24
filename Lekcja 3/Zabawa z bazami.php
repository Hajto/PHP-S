<!DOCTYPE HTML>
<html>
<head>
<style>
	table{
		border:solid;
	}
	td{
	border:solid;}
</style>

</head>
<body>

<?PHP
	//("serwer","nazwa uzytkownika","haslo")
	$connect = mysql_connect("localhost","root","")
		or die("Nie można połączyć się z serwerem");
	mysql_select_db("sklep")
		or die("Nie można wybrać bazy danych");
	if(
	   isset($_GET['Nazwa'])&&
	   isset($_GET['Cena'])&&
	   isset($_GET['Ilosc'])
	){
	mysql_query("INSERT INTO produkty(Nazwa,Cena,Ilosc)	VALUES ('".$_GET['Nazwa']."',".$_GET['Cena'].",".$_GET['Ilosc'].")") or die ("Cos jest nie tak");
	}
	if( isset($_GET['id']))
	mysql_query("DELETE FROM produkty WHERE ID=".$_GET['id']);
	$baza = mysql_query("Select ID,Nazwa,Cena,Ilosc from produkty")
		or die("Nie można pobrać rekordów");
	echo('<table>');
	echo("<tr><td>Nazwa</td><td>Cena</td><td>Ilosc</td></tr>");
	while($rekord = mysql_fetch_array($baza))
	{
		echo("<tr><td>".$rekord['Nazwa']."</td><td>".$rekord['Cena']."</td><td>".$rekord['Ilosc']."</td><td><a href='?id=".$rekord['ID']."'>Usun</a></td></tr>");
	}
	echo("</table>");
	mysql_close($connect);
?>


<form method="GET">
	<label for="Nazwa">Nazwa produktu</label>
	<input name="Nazwa" type="text" /><br>
	<label for="Cena">Cena </label>
	<input name="Cena" type="text" /><br>
	<label for="Ilosc">Ilosc </label>
	<input name="Ilosc" type="text" /><br>
	<textarea name="Opis"></textarea><br>
	<input type="submit" value="Dodaj!" />
</form>
</body>
</html>