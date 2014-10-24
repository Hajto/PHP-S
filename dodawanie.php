<?php
echo('
<FORM method="GET" action="dodawanie.php">
Podaj pierwszą liczbę: <INPUT type="text" name="liczba1"><BR>
Podaj drugą liczbę: <INPUT type="text" name="liczba2"><BR>
<INPUT type="submit" value="Dodaj">
</FORM>
');
if(isset($_GET['liczba1'])&&isset($_GET['liczba2']))
{
	$liczba1=$_GET['liczba1'];
	$liczba2=$_GET['liczba2'];
	if(is_numeric($liczba1)&&(is_numeric($liczba2))) 
		echo("$liczba1+$liczba2=".($liczba1+$liczba2));
	else
		echo('Musisz wprowadzić dane');
}
?>
