<?php
include 'db.php';

$id = $_POST['id'];

try {
    // Check color count to prevent deleting when only two left
    $stmt = $pdo->query("SELECT COUNT(*) FROM colors");
    $count = $stmt->fetchColumn();

    if ($count <= 2) {
        echo "Error: Cannot delete. There must always be at least two colors.";
    } else {
        $sql = "DELETE FROM colors WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        echo "Color deleted successfully!";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>