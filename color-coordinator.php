<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Color Coordinator Generator - Web-Crawlers CS312</title>
    <link rel="stylesheet" href="styleStorage/baseStyle.css">
    <link rel="stylesheet" href="styleStorage/coordinatorStyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/coordinatorComponents/coordinator.js"></script>
    <script src="js/coordinatorComponents/inputHandler"></script>
    <script src="js/coordinatorComponents/updateColor.js"></script>
    <script src="js/coordinatorComponents/utils.js"></script>
    <script src="js/coordinatorComponents/printView.js"></script>
</head>
<body>
    <header style="padding-bottom:125px;">
        <h1 style="padding-top: 50px">Color Coordinator Generator!</h1>
        <img src="images/WebCrawlers.jpeg" alt="[Web-Crawlers!]" style="max-width: 150px;">
    </header>
    <nav>
        <a href="index.php">Home page!</a>
        <a href="about.php">Member Bios!</a>
        <a href="color-coordinator.php">Color Coordinator!</a>
        <a href="color-management.php">Color Manager!</a>
    </nav>
    <div class="content" style="text-align:center;">
        <h2>Input number of rows & columns (1-26) and number of Colors (1-10)</h2>
        <form id="colorForm">
            <label for="rowsCols">Rows & Columns (1-26):</label>
            <input type="number" id="rowsCols" name="rowsCols" min="1" max="26" required>
            <label for="numColors">Number of Colors (1-10):</label>
            <input type="number" id="numColors" name="numColors" min="1" max="10" required>
            <input type="submit" value="Generate">
        </form>
        <div id="errorMessages"></div>
        <div id="colorTables"></div>
        <button id="printView">Print View</button> <!-- Button for print view, functionality in printView.php -->
    </div>
    <footer>
        &copy; 2024 Web-Crawlers CS312
    </footer>
</body>
</html>