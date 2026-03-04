<?php
require "connect.php";
$personId = $_GET['id'];

$sql="DELETE from registrations WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':id', $personId);

$stmt->execute();

header("location: admin.php")