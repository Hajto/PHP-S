<?php
/**
 * Created by IntelliJ IDEA.
 * User: Hajto-Lenovo
 * Date: 2014-12-12
 * Time: 15:00
 */
$Baza_connection = new PDO("mysql:host=127.0.0.1; dbname=stadnik", "root", "")
or die ("Błąd połączenia");
$Baza_connection->query("Update `Adresy IP` set Monthly=1");
?>