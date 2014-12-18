<?PHP
$input = "Tekst do odwrocenia";
echo(strrev($input));
///--------------------------------------
$string = "";
for ($liczba = 7; $liczba > 0; $liczba--) {
    for ($klepka = $liczba; $klepka > 0; $klepka--)
        $string .= "*";
    echo("<center>" . $string . "</center>");
    $string = "";
}

$input = "KOMPUTER";
for ($iterator = 0; $iterator < strlen($input); $iterator++) {
    switch ($input[$iterator]) {
        case "O":
            $input[$iterator] = "K";
            break;
        case "K":
            $input[$iterator] = "O";
            break;
        case "N":
            $input[$iterator] = "I";
            break;
        case "I":
            $input[$iterator] = "N";
            break;
        case "E":
            $input[$iterator] = "C";
            break;
        case "C":
            $input[$iterator] = "E";
            break;
        case "M":
            $input[$iterator] = "A";
            break;
        case "A":
            $input[$iterator] = "M";
            break;
        case "T":
            $input[$iterator] = "U";
            break;
        case "U":
            $input[$iterator] = "T";
            break;
        case "R":
            $input[$iterator] = "Y";
            break;
        case "Y":
            $input[$iterator] = "R";
            break;
    }
}
echo($input);


?>
