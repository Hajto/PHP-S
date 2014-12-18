<?php
if (isset($_GET['form1'])) $liczba1 = $_GET['form1'];
else $liczba1 = "x";
if (isset($_GET['form2'])) $liczba2 = $_GET['form2'];
else $liczba2 = "x";
if (isset($_GET['operator'])) $op = $_GET['operator'];

if (is_numeric($liczba1) && is_numeric($liczba2)) {
    switch ($op) {
        case '+':
            echo("$liczba1+$liczba2= " . ($liczba1 + $liczba2));
            break;
        case '-':
            echo("$liczba1/$liczba2= " . ($liczba1 - $liczba2));
            break;
        case '*':
            echo("$liczba1*$liczba2= " . ($liczba1 * $liczba2));
            break;
        case '/':
            if ($liczba2 != 0) echo("$liczba1/$liczba2= " . ($liczba1 / $liczba2));
            else echo("Nie dziel przez zero, cholero!");
            break;
    }
} else echo("Musisz wpisać liczby");
?>
<html>
<head>
</head>
<body>
<form name="from" action="kalkulator.php" method="get">
    Podaj liczbe : <input type="text" name="form1"/>
    Podaj liczbe : <input type="text" name="form2"/>
    <select name="operator">
        <option>+</option>
        <option>-</option>
        <option>*</option>
        <option>/</option>
    </select>
    <input type="submit"></input>
</form>
</body>
</html>