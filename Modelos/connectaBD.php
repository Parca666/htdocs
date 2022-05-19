<?php
function connectaBD()
{
    $con = new PDO(
        'mysql:host=127.0.0.1;dbname=tdiwm12;port=3306;charset=utf8mb4',
        'tdiw-m12',
        'MQo9kRJE'
    );
    return($con);
}