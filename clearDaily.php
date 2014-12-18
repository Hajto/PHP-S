<?php
/**
 * Created by IntelliJ IDEA.
 * User: Hajto-Lenovo
 * Date: 2014-12-12
 * Time: 14:57
 */

$Baza_connection = new PDO("mysql:host=127.0.0.1; dbname=stadnik", "root", "")
    or die ("Błąd połączenia");
$Baza_connection->query("Update `Adresy IP` set Times=1");
//, Monthly=1

?>