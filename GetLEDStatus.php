<?php
require 'Database.php';

$pdo = Database::connect();
$sql = "SELECT Stat FROM statusled2 ORDER BY id DESC LIMIT 1";
$q = $pdo->prepare($sql);
$q->execute();
$result = $q->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo $result['Stat'];
} else {
    echo "";
}

Database::disconnect();
