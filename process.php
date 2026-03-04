<?php
/*### 3) Registration Form 

Using the provided HTML form:

- Accept user input and submit it to the server 
- **Sanitize and validate** the form data on the server (3 marks) 
- If valid, **store the registration in the database** 
- If invalid, display a clear error message and do not store the record 

---*/
require "connect.php";

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('INVALID');
}
//sanitizing
$fname = trim(filter_input(INPUT _POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS));
$lname = trim(filter_input(INPUT _POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_input(INPUT _POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
$phone = trim(filter_input(INPUT _POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
//validating
$errors = [];
if ($fname === null || $fname === ''){
    $errors[] = "first name is required";
}

if ($lastname === null || $lastname ===''){
    $errors[] = "last name is required";
}

if ($email === null || $email === ''){
    $errors[] = "email is required";
} esleif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = "email must be a valid email address";
}

if ($phone === null || $phone ===''){
    $errors[] = "phone number is required";
} elseif (!filter_var($phone, FILTER_VALIDATE_REGEXP,['options' => ['regexp' => '/^[0-9\-\+\(-)\s]{7,25}$/']])){
    $errors[]= "phone number format is invalid";
}

//errors
if(!empty($errors)){
    echo"<div class='alert alert-danger'>";
    echo"<h2>Please fix the following errors</h2>";
    echo"<ul>";
    foreach($errors as $error){
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    echo "</div>";
    exit;
}
// query
$sql = "INSERT INTO registration (first_name, last_name, email, phone) VALUES (:first_name, :last_name, :phone, :email)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':first_name', $fname);
$stmt->bindParam(':last_name', $lname);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phone', $phone);

$stmt->execute();

$pdo = null;
?>