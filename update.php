<?php
require "connect.php";
if (!isset($_GET['id'])){
    die("no user id provided");
}

$personId = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $fname = trim($_POST['first_name'] ?? '');
    $lname = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');

    if ($fname === '' || $lname ==='' || $email ===''|| $phone === ''){
        $error = "first name last name email and phone are required";
    }else{
        $sql = "UPDATE registrations
        SET first_name = :first_name,
        last_name = :last_name,
        email = :email, 
        phone = :phone
        WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $stmt->bindparam(':first_name', $fname);
        $stmt->bindparam(':last_name', $nlame);
        $stmt->bindparam(':email', $email);
        $stmt->bindparam(':phone', $phone);
        $stmt->bindparam(':id', $personId);

        $stmt->execute();

        header("Location: admin.php")
        exit;
    }
}

