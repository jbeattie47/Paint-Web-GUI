<?php
include 'db.php';

$name = $_POST['name'];
$hex = $_POST['hex'];

try {
   $stmt = $pdo->prepare("SELECT COUNT(*) FROM colors WHERE name = :name OR hex = :hex");
   $stmt->bindParam(':name', $name);
   $stmt->bindParam(':hex', $hex);
   $stmt->execute();

   if ($stmt->fetchColumn() > 0) {
       echo "Error: Color name or hex value already exists.";
   } else {
       $sql = "INSERT INTO colors (name, hex) VALUES (:name, :hex)";
       $stmt = $pdo->prepare($sql);
       $stmt->bindParam(':name', $name);
       $stmt->bindParam(':hex', $hex);
       $stmt->execute();
       echo "Color added successfully!";
   }
} catch (PDOException $e) {
   echo "Error: " . $e->getMessage();
}
?>