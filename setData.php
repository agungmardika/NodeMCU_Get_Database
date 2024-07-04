<?php
require 'database.php';

if (!empty($_POST)) {
    $id = $_POST["ID"];
    $status = $_POST["Status"];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'UPDATE statusled2 SET Stat = ? WHERE ID = ?';

    $q = $pdo->prepare($sql);
    $q->execute(array($status, $id));
    Database::disconnect();

    echo "Status updated";
}
