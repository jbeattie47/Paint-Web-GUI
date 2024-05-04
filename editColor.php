<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$hex = $_POST['hex'];

try {
    $sql = "UPDATE colors SET name = :name, hex = :hex WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':hex', $hex);
    $stmt->execute();
    echo "Color updated successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>