<?php
function connectaBD()
{
    $host = 'localhost';
    $dbname = 'leyendas musica';
    $username = 'leyendasmusica';
    $password = 'TFmPyYFKJcvh3fxa';

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        //echo "Connected to $dbname at $host successfully.";
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    return($conn);
}