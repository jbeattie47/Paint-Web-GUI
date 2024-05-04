<?php
include 'db.php';

$sql = "SELECT id, name FROM colors";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $color) {
    echo "<option value='{$color['id']}'>{$color['name']}</option>";
}
?>