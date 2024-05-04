<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print View - Color Coordinator</title>
    <link rel="stylesheet" href="styleStorage/printStyle.css">
    <script src="js/coordinatorComponents/coordinator.js"></script>
    <script src="js/coordinatorComponents/inputHandler"></script>
    <script src="js/coordinatorComponents/updateColor.js"></script>
    <script src="js/coordinatorComponents/utils.js"></script>
    <script src="js/coordinatorComponents/printView.js"></script>
</head>
<body>
    <header>
        <div class="team_ID">
            <h1>Web-Crawlers</h1>
            <img src="images/WebCrawlers.jpeg" alt="[Web-Crawlers!] "style="width: 15%;">
        </div>
    </header>
    <div class="content">
        <?php
            //Gets the values for number of Rows&Cols, number of colors, and the selected colors from the URL query string
            $rowsCols = isset($_GET['rowsCols']) ? intval($_GET['rowsCols']) : 0;
            $numColors = isset($_GET['numColors']) ? intval($_GET['numColors']) : 0;
            $selectedColors = isset($_GET['selectedColors']) ? explode('|',$_GET['selectedColors']) : array();
            $coordinates = isset($_GET['coordinates']) ? explode('|',$_GET['coordinates']) : array();
    
            //Prints out the table for the selected colors
            if ($numColors > 0) {
                echo '<table class="colorSelectionTable"><tr><th>#</th><th>Color Selection</th><th>Coordinates</th></tr>';
                //Prints out each color in its designated row.
                foreach($selectedColors as $index => $colors) {
                    $color = htmlspecialchars(urldecode($colors));
                    $coordinateList = htmlspecialchars(urldecode($coordinates[$index] ?? ''));
                    //Prints "#rowNum colorName" in each row
                    echo "<tr><td>" . ($index + 1) . "</td><td>" . $color . "</td><td> " . $coordinateList . "</td></tr>";
                }
                echo '</table>';
            }

            //Prints out the color table if user entered a valid number of rows&cols and colors.
            if ($rowsCols > 0 && count($selectedColors) > 0) {
                echo '<table class="colorTable"><tr><td></td>';
                //Prints out the column headers (A-Z) for the table
                for($headerCol= 0; $headerCol < $rowsCols; $headerCol++) {
                    echo '<td>' . chr(65+$headerCol) . '</td>';//chr() converts ASCII value to character
                }
                echo '</tr>';
                //Prints out the the unique colors for each row
                for($row = 1; $row <= $rowsCols; $row++) {
                    //Prints the current row number (1-26)
                    echo "<tr><td> $row </td>";
                    //Prints the color for each column in the row
                    for($col = 1; $col <= $rowsCols; $col++) {
                                                            /*  Commented out for the time being.    */

                        //If the row number surpasses the number of selected colors, print "None", else print the designated colors' name
                        //$color = (($row - 1) < sizeof($selectedColors)) ? htmlspecialchars($selectedColors[$row - 1]) : "None";
                        
                        //If the color is "None", print N/A, else print the designated color
                        //echo ($color == "None") ? "<td>N/A</td>" : "<td style='background-color: ${color};'>$color</td>";

                        echo "<td></td>";
                    }
                    echo '</tr>';
                }//Increment to the next row
                echo '</table>';
            }//End of the color tavble
        ?>
    </div>
</body>
</html>
