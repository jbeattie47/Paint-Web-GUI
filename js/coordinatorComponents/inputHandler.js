//Function to set the form submission
function setFormSubmission(){
    $('#colorForm').submit(function(e) {
        e.preventDefault();
        clearUI();
        const rowsCols = parseInt($('#rowsCols').val());
        const numColors = parseInt($('#numColors').val());
        const errors = validateInput(rowsCols, numColors);
        if(errors){
            displayErrors(errors);
            return;
        }
        generateColorTables(rowsCols, numColors);
        applyUniqueRowColors();
    });
}

//Function to clear the UI
function clearUI() {
    $('#errorMessages').empty();
    $('#colorTables').empty();
}

//Function to validate the input
function validateInput(rowsCols, numColors) {
    let errors = "";
    if(rowsCols < 1 || rowsCols > 26) errors += "<p>Rows & Columns must be between 1 and 26.</p>";
    if(numColors < 1 || numColors > 10) errors += "<p>Number of Colors must be between 1 and 10.</p>";
    return errors;
}


//Function to display the errors
function displayErrors(errors) {
    $('#errorMessages').html(errors);
}


//Function to generate the color tables
function generateColorTables(rowsCols, numColors) {
    const colorOptions = ["Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey", "Brown", "Black", "Teal"].sort();
    const colorSelectionTable = createColorSelectionTable(numColors, colorOptions);
    const gridTable = createColorTable(rowsCols);

    $('#colorTables').html(colorSelectionTable + gridTable);
    enforceUniqueColors();
    addCellClickListeners();
}

//Function to apply unique row colors to the grid table
function applyUniqueRowColors(){
    $('.colorTable tr').css('border', '1px solid black');
    $('.colorTable td').css('border', '1px solid black');

    $('.colorTable tr').each(function(row){
        if(row === 0){
            $(this).find('td:not(:first-child)').css('text-align', 'center', 'border', '1px solid black', 'border-collapse', 'collapse');
            return;
        }
        $(this).find('td:not(:first-child)').css('width', `${100 / $(this).find('td:not(:first-child)').length}%`);
        $(this).find('td:not(:first-child)').css('height', $(this).find('td:not(:first-child)').css('width'));
    });
    $('.colorTable').css('border-collapse', 'collapse');
}