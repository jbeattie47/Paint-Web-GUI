<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Management</title>
    <link rel="stylesheet" href="styleStorage/baseStyle.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <h1>Manage Colors</h1>
        <img src="images/WebCrawlers.jpeg" alt="[Web-Crawlers!]" style="max-width: 150px;">
    </header>
    <nav>
        <a href="index.php">Home page!</a>
        <a href="about.php">Member Bios!</a>
        <a href="color-coordinator.php">Color Coordinator!</a>
        <a href="color-management.php">Color Manager!</a>
    </nav>
    <div class="content">
        <!-- Add Color Form -->
        <form id="addColorForm">
            <label for="colorName">Color Name:</label>
            <input type="text" id="colorName" name="colorName" required>
            <label for="hexValue">Hex Value:</label>
            <input type="text" id="hexValue" name="hexValue" required pattern="#[a-fA-F0-9]{6}">
            <input type="submit" value="Add Color">
        </form>

        <!-- Edit Color Form -->
        <form id="editColorForm">
            <label for="editColorId">Select Color:</label>
            <select id="editColorId" name="editColorId" required></select>
            <label for="editColorName">New Color Name:</label>
            <input type="text" id="editColorName" name="editColorName" required>
            <label for="editHexValue">New Hex Value:</label>
            <input type="text" id="editHexValue" name="editHexValue" required pattern="#[a-fA-F0-9]{6}">
            <input type="submit" value="Update Color">
        </form>

        <!-- Delete Color Form -->
        <form id="deleteColorForm">
            <label for="deleteColorId">Select Color to Delete:</label>
            <select id="deleteColorId" name="deleteColorId" required></select>
            <input type="button" value="Delete Color" onclick="confirmDelete();">
        </form>

        <div id="colorOperationResult"></div>
    </div>
    <footer>
        &copy; 2024 Web-Crawlers CS312
    </footer>
    <script src="js/colorManagement.js"></script>
</body>
</html>