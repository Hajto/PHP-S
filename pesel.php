<?php
	echo('
		<FORM method="GET">
	
		Podaj PESEL: <INPUT type="text" name="pesel"><br>
		<INPUT type="submit" value="Spawdz">
		</FORM>
		');
		if(isset($_GET['pesel']))
		{
		  $pesel=$_GET['pesel'];
		  $suma=(substr($pesel,0,1))*1+(substr($pesel,1,1))*3+(substr($pesel,2,1))*7+(substr($pesel,3,1))*9+
		  (substr($pesel,4,1))*1+(substr($pesel,5,1))*3+(substr($pesel,6,1))*7+(substr($pesel,7,1))*9
		  +(substr($pesel,8,1))*1+(substr($pesel,9,1))*3+(substr($pesel,10,1)); 
		  
		  
		  if($suma%10==0)
		  
		echo('Poprawny');
		
	else
		
		echo('Zly');
		
		}
		
?>