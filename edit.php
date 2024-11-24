<?php
include 'db.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM students WHERE id = ?");
$query->execute([$id]);
$student = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $course_section = $_POST['course_section'];

    $stmt = $conn->prepare("UPDATE students SET firstname = ?, middlename = ?, lastname = ?, age = ?, address = ?, course_section = ? WHERE id = ?");
    $stmt->execute([$firstname, $middlename, $lastname, $age, $address, $course_section, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Student</h1>
    <form method="post">
        <input type="text" name="firstname" value="<?= htmlspecialchars($student['firstname']) ?>" required>
        <input type="text" name="middlename" value="<?= htmlspecialchars($student['middlename']) ?>">
        <input type="text" name="lastname" value="<?= htmlspecialchars($student['lastname']) ?>" required>
        <input type="number" name="age" value="<?= htmlspecialchars($student['age']) ?>" required>
        <input type="text" name="address" value="<?= htmlspecialchars($student['address']) ?>" required>
        <input type="text" name="course_section" value="<?= htmlspecialchars($student['course_section']) ?>" required>
        <button type="submit" class="btn">Update</button>
    </form>
</body>
</html>
