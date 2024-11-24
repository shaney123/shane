<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $stmt = $conn->prepare("INSERT INTO students (firstname, middlename, lastname, age, address, course_section) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$firstname, $middlename, $lastname, $age, $address, $course_section]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add Student</h1>
    <form method="post">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="middlename" placeholder="Middle Name">
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="course_section" placeholder="Course & Section" required>
        <button type="submit" class="btn">Save</button>
    </form>
</body>
</html>
