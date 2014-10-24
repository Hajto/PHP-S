<?php
	function gw($tekst)
	{
	  echo($tekst.'<br>'); // wypisuje alles shit
	  //for($i=0;$i<strlen($tekst);$i++)
		//echo('*');
	  //echo('<br>');
	}
	
	function sprawdz_pesel($pesel)
	{
		$k=$pesel[0]*1+$pesel[1]*3+$pesel[2]*7+$pesel[3]*9+
			$pesel[4]*1+$pesel[5]*3+$pesel[6]*7+$pesel[7]*9+
			$pesel[8]*1+$pesel[9]*3+$pesel[10];
		return $k;
	}
	echo('
		<FORM method="GET">
		Podaj imię: <INPUT type="text" name="imie"><br>
		Podaj nazwisko: <INPUT type="text" name="nazwisko"><br>
		Podaj PESEL: <INPUT type="text" name="pesel"><br>
		<INPUT type="submit" value="Oblicz">
		</FORM>
		');
		if(isset($_GET['imie'])&&isset($_GET['nazwisko'])&&isset($_GET['pesel']))
		{
		  $miesiace=["Stycznia", "Lutego", "Marca", "Kwietnia", "Maja", "<img src='czerwca", "Lipca", "Sierpnia", "Września", "Października", "Listopada", "Grudnia"];
		  $imie=$_GET['imie'];
		  $nazwisko=$_GET['nazwisko'];
		  gw($imie[0].$nazwisko[0]);
		  $pesel=$_GET['pesel'];
		  if(is_numeric($pesel)&&strlen($pesel)==11 &&
		  (intval($pesel[2].$pesel[3]) <= 12 || (intval($pesel[2].$pesel[3]) <= 20 && intval($pesel[2].$pesel[3]) >= 32)
		  || (intval($pesel[2].$pesel[3]) <= 40 && intval($pesel[2].$pesel[3]) >= 52)
		  || (intval($pesel[2].$pesel[3]) <= 60 && intval($pesel[2].$pesel[3]) >= 72)
		  || (intval($pesel[2].$pesel[3]) <= 80 && intval($pesel[2].$pesel[3]) >= 92)
		  ))
		  {
			if(sprawdz_pesel($pesel)%10==0){
				gw('PESEL prawidłowy');
				echo($imie." ".$nazwisko." urodził się ".$pesel[4].$pesel[5]." ".$miesiace[intval($pesel[2].$pesel[3])-1]." w ".
				(intval($pesel[2].$pesel[3]) <= 12 ? "19".intval($pesel[0].$pesel[1]):(
				(intval($pesel[2].$pesel[3]) <= 40 && intval($pesel[2].$pesel[3]) >= 52)? "20".intval($pesel[0].$pesel[1]) : "rzadnym"))
				." roku i jest ".($pesel[9]%2 ? "facetem" : "kobieta"));
				}
			else
				gw('PESEL nieprawidłowy');
		  }
		}
		
?>